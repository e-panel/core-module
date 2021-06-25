<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;

class IndexController extends Controller
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
        
        $this->view = 'core::';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Halaman Dashboard
     * 
     * @param Request $request
     * @return Response|View
     */
    public function index(Request $request) 
    {
        $client = new HttpClient;
        $res = $client->request('GET', "https://epanel.btekno.id/api/update?host=$this->host&license=$this->key", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
        
        $plugins = json_decode($res->getBody(), true);

        return view("$this->view.index", compact('plugins'));
    }

    /**
     * Halaman Login untuk Operator
     * 
     * @param Request $request
     * @return Response|View
     */
    public function login() 
    {
        if(config('pengguna.plugin.sso')):
            return redirect()->route('frontend.index');
        endif;

        return view("$this->view.login");
    }

    /**
     * Proses Autentikasi Operator
     * 
     * @param Request $request
     * @return Response|View
     */
    public function authenticate(Request $request) 
    {
        if(config('pengguna.plugin.sso')):
            return redirect()->route('frontend.index');
        endif;

        $v = validator()->make($request->all(), [
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);
        if($v->fails()):
            return redirect()->back()->withErrors($v)->withInput();
        else:
            $verifikasi = [
                'username' => $request->username, 
                'password' => $request->password
            ];
            if(auth()->attempt($verifikasi, $request->has('remember') ? true : false)):

                auth()->user()->update([
                    'last_login' => Carbon::now(), 
                    'last_login_ip' => request()->ip(),
                ]);

                // if($request->has('redirect')):
                //     return redirect()->to($request->redirect);
                // endif;

                return redirect(route('epanel.index'));

            endif;
            notify()->flash('Username dan Password tidak valid!', 'error');
            return redirect()->back()->withInput();
        endif;
    }

    /**
     * Logout Operator dari E-Panel
     * 
     * @param Request $request
     * @return Response|View
     */
    public function logout() 
    {
        if(config('pengguna.plugin.sso')):
            return redirect()->route('frontend.index');
        endif;
        
        auth()->logout();
        session()->flush();
        return redirect(route('epanel.login'));
    }

    /**
     * Clear SSO Cookie
     * 
     * @param Request $request
     * @return Response|View
     */
    public function cookie(Request $request) 
    {
        \Cookie::forget('sso_token_' . config('sso.broker_name'));
        \Cookie::forget('sso_token_' . strtolower(config('sso.broker_name')));
        session()->flush();

        return 'Cookie cleared!';
    }
}