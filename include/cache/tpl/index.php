<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $GLOBALS['S']['title'] ?></title>
<meta name="keywords" content="<?php echo $GLOBALS['S']['keywords'] ?> " />
<meta name="description" content="<?php echo $GLOBALS['S']['description'] ?> " />
<link href="<?php echo $GLOBALS['skin'] ?>style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var site_dir="<?php echo $GLOBALS['WWW'] ?>";
</script>
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jsmain.js"></script>
<script src="<?php echo $GLOBALS['skin'] ?>js/main.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['skin'] ?>js/product.js"></script>
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
<div class="wpm">
  <div class="tab1 tab1b">
	<div id="top_banner" >
		 <ul class="slider" >
         <?php $vn=0;$tablev=syClass("syModel")->findSql("select * from dy_ads where isshow=1 and taid='1'  order by orders desc,id desc limit 3");foreach($tablev as $v){ $v["n"]=$vn=$vn+1; $v["name"]=stripslashes($v["name"]); ?>
			<li><img src="<?php echo $v['adfile'] ?>"></li>
			<?php } ?>
		  </ul>
		  <ul class="num" >
			<li>1</li>
			<li>2</li>
			<li>3</li>
		  </ul>
	</div>
  </div>
  <div class="bannerb"></div>
</div>
<div class="wpm">
  <div class="tab495">
  	<div class="type">
    <p class="l"></p><p class="c f1">公司动态<span>Company News</span></p><p class="r"></p><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='8'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>"></a><?php } ?>
    </div>
	<div class="tab4 news">
	  <div class="l">
        <div id="new_banner" >
             <ul class="slider" >
             	<?php $vn=0;$tablev=syClass("syModel")->findSql("select * from dy_article where isshow=1 and tid in(8) and litpic!=''  order by orders desc,addtime desc,id desc limit 3");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?> 
                <li><img src="<?php echo $v['litpic'] ?>"></li>
                <?php } ?>
              </ul>
              <ul class="num" >
                <li>1</li>
                <li>2</li>
                <li>3</li>
              </ul>
        </div>
      </div>
      <ul class="r">
<?php $vn=0;$tablev=syClass("syModel")->findSql("select * from dy_article where isshow=1 and tid in(8)  order by orders desc,addtime desc,id desc limit 6");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
		<li><a href="<?php echo $v['url'] ?>" target="_blank" style="<?php echo $v['style'] ?>"><?php echo newstr($v['title'],17) ?></a></li>
<?php } ?>
      </ul>
	</div>
	<div class="tab42"></div>
  </div>
  <div class="tab475">
  <?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='1'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?>
  	<div class="type">
    <p class="l"></p><p class="c f1">关于我们<span>About Us</span></p><p class="r"></p><a href="<?php echo $v['url'] ?>"></a>
    </div>
	<div class="tab5 about">
        <div class="l"><img src="<?php echo $v['litpic'] ?>" width="180" height="150" /></div>
        <div class="r"><?php echo newstr($v['description'],270) ?><a href="<?php echo $v['url'] ?>">[详细]</a></div>
    </div>
	<div class="tab52"></div>
  <?php } ?>
  </div>

  <div class="tab980">
  	<div class="type">
    <p class="l"></p><p class="c f1">商品中心<span>Product Center</span></p><p class="r"></p><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='2'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>"></a><?php } ?>
    </div>
	<div class="tab1 tab1b">
        <div class="product">
            <div class="wrapper">
              <ul>
				<?php $vn=0;$tablev=syClass("syModel")->findSql("select * from dy_product where isshow=1 and tid in(2,18,19)  order by orders desc,addtime desc,id desc limit 10");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("product",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
				<li><a href="<?php echo $v['url'] ?>" target="_blank" style="<?php echo $v['style'] ?>"><img src="<?php echo $v['litpic'] ?>" /><p><?php echo newstr($v['title'],35) ?></p></a></li>
				<?php } ?>
              </ul>        
            </div>
        </div>
    </div>
	<div class="tab12"></div>
  </div>
  
  <div class="tab220">
  	<div class="type">
    <p class="l"></p><p class="c f1">联系我们<span>Contact Us</span></p><p class="r"></p><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='7'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>"></a><?php } ?>
    </div>
	<div class="tab3 contact">
		<div class="t"><img src="<?php echo $GLOBALS['skin'] ?>images/cu.jpg" width="200" height="70" /></div>
        <ul class="b">
            <li><span>Tel :</span><p>0719-8689805</p></li>
            <li><span>Email :</span><p>hi@wdoyo.com</p></li>
            <li><span>QQ :</span><p>2514159326</p></li>
        </ul>
    </div>
	<div class="tab32"></div>
  </div>
  <div class="tab750">
  	<div class="type">
    <p class="l"></p><p class="c f1">服务案例<span>Service Case</span></p><p class="r"></p><?php $vn=0;$tablev=syClass("syModel")->findSql("select tid,molds,pid,classname,gourl,litpic,title,keywords,description,orders,mrank,htmldir,htmlfile,mshow from dy_classtype where  tid='4'  order by orders desc,tid");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["classname"]=stripslashes($v["classname"]);$v["description"]=stripslashes($v["description"]); $v["url"]=html_url("classtype",$v); ?><a href="<?php echo $v['url'] ?>"></a><?php } ?>
    </div>
	<div class="tab2">
        <ul class="case">
			<?php $vn=0;$tablev=syClass("syModel")->findSql("select * from dy_article where isshow=1 and tid in(4)  order by orders desc,addtime desc,id desc limit 4");foreach($tablev as $v){ $v["tid_leafid"]=$sy_class_type->leafid($v["tid"]);$v["n"]=$vn=$vn+1; $v["url"]=html_url("article",$v); $v["title"]=stripslashes($v["title"]); $v["description"]=stripslashes($v["description"]); ?>
			<li><a href="<?php echo $v['url'] ?>" target="_blank" style="<?php echo $v['style'] ?>"><img src="<?php echo $v['litpic'] ?>" /><p><?php echo newstr($v['title'],35) ?></p></a></li>
			<?php } ?>
        </ul> 
    </div>
	<div class="tab22"></div>
  </div>

</div>
<div class="wp">
  <div class="links">友情链接：
<?php $tablev=syClass("syModel")->findSql("select * from dy_links where isshow=1  order by orders desc,id desc");foreach($tablev as $v){ $v["name"]=stripslashes($v["name"]); ?>
<a href="<?php echo $v['gourl'] ?>" target="_blank"><?php echo $v['name'] ?></a>
<?php } ?>
  </div>
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
