<div class="member_info"><div class="member_ico"><img src="source/admin/template/images/a.png" width="43" height="43"></div><a class="system_a" href="#" onclick="JumpFrame('','?c=a_sys');">系统设置</a><a href="?c=login&a=out" class="system_log">注销</a><a href="#" class="system_logout" onclick="closeWindow()">退出</a></div>
<?php
$leftvalue=$_GET['val'];
switch ($leftvalue)
{
case "article":
?>
<div class="left_title">文章管理</div>
<ul class="side">
<li><a href="#" onclick="JumpFrame('','?c=a_article&a=add');">添加文章</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_article');" class="selected" >文章管理</a></li>
</ul>
<?php
break;
case "classtypes":
?>
<div class="left_title">网站栏目管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_classtypes');">栏目管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_classtypes&a=add');">添加栏目</a></li>
</ul>
<?php
 break;
case "molds":
?>
<div class="left_title">频道管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_molds&a=add');">添加频道</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_molds');">频道管理</a></li>
</ul>
<?php
 break;
case "product":
?>
<div class="left_title">商品管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_product&a=add');">添加商品</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_product');">商品管理</a></li>
</ul>
<?php
 break;
case "links":
?>
<div class="left_title">友情链接管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_links');">链接分类管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_links&a=tadd');">添加链接分类</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_links&a=adlist');">链接管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_links&a=add');">添加链接</a></li>
</ul>
<?php
 break;
case "funs":
?>
<div class="left_title">其它管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_ads');">广告管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_comment');">评论管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_member');">会员管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_special');">专题管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_channel&molds=person&a=add');">添加人才招聘</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_channel&molds=person');">人才招聘管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_message');">表单留言管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_pay');">支付系统管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_goods');">购物系统管理</a></li>
</ul>
<?php
 break;
case "adminuser":
?>
<div class="left_title">管理员管理</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_adminuser');">管理员管理</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_adminuser&a=add');">添加管理员</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_adminuser&a=glist');">管理员分组</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_adminuser&a=gadd');">添加分组</a></li>
</ul>
<?php
break;
case "sys":
?>
<div class="left_title">系统设置</div>
<ul class="side">
<li><a href="#" class="selected" onclick="JumpFrame('','?c=a_sys');">系统设置</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_template');">选择模板</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_html');">更新静态html</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_labelcus');">自定义模板标签</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_labelcus&a=custom_index');">自定义页面</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_label');">模板调用生成器</a></li>
<li><a href="#" onclick="JumpFrame('','?c=a_dbbak');">数据备份恢复</a></li>
<li class="side_about"><a href="#" onclick="JumpFrame('','?c=a_sys&a=ecache');">更新系统缓存</a></li>
</ul>
<?php
break;
}
?>


