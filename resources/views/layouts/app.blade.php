<!DOCTYPE html>
<html>
<head>
	<!-- bootstrap css CDN -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- bootstrap js CDN -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://pt.surveymonkey.com/r/ZD3YSP3"></script>


	<style type="text/css">
		html, body {
		    margin: 0;
		    height: 100%;
		    background-image: linear-gradient(to right bottom, #051937, #004f75, #008b9d, #00c8a1, #a7ff8e);
		}

		.completed {
			text-decoration: line-through;
			color: rgb(100,100,100);
		}

		.modeSelected {
			border:2px solid black;
		}
	</style>

	<title>Todo List</title>
</head>
<body>
	<div class="d-flex justify-content-center" style="height: 100%"> 
		<div class="col-md-offset-2 col-md-8" style="max-width: 750px; align-self: center">
			<div class="form-row justify-content-center">
				<h1>Todo List</h1>
			</div>

			@yield('content')
			

		</div>

	</div>


	 @yield('footer')
</body>
</html>