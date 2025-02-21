@extends('resepsionis-dashboard.index')
@section('content')
Halo Resepsionis {{auth()->user()->name}} Sebagai {{auth()->user()->role}}
@endsection
