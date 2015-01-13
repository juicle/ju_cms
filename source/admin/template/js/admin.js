$.ajaxSetup ({ 
    cache: false //关闭AJAX相应的缓存 
});
$(function(){
	$("#side_switch").click(function(){
		$("#left").hide();
		$("#main").contents().find(".right_body").css('margin-left',0);
		$(this).hide();
		$("#side_switchl").show();
	})
})
$(function(){
	$("#side_switchl").click(function(){
		$("#left").show();
		$("#main").contents().find(".right_body").css('margin-left',200);
		$(this).hide();
		$("#side_switch").show();
	})
	$(".top_nav ul li a").click(function(){
		$(".top_nav ul li a").removeClass();
        $(this).addClass('selected');
	});
	 $(".side a").click(function(){
			$(".side li a").removeClass();
	        $(this).addClass('selected');
		});
})

function JumpFrame(url1,url2){
	if(url1){$("#left").load("source/admin/template/left.php?val="+url1+"",function(){
$(".side a").click(function(){	   
		$(".side li a").removeClass();
        $(this).addClass('selected');
	});
})}	
if(url2){window.parent.main.location.href=url2;}
}



function closeWindow(){
	window.opener=null;
	window.open('','_self');
	window.close();
}
