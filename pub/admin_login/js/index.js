$(function(){
	var timer =null;
	timer = setInterval(function(){
		$('.notice-ul li').eq(0).appendTo('.notice-ul');
	},2000)
//	首页轮播
	var bannerTime=null;
	bannerTime = setInterval(function(){
		
		$('.banner-ul li').eq(0).appendTo('.banner-ul');
		$('.banner-ul li').eq(0).fadeOut(1500);
		$('.banner-ul li').eq(1).fadeIn(1500);
	},3000);

//	首页轮播2
	var bannerTime2 = null;

	banner2Time = setInterval(function(){
		$('.banner-2 ul li').eq(0).appendTo('.banner-2 ul');
		$('.banner-2 ul li').eq(0).fadeOut(1500);
		$('.banner-2 ul li').eq(1).fadeIn(1500);
	},3000);

 	
})