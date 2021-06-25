<?php

/**
 * @author Noviyanto Rahmadi <novay@btekno.id>
 * @copyright 2020 - Borneo Teknomedia.
 */

namespace Modules\Core\Http\Controllers\Epanel;

use Modules\Core\Http\Controllers\CoreController as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Artisan;

class ToolsController extends Controller
{
    /**
     * Siapkan konstruktor controller
     * 
     * @param Model $data
     */
    public function __construct() 
    {
        $this->middleware('auth');

        $this->view = 'core::tools';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * View Clear Cache
     * 
     * @return View
     */
    public function clearCache(Request $request) 
    {
        if($request->has('clear')):
            switch($request->clear):
                case 'all':
                    Artisan::call('cache:clear');
                    Artisan::call('route:clear');
                    Artisan::call('config:clear');
                    Artisan::call('view:clear');

                    notify()->flash('Your system has been cleaned.', 'success');
                    break;
                case 'views':
                    Artisan::call('view:clear');

                    notify()->flash('php artisan view:clear has been run.', 'success');
                    break;
                case 'config':
                    Artisan::call('config:clear');

                    notify()->flash('php artisan config:clear has been run.', 'success');
                    break;
                case 'route':
                    Artisan::call('route:clear');

                    notify()->flash('php artisan route:clear has been run.', 'success');
                    break;
                case 'log':
                    exec('rm ' . storage_path('logs/*.log'));

                    notify()->flash('Your logs file has been removed.', 'success');
                    break;
                default:
                    break;
            endswitch;
            return redirect()->back();
        endif;

        return view("$this->view.cache");
    }

}