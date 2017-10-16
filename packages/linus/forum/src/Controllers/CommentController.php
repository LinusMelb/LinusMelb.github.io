<?php

namespace Linus\Forum\Controllers;

use Linus\Forum\Models;
use Auth;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
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
     * Get a validator for an incoming comment request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|string|min:10',
        ]);
    }

    /**
     * Create a new user instance after a valid commnet.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $discussion_id)
    {

        return \Linus\Forum\Models\Forum_Comment::create([

            'content'  => preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $data['content']),
            'user_id'  => Auth::user()->id,
            'discussion_id' => $discussion_id

        ]);

    }
    /* Delete comment [POST] */
    public function delete($discussion_id, $id){

      try {

        DB::table('forum_comments')->where('id', '=', $id)->delete();

        /* Update # of comments for this discussion */
        // DB::table('forum_discussions')->where('id', $discussion_id)->update(['answers' => $discussion[0]['answers'] - 1]);
        DB::table('forum_discussions')->where('id', $discussion_id)->decrement('answers', 1);

      } catch (Illuminate\Database\QueryException $e) {
          return response()->json([
                      'status' => 'fail',
                      'data' => dd($e)
                  ]);

      } catch (PDOException $e) {

          return response()->json([
                      'status' => 'fail',
                      'data' => dd($e)
                  ]);
      }

      return response()->json([
                  'status' => 'success',
                  'data' => ''
              ]);

    }

    public function CommentDiscussion(Request $request, $id){
      /* id -> discussion_id */
      $discussion = \Linus\Forum\Models\Forum_Discussion::select('id', 'answers')->where('id', $id)->get();

      $data = $request->all();
      /* Validate $request data, if it's invalid return back with errors */
      $validator = $this->validator($data);
      if ($validator->fails()) {
          return redirect('/discussion/'+$id)
                      ->withErrors($validator)
                      ->withInput();
      }

      try{
        /* Creats comment for this discussion */
        if($discussion->count()){
          $this->create($data, $id);
        }

        /* Update # of comments for this discussion */
        DB::table('forum_discussions')->where('id', $discussion[0]['id'])->update(['answers' => $discussion[0]['answers'] + 1]);

      }catch(\Exception $e) {
          /* Return message error */
          return $e->getMessage();
      }

      return redirect('/discussion/'.$id);

    }
}
