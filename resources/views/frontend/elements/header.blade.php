<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Tech. Blog</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<link href="{{asset('public/frontend')}}/front-page-category/css/responsive.css" rel="stylesheet">
	<!-- Stylesheets -->
	<link href="{{asset('public/frontend')}}/front-page-category/css/styles.css" rel="stylesheet">

	<link href="{{asset('public/frontend')}}/common-css/bootstrap.css" rel="stylesheet">

	<link href="{{asset('public/frontend')}}/common-css/ionicons.css" rel="stylesheet">
	<link href="{{asset('public/frontend/common-css/swiper.css')}}" rel="stylesheet">


	<link href="{{asset('public/frontend')}}/layout-1/css/styles.css" rel="stylesheet">

	<link href="{{asset('public/frontend')}}/layout-1/css/responsive.css" rel="stylesheet">
	<link href="{{asset('public/frontend')}}/single-post-1/css/styles.css" rel="stylesheet">

	<link href="{{asset('public/frontend')}}/single-post-1/css/responsive.css" rel="stylesheet">



</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="{{asset('public/frontend')}}/images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="{{route('index')}}">Home</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Features</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- conatiner -->
	</header>
