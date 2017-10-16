<?php

namespace Linus\Forum\Controllers;

use Linus\Forum\Models;
use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|min:2',
            'content' => 'required|string|min:3',
            'category_id' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return \Linus\Forum\Models\Forum_Discussion::create([

            'title' => $data['title'],
            'content'  => preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $data['content']),
            'user_id'  => Auth::user()->id,
            'category_id' => $data['category_id']

        ]);

    }

    public function NewDiscussion(Request $request){

        $data = $request->all();

        /* Validate $request data, if it's invalid return back with errors */

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect('/NewDiscussion')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Pass validation, Store the discussion...

        $id = $this->create($data)->id;

        /* Update number of discussions in this choosen category */
        $category = \Linus\Forum\Models\Forum_Category::find($data['category_id']);

        $category->num_of_discussions = $category->num_of_discussions + 1;

        $category->save();

        return redirect('/discussion/'.$id);

    }


}
