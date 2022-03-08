@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            @include('admin.layouts.messages')
            <div class="block-header">
                <h2>
                    Home
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Gallery Image
                                <span>
                                    <a href="{{ url('ratnapustakalaya/gallery/create') }}" class="btn btn-success add_gallery" style="border-radius: 50%; margin-left:10px">
                                        <i class="fa fa-plus">Add</i>
                                    </a>
                                </span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallerys as $key=>$gallery)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$gallery->title}}</td>
                                            <td>
                                                @if(isset($gallery))
                                                    <img src="{{asset('uploads/gallery/'.$gallery->image)}}" alt="" height="40px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/gallery/edit/'.$gallery->id)}}" class="btn btn-primary edit_gallery" style="border-radius: 50%; margin-left:10px" data-id="{{$gallery->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection
