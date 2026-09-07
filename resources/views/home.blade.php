@extends('layouts.app')
@section('title', 'บทความของฉัน')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">       
            <div class="mt-4">
                @include('index')
            </div>
        </div>
    </div>
</div>

@endsection