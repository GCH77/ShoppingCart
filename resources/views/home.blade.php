@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- <layout-component :auth="{{Auth::user()->persona}}"></layout-component> --}}
    <layout-component :auth="{{$userAll}}"></layout-component>
{{-- <span>{{Auth::user()->persona}}</span> --}}
{{-- <span>{{$userAll}}</span> --}}

</div>

@endsection
