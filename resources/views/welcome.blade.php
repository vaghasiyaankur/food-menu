<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu</title>
	<!-- ==========FONTAWSOME CDN LINK ================== -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" /> --}}
    <!-- ============GOOGLE FONTS LINK================== -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Abel&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/Quentin.ttf"> --}}

    <!-- ============= CUSTOME CSS ===================== -->
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7-bundle-rtl.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7-bundle.min.css') }}" />  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/css/framework7.ios.colors.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/css/framework7.ios.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	@vite('resources/css/app.css')
</head>
<body>
	<div id="app">
        <App></App>
    </div>
	@vite('resources/js/app.js')
	<!--============ BOOTSTRAP JS LINK ===============-->

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/js/framework7.min.js"></script> --}}
	{{-- <script src="{{ asset('js/framework7-bundle.min.js') }}"></script>  --}}
    {{-- <script src="{{ asset('js/framework7.min.js') }}"></script>  --}}
	{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
</body>
</html>