@extends('layouts.app')

@section('content')
  <h1>AdminProfile</h1>

รหัสผู้ใช้ :{{ $userId}} <br>
ชื่อ   :{{$name}}<br>
username :{{$username}}<br>
email : {{$email}}<br>
tel :{{$tel}}<br>
สมัครเมื่อ :{{$created}}<br>
เคยรับเลี้ยงสัตว์    ครั้ง
เคยบริจาค       ครั้ง
บริจาคแล้วเป็นเงินทั้งหมด      บาท


@endsection
