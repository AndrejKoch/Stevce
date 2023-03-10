@extends('layouts.app')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <form action="{{ url('admin/settings', [$settings->id]) }}" class="w-100 h-75" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Tittle</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ $settings->title }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">

                        <div class="file_input_div">
                            <div class="file_input">
                                <label
                                    class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
                                    Upload Logo
                                    <i class="material-icons">file_upload</i>
                                    <input id="file_input_file" class="none" type="file" name="image"/>
                                </label>
                            </div>
                            <div id="file_input_text_div"
                                 class="mdl-textfield mdl-js-textfield textfield-demo">
                                <input class="file_input_text mdl-textfield__input" type="text" disabled
                                       readonly
                                       id="file_input_text"/>
                                <label class="mdl-textfield__label" for="file_input_text"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">

                        <div class="file_input_div">
                            <div class="file_input">
                                <label
                                    class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
                                    Upload Profile Picture
                                    <i class="material-icons">file_upload</i>
                                    <input id="file_input_file" class="none" type="file" name="profile_picture"/>
                                </label>
                            </div>
                            <div id="file_input_text_div"
                                 class="mdl-textfield mdl-js-textfield textfield-demo">
                                <input class="file_input_text mdl-textfield__input" type="text" disabled
                                       readonly
                                       id="file_input_text"/>
                                <label class="mdl-textfield__label" for="file_input_text"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">E-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $settings->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                               name="address" value="{{ $settings->address }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               name="phone" value="{{ $settings->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Mobile phone</label>
                        <input type="text"
                               class="form-control @error('mobilephone') is-invalid @enderror"
                               name="mobilephone" value="{{ $settings->mobilephone }}">
                        @error('mobilephone')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobilephone') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Longitude</label>
                        <input type="text" class="form-control @error('lng') is-invalid @enderror"
                               name="lng" value="{{ $settings->lng }}">
                        @error('lng')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lng') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Latitude</label>
                        <input type="text" class="form-control @error('lat') is-invalid @enderror"
                               name="lat" value="{{ $settings->lat }}">
                        @error('lat')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Facebook</label>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                               name="facebook" value="{{ $settings->facebook }}">
                        @error('facebook')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Instagram</label>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                               name="instagram" value="{{ $settings->instagram }}">
                        @error('instagram')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">

                            <textarea rows="15" type="text" class="form-control @error('description') is-invalid @enderror"
                                      name="description" id="description">{{ $settings->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">

                            <textarea rows="5" type="text" class="form-control @error('seo_desc') is-invalid @enderror"
                                      name="seo_desc">{{ $settings->seo_desc }}</textarea>
                        @error('seo_desc')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('seo_desc') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update settings</button>
    </form>
@endsection
@section('scripts')
    <script>
        var fileInputTextDiv = document.getElementById('file_input_text_div');
        var fileInput = document.getElementById('file_input_file');
        var fileInputText = document.getElementById('file_input_text');

        fileInput.addEventListener('change', changeInputText);
        fileInput.addEventListener('change', changeState);

        function changeInputText() {
            var str = fileInput.value;
            var i;
            if (str.lastIndexOf('\\')) {
                i = str.lastIndexOf('\\') + 1;
            } else if (str.lastIndexOf('/')) {
                i = str.lastIndexOf('/') + 1;
            }
            fileInputText.value = str.slice(i, str.length);
        }

        function changeState() {
            if (fileInputText.value.length != 0) {
                if (!fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.add('is-focused');
                }
            } else {
                if (fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.remove('is-focused');
                }
            }
        }
    </script>

    <script>
        CKEDITOR.replace('description');

        var fileInputTextDiv = document.getElementById('file_input_text_div');
        var fileInput = document.getElementById('file_input_file');
        var fileInputText = document.getElementById('file_input_text');

        fileInput.addEventListener('change', changeInputText);
        fileInput.addEventListener('change', changeState);

        function changeInputText() {
            var str = fileInput.value;
            var i;
            if (str.lastIndexOf('\\')) {
                i = str.lastIndexOf('\\') + 1;
            } else if (str.lastIndexOf('/')) {
                i = str.lastIndexOf('/') + 1;
            }
            fileInputText.value = str.slice(i, str.length);
        }

        function changeState() {
            if (fileInputText.value.length != 0) {
                if (!fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.add('is-focused');
                }
            } else {
                if (fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.remove('is-focused');
                }
            }
        }
    </script>
@endsection
