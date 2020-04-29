<!DOCTYPE html>
	<head>
	   @include('includes.head')
	</head>
	<body>

	<div class="wrapper d-flex align-items-stretch">
		<header class="headerCSSpropi row">
			@include('includes.header')
		</header>

	   <div id="content" class="p-4 p-md-5 pt-5">
	           @yield('content')
	   </div>
	</div>

	<div id="footerBO">
			@include('includes.footer')
	</div>
		@include('includes.footer-scripts') {{-- Los scripts van antes de cerrar el body --}}

        <!-- THIS PAGE's CUSTOM JS-->
        @yield('custom-scripts') {{-- yield per a incloure scripts personalitzats nomes en algunes pagines on ens interessi --}}
	</body>
</html>
