@extends('back.layouts.master')
@section('content')
<h2>Welcome {{Auth::user()->name}}</h2>
@endsection