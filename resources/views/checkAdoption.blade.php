


 @foreach($adoptions as $a)
{{$a->animal_id}}
@endforeach

มีสัตว์ไร้บ้านทั้งหมด  {{$a->count()}} ตัว all adoption
มีผูุ้รับเลี้ยงสัตว์แล้วทั้งหมด adoption where done  {}คน<br>
มีผู้ประสงค์จะขอรับเลี้ยงสัตว์ปัจจุบัน   {{ $countRecipient }} คน<br>

    admin choose    ยืนยันแล้ว          คน ยังไม่ยืนยัน      คน-> เตือนแอดมิน

@foreach($recipient as $rec)
  <div class="group">
    <div class="panel-heading">ผู้รับขอรับเลี้ยง</div>

    <div class="panel-body">
คุณ  {{$rec->join_user->name}}<br>
เลี้ยงสตว์ชื่อ {{$rec->join_Animal->animal_name}} รหัส {{$rec->join_Animal->animal_id}}
รพ :<br>
เบอร์<br>
email<br>
ที่อยู่<br>{{$rec->address}}
มารับวันที่ {{$rec->date_time}}          เวลา<br>
<form action="/checkAdoption" class="form" method="post" enctype="multipart/form-data">
    {{ Form::token() }}

    <div class="text-center">

      <input type='hidden' name='adoption_id' value='{{$rec->adoption_id}}' />
      <input type='hidden' name='address' value='{{$rec->address}}' />
      <input type='hidden' name='date_time' value='{{$rec->date_time}}' />
      <input type='hidden' name='animal_id' value='{{$rec->join_Animal->animal_id}}' />
      <input type='hidden' name='user_id' value=' {{$rec->join_user->id}}' />
      <input type='hidden' name='status' value='wait' />
        <button class="btn btn-success" >ยืนยันการขอรับเลี้ยง</button>
    </div>

</form>

ตรวจสอบแล้ว  ยัง<br>
กดยืนยัน    จะกดได้ก็ต่อเมื่อติ๊กตรวจสอบแล้ว<br>
<br>
</div>
</div>

@endforeach

มารับเรียบร้อยแล้ว    ตัว
รอมารับ            ตัว(ยืนยันแล้วแต่ยังไม่มารับ)


<div class="row align-items-start">
    <div class="col">
      One of three columns
    </div>
    <div class="col">
      One of three columns
    </div>
    <div class="col">
      One of three columns
    </div>
  </div>
