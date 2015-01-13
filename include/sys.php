<?php
// 定义系统路径
if (substr(PHP_VERSION, 0, 1) != '5')exit("本系统运行环境要求PHP版本5及以上！");
if(!defined('APP_PATH')||!defined('JU_PATH')){exit('Access Denied');}

// 载入核心函数库
require(JU_PATH."/Functions.php");

// 载入配置文件
$GLOBALS['G_Ji'] = spConfigReady(require(JU_PATH."/inc.php"),$juConfig);

// 根据配置文件进行一些全局变量的定义
if('debug' == $GLOBALS['G_Ji']['mode']){
	define("SP_DEBUG",TRUE); // 当前正在调试模式下
}else{
	define("SP_DEBUG",FALSE); // 当前正在部署模式下
}

// 如果是调试模式，打开警告输出
if (SP_DEBUG) {
	if( substr(PHP_VERSION, 0, 3) == "5.3" ){
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
	}else{
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	}
} else {
	error_reporting(0);
}
@set_magic_quotes_runtime(0);//过滤

// 载入核心MVC架构文件
import($GLOBALS['G_Ji']["sp_core_path"]."/syController.php", FALSE, TRUE);
import($GLOBALS['G_Ji']["sp_core_path"]."/syModel.php", FALSE, TRUE);
import($GLOBALS['G_Ji']["sp_core_path"]."/syView.php", FALSE, TRUE);

// 当在二级目录中使用SpeedPHP框架时，自动获取当前访问的文件名
if('' == $GLOBALS['G_Ji']['url']["url_path_base"]){
	if(basename($_SERVER['SCRIPT_NAME']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_Ji']['url']["url_path_base"] = $_SERVER['SCRIPT_NAME'];
	elseif (basename($_SERVER['PHP_SELF']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_Ji']['url']["url_path_base"] = $_SERVER['PHP_SELF'];
	elseif (isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === basename($_SERVER['SCRIPT_FILENAME']))
		$GLOBALS['G_Ji']['url']["url_path_base"] = $_SERVER['ORIG_SCRIPT_NAME'];
}
$GLOBALS['WWW']=pathinfo($GLOBALS['G_Ji']['url']["url_path_base"]);
$GLOBALS['WWW']=str_replace($GLOBALS['WWW']["basename"],'',$GLOBALS['G_Ji']['url']["url_path_base"]);
$GLOBALS['skin']=$GLOBALS['WWW'].'skin/'.$juConfig['ext']['view_themes'].'/';

// 在使用PATH_INFO的情况下，对路由进行预处理
if(TRUE == $GLOBALS['G_Ji']['url']["url_path_info"] && !empty($_SERVER['PATH_INFO'])){
	$url_args = explode("/", $_SERVER['PATH_INFO']);$url_sort = array();
	for($u = 1; $u < count($url_args); $u++){
		if($u == 1)$url_sort[$GLOBALS['G_Ji']["url_controller"]] = $url_args[$u];
		elseif($u == 2)$url_sort[$GLOBALS['G_Ji']["url_action"]] = $url_args[$u];
		else {$url_sort[$url_args[$u]] = isset($url_args[$u+1]) ? $url_args[$u+1] : "";$u+=1;}}
	if("POST" == strtoupper($_SERVER['REQUEST_METHOD'])){$_REQUEST = $_POST =  $_POST + $url_sort;
	}else{$_REQUEST = $_GET = $_GET + $url_sort;}
}

// 构造执行路由
$__controller = isset($_REQUEST[$GLOBALS['G_Ji']["url_controller"]]) ? 
	$_REQUEST[$GLOBALS['G_Ji']["url_controller"]] : 
	$GLOBALS['G_Ji']["default_controller"];
$__action = isset($_REQUEST[$GLOBALS['G_Ji']["url_action"]]) ? 
	$_REQUEST[$GLOBALS['G_Ji']["url_action"]] : 
	$GLOBALS['G_Ji']["default_action"];
	
$GLOBALS['S']=array('http'=>syExt('http_path'),'title'=>syExt('site_title'),'keywords'=>syExt('site_keywords'),'description'=>syExt('site_description'));