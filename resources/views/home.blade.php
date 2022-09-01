@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">{{ __('Add Advertisements ') }}</div>

                <div class="card-body">
                  <form action="{{url('savedata')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="{{old('name')}}" class="form-control @if ($errors->has('name')) {{'is-invalid'}}  @endif" name="name" id="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" value="{{old('description')}}" class="form-control @if ($errors->has('description')) {{'is-invalid'}}  @endif" name="description" id="description">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-block btn-primary">Save</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
