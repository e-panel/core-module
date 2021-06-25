<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Siapkan konstruktor controller
     * 
     * @param Model $data
     */
    public function __construct() 
    {
        $this->view = 'core::tools.';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * File Manager Page
     * 
     * @param Request $request
     * @return Response|View
     */
    public function index(Request $request) 
    {
        return view("$this->view.explorer");
    }
}