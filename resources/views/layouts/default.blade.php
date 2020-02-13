<!DOCTYPE html>
	<head>
	   @include('includes.head')
	   
	</head>
	<body>
		<header class="row">
				@include('includes.header')
		</header>
	<div class="content closed">

	   <div id="main" >
	           @yield('content')
	   </div>

	</div>
	<footer class="row">
			@include('includes.footer')
	</footer>
	</body>
	@include('includes.footer-scripts')
</html>
