<?php
if(!defined('APP_PATH')||!defined('JU_PATH')){exit('Access Denied');}

class index extends syController
{
	function __construct(){
		parent::__construct();
		$this->c=syClass('syauser');
		$this->m=syDB('molds')->findAll(array('isshow'=>1),' orders desc,mid ','mid,molds,moldname,sys');
		$this->funs=syDB('funs')->findAll(array('isshow'=>1),null,'fid,funs,name');
	}
	function index(){
		$this->a='index';
		$this->display("index.html");
	}
	function main(){
		$this->a='main';
		$this->display("main.html");
	}
	
	
	function template_cache(){
		$d='include/cache/log/';
		$f=date('Ym').'.txt';
		deleteDir($d);__mkdirs($d);
		$wt=@fopen($d.$f,"w");@fclose($wt);
		exit('true');
	}
	function href_session(){
		exit('true,'.date('Ym'));
	}
}	