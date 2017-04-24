<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Animal-AID-Admin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image-->
                    <a class="navbar-brand" href="{{ url('/all') }}">
                      {{--  {{ config('app.name', 'Laravel') }}--}}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Animal-AID
                    </a>
                    @if(!empty($admin))
                      @if($admin == true)

                      <a  class="navbar-brand" href="../add">&nbsp;&nbsp;&nbsp; เพิ่มการขอรับบริจาค &nbsp;&nbsp;</a> &nbsp;
                      <a class="navbar-brand" href="../animal">  รายชื่อสัตว์&nbsp;&nbsp; </a>&nbsp;
                      <a  class="navbar-brand" href="../addNews">   เพิ่มข่าว&nbsp;&nbsp;</a>&nbsp;
                      <a class="navbar-brand"  href="../n">   ข่าวทั้งหมด &nbsp;&nbsp;</a>&nbsp;
                      <a class="navbar-brand" href="../checkAdoption"> ตรวจสอบการขอรับเลี้ยงสัตว์ :<span style="color:red"> {{$countRecipientEachAdmin}}</span><a>&nbsp;



                      @endif
                    @endif

                    <a href="#"></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                            <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                        <ul class="dropdown-menu" role="menu">
                                                  <li>
                                                    <a   href="../adminProfile"> ข้อมูลส่วนตัว &nbsp;&nbsp; </a>
                                                  </li>
                                                      <li>
                                                          <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            ออกจากระบบ
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                              {{ csrf_field() }}
                                                            </form>
                                                          </li>
                                        </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
