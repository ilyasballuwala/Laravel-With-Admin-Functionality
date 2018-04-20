<?php
// New controller for relationship manager page of admin

namespace App\Http\Controllers\admin;
use App\Http\Requests;
use App\Http\Controllers\admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\RelationshipManager;
use Validator;
use Session;
use DB;
use File;
use View;
use URL;
use Hash;

class RelationshipManagerController extends Controller {
    
    protected $generaltitle;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, RelationshipManager $RM) {
        $this->middleware('admin');
		$this->model = $RM;
		$this->currentcontroller = Route::currentRouteName();
		//dd($this->currentcontroller);
		View::share('title',ucfirst($this->currentcontroller));
		$this->messages = [
			'required' => 'The :attribute is required.',
			'unique' => 'The :attribute has already been assign to other Relationship Manager.',
			//'state_id.required' => 'Please select state.',
			//'employee_email.unique' => 'The :attribute has already been assign to other employee.',
		];
		$this->generaltitle = "Relationship Manager";
    }

    /**
     * Show the RM Listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$managerdata = RelationshipManager::orderBy('id','DESC')->get();
		$title = $this->generaltitle;
		//dd($managerdata);
		return view('admin.RM.RMlisting')->with(compact('managerdata','title'));
    }
	
	/**
     * Show the add RM page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
		$title = $this->generaltitle;
		return view('admin.RM.addRM')->with(compact('title'));
    }
	
	/**
     * Add RM Action.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
		//dd($request->all());
		$validator = Validator::make($request->all(), [           
			'name' => 'required',
			'email' => 'required|email|unique:relationship_managers',
			'phone' => 'required|digits_between:10,12|unique:relationship_managers',
			'rm_code' => 'required|unique:relationship_managers',
			'username' => 'required|unique:relationship_managers',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ],$this->messages);
		
        if ($validator->fails()) {
			//dd($validator);
            $this->throwValidationException(
                $request, $validator
            );
		}
			
		$input = $request->all();
		$input['name'] = trim($input['name']);
		$input['email'] = trim($input['email']);
		$input['phone'] = trim($input['phone']);
		$input['rm_code'] = trim($input['rm_code']);
		$input['username'] = trim($input['username']);
		$input['password'] = Hash::make(trim($input['password']));
		$input['status'] = (isset($input['status']) && $input['status'] == 'on') ? 'Active' : 'Inactive';
		
		if($managerinsertstatus = RelationshipManager::create($input))
		{
			$request->session()->flash('alert-success', 'Relationship Manager created successfully.');
		}
		return redirect('/admin/relationshipmanager');
    }
	
	/**
     * Show the edit RM page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($taskid){
		//dd($taskid);
		$title = $this->generaltitle;
		$managerdata = RelationshipManager::find($taskid);
		if($managerdata == NULL || $managerdata == "" || empty($managerdata) || count($managerdata) == 0){
			Session::flash('alert-danger', 'Invalid Relationship Manager ID.');
			return redirect('/admin/relationshipmanager') ;
		}
		//dd($managerdata);
		return view('admin.RM.editRM')->with(compact('managerdata','title'));
    }
	
	/**
     * Update RM Action.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
		//dd($request->all());
		$input = $request->all();
		$managerid = $input['manager_id'];

		$validator = Validator::make($request->all(), [           
			'name' => 'required',
			'email' => 'required|email|unique:relationship_managers,email,'.$managerid,
			'phone' => 'required|digits_between:10,12|unique:relationship_managers,phone,'.$managerid,
			'rm_code' => 'required|unique:relationship_managers,rm_code,'.$managerid,
			'username' => 'required|unique:relationship_managers,username,'.$managerid,
            'password' => 'confirmed',
            //'password_confirmation' => 'min:6',
        ],$this->messages);
		
        if ($validator->fails()) {
			//dd($validator);
            $this->throwValidationException(
                $request, $validator
            );
		}

		$managerdata = RelationshipManager::find($managerid);
		if($managerdata == NULL || $managerdata == "" || empty($managerdata) || count($managerdata) == 0){
			Session::flash('alert-danger', 'Invalid Relationship Manager ID.');
			return redirect('/admin/relationshipmanager');
		}

		$managerdata->name = trim($input['name']);
		$managerdata->email = trim($input['email']);
		$managerdata->phone = trim($input['phone']);
		$managerdata->rm_code = trim($input['rm_code']);
		$managerdata->username = trim($input['username']);
		if(isset($input['password']) && $input['password'] != NULL){
			$managerdata->password = Hash::make(trim($input['password']));
		}
		$managerdata->status = (isset($input['status']) && $input['status'] == 'on') ? 'Active' : 'Inactive';
		
		//dd($managerdata);
		if($managerdata->update())
		{
			$request->session()->flash('alert-success', 'Relationship Manager details updated successfully.');
		}
		return redirect('/admin/relationshipmanager');
    }
	
}
















