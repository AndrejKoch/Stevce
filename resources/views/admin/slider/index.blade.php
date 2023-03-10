@extends('layouts.app')
@section('content')

    <div class="container h-100">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <a href="{{route('slider.create')}}" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Slider</a>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Slider List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Main Image</td>
                                <td>Small Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>

                            @foreach($slider as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td><img src="/assets/img/slider_main_img/thumbnails/{{$slider->main_image}}" class="img-fluid"></td>
                                    <td><img src="/assets/img/slider_small_img/thumbnails/{{$slider->small_image}}" class="img-fluid"></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('admin/slider', [$slider->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('admin/slider', [$slider->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


