<?php if($member['id']==0){ ?>
<a href="<?php echo $GLOBALS['WWW'] ?>index.php?c=member&a=reg" class="m">注册会员</a><a href="<?php echo $GLOBALS['WWW'] ?>index.php?c=member&a=login" class="m">会员登录</a>
<?php }else{ ?>
欢迎您：<strong><?php echo $member['user'] ?></strong>
<?php if(funsinfo('goods','isshow')){ ?>
<script type="text/javascript">
$(function(){
	$('#mycart').mouseover(function () {mycart_show()});
	$('#mycart_info').mouseover(function () {mycart_show()});
	$('#mycart').mouseout(function () {mycart_none()});
	$('#mycart_info').mouseout(function () {mycart_none()});
})
function mycart_show(){
	$('#mycart').addClass("cart_c");
	$('#mycart_info').removeClass("none");
}
function mycart_none(){
    $('#mycart').removeClass("cart_c");
	$('#mycart_info').addClass("none");
}
</script>
<span id="mycart" class="cart"><a href="<?php echo $GLOBALS['WWW'] ?>index.php?c=pay&cart=1">购物车(<strong id="mycart_total"><?php echo $mycart_total ?></strong>)</a></span>
<div id="mycart_info" class="cartdb none"></div>
<script type="text/javascript">mycart_info('mycart_info','member/ajax_cart.html');</script>
<?php } ?>
<br />
<a href="<?php echo $GLOBALS['WWW'] ?>index.php?c=member&a=out" class="m">退出登录</a><a href="<?php echo $GLOBALS['WWW'] ?>index.php?c=member" class="m">会员中心</a>
<?php } ?>