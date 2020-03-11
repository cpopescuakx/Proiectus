<!DOCTYPE html>
	<head>
	   @include('includes.head')
	</head>
	<body>
		<header class="row">
				@include('includes.header_unlogged')
		</header>
	<div>

	   <div id="main" >
	           @yield('content')
	   </div>

	</div>
	<div id="footerBO">
			@include('includes.footer_unlogged')
	</div>
	</body>
	@include('includes.footer-scripts')
</html>
