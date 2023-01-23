@extends('layouts.admin')

@section('title')
    | DASHBOARD
@endsection

@section('content')

<div class="container">
    <h1>
        Benvenuto nella tua dashboard {{ Auth::user()->name }}
    </h1>
</div>
@endsection
