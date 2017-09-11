<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;



class Post extends Model implements TaggableInterface
{

  use TaggableTrait;


   protected $guarded = [];


   // a Post has many comments
   public function comments(){

   		return $this->hasMany(Comment::class);

   }

   // a Post Belongs To a User
   public function user(){

   		return $this->belongsTo(User::class);

   }


   //add Comments to a Post using elequent -> the Relationship between users & comments (comments function)
   public function addComments($body){

   		$this->comments()->create([

            'body' => $body,

            'user_id' => auth()->id()

        ]);

   }


   // filtering the shown Posts if all or by specific month
   public function scopeFilter($query, $data){

      if($month = $data['month']){

            $query->whereMonth('created_at', Carbon::parse($month)->month);

        }

        if($year = $data['year']){

            $query->whereYear('created_at', $year);

        }

   }


   public function scopeArchives(){

      $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                    
                 ->groupBy('year', 'month')
                 
                 ->orderByRaw('min(created_at) desc')

                 ->get();

      return $archives;

   }

   // public function tags(){

   //    return $this->belongsToMany(Tag::class);

   //  }

}
