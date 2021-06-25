<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;

class PageController extends Controller
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
     * Content Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function content(Request $request) 
    {
        return view("$this->view.page.content");
    }

    /**
     * Media Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function media(Request $request) 
    {
        return view("$this->view.page.media");
    }

    /**
     * Features Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function features(Request $request) 
    {
        return view("$this->view.page.features");
    }

    /**
     * Plugin Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function plugin(Request $request) 
    {
        return view("$this->view.page.plugin");
    }

    /**
     * Tools Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function tools(Request $request) 
    {
        return view("$this->view.page.tools");
    }

    /**
     * Settings Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function settings(Request $request) 
    {
        return view("$this->view.page.settings");
    }

    /**
     * Pengguna Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function pengguna(Request $request) 
    {
        return view("$this->view.page.pengguna");
    }
}