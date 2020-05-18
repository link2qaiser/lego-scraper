<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;
use URL;
class PostController extends Controller
{
	public function __construct()	{
		$this->CheckSession();
	}
	function CheckSession()	{
		session_start();
		if (!isset($_SESSION['user']))
		{
			echo '<script type="text/javascript">window.location.href = "'.URL::to('/').'";</script>';
			die();
		}
	}
    public function add(Request $request)	{
		$post = new Post;
		if(Input::file("image"))	{
			$post->image	=	$this->imageValidate("image","../uploads");
			
		}
		$post->slug 			= str_replace(" ","-",strtolower($request->input('slug')));
		$post->streamin_link	= $request->input('streamin_link');
		$post->is_iframe		= $request->input('is_iframe');
        $post->title 			= $request->input('title');
		$post->heading 			= $request->input('heading');
		$post->meta_desc 		= $request->input('meta_desc');
		$post->meta_key 		= $request->input('meta_key');

		$post->image_alt 		= $request->input('image_alt');
		$post->content 			= $request->input('content');
		$post->c_id 			= $request->input('c_id');
        $post->save();
		return redirect('post/view');
	}
	public function addform()	{
		$data					=	array();
		$data['cat_list'] 	=	 Category::all();
		return view('post.addform',$data);
	}
    public function view()	{
		$data					=	 array();
		$data['breadcrumbs']	=	array("Home"=>"Posts");
		$data['list'] 	=	 Post::all();
		return view('post.view', $data);
	}
	public function delete($id)	{
		$post	=	Post::find($id);
		$image	=	($post->image == "")? "1.jpg":$post->image;
		$path 	=	$_SERVER['DOCUMENT_ROOT']."/sfadmin/uploads/".$image;
		if(file_exists($path))	{
			unlink("../uploads/".$post->image);
			unlink("../uploads/thumb-".$post->image);
		}
		Post::destroy($id);
		return redirect('post/view');
	}
	public function updateform($id)	{
		$data					=	array();
		$data['post'] 			=	 Post::find($id);
		$data['cat_list'] 		=	 Category::all();
		return view('post.updateform',$data);
	}
	public function update(Request $request,$id)	{

		$post = Post::find($id);
		if(Input::file("image"))	{
			$post->image	=	$this->imageValidate("image","../uploads");
			unlink("../uploads/".$post->image);
			unlink("../uploads/thumb-".$post->image);
			
		}
		$post->slug 			= str_replace(" ","-",strtolower($request->input('slug')));
		$post->streamin_link	= $request->input('streamin_link');
		$post->is_iframe		= $request->input('is_iframe');
        $post->title 		= $request->input('title');
		$post->heading 		= $request->input('heading');
		$post->meta_desc 	= $request->input('meta_desc');
		$post->meta_key 	= $request->input('meta_key');

		$post->image_alt 	= $request->input('image_alt');
		$post->content 		= $request->input('content');
		$post->c_id 		= $request->input('c_id');
        $post->save();
		return redirect('post/view');
	}
}
