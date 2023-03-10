@extends('layouts.app')
@section('content')
    <div class="container mt-5 pt-5">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
        <div class="container padding-top">

            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                               name="description" value="{{ old('description') }}">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group bmd-form-group">
                        <div class="file_input_div">
                            <div class="file_input">
                                <label
                                    class="padding-top image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
                                    Upload Image
                                    <i class="material-icons">file_upload</i>

                                    <input id="file_input_file" class="none" type="file" name="image"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if($errors->has('image'))
                <span style="color: red">{{ $errors->first('image') }}</span>
            @endif
            <div class="padding-top">
                <button type="submit" class="btn btn-primary">Create new gallery image</button>
            </div>

        </div>
    </form>
    </div>
@endsection
