@extends('admin-dashboard.index')
@section('content')
Halo Admin {{auth()->user()->name}} Sebagai {{auth()->user()->role}}
@endsection
