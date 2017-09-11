<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth')->except(['index', 'show', 'viewCalendar']);

    }

    

    //index() to show the home page with all posts

    public function index()
    
    {
        $posts = Post::latest()
        
                ->filter(request(['month','year']))

                ->get();

    	return view('posts.index', compact('posts'));
    }

    

    //create to view the "create post" layout
    
    public function create()
    
    {
    	
        return view('posts.create');
   
    }

     

    //store() to publish a post by a user

    public function store()
    
    {
      
        $this->validate(request(), [

            'title' => 'required',

            'body' => 'required'
        ]);

        $post = new Post(request(['title','body']));

        auth()->user()->publish($post);

        $post->tag(request(['tags']));



    	// Post::create([

     //        'title' =>request('title'),

     //        'body' => request('body'),

     //        'user_id' => auth()->id()

     //    ]);

    	return redirect('/');
   
    }


    //show() to show specific post

    public function show(Post $post)
   
    {

        $tags = $post->tags()->pluck('name');
   
        return view('posts.show', compact(['post','tags']));
   
    }


    public function tagIndex($tag)

    {

        $posts = Post::whereTag($tag)->get();

        return view('posts.index', compact('posts'));

    }


    public function viewCalendar(){

        $events = [];

        $events[] = \Calendar::event(
        'حجز غرفة رقم 15', //event title
        false, //full day event?
        '2017-09-11T0800', //start time (you can also use Carbon instead of DateTime)
        '2017-09-15T0800', //end time (you can also use Carbon instead of DateTime)
        0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
        "حجز االغرفة رقم 6", //event title
        true, //full day event?
        new \DateTime('2017-09-04'), //start time (you can also use Carbon instead of DateTime)
        new \DateTime('2017-09-06'), //end time (you can also use Carbon instead of DateTime)
        1 //optionally, you can specify an event ID
        );

        //$eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events) //add an array with addEvents
        ->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ]); 

        return view('calendar', compact('calendar'));
    
    }

}

