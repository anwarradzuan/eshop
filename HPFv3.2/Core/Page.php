<?php

class Page{
	public $title = "";
	private $meta_top = array();
	private $top_tag = [], $bottom_tag = [];
	private $page = array(), $footer = "", $main_menu = "", $breadcumb = "", $route = "";
	private $body = "", $contentType = "text/html";
	private $topw = [], $botw = [];
	
	public function __construct($setting = array()){		
		if(isset($setting["Content-Type"])){
			$this->contentType = $setting["Content-Type"];
		}
	}
	
	public static $xx = "";
	public static function script($x = ""){
		self::$xx = $x;
	}
	
	public function addTopTag($tag){
		$this->top_tag[] = $tag;
	}
	
	public function addBottomTag($tag){
		$this->bottom_tag[] = $tag;
	}
	
	public function addMetaTop($string = ""){
		array_push($this->meta_top, $string);
	}
	
	public function setFooter($path){
		$this->footer = $path;
	}
	
	public function setMainMenu($path, $route = ""){
		if(!empty($route)){
			$this->route = $route;
		}
		
		$this->main_menu = $path;
	}
	
	public function setBreadcumb($path, $route = ""){
		if(!empty($route)){
			$this->route = $route;
		}
		
		$this->breadcumb = $path;
	}
	
	public function addTopWidget($path = ""){
		$this->topw[] = $path;
	}
	
	public function addBottomWidget($path = ""){
		$this->botw[] = $path;
	}
	
	public function loadPage($page = "", $route = ""){
		if(empty($page)){
			die("Fail including page. ");
		}
		
		if(!empty($route)){
			$this->route = $route;
		}
		
		$path = VIEW . $page . ".php";
		
		if(is_dir(dirname($path))){
			
			if(!is_file($path)){
				$o = fopen($path, "w");
				fclose($o);
			}
			
			array_push($this->page, $path);
		}		
	}
	
	public function setBodyAttribute($attr = ""){
		$this->body = $attr;
	}
	
	public function Render(){
		$route = $this->route;
		$header = $this->Read("header");
		$footer = $this->Read("footer");
		
		$header = str_replace("{PAGE_TITLE}", $this->title, $header);
		
		$meta = "";
		foreach($this->meta_top as $r){
			$meta .= $r;
		}
		$header = str_replace("{META_TOP}", $meta, $header);
		
		$top = "";
		foreach($this->top_tag as $tops){
			$top .= $tops;
		}
		$header = str_replace("{TOP_TAG}", $top, $header);
		$header = str_replace("{BODY_ATTR}", $this->body, $header);
		
		$bottom = "";
		foreach($this->bottom_tag as $bottoms){
			$bottom .= $bottoms;
		}
		
		echo $header;
		
		if(!empty($this->main_menu)){
			$path = VIEW . $this->main_menu;
			if(file_exists($path)){
				include_once($path);
			}
		}
		
		if(count($this->topw) > 0){
			for($ixxx = 0; $ixxx < count($this->topw); $ixxx++){
				if(file_exists(VIEW . $this->topw[$ixxx])){
					include_once(VIEW . $this->topw[$ixxx]);
				}
			}
		}
		
		if(!empty($this->breadcumb)){
			$path = VIEW . $this->breadcumb;
			
			if(file_exists($path)){
				include_once($path);
			}
		}
		
		if(count($this->page) > 0){
			for($ixxx = 0; $ixxx < count($this->page); $ixxx++){
				if(file_exists($this->page[$ixxx])){
					include_once($this->page[$ixxx]);
				}
			}
		}
		
		if(count($this->botw) > 0){
			for($ixxx = 0; $ixxx < count($this->botw); $ixxx++){
				if(file_exists(VIEW . $this->botw[$ixxx])){
					include_once(VIEW . $this->botw[$ixxx]);
				}
			}
		}
		
		if(!empty($this->footer)){
			$path = VIEW . $this->footer;
			if(file_exists($path)){
				include_once($path);
			}
		}
		
		$bottom .= "<script>" . self::$xx . "</script>";
		$footer = str_replace("{BOTTOM_TAG}", $bottom, $footer);
		echo $footer;
	}
	
	public function Read($type = "header"){
		$path = MISC . "skeleton/" . $type . ".php";
		$x = fopen($path, "r+");
		$string = stream_get_contents($x);
		
		return $string;
	}
	
	public static function Load($path, $route = ""){
		if(file_exists(VIEW . $path . ".php")){
			include_once(VIEW . $path . ".php");
		}else{
			die("file " . VIEW . $path . " not found");
		}
	}
}




































?>