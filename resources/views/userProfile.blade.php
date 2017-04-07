@extends('layouts.app')

@foreach($userProfile as $user)
{{ $user->name}}  &nbsp;{{$user->email}}



   @endforeach
