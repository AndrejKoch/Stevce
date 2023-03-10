@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="container">
            <div class="row">
                <a href="{{ route('gallery.create') }}" class="btn btn-round btn-info">+ Add Gallery</a>
            </div>
        </div>

        <div class="container padding-top">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Gallery List</h4>
                </div>
                <div class="card-body" style="max-height: 75%!important">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <td>Id</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Action</td>
                            </thead>
                            <tbody>
                            @foreach($gallery as $g)
                                <tr>
                                    <td>{{ $g->id }}</td>
                                    <td><img src="/assets/img/gallery/thumbnails/{{$g->image}}"
                                             class="img-fluid"></td>
                                    <td>{{ $g->name }}</td>
                                    <td>{{ $g->description }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-warning btn-width-100 h-100"
                                           href="{{ url('admin/gallery', [$g->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('admin/gallery', [$g->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-width-100" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($gallery->count() > 10)
                            {!! $gallery->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
