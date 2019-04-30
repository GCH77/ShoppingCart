@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <layout-component :auth="{{Auth::user()->persona}}"></layout-component>

</div>
@endsection
