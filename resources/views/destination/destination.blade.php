@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Destinaton</h1>

            {{$destinations->name}}
            <hr>
            @foreach ($packages as $package)
                <p>{{$package->title}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection