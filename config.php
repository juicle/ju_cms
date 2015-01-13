<?php
define("APP_PATH",dirname(__FILE__));
define("JU_PATH",APP_PATH."/include");
@date_default_timezone_set('PRC');//设置默认时区
$juConfig = array(
// 数据库连接配置
'db' => array(
'host' => '127.0.0.1',			//数据库地址
'port' => 3306,					//数据库端口
'database' => 'dyo',		//数据库名
'login' => 'root',				//数据库帐号
'password' => '',			//数据库密码
'prefix' => 'dy_',				//数据库表前缀
),

'ext' => array(
'update' => '20130118',
'auto_update' => 1,
'http_path' => '#',
'site_title' => '建站系统',
'site_keywords' => '建站系统',
'site_description' => '建站系统',
'view_themes' => 'default',
'site_html' => 1,
'site_html_dir' => 'html',
'site_html_rules' => '[mold]/[file].html',
'site_html_suffix' => '.html',
'site_html_index' => 0,
'enable_gzip' => 0,
'enable_gzip_level' => 6,
'cache_auto' => 1,
'cache_time' => 0,
'filetype' => 'jpg,gif,jpeg,bmp,png,swf,flv,wmv,wma,mp3,mp4,rar,zip,7z,txt,doc,docx,xls,xlsx',
'filesize' => 10485760,
'imgwater' => 0,
'imgwater_t' => 3,
'imgcaling' => 1,
'img_w' => 800,
'img_h' => 800,
'comment_audit' => 1,
'comment_user' => 0,
),
);