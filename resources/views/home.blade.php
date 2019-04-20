@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <layout-component :auth="{{Auth::user()}}"></layout-component>
</div>
@endsection
