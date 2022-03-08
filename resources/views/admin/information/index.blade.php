@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
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
                                Information
                                <span>
{{--                                    <a href="{{ url('ratnapustakalaya/information/create') }}" class="btn btn-success add_information" style="border-radius: 50%; margin-left:10px">--}}
{{--                                        <i class="fa fa-plus">Add</i>--}}
{{--                                    </a>--}}
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
                                        <th>Data Count</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($informations as $key=>$information)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$information->title}}</td>
                                            <td>{{$information->count}}</td>
                                            <td>
                                                @if(isset($information))
                                                    <img src="{{asset('uploads/information/'.$information->image)}}" alt="" height="40px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/information/edit/'.$information->id)}}" class="btn btn-primary" style="border-radius: 50%; margin-left:10px" data-id="{{$information->id}}">
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
