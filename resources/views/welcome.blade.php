<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- ==========FONTAWSOME CDN LINK ================== -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" /> --}}
    <!-- ============GOOGLE FONTS LINK================== -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Abel&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/Quentin.ttf"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <!-- ============= CUSTOME CSS ===================== -->
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7-bundle-rtl.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/framework7-bundle.min.css') }}" />  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/css/framework7.ios.colors.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/css/framework7.ios.min.css" /> --}}
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

    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>

    
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyBfphAIxpzsJDUuCCOhF6DtZKqUPxgj-wA",
        authDomain: "fir-test-25564.firebaseapp.com",
        projectId: "fir-test-25564",
        storageBucket: "fir-test-25564.appspot.com",
        messagingSenderId: "1064311492584",
        appId: "1:1064311492584:web:4842b73ccef0b65aeade5d",
        measurementId: "G-B3L0LYKB05"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            
            const tokens = document.head.querySelector('meta[name="csrf-token"]');

            const headers = {
            'X-CSRF-TOKEN': tokens.content,
            'Access-Control-Allow-Origin': '*',
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            };

            // axios.post("{{ route('fcmToken') }}",{
            //     _method:"PATCH",
            //     token,
            // }, headers).then(({data})=>{
            //     console.log(data)
            // }).catch(({response:{data}})=>{
            //     console.error(data)
            // })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: '{{ route("fcmToken") }}',
                type: 'POST',
                data: {
                    token: token
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log('Token saved successfully.');
                },
                error: function (err) {
                    console.log('User Chat Token Error'+ err);
                },
            });

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();
  
    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script>

	<!--============ BOOTSTRAP JS LINK ===============-->

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.5.2/js/framework7.min.js"></script> --}}
	{{-- <script src="{{ asset('js/framework7-bundle.min.js') }}"></script>  --}}
    {{-- <script src="{{ asset('js/framework7.min.js') }}"></script>  --}}
	{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
</body>
</html>
