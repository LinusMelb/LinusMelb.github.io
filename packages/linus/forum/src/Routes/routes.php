<?php

// Route::group([
//     'namespace'  => 'Linus\Forum\Controllers'
// ], function () {

// 	Route::get('/', 'UserDataController@home');

// });


Route::group(['middleware' => 'web', 'namespace' => 'Linus\Forum\Controllers'], function()
{

    Route::get('/', 'GeneralController@BrowseAllDiscussions');

	/* Routes for browse pages */
	/* Create new discussion, only accessiable for login users */
	Route::get('/NewDiscussion', function(){

		$categories = \Linus\Forum\Models\Forum_Category::select('name', 'id', 'color', 'slug', 'num_of_discussions')->get();
		$articles = \Linus\Forum\Models\Forum_Article::limit(5)->orderBy('created_at', 'desc')->get();


		return view('forum::NewDiscussion', ['categories' => $categories, 'articles' => $articles]);

	})->middleware('auth');

	Route::post('/NewDiscussion', 'DiscussionController@NewDiscussion')->middleware('auth');

	/* To browse discussion by its id */
	Route::get('/discussion/{id}', 'GeneralController@BrowseDiscussion');

  /* To save comment to current discussion */
  Route::post('/discussion/{id}', 'CommentController@CommentDiscussion');

	/* Browse all discussions belong to this slug(category) */
	Route::get('/category/{slug}', 'GeneralController@BrowseDiscussionByCategory');

	/* Update views of discussion */
	Route::post('/update-views/', 'GeneralController@UpdateViews');

  /* Delete comments by its id */
  Route::post('/comments/delete/{discussion_id}/{id}', 'CommentController@delete')->middleware('auth');

	/* Profile page */
	/* id parameter is optional */
	Route::get('/profile/{id?}', 'UserDataController@Profile');

  Route::get('/edit-profile', 'UserDataController@EditProfile')->middleware('auth');

  Route::post('/edit-profile/update-avatar', 'UserDataController@UpdateAvatar')->middleware('auth');

	/* University Section */
	Route::get('/university', function(){

		$SubjectPosts = \Linus\Forum\Models\Subject_Post::all();

		return view('forum::university', ['SubjectPosts' => $SubjectPosts]);

		// return $SubjectPosts;
	});

	/* Article Section */
	Route::get('/article', 'ArticleController@ShowAllArticles');

	Route::get('/article/id/{id}', 'ArticleController@ShowOneArticle');

	/* Publish article */
	Route::get('/write-article', function(){

		return view('forum::WriteArticle');

	})->middleware('auth');

	Route::post('/write-article', 'ArticleController@WriteArticle')->middleware('auth');


	Route::post('/university/NewSubject', 'SubjectPostController@CreateSubjectPost')->middleware('auth');

	Route::get('/university/NewSubject', function(){

		return view('forum::NewSubject');
	})->middleware('auth');


	Route::get('/university/subjectpost/{id}', function($id){

		$SubjectPost = \Linus\Forum\Models\Subject_Post::find($id);

		$answers = \Linus\Forum\Models\Subject_Answer::with('user')->where('post_id', $id)->get();

		// return $answers;

		$returnHTML = view('forum::widgets.SinglePost')->with(['SubjectPost' => $SubjectPost, 'answers' => $answers, 'post_id' => $id])->render();

		return response()->json([
				    'status' => 'success',
				    'data' => $returnHTML
				]);

	});

	Route::get('/university/SubjectAnswer/{id}', function($id){

		$answer = \Linus\Forum\Models\Subject_Answer::find($id);

		return view('forum::widgets.SingleAnswer')->with('answer', $answer)->render();

	})->middleware('auth');

	/* Create new answer for subject post */

	Route::post('/university/NewAnswer', 'SubjectAnswerController@NewAnswer')->middleware('auth');

	// Route::get('/page', 'GeneralController@BrowseDiscussionPagination');

	Route::get('NewDiscussion/template/{id}', 'GeneralController@RenderCategoryTemplate');

  /* Search */
  // Route::get('header-search', array('as'=>'header.search', 'uses'=>'SearchController@search'));

  Route::get('search-ajax', array('as'=>'search.ajax', 'uses'=>'SearchController@ajaxSearch'));


});
