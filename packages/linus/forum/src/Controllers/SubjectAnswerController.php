<?php

namespace Linus\Forum\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Linus\Forum\Models;
use Illuminate\Support\Facades\Validator;
use Auth;


class SubjectAnswerController extends Controller
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

            'answer' => 'required',
            'difficulty' => 'required',
            'practicality'  => 'required'

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
        
        return \Linus\Forum\Models\Subject_Answer::create([

            'user_id'   => Auth::user()->id,
            'answer' => $data['answer'],
            'difficulty'  => $data['difficulty'],
            'practicality' => $data['practicality'],
            'post_id'       => $data['post_id']

        ]);

    }


	public function NewAnswer(Request $request){

		$data = $request->all();

		/* Validate $request data, if it's invalid return back with errors */

        $validator = $this->validator($data['data']);
        if ($validator->fails()) {
            return 'fail';
        }

        // Pass validation, Store the subject answer...

        /* Return the id of this new answer back */
        /* The front-end will retrieve this answer via request to server again */
        $id = $this->create($data['data'])->id;

		return $id;

	}



}
