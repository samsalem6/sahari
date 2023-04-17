<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Neon Admin Panel" />
		<meta name="author" content="Mahmoud Elnaggar" />

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">


		<title>{{ config('app.name', '') }} | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('admin/js/jquery-ui/css/smoothness/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin/js/jquery-ui/css/smoothness/jquery.ui.theme.css')}}">
		<link rel="stylesheet" href="{{ asset('admin/css/font-icons/entypo/css/entypo.css')}}">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{ asset('admin/css/neon-core.css')}}">
		<link rel="stylesheet" href="{{ asset('admin/css/neon-theme.css')}}">
		<link rel="stylesheet" href="{{ asset('admin/css/neon-forms.css')}}">
		@if ( app()->getLocale()  == 'ar' )
		<link rel="stylesheet" href="{{ asset('admin/css/neon-rtl.css')}}">
		@endif
		<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('admin/css/custom.css')}}">

		<script src="{{ asset('admin/js/jquery-1.11.3.min.js')}}"></script>

		<!--[if lt IE 9]><script src="{{ asset('admin/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

		<link rel="icon" href="{{ asset('/images/favicon.ico')}}">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')
	</head>
