<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product['title'] ?></title>
<meta name="keywords" content="<?php echo $product['keywords'] ?>" />
<meta name="description" content="<?php echo $product['description'] ?>" />
<link href="<?php echo $GLOBALS['skin'] ?>style/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $GLOBALS['skin'] ?>style/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var site_dir="<?php echo $GLOBALS['WWW'] ?>";
</script>
<script type="text/javascript" src="<?php echo $GLOBALS['WWW'] ?>include/js/jsmain.js"></script>
<script src="<?php echo $GLOBALS['skin'] ?>js/main.js" type="text/javascript"></script>
<script src="<?php echo $GLOBALS['skin'] ?>js/goods.js" type="text/javascript"></script>
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
        <div class="c">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="310">
                <div id="imgto">
                <div class="big"><?php $photos=fileall($product['photo']); ?><img src="<?php echo $photos[0][0] ?>" title="<?php echo $photos[0][1] ?>" /></div>
                <div class="small">
                    <div class="imgl"><</div>
                    <div class="imgc">
                        <ul>
                        <?php foreach( $photos as $pk=>$ps){ ?>
                      	<li<?php if($pk==0){ ?> class="the"<?php } ?>><img src="<?php echo $ps[0] ?>" title="<?php echo $ps[1] ?>" /></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="imgr">></div>
                </div>
                </div>
                </td>
                <td width="15"></td>
                <td><h1 style="text-align:left;"><?php echo $product['title'] ?></h1>
                <form action="<?php echo $GLOBALS['WWW'] ?>index.php?c=pay&id=<?php echo $product['id'] ?>" id="goods" method="post">
                <div class="attribute" id="attribute">
                <input id="price" type="hidden" value="<?php echo $product['price'] ?>" />
                <p><strong>价格</strong>：<span class="price"><?php echo $product['price'] ?></span> 元</p>
                <?php foreach( $attribute_type as $v){ ?>
                  	<p class="aprice"><strong><?php echo $v['name'] ?></strong>：
                    <?php foreach( product_attribute($v['tid'],$product['id']) as $a){ ?>
                   	<span><?php echo $a['name'] ?><input name="aprice" type="checkbox" value="<?php echo $a['price'] ?>" style="display:none;" /><input name="attribute[<?php echo $v['tid'] ?>]" type="checkbox" value="<?php echo $a['sid'] ?>" style="display:none;" /></span>
                    <?php } ?>
					</p>
                <?php } ?>
                <p><strong>购买数量</strong>： <input name="quantity" type="text" value="1" class="ins" style="width:40px;" /> <?php echo $type['unit'] ?></p>
                </div>
                <div class="buy"><input type="submit" class="inbuy" value="立即购买" /><?php if($product['virtual']=='0'){ ?> <input type="button" class="incart" onclick="cartbox(<?php echo $product['id'] ?>);" value="放入购物车" /><?php } ?></div>
                </form>
                <div class="pinfo">
                <?php if($product['virtual']=='0'){ ?>
                    物流费用：
                    <?php if($product['logistics']=='0'){ ?>
                        免物流费
                    <?php }else{ ?>
                        <?php foreach( (unserialize($product['logistics'])) as $k=>$l){ ?>
                        <?php if($l!=0){ ?><?php echo $k ?> <strong><?php echo $l ?></strong> 元<?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php }else{ ?>
                	自动发货
                <?php } ?><br /><span>更新：<?php echo date('Y-m-d',$product['addtime']) ?></span><span>已售出 <strong><?php echo $record ?></strong> <?php echo $type['unit'] ?></span><span>浏览：<script src="<?php echo $GLOBALS['WWW'] ?>index.php?c=product&a=hits&id=<?php echo $product['id'] ?>" type="text/javascript"></script></span>
                </div>
                </td>
              </tr>
            </table>
        </div>
        <div class="c labels"><span onclick="labels(this,'span','p_labels','p_s1');">产品介绍</span><span onclick="labels(this,'span','p_labels','p_s2');" class="current">销售记录</span></div>
        <div class="c">
            <div class="p_labels" id="p_s1">
                <div class="f2"><?php echo $product['body'] ?></div>
                <ul class="pages"><?php echo $pages ?></ul>
            </div>
            <ul class="p_labels record none" id="p_s2">
            </ul>
            <script type="text/javascript">ajax_record('p_s2',<?php echo $product['id'] ?>,1,'product/ajax_record.html');</script>
        </div>
        <div class="c prev">
        	<?php if($aprev){ ?>上一篇：<a href="<?php echo $aprev['url'] ?>"><?php echo $aprev['title'] ?></a><?php } ?>
            <?php if($anext){ ?>下一篇：<a href="<?php echo $anext['url'] ?>"><?php echo $anext['title'] ?></a><?php } ?>
        </div>
	</div>
       <div class="comment">
         <div class="t c">产品咨询</div>
         <div class="i c">
<script type="text/javascript">
function comment_ret(){
	if(document.comment.body.value.length==''){alert("请输入咨询内容！");return false;}
	if(document.comment.vercode.value.length==''){alert("请输入验证码！");return false;}
	if(document.comment.body.value.length>500){alert("咨询内容不能超过500字！");return false;}
}
</script>
         <form method="post" action="<?php echo $GLOBALS['WWW'] ?>index.php?c=comment&m=<?php echo $molds ?>" name="comment" onsubmit="return comment_ret()">
         <input name="aid" type="hidden" value="<?php echo $product['id'] ?>" />
         <dl><dt>内容:</dt><dd><textarea name="body" style="width:500px; height:50px;" class="inp"></textarea></dd></dl>
         <dl><?php if($GLOBALS['G_DY']['vercode']==1){ ?><dt>验证码:</dt><dd><input name="vercode" type="text" style="width:50px;" class="inp" /></dd><dd><img src="<?php echo $GLOBALS['WWW'] ?>include/vercode.php" id="vercodeimg" width="58" height="24" onclick="newvercode();" style="cursor:pointer;" /></dd>
<script type="text/javascript">
setTimeout('newvercode()',1000);
function newvercode(){
	document.getElementById("vercodeimg").src="<?php echo $GLOBALS['WWW'] ?>include/vercode.php?a="+Math.random();
}
</script>
         <?php }else{ ?><dt>&nbsp;</dt><?php } ?><dd><input name="" type="submit" value="提交" class="btnmini" /></dd></dl>

         </form>
         </div>
         <script type="text/javascript">ajax_comment('comment','product',<?php echo $product['id'] ?>,1,'product/ajax_comment.html');</script>
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
