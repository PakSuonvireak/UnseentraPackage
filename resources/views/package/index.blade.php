@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>All Packages</h1>
            <div class="row">
                @foreach ($packages as $package)
                <div class="col-md-4">
                    <div class="card">
                        <a href="/package/{{$package->id}}" class="stretched-link">
                            <div class="card-header"> {{ $package->title }} </div>
                        </a>
                        <div class="card-body"> {{ $package->excerpt }} </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection