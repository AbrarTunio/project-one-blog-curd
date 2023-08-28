<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $req ){
          $postFields = $req->validate(
             [
                'title' => 'required',
                'description' => 'required',
             ]
          );
          
          $postFields['title'] = strip_tags( $postFields['title'] );
          $postFields['description'] = strip_tags( $postFields['description'] );
          $postFields['user_id'] = auth()->id();
          
          Post::create( $postFields );
          return redirect('/main');
    }

    public function viewAllPosts(){
         $allPosts = Post::where( 'user_id' , auth()->id())->get();
         $currentUser = auth()->user();
         $currentUser = strtoupper( $currentUser['name']);
         return view('all-posts' , [ 'posts' => $allPosts , 'user' => $currentUser ] );
    }

    public function editPost( Post $post ){
      if ( auth()->user()->id === $post['user_id'] ) {
         return view ( '/edit-post' , [ 'post' => $post , 'success' => '' ]  ) ;  
      }else{
         return redirect('/all-posts');
      }
   }
   
   public function deletePost( Post $post ){
      if ( auth()->user()->id === $post['user_id'] ) {
         $post->delete();
         return redirect ( '/all-posts' ) ;
      }  
  }

   public function updatePost( Post $post , Request $request ){
      if ( auth()->user()->id != $post['user_id'] ) {
         return redirect ( '/all-posts' ) ;
      }

      $formFields = $request->validate(
            [
               'title' => 'required',
               'description' => 'required',
            ]
         );
      $formFields['title'] = strip_tags( $formFields['title'] )  ; 
      $formFields['description'] = strip_tags( $formFields['description'] ) ;  

      $post->update( $formFields );    
      return redirect ( "/edit-post/$post->id" )->with( 'success' , 'Form update successfully' ) ;  
  }
}
