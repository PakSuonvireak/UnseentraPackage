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
                            <h3>List Packages</h3>
                            <a class="btn btn-info btn-md" href="{{ url('/package/create') }}">Add New</a>
                        </div>
                        <div class="card-text">
                            <table class="table table-hover table-responsive" style="font-size: 0.9em;">
                                <thead>
                                    <th>#</th>
                                    <th>Destinataion</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Tags</th>
                                    <th>Excerpt</th>
                                    <th>Description</th>
                                    <th>Setting</th>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->id }}</td>
                                        <td>{{ $package->destination_id }}</td>
                                        <td>{{ str_limit($package->title, 10) }}</td>
                                        <td>{{ $package->slug }}</td>
                                        <td>{{ $package->tags }}</td>
                                        <td>{{ str_limit($package->excerpt, 20) }}</td>
                                        <td>{{ str_limit($package->body, 20) }}</td>
                                        <td>
                                            <div class="btn-group" style="color: #fff;">
                                                <a class="btn btn-primary btn-sm" href="{{ url('/package/'.$package->id) }}">View</a>
                                                <a class="btn btn-secondary btn-sm" href="{{ url('/package/'.$package->id.'/edit') }}">Edit</a>
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