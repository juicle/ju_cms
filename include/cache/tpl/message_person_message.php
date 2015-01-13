<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $type['title'] ?>-<?php echo $GLOBALS['S']['title'] ?></title>
<meta name="keywords" content="<?php echo $type['keywords'] ?> " />
<meta name="description" content="<?php echo $type['description'] ?> " />
<link href="<?php echo $GLOBALS['skin'] ?>style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var site_dir="<?php echo $GLOBALS['WWW'] ?>";
</script>
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jsmain.js"></script>
<script src="<?php echo $GLOBALS['skin'] ?>js/main.js" type="text/javascript"></script>
<script src="<?php echo $GLOBALS['WWW'] ?>include/js/DatePicker/WdatePicker.js" type="text/javascript"></script>
<script charset="utf-8" src="<?php echo $GLOBALS['WWW'] ?>include/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $GLOBALS['WWW'] ?>include/js/kindeditor/lang/zh_CN.js"></script>
<script src="<?php echo $GLOBALS['WWW'] ?>include/js/dyfrom.js" type="text/javascript"></script>
<script type="text/javascript">
function postform(){
	value=$("#title").val();
	if(!dyfrom_max(value, 100)){
		alert('标题不能大于100个字符');return false;
	}
	value=$("#body").val();
	if(!dyfrom_max(value, 500)){
		alert('内容不能大于500个字符');return false;
	}
<?php if($GLOBALS['G_DY']['vercode']==1){ ?>
	value=$("#vercode").val();
	if(dyfrom_ajax("<?php echo $GLOBALS['WWW'] ?>index.php?c=ajax&a=vercode","vercode="+value)=='false'){
		alert('验证码输入错误');return false;
	}
<?php } ?>
	return true;
}
</script>
</head>

<body>
<div class="wpa head">
  <div class="wp">
    <dl class="a"><img src="<?php echo $GLOBALS['skin'] ?>images/logo.jpg" /></dl><dl class="b"></dl>
    <dl class="c">
    <script type="text/javascript">member_login('member_login','member/ajax_login.html');</script>
      <p class="i" id="member_login"></p>
      <form action="<?php echo $GLOBALS['WWW'] ?>index.php" method="get">
      <input name="a" type="hidden" value="search" />
      <p class="s"><span class="ll"><select name="c">
        <option value="article" selected="selected">文章</option>
        <option value="product">产品</option>
      </select></span><span class="l"><input type="text" name="word" /></span><span class="r"><input type="submit" value=""/></span></p>
      </form>
    </dl>
  </div>
  <div class="wp menu f1">
  <a href="<?php echo $GLOBALS['WWW'] ?>index.php" class="c">首 页</a>
<?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  mshow='1' and pid=0  order by orders desc,tid limit 7");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?>
  <a href="<?php echo $v['url'] ?>"><?php echo $v['classname'] ?></a>
<?php } ?>
  </div>
</div>
<div class="wpm list">
  <div class="tab11"></div>
  <div class="tab1 tab1b main">
    <div class="l">
      <div class="columnc"><h2><?php echo $type['classname'] ?></h2></div>
      <div class="columncl">
      <?php $ytid=$type[tid];if(!syDB("classtype")->find(array("pid"=>$type[tid],"mshow"=>1),null,"tid")){ $ypid=syDB("classtype")->find(array("tid"=>$type[tid],"mshow"=>1),null,"pid");$type[tid]=$ypid[pid];} ?><?php $tn=0;$tablet=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  pid='".$type[tid]."' and mshow='1'  order by orders desc,tid");$type[tid]=$ytid;foreach($tablet as $t){ $t["tid_leafid"]=$sy_class_type->leafid($t["tid"]);$t["n"]=$tn=$tn+1; $t["classname"]=stripslashes($t["classname"]);$t["description"]=stripslashes($t["description"]); $t["url"]=html_url("classtype",$t); ?>
      <a href="<?php echo $t['url'] ?>"<?php if($type['tid']==$t['tid']){ ?> class="c"<?php } ?>><?php echo $t['classname'] ?> </a>
      <?php } ?>
      </div>
    </div>
    <div class="r">
    <div class="content">
       <div class="position">当前位置：<?php echo $positions ?></div>
       <div class="member_f">
<form action="<?php echo $GLOBALS['WWW'] ?>index.php?c=message&a=add&tid=<?php echo $type['tid'] ?>" method="post" onsubmit="return postform();">

		<?php if($fmolds && $faid){ ?>
        <input name="fmolds" type="hidden" value="<?php echo $fmolds ?>" />
		<input name="faid" type="hidden" value="<?php echo $faid ?>" />
		<dl><dt>来自：</dt><dd><?php echo contentinfo($fmolds,$faid,'title') ?></dd></dl>
        <?php } ?>
        
		<dl><dt>姓名：</dt><dd><input name="title" id="title" type="text" class="inp" style="width:300px;" /></dd><dd class="m"><?php echo $v['m'] ?></dd></dl>
		<dl><dt>简介：</dt><dd><textarea name="body" id="body" class="inp" style="width:400px;"></textarea></dd><dd class="m"><?php echo $v['m'] ?></dd></dl>
		<?php foreach( $fields as $v){ ?>
		<dl><dt><?php echo $v['name'] ?>：</dt><dd><?php echo $v['input'] ?></dd><dd class="m"><?php echo $v['m'] ?></dd></dl>
		<?php } ?>
<?php if($GLOBALS['G_DY']['vercode']==1){ ?>
       <dl><dt>验证码：</dt><dd><input type="text" name="vercode" id="vercode" class="inp" style="width:80px;"/></dd><dd><img src="<?php echo $GLOBALS['WWW'] ?>include/vercode.php" id="vercodeimg" width="60" height="25" onclick="newvercode();" style="cursor:pointer;" /></dd><dd class="m"></dd></dl>
<script type="text/javascript">
setTimeout('newvercode()',1000);
function newvercode(){
	document.getElementById("vercodeimg").src="<?php echo $GLOBALS['WWW'] ?>include/vercode.php?a="+Math.random();
}
</script>
<?php } ?>
       <dl style="border:0;"><dt>&nbsp;</dt><dd><input type="submit" value="提交留言" class="btnbig"/></dd></dl>
</form>
       </div>
    </div>
	<div class="comment">
         <div class="t c">留言列表</div>
         <div class="list">
         <?php foreach( $lists as $s){ ?>
         <dl><dt><?php echo $s['user'] ?> 发布于 <?php echo date('Y-m-d H:i:s',$s['addtime']) ?></dt>
         <?php if($fieldinfo){ ?><dd><?php foreach( $fieldinfo as $f){ ?><?php echo $f['fieldsname'] ?>：<?php echo $s[$f['fields']] ?><br /><?php } ?></dd><?php } ?>
         <dd><?php echo $s['body'] ?><?php if($s['reply']){ ?><br /><span style="color:#C00">管理员回复：<?php echo $s['reply'] ?></span><?php } ?></dd></dl>
         <?php } ?>
         </div>
	</div>
	<ul class="c pages"><?php echo $pages ?></ul>
    </div>
  </div>
  <div class="tab12 mban"></div>
</div>
<div class="both"></div>
<div class="wpa bottom">
  <div class="wp">
    <div class="l">DOYO通用建站管理系统，真正的轻松建站。<br />Powered by <a href="http://wdoyo.com" target="_blank">DOYO!</a></div>
    <div class="r"></div>
  </div>
</div>
</body>
</html>
