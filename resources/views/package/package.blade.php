@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session('message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            <h1>{{ $packages->title }}</h1><br>
            <p>{{ $packages->body }}</p>
            <h6><span class="badge badge-primary">{{ $user->name }}</span></h6>
            
            @if($count_row == 0)
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link btn btn-primary active" id="nav-tab-0" href="#tab-0" role="tab" aria-controls="nav-home" aria-selected="true"  data-toggle="modal" data-target="#add-itinerary">
                            Add New
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tab-0" role="tabpanel">
                        Please Add new Itineraries !!!
                    </div>
                </div>
            @else
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($itineraries as $itinerary)
                        <a class="nav-item nav-link @if($first_id->id == $itinerary->id) active @endif" id="nav-tab-{{$itinerary->id}}" data-toggle="tab" href="#tab-{{$itinerary->id}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$itinerary->title}}</a>
                        @endforeach
                        <a class="nav-tab nav-link btn btn-primary" data-toggle="modal" data-target="#add-itinerary">
                            Add New
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($itineraries as $itinerary)
                        <div class="tab-pane fade @if($first_id->id == $itinerary->id) show active @endif" id="tab-{{$itinerary->id}}" role="tabpanel">
                            {{$itinerary->body}}
                        </div>
                    @endforeach
                </div>
            @endif


            <!-- Itineraries Modal -->
            <div class="modal" id="add-itinerary" tabindex="-1" rol="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                   <form action="{{url('itinerary')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title"> Add New Itinerary </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="title">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                    <input type="hidden" name="package-id" value="{{$packages->id}}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection