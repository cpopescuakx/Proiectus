<!DOCTYPE html>
	<head>
	   @include('includes.head')
	</head>
	<body>
		<div class="wrapper d-flex align-items-stretch">
			<!-- SIDENAV -->
			<header class="headerCSSpropi row">
				@include('includes.header')
			</header>

			<!-- MAIN -->
			<div id="content" class="p-md-5 pt-5">
					@yield('content')
			</div>
		</div>
		
		<!-- FOOTER -->
		<div id="footerBO">
			@include('includes.footer')
		</div>
		@include('includes.footer-scripts') {{-- Los scripts van antes de cerrar el body --}}

		<!-- THIS PAGE's CUSTOM JS-->
		@yield('custom-scripts') {{-- yield per a incloure scripts personalitzats nomes en algunes pagines on ens interessi --}}
	</body>
</html>
