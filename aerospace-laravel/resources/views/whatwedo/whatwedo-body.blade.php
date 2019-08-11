@extends('whatwedo.whatwedo-layout')
@section('whatwedo-body')
<body class="page page-id-6 cookies-not-set woocommerce-no-js what-we-do">
    {{-- what-we-do-navbar --}}
    @include('static.navbar')
    {{-- what-we-do-header --}}
    @include('static.header')
    {{-- what-we-do-article --}}
    @include('whatwedo.whatwedo-article')
    {{-- what-we-do-footer --}}
    @include('static.footer')
    {{-- what-we-do-script --}}
    @include('static.script')
    {{-- what-we-do-cookiesnotice --}}
    
 </body>
 @endsection