<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\video;
use App\Models\image;
use App\Models\comment;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts =Post::all();
        //$post=Post::find(1);
        //$post->update(['title'=>'titre édité']);
//$posts= Post::orderBy('title')->take(3)->get();
$video=video::find(1);

       
        return view('articles',compact('posts','video'));
    }
    public function show($id){
        $post=Post::findorfail($id);
 // $post=Post::where ('title','Non id recusandae voluptates inventore cum et dicta.')->firstorfail();
  
    
        return view('article',compact('post'));
    }
    public function contact(){
        return view('contact');
    }
    public function create(){
        return view('form');
    }
    public function store(Request $request){
    //     $request->validate([
    //         'title'=>['required','unique:posts','max:255','min:5',new Uppercase],
    //         'content'=>['required']
    //    ]);
 $filename=time().'.'.$request->avatar->extension();
$path= $request->file('avatar')->storeAs(
     'avatars',
     $filename,
     'public'
 );
     
 
$post=Post::create([
'title' => $request->title,
'content' => $request->content
]);

$image=new image();
$image->path=$path;
 $post->image()->save($image);
 dd("crere");

    }
    public function register(){
        $post=Post::find(11);
        $video=video::find(1);
        $comment1=new comment(['content'=>'Mon premier commentaire']);
        $comment2=new comment(['content'=>'Mon deuxieme commentaire']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);
        $comment3=new comment(['content'=>'Mon troisieme commentaire']);
        $video->comments()->save($comment3);
    }
}
