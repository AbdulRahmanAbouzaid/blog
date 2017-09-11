<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomingMail;

class RegistrationController extends Controller
{
    
	public function __construct()

	{

		$this->middleware('guest');

	}

	public function create()

	{

		return view('registration.create');

	}


	public function store()

	{

		$this->validate(request(), [

			'name' => 'required',

			'email' => 'required|email',

			'password' => 'required|confirmed'

		]);


		$user = User::create([

			'name' => request('name'),
			'email' => request('email'), 
			'password' => \Hash::make(request('password'))

			]);

		auth()->login($user);

		\Mail::to($user)->send(new WelcomingMail($user));

		return redirect('/');

	}


}
