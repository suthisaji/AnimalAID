<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Core CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/shop-homepage.css" rel="stylesheet">
  <style>
  .si{
    font-size:16px;
  }


  </style>
</head>
  <body>
    <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="all">Animals A-I-D</a>
           </div>
           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                   <li>
                       <a href="dm">การบริจาคเงิน</a>
                   </li>
                   <li class="active">
                       <a  href="db"> การบริจาคเลือด</a>
                   </li>
                   <li>
                       <a href="da">หาบ้านให้สัตว์</a>
                   </li>
                   <li>
                       <a href="#">ติดตามสัตว์</a>
                   </li>
                   <li>
                       <a href="newsUser">ข่าว</a>
                   </li>
               </ul>

<!--check login yet-->
<ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
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

</ul>
<!--end check-->






           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>


  <div class="container">

      <div class="col-md-9">
        <div class="box box-success">
          <div class="panel-body box-header">
              <div class="col-md-12 lead si">ข้อมูลส่วนผู้ใช้
                <hr>
              </div>
            <div class="row">
              <div class="col-md-4 text-center">
                <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
              </div>
               <b>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="only-bottom-margin">ผู้ใช้  : {{$name}}<br></h2>
                  </div>
                </div>
                <div class="row si">
                  <div class="col-md-6">

                    <span class="text-muted ">รหัสผู้ใช้ <span> :{{ $userId}} <br>
                    <span class="text-muted">username :</span> {{$username}} <br>
                    <span class="text-muted">Email : </span>  {{$email}}<br><br>
                    <span class="text-muted">เบอรติดต่อ :</span>  {{$tel}}<br>
                    <span class="text-muted">สมัครเมื่อ :</span> {{$created}} <br>

                    <br>


                      <ul class="list-group ">

                    <li class="list-group-item list-group-item-info">
                  <span class="badge si">8 ครั้ง </span>
                  กิจกรรมที่เคยช่วยเหลือ
                    </li>
                    <li class="list-group-item list-group-item-info">
                  <span class="badge ">1,1111 ฿</span>
                  ยอดที่บริจาค
                    </li>
                      </ul>
                </div>
                </b>

              </div>
            </div>
          </div>
          <!--<div class="box-footer clearfix">-->
            <!--<div class="box-footer clearfix">-->

            <!--</div>-->
          <!--</div>-->
        </div>
      </div>
    </div>

</div>
</body>
</html>
