<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Siapkan konstruktor controller
     * 
     * @param Model $data
     */
    public function __construct() 
    {
        $this->middleware('auth');
        
        $this->view = 'core::';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Settings Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function setting(Request $request) 
    {
        switch($request->type):
            case 'general':
                return view("$this->view.config.setting.general");
            break;
            case 'assets':
                return view("$this->view.config.setting.assets");
            break;
            case 'template':
                return view("$this->view.config.setting.template");
            break;
            case 'social-media':
                return view("$this->view.config.setting.social-media");
            break;
            case 'api-connection':
                return view("$this->view.config.setting.api-connection");
            break;
            case 'advanced':
                return view("$this->view.config.setting.advanced");
            break;
            case 'meta-tag':
                return view("$this->view.config.setting.meta-tag");
            break;
            case 'maintenance':
                return view("$this->view.config.setting.maintenance");
            break;
            default:
                return abort(404);
            break;
        endswitch;
    }

    /**
     * Process Settings
     * 
     * @param Request $request
     * @return Mix
     */
    public function updateSetting(Request $request) 
    {
        $input = $request->except('type', '_method',  '_token');

        if($request->type == 'sekilas-info'):
            $this->validate($request, ['HEADLINE_TEXT' => 'required']);
            $input['HEADLINE'] = $request->filled('HEADLINE') ? 1 : 0;
            $input['HEADLINE_TEXT'] = preg_replace("/\r|\n/", "", $input['HEADLINE_TEXT']);
        endif;

        if($request->type == 'general'):
            $this->validate($request, [
                'INSTANSI' => 'required',
                'SINGKATAN' => 'required',
                'PEMERINTAH' => 'required',
                'ALAMAT' => 'required',
                'TELEPON' => 'required',
                'EMAIL' => 'required'
            ]);

            $input['ALAMAT'] = preg_replace("/\r|\n/", "", $input['ALAMAT']);
        endif;

        if($request->type == 'assets'):
            $this->validate($request, [
                'ASSET_FAVICON' => 'mimes:png,jpg,jpeg', 
                'ASSET_LOGO' => 'mimes:png,jpg,jpeg', 
            ]);

            if($request->hasFile('ASSET_FAVICON')):
                $input['ASSET_FAVICON'] = $this->upload($request->file('ASSET_FAVICON'), 'favicon');
            endif;

            if($request->hasFile('ASSET_LOGO')):
                $input['ASSET_LOGO'] = $this->upload($request->file('ASSET_LOGO'), 'logo');
            endif;
        endif;

        if($request->type == 'template'):
            $this->validate($request, [
                'KEPALA_FOTO' => 'mimes:png,jpg,jpeg', 
                'ASSET_STRUKTUR' => 'mimes:png,jpg,jpeg', 
            ]);

            $input['KEPALA_SAMBUTAN'] = preg_replace("/\r|\n/", "", $input['KEPALA_SAMBUTAN']);
            $input['MAPS'] = preg_replace("/\r|\n/", "", $input['MAPS']);

            if($request->hasFile('KEPALA_FOTO')):
                $input['KEPALA_FOTO'] = $this->upload($request->file('KEPALA_FOTO'), 'pimpinan');
            endif;

            if($request->hasFile('ASSET_STRUKTUR')):
                $input['ASSET_STRUKTUR'] = $this->upload($request->file('ASSET_STRUKTUR'), 'struktur-organisasi');
            endif;
        endif;

        if($request->type == 'advanced'):
            if(isset($input['HEAD_CODE'])):
                $input['HEAD_CODE'] = rawurlencode($input['HEAD_CODE']);
            endif;
            if(isset($input['FOOTER_CODE'])):
                $input['FOOTER_CODE'] = rawurlencode($input['FOOTER_CODE']);
            endif;
        endif;

        if($request->type == 'meta-tag'):
            $input['META_DESC'] = preg_replace("/\r|\n/", "", $input['META_DESC']);
            $input['META_KEYWORD'] = preg_replace("/\r|\n/", "", $input['META_KEYWORD']);
        endif;
        
        if($request->type == 'maintenance'):
            $input['MAINTENANCE'] = $request->has('MAINTENANCE') ? 1 : 0;
            $input['MAINTENANCE_NOTE'] = preg_replace("/\r|\n/", "", $input['MAINTENANCE_NOTE']);
        endif;

        foreach($input as $key => $int):
            writeConfig($key, $int);
        endforeach;

        notify()->flash('Informasi umum berhasil diubah!', 'success');
        return redirect()->back();
    }

    /**
     * Function for Upload File
     * 
     * @param  $file, $filename
     * @return URI
     */
    public function upload($file, $filename) 
    {
        $tmpFilePath = 'app/public/Template/';
        $tmpFileName = $filename;
        $tmpFileExt = $file->getClientOriginalExtension();

        makeImgDirectory($tmpFilePath);
        
        $nama_file = $tmpFilePath . $tmpFileName;
        
        \Image::make($file->getRealPath())->save(storage_path() . "/{$nama_file}.$tmpFileExt");

        return "storage/Template/{$tmpFileName}.{$tmpFileExt}";
    }

}