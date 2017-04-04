<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Core CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/css/shop-homepage.css" rel="stylesheet">
    <style type="text/css">
        .carousel-inner > .item > img {
  width:700;
  height:300px;
}
.thumbnail img {
    width:100% !important;
    height: 200px !important;
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
                       <a href="dm">Funding donation</a>
                   </li>
                   <li>
                       <a href="db">Blood donation</a>
                   </li>
                   <li>
                       <a href="da">Home for animals</a>
                   </li>
                   <li>
                       <a href="#">Follow</a>
                   </li>
                   <li>
                       <a href="#">News</a>
                   </li>
               </ul>
           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>

   <!-- Page Content -->
   <div class="container">

       <div class="row">

           <div class="col-md-9">

               <div class="row carousel-holder">

                   <div class="col-md-12">
                       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>
                           <div class="carousel-inner">
                             @foreach($animalsBloods as $pic)

                                    @if($loop->first)
                                      <div class="item active">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="">
                                      </div>
                                    @else
                                      <div class="item">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="">

                                      </div>
                             @endif
                           @endforeach
                        จะแสดงข่าวตรงนี้
                           </div>
                           <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                           </a>
                           <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                           </a>
                       </div>
                   </div>

               </div>



               <div class="row">

                  @foreach($animalsBloods as $animal)
                   <div class="col-sm-4 col-lg-4 col-md-4">
                       <small>{{$animal->created_at}}</small>
                       <div class="thumbnail">
                           <img src="{{url('/images/'.$animal->animal_picture)}}" alt="">
                           <div class="caption">
                             {{$animal->join_donationType->do_typeName}}
                               <h4><a href="#">{{$animal->animal_name}}</a>
                               </h4>
                               <p>{{$animal->animal_type}}</p>
                               <p>{{$animal->symptomCase}}</p>
                               <div class="col-sm-4 col-lg-4 col-md-4">
                                      <a class="btn btn-primary" target="_blank" href="">View All</a>
                                  </div>
                           </div>
                       </div>
                     </div>
                @endforeach









               </div>

           </div>
               <div class="col-md-3">
                   <p class="lead">List of Donors</p>
                       <div class="list-group">
                           <p class="list-group-item">
                               <i class="fa fa-comment fa-fw">Jutatip</i>
                               <span class="pull-right text-muted samll">
                                   <em>$100</em>
                               </spen>
                   </p>

                   <p class="list-group-item">
                       <i class="fa fa-comment fa-fw">Suthisa</i>
                       <span class="pull-right text-muted samll">
                           <em>$100</em>
                       </spen>
                   </p>
                   <p class="list-group-item">
                       <i class="fa fa-comment fa-fw">Chanon</i>
                       <span class="pull-right text-muted samll">
                           <em>$100</em>
                       </spen>
                   </p>
               </div>
           </div>


       </div>

   </div>
   <!-- /.container -->

   <div class="container">

       <hr>

       <!-- Footer -->
       <footer>
           <div class="row">
               <div class="text-center col-lg-12">
                   <p>Copyright &copy; Your Website 2014</p>
               </div>
           </div>
       </footer>

   </div>
   <!-- /.container -->




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
    </body>
</html>
