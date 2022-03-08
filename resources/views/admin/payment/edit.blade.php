@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Payment Method</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit {{$payment->title}}
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/payment/update/'.$payment->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" value="{{$payment->title}}">
                                    </div>
                                </div>
                                <label for="account">Account No.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="account" id="account" class="form-control" value="{{$payment->account}}">
                                    </div>
                                </div>
                                <label for="image">Image</label>
                                <div class="form-group">
                                    @if(isset($payment))
                                        <div class=" col-6">
                                            <span> <img src="{{asset('uploads/payment/'.$payment->image)}}" height="40px;"></span>
                                        </div>
                                    @endif
                                    <br>
                                    <div class=" col-6">
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection
