
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
        <POS></POS>
    </div>
	@vite('resources/js/pos.js')
</body>
</html>
