<div class="content-wrapper" id="mobile_visualisation_content_wrapper">

    <div id="mobile_header_div" style="left:0px;width: 100%;">

        @include('template/mobile/header/user_informations')        

        @if($_SERVER['REQUEST_URI'] ==  "/mobile")
            @include('template/mobile/header/horizontal_menu')
        @endif

    </div>

    @yield('main_section')

</div>
