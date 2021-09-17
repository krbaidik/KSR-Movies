<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page Not Found | {{$profile->name ?? ''}}</title>
	@if($profile)
    <link href="{{ asset('images/company_profile/'.$profile->fav_icon)}}" rel="icon">
  @endif
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

	<section style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2 text-center">
					<h1 style="font-size: 240px; margin: 0px; color: darkslateblue;">404</h1>
					<h3>Sorry, the page you were looking for was not found.</h3><p>Please go back to the <a href="{{route('index')}}" class="text-primary" style="font-weight: bold;"> Homepage</a>.</p>
				</div>
			</div>
		</div>
		
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>