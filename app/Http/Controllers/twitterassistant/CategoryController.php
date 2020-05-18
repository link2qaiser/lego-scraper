<?php

namespace App\Http\Controllers\twitterassistant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\twitterassistant\User_Account;
use App\Models\twitterassistant\Category;
use Hash;
use Auth,URL,Session,Redirect;
class CategoryController extends Controller
{
	private $thumb_array	=	array("65"=>"65","150"=>"190");
	private $module = "";
	public function __construct()	{
		$this->module = config('constants.twitterassistant.module');
	}
	
	
    public function view()	{
		$data = array(
            "page_title"   => "Twitter Assistance | Manage Categories",
            "page_heading" => "Twitter Assistance | Manage Categories",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),

        );
		$data['list'] 		=	 Category::where('user_id',Auth::id())->get();
		return view($this->module.'.category.view', $data);
	}
	public function add(Request $request)	{
		if($request->input('name')){
			$category 				= new Category;
	        $category->name  		= ucfirst($request->input('name'));
	        $category->user_id  	= Auth::id();
	        
			
			
			$is_save				=	Category::where('name','=',
												$category->name)
												->where('user_id','=',
												Auth::id())
												->count();
			if($is_save > 0)	{
				return redirect($this->module.'/category/add')->with('message', 'Category with this slug alrady exist.');
			}
			$category->save();
			return redirect($this->module.'/category')->with('message', 'Category sucessfully added');
		}

		$data = array(
            "page_title"   => "Twitter Assistance | Add Categories",
            "page_heading" => "Twitter Assistance | Add Categories",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),
        );

		return view($this->module.'.category.addview', $data);
	}

	public function delete($id)	{
		$category 	= new Category;
		$cat		=	$category->find($id);
		Category::destroy($id);
		return redirect($this->module.'/category');
	}
	public function update($id = NULL,Request $request)	{
		//print_r($request->all()); die();
		if($request->input('name')){
			$category 				= Category::find($id);
	        $category->name  		= ucfirst($request->input('name'));
			
			$category->parent_id  	= $request->input('parent_id')?$request->input('parent_id'):0;
			
			$is_save				=	Category::where('name','=',
												$category->slug)
												->where('c_id','!=',
												$id)
												->count();
			if($is_save > 0)	{
				return redirect($this->module.'/category/update/'.$id)->with('message', 'Login Failed');
			}
			$category->save();
			return redirect($this->module.'/category');
		}
		$data = array(
            "page_title"   => "Twitter Assistance | Edit Categories",
            "page_heading" => "Twitter Assistance | Edit Categories",
             "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),
        );
		$data['list'] 	=	 Category::get();
		$data['row'] 	= 	Category::find($id);
		return view($this->module.'.category.editview', $data);
	}
}
