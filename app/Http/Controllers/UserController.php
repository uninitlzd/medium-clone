<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Story;
use App\User;
use Auth;
use Redirect;
use Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$user = User::where('username',$username)->with('stories')->first();
		return view('user.show')->withUser($user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getLogin()
	{
		return view('user.login');
	}

	public function postLogin()
	{
		// return Request::all();
		if (Auth::attempt(['email'=>Request::input('email'),'password'=>Request::input('password')],Request::input('rememberMe'))) {
			return redirect()->route('user.show',Auth::user()->username);
		} else {
			return "Username or password not valid";
		}
	}

	public function getSetting($username)
	{
		return "Settings for {$username}";
	}

	public function story($username,$slug)
	{
		$story = Story::where('slug',$slug)->with('user')->first();
		return view('story.view')->withStory($story);
	}

	public function newStory()
	{
		return view('story.new');
	}

	public function storeStory()
	{
		$story = new Story;
		$slug = str_replace(' ', '-',strtolower(Request::input('title'))) . '-' . time();
		$story->title = Request::input('title');
		$story->slug = $slug;
		$story->content = Request::input('content');
		$story->user_id = Auth::user()->id;
		$story->save();

		return redirect()->route('home');
	}
}