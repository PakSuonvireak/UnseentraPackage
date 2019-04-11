@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4" style="padding-bottom: 15px;">
                        <a class="nav-link" href="{{ url('package/'.$package->id.'') }}">
                            <div class="card">
                                <img src="{{ asset('img/img1.jpg') }}" style="width: 100%;">
                                <div class="card-body">
                                    <div class="card-title">
                                        {{ str_limit($package->title, 20) }}
                                    </div>
                                    <div class="card-text">
                                        {{ str_limit($package->body, 100) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
