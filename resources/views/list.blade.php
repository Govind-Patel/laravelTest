@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
                @php
                Session::forget('error');
                @endphp
            </div>
            @endif
            <div class="card">
                <div class="card-header h3">{{ __('List Advertisements ') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$row)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td><img src="{{url('images/'.$row->image)}}" alt="" width="100px" height="100px"></td>
                                <td>
                                     <a href="{{url('edit/'.$row->id)}}" class="btn btn-xs btn-info">Edit</a>
                                    <a href="{{url('delete/'.$row->id)}}" class="btn btn-xs btn-danger">Delete</a>
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
@endsection