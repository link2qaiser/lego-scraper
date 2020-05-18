<?php

namespace App\Http\Controllers\twitterassistant;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\twitterassistant\Category;
use App\Models\twitterassistant\Rss_Resource;
use DB;
use Hash;
use Auth,URL,Session,Redirect;
class RSSController extends Controller
{
	private $thumb_array	=	array("65"=>"65","150"=>"190");
	private $module = "";
	public function __construct()	{
		$this->middleware('auth');
		$this->module = config('constants.twitterassistant.module');
	}
	
	public function add(Request $request)	{
		if($request->input('link')){
			$links = $request->input('link');
			$links = explode("\n", $links);

			$links = array_filter($links);
			foreach($links as $k=>$v){
				$category 				= new Rss_Resource;
				$category->c_id  		= $request->input('c_id');
				$category->link  		= $v;
				$category->user_id  	= Auth::id();
				
				$is_save				=	RSS_Resource::where('link','=',
													$v)
													->count();
				if($is_save == 0)	{
					$category->save();
				}
			}
			return redirect($this->module.'/rss')->with('message', 'RSS sucessfully added');
		}
		

		$data = array(
            "page_title"   => "Twitter Assistance | Add RSS",
            "page_heading" => "Twitter Assistance | Add RSS",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),

        );
		$data['categories'] 		=	 Category::where('user_id',Auth::id())->get();
		return view($this->module.'.rss.addview', $data);
	}
	
    public function view()	{
		$data = array(
            "page_title"   => "Twitter Assistance | Manage RSS",
            "page_heading" => "Twitter Assistance | Manage RSS",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),

        );
		$data['list'] 		=	 DB::select(DB::raw('SELECT c.name as c_name,rr.* FROM twas_categories c, twas_rss_resources rr where rr.c_id = c.c_id AND rr.user_id = c.user_id'));

		return view($this->module.'.rss.view', $data);
	}

	public function editview($id = NULL)	{
		
	}
	public function delete($id)	{
		$rss 	= new RSS_Resource;
		$rss		=	$rss->find($id);
		RSS_Resource::destroy($id);
		return redirect($this->module.'/rss');
	}
	public function update($id = NULL,Request $request)	{
		//print_r($request->all()); die();

		if($request->input('link')){
			$category 				= RSS_Resource::find($id);
	       	$category->c_id  		= $request->input('c_id');
			$category->link  		= $request->input('link');
			
			$is_save				=	RSS_Resource::where('link','=',
												$category->link)
												->where('rr_id','!=',
												$request->input('id'))
												->count();
			if($is_save > 0)	{
				return redirect($this->module.'/rss/update/'.$id)->with('message', 'Link alrady addded');
			}
			$category->save();
			return redirect($this->module.'/rss/update/'.$id);
		}

		$data = array(
            "page_title"   => "Twitter Assistance | Update RSS",
            "page_heading" => "Twitter Assistance | Update RSS",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => "twitterassistant"),

        );
		$data['categories'] 		=	 Category::where('user_id',Auth::id())->get();
		//$data['regions'] 			=	 Region::all();
		$data['row'] 				= 	RSS_Resource::find($id);
		$data['id'] 				= 	$id;
		
		return view($this->module.'/rss.editview', $data);

	}
}
