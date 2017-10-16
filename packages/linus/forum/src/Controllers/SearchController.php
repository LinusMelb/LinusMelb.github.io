<?php

namespace Linus\Forum\Controllers;

use Linus\Forum\Models;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{

  // public function search(){
  //   //return view('search');
  // }

  public function ajaxSearch(Request $request){

    $query = $request->get('query','');
    $result = array();

    $user = \app\User::where('username', 'LIKE','%'.$query.'%')->get();

    $article = \Linus\Forum\Models\Forum_Article::where('title','LIKE','%'.$query.'%')->get();

    if(sizeof($user) > 0)
       $result['user'] = $user;

    if(sizeof($article) > 0)
      $result['article'] = $article;

    return response()->json($result);
  }

}
