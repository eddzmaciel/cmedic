<html lang="en" class="demo-3 no-js">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="/menu/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="/menu/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="/menu/css/component.css" />
		<script src="/menu/js/snap.svg-min.js"></script>		
	</head>
	<body style="background: #EDEDED;">
		<div class="container">
			<section id="grid" class="grid clearfix" style="margin: 10px auto 120px;">
				<p align="center"> 
					<img src="/img/logo_title.png" alt="" style="width:185px;">				
				</p>
				<a href="/#contabilidad/inicio" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
					<figure>
						<img src="/menu/img/contabilidad.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2>Contabilidad</h2>
						</figcaption>
					</figure>
				</a>						
				<a href="/#facturacion/inicio" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
					<figure>
						<img src="/menu/img/facturacion.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2>Facturaci&oacute;n</h2>							
						</figcaption>
					</figure>
				</a>
			</section>			
		</div><!-- /container -->
		<script>
			(function() {
	
				function init() {
					var speed = 300,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
	</body>
</html>