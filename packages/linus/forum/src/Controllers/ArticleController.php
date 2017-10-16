<?php

namespace Linus\Forum\Controllers;

use Linus\Forum\Models;
use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
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

        return \Linus\Forum\Models\Forum_Article::create([

            'title' => $data['title'],
            'content'  => $data['content'],
            'user_id'  => Auth::user()->id,
        ]);

    }

    protected function ShowAllArticles(){

        $articles = \Linus\Forum\Models\Forum_Article::with('user')->get();

        return view('forum::article', ['articles' => $articles]);

        // return $SubjectPosts;

    }


   protected function ShowOneArticle(Request $request, $id){
        /* Get one article from database */
        /* We can omit some user info later */
        $article = \Linus\Forum\Models\Forum_Article::with('user')->where('id', $id)->get();

        /* Check if it has feedback */
        if (count($article)){
            /* 'userinfo' => $article[0]['user'] */
            return response()->json([
                        'status' => 'success',
                        'article'  => $article[0]
                    ]);
        }

        return response()->json([
                    'status' => 'fail'
                ]);
   }


   /* Publish articles */
   protected function WriteArticle(Request $request){

        $data = $request->all();

        /* Validate $request data, if it's invalid return back with errors */

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect('/write-article')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Pass validation, Store the discussion...

        $id = $this->create($data)->id;

        /* Update number of discussions in this choosen category */
        // $category = \Linus\Forum\Models\Forum_Category::find($data['category_id']);

        // $category->num_of_discussions = $category->num_of_discussions + 1;

        // $category->save();

        return redirect('/article');


   }

}
