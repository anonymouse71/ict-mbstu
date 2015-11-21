<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Edit user profile
     *
     * @return Response
     */
    public function edit()
    {
    	$user = Auth::user();

    	return view('auth.profile', compact('user'));
    }

    /**
     * update user profile
     *
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    	$user = Auth::user();

    	$this->validate($request, [
    		'name' 	=> 'required',
    		'email'	=> "required|email|unique:users,email,{$user->id}",
    		'password' => 'confirmed'
		]);

		$data = [
			'name' => $request->name,
			'email' => $request->email
		];
		if($request->password !== ''){
			$data['password'] = bcrypt($request->password);
		}

		$user->update($data);

		Flash::success('Profile updated successfully');
		return redirect('/admin/profile');
    }
}
