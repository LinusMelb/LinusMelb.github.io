<?php

namespace Linus\Forum\Controllers;

use Linus\Forum\Models;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class GeneralController extends Controller
{

    // public function BrowseDiscussionPagination(){
    //
    //     $discussions = \Linus\Forum\Models\Forum_Discussion::paginate(10);
    //
    //     $now = Carbon::now();
    //
    //     return view('forum::widgets.SlimPost', array('discussions' => $discussions, 'now' => $now))->render();
    //
    // }

    public function BrowseDiscussion($id){

        $discussion = \Linus\Forum\Models\Forum_Discussion::with('user')->where('id', $id)->get();

        $articles = \Linus\Forum\Models\Forum_Article::limit(5)->get();

        $categories = \Linus\Forum\Models\Forum_Category::all();

        /* Get all comments associated with this discussion */
        $comments = \Linus\Forum\Models\Forum_Comment::with('user')->where('discussion_id', $id)->orderBy('created_at', 'desc')->get();

        if($discussion->count()){
            // $discussion[0]['content'] = strip_tags($discussion[0]['content']);

            return view('forum::discussion', [
                    'discussion' => $discussion[0],
                    'articles'    => $articles,
                    'categories' => $categories,
                    'comments'  => $comments,
                ]
            );
        }
        return redirect('/');
    }

    public function BrowseAllDiscussions(){

        /* Display all discussions on home page */

        // \Linus\Forum\Models\Forum_Discussion::all();

        $discussions = \Linus\Forum\Models\Forum_Discussion::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $articles = \Linus\Forum\Models\Forum_Article::limit(5)->orderBy('created_at', 'desc')->get();

        $categories = \Linus\Forum\Models\Forum_Category::all();

        $now = Carbon::now();

        return view('forum::home', [

                    'discussions' => $discussions,
                    'articles'    => $articles,
                    'now' => $now,
                    'categories' => $categories,
                    'slug'      => ''
                    ]
            );
    }

    public function BrowseDiscussionByCategory($slug){

        /* Get id of this catrgory via slug */
        $category_id = \Linus\Forum\Models\Forum_Category::where('slug', $slug)->select('id')->get();

        $articles = \Linus\Forum\Models\Forum_Article::limit(5)->orderBy('created_at', 'desc')->get();

        $discussions = \Linus\Forum\Models\Forum_Discussion::where('category_id', $category_id[0]['id'])->orderBy('created_at', 'desc')->paginate(10);

        $now = Carbon::now();

        return view('forum::home', [

                    'discussions' => $discussions,
                    'now' => $now,
                    'categories' => \Linus\Forum\Models\Forum_Category::all(),
                    'articles'    => $articles,
                    'slug'      => $slug
                ]
            );

    }


    /* Function to update views for discussion */

    public function UpdateViews(Request $request){

        /* Check if user logged in */
        if (!Auth::check())
        {
            // The user is not logged in...
            return 'success';
        }

        if($request->input('views') !== NULL && $request->input('id') !== NULL && $request->input('datatype')){

            $views = $request->input('views');

            $discussion_id = $request->input('id');

            /* Save data to database */
            try {
                /* Update views for this discussion */
                $discussion = \Linus\Forum\Models\Forum_Discussion::find($discussion_id);

                $discussion->views = $views;

                $discussion->save();

                /* Record this action in user_click table */
                \Linus\Forum\Models\User_Click::create([

                    'data_type' => $request->input('datatype'),
                    'data_id'   => $discussion_id,
                    'user_id'  => Auth::user()->id

                ]);

            }
            catch (\Exception $e) {
                /* Return message error */
                return $e->getMessage();
            }

            /* Send back success message */
            return 'success';

        }

        return 'fail';

    }

    /* Render category HTML template for New Discussion */
    public function RenderCategoryTemplate(Request $request, $id){

        $categorySlug = array( '1' => 'Jobs',
                               '2' => 'Rent',
                               '3' => 'LifeConvience'
                             );
        $id = (string)$id;

        $categoryName = \Linus\Forum\Models\Forum_Category::where('id', $id)->select('name')->get();


        if($categorySlug[$id] == 'Jobs'){
        /* Return Jobs template */
            $returnHTML = view('forum::partials.Jobs-template', ['id' => 1, 'name' => '工作招聘'] )->render();

        }
        // elseif ($categorySlug[$id] == 'Rent') {
        // /* Return Rent house template */
        //     $returnHTML = view('forum::partials.Jobs-template', ['id' => 1, 'name' => '租房信息'] )->render();

        // }elseif($categorySlug[$id] == 'LifeConvience'){
        // /* Return MakeFriends template */
        //     $returnHTML = view('forum::partials.Jobs-template', ['id' => 1, 'name' => '生活服务'] )->render();

        // }
        else{
            $returnHTML = view('forum::partials.Jobs-template', ['id' => $id, 'name' => $categoryName[0]['name'] ] )->render();
        }


        /* Return reponse to front-end. Then it appends html to page */
        return response()->json([
                    'status' => 'success',
                    'data' => $returnHTML
                ]);


   }

}
