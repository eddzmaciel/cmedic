<!DOCTYPE html>
<html lang="en-us" class="">	
	<head>
		<meta charset="utf-8">
		<title> cMEDIC </title>
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-control" content="no-cache">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{{ csrf_token() }}}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/smartadmin-skins.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/nred_style.css') }}">
		<!-- <link rel="stylesheet" href="{{ asset('assets/css/naus_life.css') }}"> -->
		<link rel="shortcut icon" href="{{ asset('img/cfavicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('img/cfavicon.ico') }}" type="image/x-icon">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<link rel="apple-touch-icon" href="{{ asset('assets/img/splash/sptouch-icon-iphone.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/splash/touch-icon-ipad.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/splash/touch-icon-iphone-retina.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/splash/touch-icon-ipad-retina.png') }}">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="apple-touch-startup-image" href="{{ asset('assets/img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="{{ asset('assets/img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{ asset('assets/img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="assets/js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>
		<style>
			.menu-on-top #main {
			    margin-left: 0!important;
			    margin-top: 0px!important;
			}
			.select2-hidden-accessible{
				display: none !important; 
    			visibility: hidden !important;
			}
		</style>
	</head>
	<body class="nredbugs">
		@include('helper.header')
		@if (Auth::user()->role_id == 1)
		    @include('helper.sidebar_contabilidad')
		@endif
		@include('helper.main_panel')



		<script src="{{ asset('assets/js/app.config.js') }}"></script>
		<script src="{{ asset('js/utilerias.js') }}"></script>
		<!-- // <script src="{{ asset('js/app_nauslife.js') }}"></script> -->
		@if (Auth::user()->role_id == 1)
			<script src="{{ asset('js/app_contabilidad.js') }}"></script>
		@endif
		<script src="{{ asset('assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/notification/SmartNotification.min.js') }}"></script>
		<script src="{{ asset('assets/js/smartwidgets/jarvis.widget.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/select2/select2.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/fastclick/fastclick.min.js') }}"></script>
		<script src="{{ asset('assets/js/app.min.js') }}"></script>
		<script src="{{ asset('assets/js/speech/voicecommand.min.js') }}"></script>

				<!-- PAGE RELATED PLUGIN(S) -->
		<script src="{{ asset('assets/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/js/plugin/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

		<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->
		<script src="{{ asset('assets/js/plugin/chartjs/chart.min.js') }}"></script>

		

		<script type="text/javascript">			
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>

	</body>

</html>