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
    สัตว์ทั้งหมด   : {{$animals->count()}} ตัว all animal<br
    มีสัตว์ไร้บ้านทั้งหมด  : {{$animalsAdoptions->count()}} ตัว all adoption<br>
    มีผูุ้รับเลี้ยงสัตว์แล้วทั้งหมด adoption where done: {{ $countDone}} คน<br>
    มีผู้ประสงค์จะขอรับเลี้ยงสัตว์ปัจจุบัน :   {{ $countRecipient }} คน รอการตรวจสอบ <br>
    ตรวจสอบแล้ว รอมารับ  :  {{ $countWait }}    คน-> เตือนแอดมิน
<hr>








 <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="https://blackrockdigital.github.io/startbootstrap-shop-homepage/js/bootstrap.min.js"></script>
 </body>
</html>
