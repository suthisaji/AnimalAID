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
.box1{
  position:absolute;
  bottom: 33px;
  right:82px;
}
.box2{
  position:absolute;
  bottom: 33px;
  right:30px;
}
.ri{
position:absolute;
  top: 91px;
    right:30px;
}
.po{
  position:relative;
  right:650px;
}
.col-lg-3 {
      padding: 1.25rem;
    width: 15%;
}
.container {
    width: 1600px;
}
.col-xs-9 {
    width: 100%;
}
.done{
      background-color: #2E64FE;
      color:#FFFFFF;
}
.t{
      font-size: 16px;
}
.huge{
    font-size: 18px;
}
.wait{
  background-color: #FFBF00;
  color:#FFFFFF;
}
.re{
  background-color:#FE2E64;
  color:#FFFFFF;
}

.re1{
  background-color:#A4A4A4;
  color:#FFFFFF;
}
.size18{
  font-size: 18px;
}
.b{
  background-color:aliceblue;
  color:#424242;
}
.b1{
  background-color:#FFFFEA   ;
  color:#424242;
}

    </style>
  </head>
  <body style="padding-top:0px;">
        <div class="container header   ">
    <div class=" header " style="background-color:#F2F2F2;">
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a class="navbar-brand "style="color:#6E6E6E;" href="/all">Animal-AID</a>
        <a class="navbar-brand"  style="color:#6E6E6E;" href="/admin">&nbsp;&nbsp;   การจัดการ &nbsp;&nbsp; </a>
      </nav>
    </div>


      @foreach($admins as $admin)
        @if($admin->admin_id ==$adminId  )
        <h2>  {{$admin->join_Hospital->hospital_name}} รหัส :  {{$adminId}} </h2>
       @endif
     @endforeach
     <br>
   </div>
       <div class="container ">
    <div class="col-lg-3 col-md-6 ">
                        <div class="panel panel-red">
                            <div class="panel-heading done">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$countDoneEachAdmin}}</div>
                                        <div class="t">  มีผู้รับเลี้ยงสัตว์แล้วทั้งหมด </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูรายละเอียด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                                    <div class="col-lg-3 col-md-6">
                                                        <div class="panel panel-red">
                                                            <div class="panel-heading wait">
                                                                <div class="row">
                                                                    <div class="col-xs-3">
                                                                        <i class="fa fa-support fa-5x"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-right">
                                                                        <div class="huge"> ตรวจสอบแล้ว {{$countWaitEachAdmin}} </div>
                                                                        <div>  จำนวนที่รอผู้รับเลี้ยง</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#">
                                                                <div class="panel-footer">
                                                                    <span class="pull-left">ดูรายละเอียด</span>
                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="panel panel-red">
                                                                          @if($countRecipientEachAdmin==0)
                                                                            <div class="panel-heading re1 ">
                                                                                <div class="row">
                                                                                    <div class="col-xs-3">
                                                                                        <i class="fa fa-support fa-5x"></i>
                                                                                    </div>
                                                                                    <div class="col-xs-9 text-right">
                                                                                        <div class="huge"> รอการตรวจสอบ {{$countRecipientEachAdmin}}</div>
                                                                                        <div>มีผู้ประสงค์จะขอรับเลี้ยงสัตว์</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          @else
                                                                            <div class="panel-heading re">
                                                                                <div class="row">
                                                                                    <div class="col-xs-3">
                                                                                        <i class="fa fa-support fa-5x"></i>
                                                                                    </div>
                                                                                    <div class="col-xs-9 text-right">
                                                                                        <div class="huge"> รอการตรวจสอบ {{$countRecipientEachAdmin}}</div>
                                                                                        <div>มีผู้ประสงค์จะขอรับเลี้ยงสัตว์</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          @endif
                                                                            <a href="#">
                                                                                <div class="panel-footer">
                                                                                    <span class="pull-left">ดูรายละเอียด</span>
                                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
</div>


