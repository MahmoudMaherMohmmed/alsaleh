<!-- Icons css -->
<link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
@if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css-rtl/sidemenu.css')}}">
@else
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css/sidemenu.css')}}">
@endif

<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
    body {
        font-family: 'Cairo' !important;
    }
</style>

@yield('css')

@if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
@else
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/assets/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css/skin-modes.css')}}" rel="stylesheet">
@endif