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
    #modal-content{
      display: none;
    }
        .carousel-inner > .item > img {
  width:700;
  height:300px;
}

.thumbnail img {
    width:100% !important;
    height: 200px !important;

    .caption{
      height: 150px;

    }
    .thumbnailjam img {
        width:100% !important;
        height: 300px !important;
    }
    .modal-title {

        text-align: left;
    }
    .modal-body {

        text-align: left;
    }
}
.popover{
  max-width: none;
  width: 300px;
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
                       <a href="n">News</a>
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
                             @foreach($animalsAdoptions as $pic)

                                    @if($loop->first)
                                      <div class="item active">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="" a href="_blank">
                                      </div>
                                    @else
                                      <div class="item">
                                          <img class="slide-image" src="{{url('/images/'.$pic->animal_picture)}}" alt="">

                                      </div>
                             @endif
                           @endforeach





                                                       @foreach($newsAnis as $fastNews)
                                                         @if($fastNews->news_type == 1)
                                                           <marquee>  "{{$fastNews->head_News}} " &nbsp;{{$fastNews->content}}</marquee>

                                                         @endif

                                                          @endforeach


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

                  @foreach($animalsAdoptions as $animal)
                   <div class="col-sm-4 col-lg-4 col-md-4">
                       <small>{{$animal->created_at}}</small>
                       <div class="thumbnail">
                           <img src="{{url('/images/'.$animal->animal_picture)}}" alt="">
                           <div class="caption">
                             {{$animal->join_donationType->do_typeName}}
                               <h4><a href="#">{{$animal->animal_name}}</a>
                               </h4>

                               {{$animal->animal_type}}<br>
                               {{$animal->symptomCase}}





                               <!-- Button trigger modal -->
                             <div class="row text-right">
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$animal->animal_id}}">
                             view detail</a>
                           </button>
                           <button type="button" class="btn btn-primary btn-sm">Help</button>
                           <!--Modal-->
                           <div class="modal fade" id="myModal{{$animal->animal_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel" >{{$animal->join_donationType->do_typeName}} to  {{$animal->animal_type}} </h4>
                                 </div>
                                 <div class="modal-body thumbnailjam">
                                    <img src="{{url('/images/'.$animal->animal_picture)}}" alt="" width="200" height="500">
                                   Donation Type:{{$animal->join_donationType->do_typeName}}<br>
                                   Name Animal:{{$animal->animal_name}}<br>
                                   age        :{{$animal->animal_age}}<br>
                                   Animal Type:{{$animal->animal_type}}<br>
                                   Color :{{$animal->animal_color}}<br>
                                   @if($animal->animal_gender == 1)
                                       Gender :Male<br>
                                   @else
                                       Gender :Female<br>
                                   @endif

                                   SymptomCase :{{$animal->symptomCase}}<br>
                                   StatusDonation:{{$animal->statusDonation}}<br>



                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                   <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" data-placement="top">รับเลี้ยง</button>
                                   <div id="modal-content">
                                     @if (Auth::guest())
                                       <a href="{{ route('login') }}" class="btn btn-sm btn-success">Login</a>
                                       <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register</a>
                                     @else
                                     <form class="form" action="/addAdoption" method="post">
                                       <input type="hidden" name="animal_id" value="{{$animal->animal_id}}">
                                         {{ Form::token() }}
                                         <div class="form-group">
                                             <label for=""> <h4 style="color:blue;"> Thank you !&nbsp; {{Auth::user()->name}}</h4> </label>
                                         </div>
                                         <div class="form-group">
                                             <label for="">phone number can edit</label>
                                             <input class="form-control" type="tel" name="tel" value="{{Auth::user()->tel}}"/>

                                         </div>
                                         <div class="form-group">
                                              <label for="address">Address for pet</label>
                                              <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        </div>

                                         <div class="form-group">
                                             <label for="date" class="form-label">Date & Time to receive</label>
                                             <input type="datetime-local" class="form-control" name="date_time"  value="2011-08-19T13:45:00" />
                                         </div>
                                         <div class="form-group">
                                             Please waiting for contact back by email or phonenumber

                                         </div>

                                         <div class="text-center">
                                             <button class="btn btn-success">Add Address</button>
                                         </div>
                                     </form>
                                   @endif
                                 </div>



                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                           </div>
                       </div>
                     </div>
                @endforeach

  <!-- Modal -->


//{{$animal->animal_id}}




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

    <!--<script src="tether-1.3.3\dist\js\tether.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
    <script>
          $('[data-toggle="popover"]').popover({
            html: true,
            title: 'Please add Your address ',
            content: function(){
                return $('#modal-content').html()
            }
          })
    </script>
    </body>
</html>
