<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class TagsController extends Controller

{

	public function autocomplete(Request $request)

	{

		$term = $request->Input('tags')->get();
	
		$results = array();
	
		$queries = \DB::table('tags')
				   ->where('name', 'LIKE', '%'.$term.'%')
				   ->get();
	
		foreach ($queries as $query)
		
		{
	  	
	  	  	$results[] = [ 'id' => $query->id, 'value' => $query->name ];
		
		}
		
		return \Response::json($results);

	}

    // public function index(Tag $tag){

    // 	$posts = $tag->posts;

    // 	return view('posts.index', compact('posts'));

    // }

}
