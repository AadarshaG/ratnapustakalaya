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
                                 About Us
                                <span>
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
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($abouts as $key=>$about)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$about->title}}</td>
                                        <td>{!! Str::limit($about->description,30) !!}</td>
                                        <td>
                                            <a href="{{url('ratnapustakalaya/about/show/'.$about->id)}}" class="btn btn-primary show_logo" style="border-radius: 50%; margin-left:10px" data-id="{{$about->id}}">
                                                <i class="fa fa-eye"></i>
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
