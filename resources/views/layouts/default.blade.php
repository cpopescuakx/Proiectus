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

	<div id="footerBO" style="bottom:0;">
			@include('includes.footer')
	</div>

	</body>
	@include('includes.footer-scripts')
</html>