{{--<h4>เฉพาะ รพ นี </h4>
  @foreach($admins as $admin)
    @if($admin->admin_id ==$adminId  )
      {{$admin->join_Hospital->hospital_name}}
   @endif
 @endforeach
     admin ID : {{$adminId}}<br>
              สัตว์ทั้งหมด : {{ $countAnimalEachAdmin }} ตัว all animal <br>
              มีสัตว์ไร้บ้านของรพนี้  : {{$countAdoptionEachAdmin}} ตัว all adoption <br>
              มีผูุ้รับเลี้ยงสัตว์แล้วทั้งหมด :  {{$countDoneEachAdmin}}คน <br>
              มีผู้ประสงค์จะขอรับเลี้ยงสัตว์ปัจจุบัน  :   {{$countRecipientEachAdmin}} คน รอการตรวจสอบ <br>
              ตรวจสอบแล้ว  : รอมารับจำนวน :  {{$countWaitEachAdmin}}  คน
--}}
  @php($x=0)
            <div class="container ">

                @foreach($recipient as $rec)
                  @if($adminId==$rec->join_Animal->admin_id)


                    @if($x%2==0)
                    <div class = "b">
                        @php($x++)
                    @else
                      <div class = "b1">
                          @php($x++)
                    @endif
                  <div class="group size18">
                    <div class="panel-heading ">ผู้ขอรับเลี้ยง</div>
                    <div class="panel-body  ">
                คุณ  {{$rec->join_User->name}}<br>
                รับเลี้ยงสตว์ชื่อ {{$rec->join_Animal->animal_name}} รหัสสัตว์ : {{$rec->animal_id}}<br>
                รพ :
                @foreach($animals as $animal)
                  @if($animal->animal_id==$rec->animal_id)

                    {{$animal->join_Admin->join_Hospital->hospital_name}}<br>
                  @endif
                @endforeach

                เบอร์:{{$rec->join_User->tel}}<br>
                email:{{$rec->join_User->email}}<br>
                ที่อยู่:{{$rec->address}}

                มารับวันที่ {!! str_replace('T', ' เวลา ',  $rec->date_time) !!}


            <form action="/checkAdoption" class="form" method="post" enctype="multipart/form-data">
                {{ Form::token() }}

                <div class="text-center">

                  <input type='hidden' name='adoption_id' value='{{$rec->adoption_id}}' />
                  <input type='hidden' name='address' value='{{$rec->address}}' />
                  <input type='hidden' name='date_time' value='{{$rec->date_time}}' />
                  <input type='hidden' name='animal_id' value='{{$rec->join_Animal->animal_id}}' />
                  <input type='hidden' name='user_id' value=' {{$rec->join_User->id}}' />
                  <input type='hidden' name='status' value='Wait' />
                  <input type='hidden' name='auth' value='{{$adminId}}'/>
                    <button class="btn btn-success po" >ยืนยันการขอรับเลี้ยง</button>
                        <a href="/deleteAdoptionTable/{{ $rec->animal_id }}" class="btn btn-warning po " onclick="return confirm('Please confirm again !!!')">ยกเลิก</a>
                </div>

            </form>


<br>


</div>
</div>


@endif
@endforeach
</div>
</div>

<div class ="container">
<div  class="col-md-3 ri">





          @foreach($adminChecked as $wait)
              <p class="lead">รอผู้รับเลี้ยง</p>
                  <div class="list-group">
            <p class="list-group-item">

                <i class="fa fa-comment fa-fw">ชื่อสัตว์  : {{$wait->join_Animal->animal_name}} &nbsp;รหัส:{{$wait->animal_id}} </i><br>

                                  <?php
                                    $now = new DateTime();
                                  $now->add(new DateInterval('P1D'));
                                      date_timezone_set($now, timezone_open('Asia/Bangkok'));
                                        $now2= $now->format('Y-m-dTH:i:s');

                                        $now3 = str_replace('ICT', 'T', $now2)
      ?>

                                       @if($wait->date_time <$now3)
                                         <span style="color:red">ไม่มารับภายใน{{str_replace('T', '  เวลา  ', $wait->date_time)}} </span><br>
                                  กรุณาตรวจสอบติดตาม
                                     @elseif($wait->date_time >$now3 ||$wait->date_time ==$now3)

                                      มารับวันที่{{str_replace('T', '  เวลา  ', $wait->date_time)}}<br>

                                       @endif





                {{--  มารับวันที่{{str_replace('T', '  เวลา  ', $wait->date_time)}}--}}







                  <div style=" background-color: #F1F1F1">
                  <form action="/checkAdoption" class="form" method="post" enctype="multipart/form-data">
                      {{ Form::token() }}

                      <div class="text-center">

                        <input type='hidden' name='adoption_id' value='{{$wait->adoption_id}}' />
                        <input type='hidden' name='address' value='{{$wait->address}}' />
                        <input type='hidden' name='date_time' value='{{$wait->date_time}}' />
                        <input type='hidden' name='animal_id' value='{{$wait->join_Animal->animal_id}}' />
                        <input type='hidden' name='user_id' value=' {{$wait->join_User->id}}' />
                        <input type='hidden' name='status' value='Done' />


                          <button class="btn btn-success" >มารับแล้ว</button>


                            <a href="/deleteAdoptionTable/{{ $wait->animal_id }}" class="btn btn-warning " onclick="return confirm('Please confirm again !!!')">ยกเลิก</a>

                      </div>

                  </form>
                </div>
    </p>
@endforeach
</div>






 <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
 </body>
</html>
