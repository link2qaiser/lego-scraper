<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Region;
use Hash;
use Auth,URL,Session,Redirect;

class RegionController extends Controller
{
    public function __construct()	{
	}
	
	public function add(Request $request)	{
		$category 				= new Region;
        $category->name  		= $request->input('name');
		$category->slug 	  	= strtolower(str_replace(" ","-",$request->input('slug')));
		$category->parent_id  	= $request->input('parent_id');
		
		$is_save				=	Region::where('slug','=',
											$category->slug)
											->count();
		if($is_save > 0)	{
			return redirect('region/addview')->with('message', 'Region with this slug alrady exist.');
		}
		
		$category->save();
		return redirect('region/view')->with('message', 'Region sucessfully added');
	}
	
    public function view($id = 0)	{
		$data				=	 array();	
		$data['id'] 		=	 $id;
		$data['list'] 		=	 Region::where('parent_id','=',
											$id)->get();
		return view('region.view', $data);
	}
	public function addview($id = NULL)	{
		$data			=	 array();
		$data['id'] 	= ($id != NULL)?$id:0;

		
		return view('region.addview', $data);
	}
	public function editview($id = NULL)	{
		$data			=	 array();
		$data['list'] 	=	 Region::where('parent_id','=',
											0)->get();
		$data['row'] 	= 	Region::find($id);
		
		return view('region.editview', $data);
	}
	public function delete($id)	{
		Region::destroy($id);
		return redirect('region/view');
	}
	
	public function update(Request $request)	{
		//dd($request->all()); die();
		$region 				= Region::find($request->input('id'));
        $region->name  			= $request->input('name');
		$region->slug 	  		= strtolower(str_replace(" ","-",$request->input('slug')));
		$region->parent_id  	= $request->input('parent_id')?$request->input('parent_id'):0;
		//echo $region->parent_id; die();
		
		$is_save				=	Region::where('slug','=',
											$region->slug)
											->where('ct_id','!=',
											$request->input('id'))
											->count();
		
		
		if($is_save > 0)	{
			return redirect('region/addview')->with('message', 'Region is not updated');
		}
		$region->save();
		return redirect('region/editview/'.$request->input('id'))->with('message', 'Region is updated sucessfully.');
	}
}
