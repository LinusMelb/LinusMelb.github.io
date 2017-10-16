<?php

namespace Linus\Forum\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Linus\Forum\Models;
use Illuminate\Support\Facades\Validator;


class SubjectPostController extends Controller
{
    //

	/* This function is to create a new user */

	/**
     * Get a validator for an incoming new subject post creation.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'code' => 'required|string',
            'name' => 'required|string|min:3',
            'uni_id' => 'required',
            'fees'	=>	'required|numeric',
            'handbook'	=> 'required|string',
            'availability' => 'required',
            'description'	=> 'required|min:10'
        ]);
    }

    /**
     * Create a new user instance after a valid creation.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return \Linus\Forum\Models\Subject_Post::create([

            'code' => $data['code'],
            'name'  => $data['name'],
            'uni_id' => $data['uni_id'],
            'fees'		=>	$data['fees'],
            'handbook'	=>  $data['handbook'],
            'description'	=> $data['description'],
            'availability'  => $data['availability'],
            'created_by_user_id'  => Auth::user()->id


        ]);

    }


	public function CreateSubjectPost(Request $request){

		$data = $request->all();

		/* Validate $request data, if it's invalid return back with errors */

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect('/university/NewSubject')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Pass validation, Store the subject post...

        $id = $this->create($data)->id;

		return redirect('/university');

	}

}
