<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\Couchbase;
use App\Classes\Elasticsearch;
use App\Classes\Utility;
use App\Classes\Curl;
use App\User;
use Hash;
use Auth,URL,Session,Redirect;
class UsersController extends Controller
{
	private $thumb_array	=	array("65"=>"65","150"=>"190");
	private $module = "";
	private $title = "";
    private $type = "users";
	public function __construct()	{
		$this->module = config('constants.users.module');
		$this->title = config('constants.users.title');
	}
	
	public function updateData(&$data) {
        $int = [];
        foreach ($int  as $key=>$val) {
            if(isset($data[$val]))
                $data[$val] = (int)$data[$val];
        }
        $newline_to_comma = [];
        foreach ($newline_to_comma  as $key=>$val) {
            if(isset($data[$val]))
                $data[$val] = str_replace("\n", ",", $data[$val]);
                $data[$val] = str_replace("\r", "", $data[$val]);
                $data[$val] = str_replace("\t", "", $data[$val]);
                $data[$val] = str_replace("\n", "", $data[$val]);
        }

        $explode_implode = ['tools'];
        foreach ($explode_implode  as $key=>$val) {
            if(isset($data[$val]))
                $data[$val] = implode(",",  $data[$val]);
        }
        
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
    }
	public function create(Request $request)	{
        if($request->input('name')){
            $data = $request->all();
        
            $data['is_stoped'] = 0;
            $this->updateData($data);

            //echo "<pre>"; print_r($data); die();
            // $couchbase   =   new Couchbase(Auth::id(),"users");

            // $couchbase->insert($data);
            User::create($data);
            $resp = array('flag'=>true,'msg'=>'User is added sucessfully!','action'=>'reload');
            echo json_encode($resp);
            return;
        }
		$data = array(
            "model_title"   => "Create Compaigns",
            "action" => url($this->module.'/create'),
            "module" => $this->module,
        );
        $data['tools'] = Config('constants.tools');
        $data['roles'] = Config('constants.roles');
		return view($this->module.'.create_model', $data);
	}
	public function update(Request $request,$id = NULL)	{
        if($request->input('name')){
            
            $data = $request->all();
            $this->updateData($data);

            //echo "<pre>"; print_r($data); die();

            $user   =   User::find($id);
            $user->update($data);
            

            $resp = array('flag'=>true,'msg'=>'User is updated sucessfully!','action'=>'reload');
            echo json_encode($resp);
            return;
        }
		$id = $request->param;
		$data = array(
            "model_title"   => "Edit User",
            "action" => url($this->module.'/update/'.$id),
            "module" => $this->module,

        );
        $data['row']    =   User::find($id)->toArray();
        $data['row']['tools'] = explode(",", $data['row']['tools']);
        $data['tools'] = Config('constants.tools');
        //dd($data);
		return view($this->module.'.edit_model', $data);
	}
	
    public function view()	{
		$data = array(
            "page_title"   => $this->title." | Manage Compaigns",
            "page_heading" => $this->title." | Manage Compaigns",
            "module" => $this->module,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => $this->module),

        );

		$couchbase      =   new Couchbase(Auth::id(),"users");
 
        
        $list   =   User::where('role','>','0')->get()->toArray();
		// echo '<pre>';print_r($list);die;
        // if($list)
        //     foreach ($list as $key => $val) 
        // 	   $list[$key]['key_count']   =   $couchbase->getCount(["type"=>"'keywords'",'compaigns_id'=>"'".$val['compaigns_id']."'"]);
        $data['list'] = $list;
        //dd($data); 
		return view($this->module.'.view', $data);
	}
	

	public function delete($id)	{	
		/*
		DELETE LINKS
		*/
        $user   =   User::find($id);
        $user->delete($id);
   
        
		$response = array('flag'=>true,'msg'=>'User has been deleted.');
        echo json_encode($response); return;
	}
	
    public function updateStatus($status = NULL,$id = NULL) {
        
        $data['is_stoped'] = ($status == 'stop')?1:0;
        $couchbase   =   new Couchbase(Auth::id(),"compaigns");
        $compaign = $couchbase->update($id,$data);

        return redirect($this->module);
        
    }
}
