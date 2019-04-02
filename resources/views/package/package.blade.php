@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ $packages->title }}</h1><br>
            <p>{{ $packages->body }}</p>
            <h6><span class="badge badge-primary">{{ $user->name }}</span></h6>
            
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($itineraries as $itinerary)
                    <a class="nav-item nav-link @if($first_id->id == $itinerary->id) active @endif" id="nav-tab-{{$itinerary->id}}" data-toggle="tab" href="#tab-{{$itinerary->id}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$itinerary->title}}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach ($itineraries as $itinerary)
                    <div class="tab-pane fade @if($first_id->id == $itinerary->id) show active @endif" id="tab-{{$itinerary->id}}" role="tabpanel">
                        {{$itinerary->body}}
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection