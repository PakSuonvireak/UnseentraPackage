@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        @if ($action == "create")
                            <h1>Create New Package</h1>
                        @else
                            <h1>Edit Package</h1>
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
                        <form action="{{$action=='create'? url('package'): url('/package/'.$package->id)}}" method="post">
                            @csrf
                            @if($action == 'edit')
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title" value="{{old('title', $package->title??'')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Slug</label>
                                        <input class="form-control" type="text" name="slug" value="{{old('slug', $package->slug??'')}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tags</label>
                                        <input class="form-control" type="text" name="tags" value="{{old('tags', $package->tags??'')}}">
                                    </div>        
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Excerpt</label>
                                        <textarea class="form-control" rows="5" name="excerpt">{{old('excerpt', $package->excerpt??'')}}</textarea>
                                    </div>   
                                    <div class="col-md-6">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="5" name="description">{{old('description', $package->body??'')}}</textarea>
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Destination</label>
                                        <select class="form-control" name="destination">
                                            @foreach ($destinations as $destination)
                                                <option value="{{$destination->id}}" 
                                                    {{$destination->id==($package->destination_id??'')?'selected':''}}>
                                                    {{$destination->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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