<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

 @vite(['resources/css/app.css', 'resources/js/app.js'])
 
<!-- Bootstrap CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('jquery-ui-1.13.2/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{asset('css/custom.css')}}" rel="stylesheet">

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('jquery-ui-1.13.2/jquery-ui.min.js')}}"></script>

<title>{{ $title }}</title><!--------------- タイトル------------- -->

{{ $css }}

</head>
<body>
@include('layouts.navigation_guest')
{{ $main }}

@include('layouts.footer')

{{ $script }}
</body>
</html>