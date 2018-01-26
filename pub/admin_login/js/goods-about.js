window.onload = function(){
	var bannerBox=document.getElementById("bannerBox");
	var oul1=document.getElementsByClassName("banner")[0];
	var ali=oul1.getElementsByTagName('li');
	var oul12=document.getElementsByClassName('bannerControl')[0];
	var bli=oul12.getElementsByTagName('li');
	oul1.innerHTML+=oul1.innerHTML;
	var clientWidth=bannerBox.clientWidth;
	oul1.style.width=ali.length*clientWidth+'px';
	for(var i=0;i<ali.length;i++){
		ali[i].style.width=clientWidth+'px';
	}
	var disx=0; //手指按照下的坐标；
	var left=0; //图片拖动是的offsetleft值；
	var num=0;
	var timer=null;
	var iNow=0;
	var iNow1=0;
	
	oul1.addEventListener("touchstart",function(ev){
		clearInterval(timer)
		var ev=ev.changedTouches[0];
		num=Math.round(oul1.offsetLeft/clientWidth);
		oul1.style.transition="none";
		disx=ev.pageX;
		if(num==0){
			num=bli.length;
			oul1.style.left=-num*clientWidth+"px";
		}
		if(-num==ali.length-1){
			num=bli.length-1
			oul1.style.left=-num*clientWidth+"px";
		}
		left=this.offsetLeft;
	},false)
	oul1.addEventListener("touchmove",function(ev){
		clearInterval(timer)
		var ev=ev.changedTouches[0];
		oul1.style.left=ev.pageX-disx+left+"px";
	},false)
	
	oul1.addEventListener("touchend",function(ev){
		clearInterval(timer)
		var ev=ev.changedTouches[0];
		num=Math.round(oul1.offsetLeft/clientWidth);
		oul1.style.left=num*clientWidth+"px";
		oul1.style.transition="0.5s";
		for(var i=0;i<bli.length;i++){
			bli[i].className="";
		}
		bli[-num%bli.length].className='bannerControlChange';
	},false)
	
	
	timer=setInterval(change,2000)
	function change(){
		if(iNow==bli.length-1){
			iNow=0;
		}else{
			iNow++;
		}
		iNow1++;
		for(var i=0;i<bli.length;i++){
			bli[i].className="";
		}
		bli[iNow%bli.length].className='bannerControlChange';
		perfectMove(oul1,{left:-iNow1*clientWidth},function(){
			if(iNow==0){
				oul1.style.left=0+"px";
				iNow1=0;
			}
		})
	}
}
