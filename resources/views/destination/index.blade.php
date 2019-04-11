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
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Lists Destination</h3>
                        <a class="btn btn-info btn-md" href="{{url('destination/create')}}">Add New</a>
                    </div>
                    <div class="card-text">
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Setting</th>
                            </thead>
                            <tbody>
                                @foreach ($destinations as $destination)
                                <tr>
                                    <td>{{ $destination->id }}</td>
                                    <td>{{ $destination->name }}</td>
                                    <td>{{ $destination->country_name }}</td>
                                    <td>
                                        <div class="btn-group" style="color: #fff;">
                                            <a class="btn btn-secondary btn-sm" href="{{url('/destination/'.$destination->id.'/edit')}}">Edit</a>
                                            <a class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection