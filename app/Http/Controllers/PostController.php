<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\like;
use Auth;
use Session;
use DB;

class PostController extends Controller
{   
    // displays all posts in the welcome page
	public function showPosts(){
		$posts = Post::all();
		return view('pages.welcome', compact('posts'));
	}

    // will show the form to add post in admin side
    public function showAddPost(){
        return view('pages.addpost');
    }
    // this is for the upload in the admin side
    public function  savePost(request $request){
    	//input fields taht needs to be validated
    	$rules = array(
    		"posttitle" => "required",
    		"postdescription" => "required",
    		"postimg_path" => "required|image|mimes:jpeg, jpg, png, gif, svg| max:2048"
    		);
    	//to validate $request form
    	$this->validate($request, $rules);

    	$post = new Post;
    	$post->posttitle = $request->posttitle;
    	$post->postdescription = $request->postdescription;

    	//upload image
    	$image = $request->file('postimg_path');
    	$image_name = time().".".$image->getClientOriginalExtension(); /*will get the original name and connect it with the current time*/
    	$destination = "images/";/*file destination folder*/
    	$image->move($destination, $image_name);
    	
    	$post->postimg_path = $destination.$image_name;
    	$post->save();
    	Session::flash('successmessage', 'Successfully added');
  		return redirect('/addpost/add');
    }

    // this is to manage blog post either to delete or edit
    public function allPost(){
        $posts = Post::all();
        return view('pages.manageblog', compact('posts'));
    }

    // this is to show the edit form for each blog in admin side
    public function showEditPostForm($id){
        $postedit = Post::find($id);
        // dd($postedit);
        return view('pages.editblog', compact('postedit'));
    }

    // this goes to the edit form together with the data to be edited in the admin side
    public function editForm($id, request $request){
        $postupdate = Post::find($id);
        
        //validation
        $rules = array(
            "posttitle" => "required",
            "postdescription" => "required",
            "postimg_path" => "image|mimes:jpeg, jpg, png, gif, svg| max:2048"
            );
        $this->validate($request, $rules);

        $postupdate->posttitle = $request->post_title;
        $postupdate->postdescription = $request->post_description;        
        if ($request->file('post_img_path')!=null) {
            $image = $request->file('post_img_path');
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/";
            $image->move($destination, $image_name);
            $postupdate->img_path = $destination.$image_name;
        }
        
        $postupdate->save();
        Session::flash('successmessage', 'item updated successfully!');
        return redirect('/allpost'); // returns to manage blog post page
    }

    // this is to delete blog post in the admin side
    public function deletePost($id){
        $postdelete = Post::find($id);
        // $dd($postdelete);
        $postdelete->delete();
        Session::flash('deletemessage', "item deleted successfully!");
        return redirect('/allpost');
    }

    // this is to redirect post to single page 
    public function showPerBlogPost($id){
        $perblogs = Post::find($id);
        return view('pages/perblog', compact('perblogs'));
    }

    public function LikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
