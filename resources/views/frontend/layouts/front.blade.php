<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1, user-scalable=0">
<title>@yield('title')</title>
<!-- CSS Files -->
<link rel="stylesheet" href="{{URL::asset('assets/css/1.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<link href="{{URL::asset('assets/css/custom.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/responsive.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/color.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/all.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/prettyPhoto.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/sidebarNavigation.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/font-awesome.css')}}" rel="stylesheet">
<link rel="icon" href="{{URL::asset('assets/images/favicon.png')}}" type="image/png">
	
<!-- JS -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]
function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},                  'google_translate_element');
            }-->
<style>
	.sticky {
      position: fixed;
      top: 0;
      width: 100%;
    }
    .sticky + .content {
      padding-top: 60px;
    }
body {
  font-family: "Lato", sans-serif;
}
.openbtn{
	display:none;
	}
	.navbar-brand{
  display: none;
}
	
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  background-color: #790000;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  opacity:0.9;
}

	
.overlayfix{
	 z-index: -1;
     position:relative;
	  }

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #ffffff;
  display: block;
  transition: 0.3s;
  z-index: 10;
 
}

.sidebar a:hover {
  color: #ffa726;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color:  #790000;
  color: white;
  padding: 10px 15px;
  border: none;
  float:right;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
 /* padding: 16px;*/
}
	
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
		
}
	  @media screen and (max-width: 900px) {

	.openbtn{
	  display:block;}
		  	.navbar-brand{
  display: block;
}
}
body {
  background-color:white;
  transition:0.5s;
}

.overlay.enabled {
  display: initial;
}

	
.sidebar li{
  border-bottom: 1px solid white;
}
.sidebar li:last-child{
  border: none;
 }
</style>
</head>
<body>
    <div class="overlay enabled">
		</div>
	<div id="mySidenav" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 
              <a href="/">Home</a>
              <a href="/about">About</a>
              <a href="/ournews">News</a>
              <a href="/ourevents">Events</a>
              <a href="/ourstaff">Staff</a>
              <a href="">Members</a>
              <a href="/downloads">Downloads</a>
              <a href="/contactinfo">Contact Information</a>
              <a href="/contact">Contact Us</a>
</div>
	
<!--Wrapper Start-->
<div class="wrapper" id="main">
  <!--Header Start-->
  <header class="wf100 header ">
    <div class="topbar">
      <div class="container">
		  <div id="imglogo" class="col-md-8"><a href="/"><img style="margin-top:0px;" src="{{URL::asset('assets/images/logo.png')}}" /></a> 
          </div>
            <div  class="pull-right" id="otr">
              <div class="form-group">

                <div  id="google_translate_element" ></div>



          <script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                  pageLanguage:'en',
                  includedLanguages: 'en,si,ta', 
                  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 
                'google_translate_element');
}
          </script>
          <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

      <div id="act" class="clearfix"> 
                  <a style="margin-top: 5px;" id="lginbtn" href="/login" class="btn btn-default form-control">Member Login</a><br>
                  <form action="{{URL::to('/search')}}" method="POST" role="search" >
                    {{csrf_field()}}
                      
                        <input id="sfield" style=" border-radius: 5px;width: 100%;height: 34px;" type="text" class="form-grou" placeholder="Search memeber" aria-label="Recipient's username" name="q" aria-describedby="basic-addon2">

                      <input id="sbtnm" style="display:none; width: 100px;" class="btn btn-default pull-right" type="submit" value="Find">
                     
                      

                 
                  </form>



                </div>
</div>
            </div>
        </div>
      </div>

<nav id="mnav" class="navbar navbar-default"  >
        <div id="nnn" class="container-fluid" >
			<a class="navbar-brand" href="#">@yield('title')</a>
          <!-- Brand and toggle get grouped for better mobile display -->
          <div id="nm" class="navbar-header">
             <button  class="openbtn " onclick="openNav()" >☰</button>
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul id="itms" class="nav navbar-nav">

              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/ournews">News</a></li>
              <li><a href="/ourevents">Events</a></li>
              <li><a href="/ourstaff">Staff</a></li>
              <li><a href="">Members</a></li>
              <li><a href="/downloads">Downloads</a></li>
              <li><a href="/contactinfo">Contact Information</a></li>
              <li><a href="/contact">Contact Us</a></li>

            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  </header>
