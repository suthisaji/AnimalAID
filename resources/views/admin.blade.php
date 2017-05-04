@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                <table class="table">
              {{--  <thead>
                    <tr>
                        <th>name</th>
                       <th>email</th>
                       <th>position</th>
                       <th>tel</th>
                       <th>action</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($all_users as $user)
                    @if($user->position=='admin')
                            <tr class="danger">
                    @else
                    <tr>
                    @endif

                           <td>{{$user->name}}</td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->position}}</td>
                              <td> {{$user->tel}}</td>

                             <td><a href="/edit" class="btn btn-info btn-sm">Edit</a></td>
                              <td><a href="/delete/{{$user->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Please confirm again !!!') ">Delete</a></td>
                            </tr>
                            @endforeach
                    </tbody>--}}
              <img src="\images\Capture.PNG" alt="Mountain View" style="width:700px;height:308px;">
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
