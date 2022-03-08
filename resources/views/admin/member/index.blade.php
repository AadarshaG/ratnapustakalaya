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
                                Membership Messages
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
                                        <th>Phone No</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($members as $key=>$member)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$member->name}}</td>
                                            <td>
                                                {{$member->email}}
                                            </td>
                                            <td>
                                                {{$member->phone}}
                                            </td>
                                            <td>
                                                @if($member->status == 1)
                                                    Accept <a href="{{url('ratnapustakalaya/member/disable', $member->id)}}" class="btn btn-danger btn-xs">Old</a>
                                                @else
                                                    Unaccept <a href="{{url('ratnapustakalaya/member/enable', $member->id)}}" class="btn btn-success btn-xs"> New</a>
                                                @endif

                                            </td>
                                            <td>
{{--                                                <a href="{{url('ratnapustakalaya/member/show/'.$member->id)}}" class="btn btn-primary edit_member" style="border-radius: 50%; margin-left:10px" data-id="{{$member->id}}">--}}
{{--                                                    <i class="fa fa-eye"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href="{{url('ratnapustakalaya/member/delete/'.$member->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger delete_member" style="border-radius: 50%; margin-left:10px" data-id="{{$member->id}}">--}}
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
