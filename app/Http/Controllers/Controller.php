<?php

namespace App\Http\Controllers;

use App\employees;
use App\relationmanagers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function showWelcome()
	{
		return View('admin');
	}

	public function getLogin()
	{
		// show the form
		if(Auth::check())
			return Redirect::to('employee_register');
		else
			return view('/login');
	}

	public function postlogin(Request $request)
	{
        // Getting all post data
	    $data = [];
	    $data['email'] = $request->input('inputEmail'); 
	    $data['password'] = $request->input('inputPassword'); 
	    // Applying validation rules.
	    $rules = array(
			'email' => 'required|email',
			'password' => 'required|min:8',
		     );
	    $validator = Validator::make($data, $rules);
	    if ($validator->fails()){
	      // If validation falis redirect back to login.
	     	return Redirect::to('/login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
	    }
	    else {
      	if (Auth::attempt(['email_kl' => $data['email'], 'pw_kl' => $data['password']])) 
      	{
      		$user = Auth::user();
			

      		if(Auth::User()->vl_kl > 2)
      			return Redirect::to('employee_register');
      		else
      			return Redirect::to('relationmanager_register');
		} 
		else {
			// if any error send back with message.
			//Session::flash('error', 'Something went wrong'); 
			return Redirect::to('login');
			}
	  	}
	}
	public function get_employee_register(Request $request)
	{

		// show the form
		if(Auth::check())
			return view('/register.employee');
		else
			return Redirect::to('/login');
	}
    public function post_employee_register(Request $request)
	{
        // Getting all post data
        //I can't use  {!! Form::open(array('url' => '/employee_register', 'method' => 'post', 'class' => 'form-horizontal', 'method' => 'post')) !!}
        //So I run "composer require laravelcollective/html" on cmd(it is okay)
	    $rules = [];
	    $rules['Naam_klant'] = ['required'];
        $rules['Voorletters_klant'] = ['required', 'min:6'];
        $rules['Geslacht'] = ['required'];
        $rules['email'] = ['required', 'email'];
        $rules['h_email'] = ['same:email'];
        $rules['gebrnm_kl'] = ['required'];
        $rules['h_gebrnm_kl'] = ['same:gebrnm_kl'];
        $rules['password'] = ['required' , 'min:8'];
        $rules['h_password'] = ['same:password'];
        $rules['phone'] = ['required', 'numeric'];
        $rules['jaCheckbox'] = ['required'];
        $rules['Bedrijf'] = ['required'];
        $data = [];
        $data['Naam_klant'] = $request->input('Naam_klant');
        $data['Voorletters_klant'] = $request->get('Voorletters_klant');
        $data['Geslacht'] = $request->input('Geslacht');
        $data['email'] = $request->input('email');
        $data['h_email'] = $request->input('h_email');
        $data['gebrnm_kl'] = $request->input('gebrnm_kl');
        $data['h_gebrnm_kl'] = $request->input('h_gebrnm_kl');
        $data['password'] = $request->input('password');
        $data['h_password'] = $request->input('h_password');
        $data['phone'] = $request->input('phone');
        $data['jaCheckbox'] = $request->input('jaCheckbox');
        $data['Bedrijf'] = $request->input('Bedrijf');
	    $validator = Validator::make($data, $rules);
		
	    if ($validator->fails()){
	    	//exit($data['password']."     ".$data['h_password']);
	    	$messages = $validator->messages();
	    	 return Redirect::to('employee_register')
            ->withErrors($validator)
            ->withInput();
	    }
	    else {
	      		//exit(serialize($data));
	      		$art = new employees;
		        $art->gebrnm_kl = $data['gebrnm_kl'];
		        $art->vl_kl = $data['Voorletters_klant'];
		        $art->email_kl = $data['email'];
		        $art->pw_kl = $data['password'];
		        $art->tel_kl = $data['phone'];
		        if($data['Geslacht'] == "Heer")
		        	$art->sexe_kl = 0;
		        else
		        	$art->sexe_kl = 1;
		        //$art->id_bd = $data['id_bd'];
		        if($data['jaCheckbox'] == "ja")
		        	$art->premium_kl = 0;
		        else
		        	$art->premium_kl = 1;
		        $art->gebrnm_kl = $data['gebrnm_kl'];
		        $art->save();
		       	return Redirect::to('employee_register')
		            ->withErrors($validator)
		            ->withInput();

	      		//return view('register.relation_manager');
	    //   	//return Redirect::back();
	    //   	return Redirect::intended();
	    } 
	}
	public function get_relationmanager_register()
	{
		// show the form
		//if(Auth::check())
			return view('/register.relation_manager');
		//else
			//return Redirect::to('/login');
		//return view('register.relation_manager');
	}
    public function post_relationmanager_register(Request $request)
	{
        // Getting all post data
	    $rules = [];
	    $rules['Naam_relatiemanager'] = ['required'];
        $rules['Voorletters_relatiemanager'] = ['required'];
        $rules['Geslacht'] = ['required'];
        $rules['email'] = ['required', 'email'];
        $rules['h_email'] = ['same:email'];
       
        $data = [];
        $data['Naam_relatiemanager'] = $request->input('Naam_relatiemanager');
        $data['Voorletters_relatiemanager'] = $request->input('Voorletters_relatiemanager');
        $data['Geslacht'] = $request->input('Geslacht');
        $data['email'] = $request->input('email');
        $data['h_email'] = $request->input('h_email');
        
	    $validator = Validator::make($data, $rules);
		
	    if ($validator->fails())
	    {
	    	return Redirect::to('relationmanager_register')
		            ->withErrors($validator)
		            ->withInput();
	    }
	    else 
	    {
      		$art = new relationmanagers;
	        $art->nm_rm = $data['Naam_relatiemanager'];
	        $art->vl_rm = $data['Voorletters_relatiemanager'];
	        $art->email_rm = $data['email'];
	        if($data['Geslacht'] == "Heer")
	        	$art->sexe_rm = 0;
	        else
	        	$art->sexe_rm = 1;
	        $art->save();
	        return Redirect::to('relationmanager_register')
	            ->withErrors($validator)
	            ->withInput();
	    } 
	}
}
