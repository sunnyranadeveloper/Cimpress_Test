<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\BusDispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\Validates\Requests;
use App\Posts;
/*
	@class DashboardController
	@auther Sunny Rana
	func : will load dashboard and crud operation for posts
*/

class DashboardController extends Controller
{
	/*function will load all post lists for end user*/
    public function index() {
		$latestPosts = Posts::where(['status'=>1])
					   ->orderBy('updated_at', 'desc')
					   ->take(20)
					   ->get();
		return view('dashboard',['latestPosts'=>$latestPosts]);
	}
	
	/*function will load form to add post*/
	public function add() {
		return view('addPost');
	}
	
	/*function will handle post request*/
	public function savePost() {
		$rules = array(
			'subject'    => 'required', 
			'content' => 'required'
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
			$post->updated_at = date('Y-m-d H:i:s');
			$post->save();
			return redirect('mylist')->with('success','Post updated successfully!');
		}
	}
	
	/*function will load posts of perticular users*/
	public function mylist() {
		$myPosts = Posts::where(['status'=>1])->where(['user_id'=>Auth::user()->id])
					   ->orderBy('updated_at', 'desc')
					   ->take(20)
					   ->get();
		return view('myPost',['myPosts'=>$myPosts]);
	}
	
	/*
		function will load edit form for perticular user's post
		@param id primary key in Post
	*/
	public function editPost($id) {
		$user_id = Auth::user()->id;
		$post = Posts::findOrFail($id);
		$post = compact('post');
		
		if($post['post']->user_id!=$user_id) {
			return redirect('/');
		}
		return view('editPost',$post);
	}
	
	/*
		function will load edit perticular user's post
		@param request to handle requests
		@param id primary key in Post
	*/
	public function updatePost(Request $request,$id){
		$post = Posts::find($id);
		$post->subject = $request->subject;
		$post->content = $request->content;
        $post->update();
        return redirect('mylist')->with('success','Post updated successfully!');
	}
	
	/*
		function will delete Post
		@param id primary key in Post
	*/
	public function deleteUserPost($id) {
		$post = Posts::find($id);
		
		if($post->user_id!=Auth::user()->id) {
			return redirect('/');
		}
		$post->status = 0;
		$post->update();
        return redirect('mylist')->with('success','Post updated successfully!');
	}
}