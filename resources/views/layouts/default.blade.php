<!DOCTYPE html>
	<head>
	   @include('includes.head')
	</head>
	<body style="background-color: #eee">
		<header class="row">
				@include('includes.header')
		</header>
	<div class="content closed">

	   <div id="main" >
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
