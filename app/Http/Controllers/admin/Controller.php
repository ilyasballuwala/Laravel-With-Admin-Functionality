<?php
// New controller for 'Admin' section

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Session;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
    }
	
	public function generalinactive(Request $request, $controller, $table = NULL, $field, $id = NULL)
	{
		if(DB::table($table)->where($field, '=', $id)->update(['status' => 0])){
			$request->session()->flash('alert-success', ucfirst($table).' inactivated successfully.');
		}
		else{
			$request->session()->flash('alert-danger', 'There are some problem occured to make inactive '.ucfirst(str_replace('_',' ',$table)));
		}
		return redirect('admin/'.$controller);
	}

	public function generalactive(Request $request, $controller, $table = NULL, $field, $id = NULL)
	{
		if(DB::table($table)->where($field, '=', $id)->update(['status' => 1])){
			$request->session()->flash('alert-success', ucfirst($table).' activated successfully.');
		}
		else{
			$request->session()->flash('alert-danger', 'There are some problem occured to make active '.ucfirst(str_replace('_',' ',$table)));
		}
		return redirect('admin/'.$controller);
	}
	
}
