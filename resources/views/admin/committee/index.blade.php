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
                                Committee Members
                                <span>
                                    <a href="{{ url('ratnapustakalaya/committee/create') }}" class="btn btn-success add_committee" style="border-radius: 50%; margin-left:10px">
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
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($committees as $key=>$committee)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$committee->category->title}}</td>
                                            <td>{{$committee->title}}</td>
                                            <td>
                                                @if(isset($committee))
                                                    <img src="{{asset('uploads/committee/'.$committee->image)}}" alt="" height="40px;">
                                                @endif
                                            </td>
                                            <td>
                                                {!! $committee->position !!}

                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/committee/edit/'.$committee->id)}}" class="btn btn-primary edit_committee" style="border-radius: 50%; margin-left:10px" data-id="{{$committee->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{url('ratnapustakalaya/committee/delete/'.$committee->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger delete_committee" style="border-radius: 50%; margin-left:10px" data-id="{{$committee->id}}">
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
