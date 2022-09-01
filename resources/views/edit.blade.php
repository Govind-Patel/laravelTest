@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">{{ __('Update Advertisements ') }}</div>

                <div class="card-body">
                  <form action="{{url('updateData/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{old('name',$data->name)}}" class="form-control @if ($errors->has('name')) {{'is-invalid'}}  @endif" name="name" id="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" value="{{old('description',$data->description)}}" class="form-control @if ($errors->has('description')) {{'is-invalid'}}  @endif" name="description" id="description">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        @if($data->image) 
                        <img src="{{url('images/'.$data->image)}}" alt="" width="100px" height="100px">
                        @endif
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-block btn-primary">Update</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
