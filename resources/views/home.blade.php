@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                <table class="table">
                <thead>
                <table>
                <tr>
                    <th>name</th>
                   <th>email</th>
                   <th>position</th>
                   <th>tel</th>
                   <th>action</th>
                </tr>
                    </thead>
                        <tbody>

                            <tr>

                                        <td>{{$your_name}}</td>
                                        <td> {{$your_email}}</td>
                                        <td>{{$your_position}}</td>
                                          <td>{{$your_tel}}</td>
                                       <td><a href="/edit" class="btn btn-info btn-sm">Edit</a></td>



                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
