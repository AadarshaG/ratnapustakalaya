@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                @include('admin.layouts.messages')
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
                                Payment Method
                                <span>
                                    <a href="{{ url('ratnapustakalaya/payment/create') }}" class="btn btn-success add_payment" style="border-radius: 50%; margin-left:10px">
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
                                        <th>Account No</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $key=>$payment)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$payment->title}}</td>
                                            <td>{!! Str::limit($payment->account,30) !!}</td>
                                            <td>
                                                @if(isset($payment))
                                                    <img src="{{asset('uploads/payment/'.$payment->image)}}" alt="" height="40px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('ratnapustakalaya/payment/edit/'.$payment->id)}}" class="btn btn-primary edit_payment" style="border-radius: 50%; margin-left:10px" data-id="{{$payment->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{url('ratnapustakalaya/payment/delete/'.$payment->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger delete_logo" style="border-radius: 50%; margin-left:10px" data-id="{{$payment->id}}">
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