<!--div class="overlayfix"></div-->
  @yield('content')
	
  <footer class="footer wf100 dekstop">
    <div class="container">
      <div class="row">
        <div id="cpr" class="pull-left">
          <p class="copyr">Copyright © 2019. Ceylon Electricity Board Technician Union Developed By <a id="lnk" target="_blank" href="https://www.cisworld.lk/">CIS WORLD</a></p>
          </div>

        <div class="soci">
          <ul  class="footer-social">

              <li><a id="andro" href="https://play.google.com/store/apps/details?id=com.cebtuappnew&hl=en" target="_blank" class="">
              <img style="" src="{{URL::asset('assets/images/g1.png')}}">
            </a></li>
            <li><a id="aple" href="" class="">
              <img style="" src="{{URL::asset('assets/images/a1.png')}}">
            </a></li>

            <li><a id="lgb" href="/admin/login" class="btn btn-default btn-sm">Login</a></li>
            <li id="f"><a href="https://www.facebook.com/%E0%B6%BD%E0%B6%82%E0%B6%9A%E0%B7%8F-%E0%B7%80%E0%B7%92%E0%B6%AF%E0%B7%94%E0%B6%BD%E0%B7%92%E0%B6%B6%E0%B6%BD-%E0%B6%B8%E0%B6%AB%E0%B7%8A%E0%B6%A9%E0%B6%BD%E0%B6%BA%E0%B7%9A-%E0%B6%9A%E0%B7%8F%E0%B6%BB%E0%B7%8A%E0%B6%B8%E0%B7%92%E0%B6%9A-%E0%B7%81%E0%B7%92%E0%B6%BD%E0%B7%8A%E0%B6%B4%E0%B7%93%E0%B6%B1%E0%B7%8A%E0%B6%9C%E0%B7%9A-%E0%B7%83%E0%B6%82%E0%B6%9C%E0%B6%B8%E0%B6%BA-cebtu-333136890914507/" class="fb" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/login" class="tw" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/?hl=en" class="insta" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://lk.linkedin.com/" class="linken" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li id="y"><a href="https://www.youtube.com/" class="yt"><i class="fab fa-youtube" target="_blank"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
	
  <footer class="footer wf100 mobile" >
    <div class="container">
      <div class="row">


        <div class="soci pull-left">
          <ul  class="footer-social">

              <li><a id="andro" href="https://play.google.com/store/apps/details?id=com.cebtuappnew&hl=en" class="" target="_blank">
              <img style="" src="{{URL::asset('assets/images/g1.png')}}">
            </a></li>
            <li><a id="aple" href="" class="">
              <img style="" src="{{URL::asset('assets/images/a1.png')}}">
            </a></li>

            <li><a id="lgb" href="/admin/login" class="btn btn-default btn-sm">Login</a></li>
            <li id="f"><a href="https://www.facebook.com" class="fb" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/login" class="tw" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/?hl=en" class="insta" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://lk.linkedin.com/" class="linken" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li id="y"><a href="https://www.youtube.com/" class="yt"><i class="fab fa-youtube" target="_blank"></i></a></li>
          </ul>
        </div>

        <div id="cpr" >
          <p class="copyr">Copyright © 2019. Ceylon Electricity Board Technician Union Developed By <a id="lnk" href="https://www.cisworld.lk/">CIS WORLD</a></p>
          </div>

        
      </div>
    </div>
  </footer>
	


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>



<script type="text/javascript">
	// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("mnav");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
} 
</script>

<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{URL::asset('assets/js/custom.js')}}"></script>
	<script src="{{URL::asset('assets/js/sidebarNavigation.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="{{URL::asset('assets/images/1.png')}}" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css("z-index","99999").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>
<script>
$(document).ready(function(){
	
	$(document).on('click','.pagination a',function(event){
	
	     event.preventDefault();
		 var page =$(this).attr('href').split('page=')[1];
		fetch_data(page);
		    $.ajax({
			    url:"/ourstaff/fetch_data?page="+page,
				success:function(data){
			       $('#staff_data').html(data);
				}
				
			
			});
		
	});
	
	function fetch_data(page){
		
	}
	
});
</script>
<script>
$(document).ready(function(){
	
	$(document).on('click','.pagination a',function(event){
	
	     event.preventDefault();
		 var page =$(this).attr('href').split('page=')[1];
		fetch_data(page);
		    $.ajax({
			    url:"/ournews/fetch_data?page="+page,
				success:function(data){
			       $('#news_data').html(data);
				}
				
			
			});
		
	});
	
	function fetch_data(page){
		
	}
	
});
</script>
<script>
$(document).ready(function(){
	
	$(document).on('click','.pagination a',function(event){
	
	     event.preventDefault();
		 var page =$(this).attr('href').split('page=')[1];
		fetch_data(page);
		    $.ajax({
			    url:"/ourevents/fetch_data?page="+page,
				success:function(data){
			       $('#event_data').html(data);
				}
				
			
			});
		
	});
	
	function fetch_data(page){
		
	}
	
});
</script>
	
	 <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px"; 
 document.body.style.backgroundColor = "rgba(0,0,0,0.2)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

  </body>
</html>
