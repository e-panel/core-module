<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;

use Image;

class ProfileController extends Controller
{
    /**
     * Siapkan konstruktor controller
     * 
     * @param Model $data
     */
    public function __construct() 
    {
        $this->view = 'core::';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Change Password Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function password(Request $request) 
    {
        if(config('pengguna.plugin.sso')):
            return abort(404);
        endif;

        return view("$this->view.config.password");
    }

    /**
     * Update Profile Process
     * 
     * @param Request $request
     * @return Mix
     */
    public function updatePassword(Request $request) 
    {
        if(config('pengguna.plugin.sso')):
            return abort(404);
        endif;

        $this->validate($request, [
            'old_password' => 'required|old_password:'.auth()->user()->password,
            'new_password' => 'required|min:5|different:old_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $ubah = auth()->user();

        $ubah->password = $request->filled('new_password') ? bcrypt($request->new_password) : auth()->user()->password;
        $ubah->plain = $request->filled('new_password') ? $request->new_password : auth()->user()->plain;

        $ubah->save();

        notify()->flash('Perubahan sandi berhasil!', 'success');
        return redirect()->back();
    }

    /**
     * Update Profile Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function profile(Request $request) 
    {
        if(config('pengguna.plugin.sso')):
            return abort(404);
        endif;

        return view("$this->view.config.profile");
    }

    /**
     * Process Update Profile
     * 
     * @param Request $request
     * @return Mix
     */
    public function updateProfile(Request $request) 
    {
        if(config('pengguna.plugin.sso')):
            return abort(404);
        endif;
        
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required|unique:operator,username,'.auth()->user()->id,
            'avatar' => 'mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();
        if($request->hasFile('avatar')):
            $input['avatar'] = $this->upload($request->file('avatar'), auth()->user()->uuid);
        endif;

        auth()->user()->update($input);

        notify()->flash('Perubahan profil berhasil!', 'success');
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
        $tmpFilePath = 'app/public/Pengguna/';
        $tmpFileName = $filename;
        $tmpFileExt = $file->getClientOriginalExtension();

        makeImgDirectory($tmpFilePath);
        
        $nama_file = $tmpFilePath . $tmpFileName;
        
        Image::make($file->getRealPath())->resize(500, null, function($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path() . "/$nama_file.$tmpFileExt");
        
        Image::make($file->getRealPath())->fit(100, 100)->save(storage_path() . "/{$nama_file}_s.$tmpFileExt");

        return "storage/Pengguna/{$tmpFileName}.{$tmpFileExt}";
    }
}