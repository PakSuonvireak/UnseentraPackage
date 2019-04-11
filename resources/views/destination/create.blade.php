@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                
             <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        @if($action ==  "create")
                            <h1>Create New Destination</h1>
                        @else
                            <h1>Update Destination</h1>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-text">
                        <form action="{{$action == 'create'? url('destination') : url('/destination/'.$destination->id)}}" method="post">
                            @csrf
                            @if($action == 'edit')
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name" value="{{old('name', $destination->name??'')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <input class="form-control" type="text" name="country" value="{{old('country', $destination->country_name??'')}}">
                                    </div>      
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection