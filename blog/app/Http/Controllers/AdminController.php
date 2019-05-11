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
use App\Posts;
use App\User;

class AdminController extends Controller
{
    function __construct() {
		if(!Auth::user() || Auth::user()->type !=2) {
			return Redirect::to('/');
		}
	}
	
	/*
		function will load admin dashboard and all posts
	*/
	public function index() {
		$latestPosts = Posts::where(['status'=>1])
					   ->orderBy('updated_at', 'desc')
					   ->take(20)
					   ->get();
		return view('admin.dashboard',['latestPosts'=>$latestPosts]);
	}
	
	/*
		function will load form to add post 
	*/
	public function add() {
		return view('admin.addPost');
	}
	
	/*
		function will handle post data from add post form
		@param request is used to handle $requests
	*/
	public function savePost(Request $request) {
		$rules = array(
			'subject'    => 'required', 
			'subject' => 'required'
		);
	
		$validator = Validator::make(Input::post(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/add')
				->withErrors($validator);
		} else {
			$post = new Posts();
			$post->user_id = Auth::user()->id;
			$post->subject = Input::get('subject');
			$post->content = Input::get('content');
			$post->save();
			return redirect('admin')->with('success','Post created successfully!');
		}
	}
	
	/*
		function will load edit post form
		@param id is primary key of Post
	*/
	public function editPost($id) {
		$post = Posts::findOrFail($id);
		return view('admin.editPost',compact('post'));
	}
	
	/*
		function will save updated data
		@param request is used to handle $requests
		@param id is primary key of Post
	*/
	public function updatePost(Request $request,$id){
		$post = Posts::find($id);
		$post->subject = $request->subject;
		$post->content = $request->content;
		$post->updated_at = date('Y-m-d H:i:s');
        $post->update();
        return redirect('admin')->with('success','Post updated successfully!');
	}
	
	/*
		function will used to get list of removed posts
	*/
	public function removedPosts() {
		$myPosts = Posts::where(['status'=>0])
					   ->orderBy('updated_at', 'desc')
					   ->take(20)
					   ->get();
		return view('admin.myPost',['myPosts'=>$myPosts]);
	}
	
	/*
		function will used to remove posts
		@param id is primary key of Post
	*/
	public function removedPost($id) {
		$post = Posts::find($id);
		$post->status = 0;
		$post->update();
        return redirect('admin')->with('success','Post updated successfully!');
	}
	
	/*
		function will used to restore deleted posts
		@param id is primary key of Post
	*/
	public function restorePost($id) {
		$post = Posts::find($id);
		$post->status = 1;
		$post->update();
        return redirect('admin')->with('success','Post Restored successfully!');
	}
	
	/*
		function will used to add user
	*/
	public function addUser() {
		return view('admin.addUser');
	}
	
	public function saveUser() {
		$rules = array(
			'name'    => 'required', 
			'email' => 'required',
			'password' => 'required',
			'type' => 'required',
		);
	
		$validator = Validator::make(Input::post(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/addUser')
				->withErrors($validator);
		} else {
			$post = new User();
			$post->name = Input::get('name');
			$post->email = Input::get('email');
			$post->password = \Hash::make(Input::get('password'));
			$post->type = Input::get('type');
			$post->save();
			return redirect('admin')->with('success','User added successfully!');
		}
	}
}
