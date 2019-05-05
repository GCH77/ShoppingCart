@extends('layouts.app')	

@section('content')

{{-- <view-welcome></view-welcome> --}}
<router-view name="cliente"></router-view>

@include('footer')

@endsection
