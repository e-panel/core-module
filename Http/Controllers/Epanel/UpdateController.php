<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */
namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UpdateController extends Controller
{
    /**
     * Siapkan konstruktor controller
     * 
     * @param Model $data
     */
    public function __construct() 
    {
        $this->host = url('/');
        $this->key = env('EP_KEY');

        $this->view = 'core::config.update';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Check Update
     * 
     * @param Request $request
     * @return Response|View
     */
    public function check(Request $request) 
    {
        $client = new HttpClient;
        $res = $client->request('GET', "https://epanel.btekno.id/api/update?host=$this->host&license=$this->key", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
        
        $plugins = json_decode($res->getBody(), true);

        return view("$this->view.check", compact('plugins'));
    }

    /**
     * Check Update
     * 
     * @param Request $request
     * @return Response|View
     */
    public function update(Request $request) 
    {
        if(!$request->has('plugin')):
            return abort(404);
        endif;
        
        $client = new HttpClient;
        $res = $client->request('GET', "https://epanel.btekno.id/api/update?host=$this->host&license=$this->key", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
        
        $plugins = json_decode($res->getBody(), true);
        foreach($plugins['plugins'] as $plugin):
            if($plugin['slug'] == $request->plugin):
                $file = file_get_contents('https://epanel.btekno.id/'.$plugin['zip']);
                File::put(storage_path('app/plugin-'.$plugin['slug'].'.zip'), $file);
                
                $zip = new ZipArchive;
                $res = $zip->open(storage_path('app/plugin-'.$plugin['slug'].'.zip'));
                if($res === TRUE):
                    $zip->extractTo(base_path('Modules'));
                    $zip->close();

                    notify()->flash($plugin['name'] . ' berhasil diupdate!', 'success');
                else:
                    notify()->flash($plugin['name'] . ' gagal diupdate!', 'error');
                endif;

                File::delete(storage_path('app/plugin-'.$plugin['slug'].'.zip'));
                return redirect()->back();
            endif;
        endforeach;

        return abort(404);
    }
}