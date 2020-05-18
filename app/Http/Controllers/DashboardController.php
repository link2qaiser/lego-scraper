<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;


class DashboardController extends Controller{
    
    private $singular = "Dashboard";
    private $plural   = "Dashboard";
    private $view     = "dashboard/";

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$data = array();
        $data = array(
            "page_title"   => $this->plural,
            "page_heading" => $this->plural,
            "breadcrumbs"  => array("dashboard" => "Home", "#" => $this->plural),
        );
    	return view($this->view . 'view_dashboard', $data);
    }
}
