<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> cMEDIC</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" href="/assets/css/smartadmin-skins.min.css">
		<link rel="stylesheet" href="/assets/css/nred_style.css">
		<!-- <link rel="stylesheet" href="/assets/css/smartadmin-rtl.min.css">-->
		<link rel="stylesheet" href="/assets/css/demo.min.css">

		<!-- #FAVICONS 
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<link rel="apple-touch-icon" href="assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/img/splash/touch-icon-ipad-retina.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="/assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<style>
		html{
			background: none;
		}
		body { 
		  background: url(/img/bg-login.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		  z-index: 9999;
		}
		#extr-page{
			background: none;
		}
		#extr-page #main {
			background: none;
		}
		</style>
	</head>
	<body class="animated fadeInDown">
		<div id="main" role="main">
			<div id="content" class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-4">
						<div class="well no-padding">
						<ul class="list-inline text-center">
							<li>
								<img src="/img/logo.png" alt="" style="width:220px;">
							</li>
						</ul>
							@yield('content')							
						</div>
						@yield('error')
					</div>
				</div>
				<div class="row">
					<h5 class="text-center"> - Para una mejor experiencia es recomendable utilizar los siguientes navegadores -</h5>
					<p class="text-center"><a href="https://www.google.com/intl/es/chrome/browser/?hl=es" target="_blank" title="Chrome"><img src="/img/imgChrome.png" alt="" style="width: 50px;"></a><a href="http://www.mozilla.org/es-ES/firefox/new/" target="_blank" title="Firefox"><img src="/img/imgfirefox.png" alt="" style="width: 50px;"></a></p>
				</div>
			</div>
		</div>

		<!--================================================== -->	
		<script src="/assets/js/plugin/pace/pace.min.js"></script>
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="assets/js/libs/jquery-2.0.2.min.js"><\/script>');} </script>
	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="/assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->
		<script src="/assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
		<script src="/assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		<script src="/assets/js/app.min.js"></script>
		<!-- // <script src="{{ asset('assets/js/app/utilerias.js') }}"></script> -->
	</body>
</html>