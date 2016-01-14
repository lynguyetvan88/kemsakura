	function menu_doc()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}
	
	
	
	
	
	
	
	
		function menu_doc1()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc1");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}
	
	
	
	
	
	
		function menu_doc2()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc2");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}
	
	
	
	
		function menu_doc3()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc3");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}
	
	
	
	
	
	
	
	
		function menu_doc4()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc4");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}
	
	
		function menu_doc5()
	{
		var link_anh="./template/images/arrow.gif";
		var id=document.getElementById("menu_doc5");
		var li=id.getElementsByTagName("li");
		for(i=0;i<li.length;i++)
		{
			var ul=li[i].getElementsByTagName("ul");
			if(ul.length!=0)
			{
				var a=li[i].getElementsByTagName("a")[0];
				var nd=a.innerHTML;
				//alert(nd);
				a.innerHTML=nd+ "<img src='"+link_anh+"' border='0' class='mnd_img'>";
			}
			li[i].onmouseover=function()
			{
				var ul=this.getElementsByTagName("ul");
				if(ul.length!=0)
				{
					ul[0].style.display="block";
				}
			}
			li[i].onmouseout=function(cc)
			{
				if(navigator.appName!="Microsoft Internet Explorer")
				{
					event=cc;
				}
				var element=this;
				if(event.toElement) {
				current_mouse_target 			 =event.toElement;
				}
				else
				{
					if(event.relatedTarget)
					{
						current_mouse_target 			 =event.relatedTarget;
					}
				}
				while(current_mouse_target.parentNode) {
					if(current_mouse_target!="null")
					{
						if((current_mouse_target = current_mouse_target.parentNode) == element){
							var zz=true;
						}
					}
				}
				if(!zz && element!=current_mouse_target)
				{
					var ul=this.getElementsByTagName("ul");
					if(ul.length!=0)
					{
						ul[0].style.display="none";
					}
				}
			}
		}
	}