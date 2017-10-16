<?php

namespace Linus\Forum\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Linus\Forum\Models;
use Image;
use File;

class UserDataController extends Controller
{
    //

	/* This function is to show user profile */

	public function Profile($id = null){

		/* If user hasn't logged in */

		if(!Auth::check()){
			return redirect('/login');
		}

		/* User has logged in */


		/* User logged in look their own profile */
		if($id == Auth::user()->id || $id == null){

			/* get user info and all associated discussions */
			$data = \app\User::with('discussions')->where('id', Auth::user()->id)->get();

			if(count($data)){
				return view('forum::profile', ['data' => $data[0], 'access' => 'yes']);
			}

			return redirect('/');

		}

		/* get user info and all associated discussions */
		$data = \app\User::with('discussions')->where('id', $id)->get();

		/* Look at others profile */
		if(count($data)){
			return view('forum::profile', ['data' => $data[0], 'access' => 'no']);
		}

		return redirect('/');

	}

	public function EditProfile(){

		$data = \app\User::where('id', Auth::user()->id)->get();

		// return $data;
		return view("forum::edit-profile", [
			'data' => $data[0]
		]);

	}

	public function UpdateAvatar(Request $request){

		if ($request->hasfile('img')) {

				$user = Auth::user();
				/* Avatar or cover */
				$type = $request->input('type');

				$image = $request->file('img');
				$filename  = time() . '.' . $image->getClientOriginalExtension();

				$directory = 'storage/users/' . $user->id . '/' . $type;
 				File::makeDirectory($directory, 0777, true, true);
				$path = $directory . '/' . $filename;

				if($type == 'avatar'){
					Image::make($image->getRealPath())->resize(200, 200)->save($path);
					$user->avatar = '/' . $path;
				}
				else if($type == 'cover'){
					Image::make($image->getRealPath())->resize(1276, 342)->save($path);
					$user->cover = '/' . $path;
				}
				$user->save();

				// return 'success';
				return response()->json([
										'status' => 'success',
										'src' => $path
								]);
		}

		return response()->json([
								'status' => 'fail',
								'data' => 'Pls upload a smaller size image'
						]);

	}

}
