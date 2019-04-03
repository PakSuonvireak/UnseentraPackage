@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-tab-all" data-toggle="tab" href=" #tab-all" role="tab">All</a>
                        @foreach ($destinations as $destination)
                        <a class="nav-item nav-link" id="nav-tab-{{$destination->id}}" data-toggle="tab" href="#tab-{{$destination->id}}" role="tab" aria-selected="true">{{$destination->name}}</a>
                        @endforeach
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tab-all" role="tabpanel">
                        <br>
                        <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-md-4" style="padding-bottom: 20px;">
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
                    @foreach ($destinations as $destination)
                        <div class="tab-pane fade" id="tab-{{$destination->id}}" role="tabpanel">
                            <br>
                            <div class="row">
                            @foreach ($packages as $package)
                                @if($package->destination_id == $destination->id)
                                <div class="col-md-4" style="padding-bottom: 20px;">
                                    <div class="card">
                                        <a href="/package/{{$package->id}}" class="stretched-link">
                                            <div class="card-header"> {{ $package->title }} </div>
                                        </a>
                                        <div class="card-body"> {{ $package->excerpt }} </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
    </div>
</div>
@endsection