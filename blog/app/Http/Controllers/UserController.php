<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\BusDispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Validation\Validates\Requests;

use Illuminate\Html\Html\ServiceProvider;

class UserController extends Controller
{
    public function index() {
		return view('login');
	}
	public function login() {

		$rules = array(
			'email'    => 'required|email', 
			'password' => 'required|alphaNum|min:3'
		);

		$validator = Validator::make(Input::post(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator) 
				->withInput(Input::except('password'));
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {
				if(Auth::user()->type==2) {
					return Redirect::to('/admin');
					
				}
				return Redirect::to('/dashboard');
			} else {        

				// validation not successful, send back to form 
				return Redirect::to('/');

			}
		}
	}
}
