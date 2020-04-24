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
</div>
	<div id="footerBO">
			@include('includes.footer')
	</div>
	</body>
	@include('includes.footer-scripts')
</html>
