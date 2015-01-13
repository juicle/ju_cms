<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $article['title'] ?></title>
<meta name="keywords" content="<?php echo $article['keywords'] ?>" />
<meta name="description" content="<?php echo $article['description'] ?>" />
<link href="<?php echo $GLOBALS['skin'] ?>style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var site_dir="<?php echo $GLOBALS['WWW'] ?>";
</script>
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jsmain.js"></script>
<script src="<?php echo $GLOBALS['skin'] ?>js/main.js" type="text/javascript"></script>
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
		<div class="c"><h1><?php echo $article['title'] ?></h1></div>
		<div class="c t">发布时间：<?php echo date('Y-m-d H:i:s',$article['addtime']) ?> 点击：<script src="<?php echo $GLOBALS['WWW'] ?>index.php?c=article&a=hits&id=<?php echo $article['id'] ?>" type="text/javascript"></script></div>
		<div class="c f2"><?php echo $article['body'] ?></div>
        <div class="c"><ul class="pages"><?php echo $pages ?></ul></div>
        <div class="c prev">
        	<?php if($aprev){ ?>上一篇：<a href="<?php echo $aprev['url'] ?>"><?php echo $aprev['title'] ?></a><?php } ?>
            <?php if($anext){ ?>下一篇：<a href="<?php echo $anext['url'] ?>"><?php echo $anext['title'] ?></a><?php } ?>
        </div>
	</div>
       <div class="comment">
         <div class="t c">文章评论</div>
         <div class="i c">
<script type="text/javascript">
function comment_ret(){
	if(document.comment.body.value.length==''){alert("请输入评论内容！");return false;}
	if(document.comment.vercode.value.length==''){alert("请输入验证码！");return false;}
	if(document.comment.body.value.length>500){alert("评论内容不能超过500字！");return false;}
}
</script>
         <form method="post" action="<?php echo $GLOBALS['WWW'] ?>index.php?c=comment&m=<?php echo $molds ?>" name="comment" onsubmit="return comment_ret()">
         <input name="aid" type="hidden" value="<?php echo $article['id'] ?>" />
         <dl><dt>内容:</dt><dd><textarea name="body" style="width:500px; height:50px;" class="inp"></textarea></dd></dl>
         <dl>
         <?php if($GLOBALS['G_DY']['vercode']==1){ ?>
         <dt>验证码:</dt><dd><input name="vercode" type="text" style="width:50px;" class="inp" /></dd><dd><img src="<?php echo $GLOBALS['WWW'] ?>include/vercode.php" id="vercodeimg" width="58" height="24" onclick="newvercode();" style="cursor:pointer;" /></dd>
    <script type="text/javascript">
	setTimeout('newvercode()',1000);
    function newvercode(){
        document.getElementById("vercodeimg").src=site_dir+"include/vercode.php?a="+Math.random();
    }
    </script>
         <?php }else{ ?>
         <dt>&nbsp;</dt>
         <?php } ?>
         <dd><input name="" type="submit" value="提交" class="btnmini" /></dd></dl>
         </form>
         </div>
         <script type="text/javascript">ajax_comment('comment','article',<?php echo $article['id'] ?>,1,'article/ajax_comment.html');</script>
         <div id="comment"></div>
       </div>
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
