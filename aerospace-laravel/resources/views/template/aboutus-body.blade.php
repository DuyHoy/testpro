@extends('template.about-layout')
@section('aboutus-body')
<body class="page page-id-2 cookies-not-set woocommerce-no-js about-us">
    {{-- aboutus-navbar --}}
    @include('static.navbar')
    {{-- aboutus-header --}}
    @include('static.header')
    {{-- aboutus-article --}}
    @include('template.aboutus-article')   
    
     {{-- aboutus-footer --}}
    @include('static.footer')
    {{-- aboutus-script --}}
    @include('static.script')
    {{-- aboutus-cookiesnotice --}}
 </body>
 @endsection