@extends('frontend.layout.app')

@section('content')

    @include('frontend._produtos',['produtos'=>$produtos])

@endsection
