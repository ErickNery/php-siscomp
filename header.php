<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SisComp</title>
  <meta name="description" content="Sistema de gerenciamento de competições" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script type="text/javascript" src="/js/functions.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
		if(document.getElementById('navegation_menu') == null)
		{
			var login_link = document.getElementById('login_link'); 
			login_link.href = "login.php";
			login_link.innerHTML="Login";
			document.getElementById('content').style.width = "100%";
		}
    });
	
  </script> 
</head>

<body>
  <div id="main">

	<div id="menubar">
	  
	  <div id="welcome">
	    <h1><a href="#">SisComp</a></h1>
	  </div><!--close welcome-->
      
	  <div id="menu_items">
	    <ul id="menu">
          <li class="current"><a href="/index.php">Principal</a></li>
          <li><a href="#">Quem somos</a></li>
          <li><a href="#">Projetos</a></li>
          <li><a href="#">Contatos</a></li>
          <li><a href="/logout.php" id="login_link" >Logout</a></li>
        </ul>
      </div><!--close menu-->
	  
    </div><!--close menubar-->	
    
	<div id="site_content">		

	  <div id="banner_image">
	    <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="/images/home_1.jpg" alt="" />
            <img src="/images/home_2.jpg" alt="" />
		  </div><!--close slider-->
		</div><!--close slider_wrapper-->
	  </div><!--close banner_image-->	
