<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- ==========FONTAWSOME CDN LINK ================== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <!-- ============= CUSTOME CSS ===================== -->
    <style>
		*{
			font-family: 'Inter', sans-serif;
			font-weight: 400;
		}
	</style>
	@vite('resources/css/app.css')
</head>
<body>
	<div id="app">
        <App></App>
    </div>

	@vite('resources/js/app.js')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

</body>
</html>
