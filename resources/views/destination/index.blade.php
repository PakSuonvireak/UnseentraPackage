@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Destinaton</h1>

            @foreach ($destinations as $destination)
                <p>{{ $destination->name }}</p>
            @endforeach
            <hr>
            {{$user->name}}
        </div>
    </div>
</div>
@endsection