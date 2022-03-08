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
                                 Sliders
                                <span>
                                    <a href="{{ url('ratnapustakalaya/slider/create') }}" class="btn btn-success add_slider" style="border-radius: 50%; margin-left:10px">
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>
                                                @if(isset($slider))
                                                    <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" height="40px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if($slider->status == 1)
                                                    Enabled <a href="{{url('ratnapustakalaya/slider/disable', $slider->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                                @else
                                                    Disabled <a href="{{url('ratnapustakalaya/slider/enable', $slider->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/slider/edit/'.$slider->id)}}" class="btn btn-primary edit_slider" style="border-radius: 50%; margin-left:10px" data-id="{{$slider->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{url('ratnapustakalaya/slider/delete/'.$slider->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger delete_slider" style="border-radius: 50%; margin-left:10px" data-id="{{$slider->id}}">
                                                    <i class="fa fa-trash"></i>
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
