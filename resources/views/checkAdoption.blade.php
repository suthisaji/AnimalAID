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
  top: 33px;
    right:30px;
}
.po{
  position:relative;
  right:700px;
}
    </style>
  </head>
  <body>
    <h4>ทั้งโปรเจค</h4>
    สัตว์ทั้งหมด {{$animals->count()}} ตัว all animal<br>อันนี้เสด
    มีสัตว์ไร้บ้านทั้งหมด {{$animalsAdoptions->count()}} ตัว all adoption<br>อันนี้เสด
    มีผูุ้รับเลี้ยงสัตว์แล้วทั้งหมด adoption where done: {{ $countDone}}คนอันนี้เสด<br>
    มีผู้ประสงค์จะขอรับเลี้ยงสัตว์ปัจจุบัน   {{ $countRecipient }} คน รอการตรวจสอบ อันนี้เสด<br>
    ตรวจสอบแล้ว รอมารับ   {{ $countWait }}    คน-> เตือนแอดมิน อันนี้เสด
<hr>
<h4>เฉพาะ รพ นี้</h4>
     admin ID : {{$adminId}}<br>
              สัตว์ทั้งหมด {{ $countAnimalEachAdmin }} ตัว all animal ///อันนี้เสด<br>
              มีสัตว์ไร้บ้านของรพนี้ {{$countAdoptionEachAdmin}} ตัว all adoption ///อันนี้เสด<br>
              มีผูุ้รับเลี้ยงสัตว์แล้วทั้งหมด :  {{$countDoneEachAdmin}}คน ///อันนี้เสด<br>
              มีผู้ประสงค์จะขอรับเลี้ยงสัตว์ปัจจุบัน     {{$countRecipientEachAdmin}} คน รอการตรวจสอบ ///อันนี้เสดตรวจอีกครั้ง<br>เตือนแอดมินเสด
              ตรวจสอบแล้ว  : รอมารับจำนวน   {{$countWaitEachAdmin}}  คน->///อันนี้เสด



              <hr>

                @foreach($recipient as $rec)
                  @if($adminId==$rec->join_Animal->admin_id)
                  <div class="group">
                    <div class="panel-heading">ผู้รับขอรับเลี้ยง</div>
                    <div class="panel-body">
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
                </div>

            </form>


<br>
<hr>

</div>
</div>

@endif
@endforeach

<div  class="col-md-3 ri">
    <p class="lead">List of Donors</p>
    มารับเรียบร้อยแล้ว  {{$adoptionDone->count()}}  ตัว<br>
    รอมารับ    {{$adminChecked->count()}}           ตัว(ยืนยันแล้วแต่ยังไม่มารับ)
        <div class="list-group">
          @foreach($adminChecked as $wait)
            <p class="list-group-item">

                <i class="fa fa-comment fa-fw">{{$wait->join_Animal->animal_name}} &nbsp;รหัส:{{$wait->animal_id}} </i><br>

                  มารับวันที่{{str_replace('T', '  เวลา  ', $wait->date_time)}}
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






 <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
 </body>
</html>
