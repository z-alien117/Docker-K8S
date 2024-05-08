<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	{{-- Stylesheets --}}
	@section('styles')
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
		@vite('resources/css/app.css')
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/DataTables/datatables.min.css')}}">
	@show

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	{{-- Document Title --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>DEMO</title>

</head>

	<body class="stretched side-header">

		{{-- Document Wrapper --}}
		<div id="wrapper" class="clearfix">

			{{-- Header --}}
			@yield('navbar')
			{{-- #header end --}}

			{{-- Content --}}
			<section id="content">
				<div class="content-wrap py-0">
                    @yield('page-title')
					@yield('content')

				</div>
			</section>
			{{-- Content end --}}

            {{-- BEGIN MODAL --}}
            <div id="DynamicModal"></div>
            {{-- END MODAL --}}

			{{-- Footer --}}
			@include('layouts.footer')
			{{-- #footer end --}}

		</div>
		{{-- #wrapper end --}}

		@section('scripts')
			{{-- JavaScripts --}}
			<script src="{{asset('layout/js/jquery.js')}}"></script>
			<script src="{{asset('layout/js/plugins.min.js')}}"></script>
            {{-- @vite('resources/js/app.js') --}}

			{{-- Footer Scripts --}}
			<script src="{{asset('layout/js/functions.js')}}"></script>
            <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('plugins/DataTables/datatables.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('layout/js/components/bs-datatable.js')}}"></script>
			<script src="{{asset('js/helpers.js')}}"></script>
		@show

	</body>
</html>