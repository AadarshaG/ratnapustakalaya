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
                                Enquiry Messages
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enquirys as $key=>$enquiry)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$enquiry->name}}</td>
                                            <td>
                                                {{$enquiry->email}}
                                            </td>
                                            <td>
                                                @if($enquiry->status == 1)
                                                    Read <a href="{{url('ratnapustakalaya/enquiry/disable', $enquiry->id)}}" class="btn btn-danger btn-xs">UnRead</a>
                                                @else
                                                    UnRead <a href="{{url('ratnapustakalaya/enquiry/enable', $enquiry->id)}}" class="btn btn-success btn-xs"> Read</a>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/enquiry/show/'.$enquiry->id)}}" class="btn btn-primary edit_enquiry" style="border-radius: 50%; margin-left:10px" data-id="{{$enquiry->id}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
{{--                                                <a href="{{url('ratnapustakalaya/enquiry/delete/'.$enquiry->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger delete_enquiry" style="border-radius: 50%; margin-left:10px" data-id="{{$enquiry->id}}">--}}
{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                                </a>--}}
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
