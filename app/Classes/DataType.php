<?php
namespace App\Classes;
class DataType {
	private $array;
	private $types;
	
	public function __construct($types){
		$this->types = $types;
	}
	function castType($type, $val){
		switch ($type) {
			case 'int':
				$val = (int)$val;
				break;
			case 'float':
				$val = (float)$val;
				break;
		}
		return $val;
	}
	
	function listingType($arr){
		$data = $arr;
		$listing = array('agreement','location');
		foreach ($listing as $ok=>$ov) {
			if(isset($arr[$ov]))
				foreach (@$arr[$ov] as $k=>$v) {
					if(isset($this->types[$k])){

						$data[$ov][$k] = $this->castType($this->types[$k],$v);
					}
				}
		}
		foreach ($this->types as $key => $value) {
			if(isset($data[$key]) && !is_array($data[$key]))
				$data[$key] = $this->castType($value,$data[$key]);
		}
		return $data;
	}
	function singleIndex($arr){
		$data = $arr;
		if(is_array($arr)){
			foreach ($arr as $ok=>$ov) {
				if(isset($this->types[$ok])){
					$data[$ok] = $this->castType($this->types[$ok],$ov);
				}
			}	
		}
		return $data;
	}
	

}
