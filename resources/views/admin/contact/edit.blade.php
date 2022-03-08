@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Contact Info</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Contact Info
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/contact/update/'.$contact->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="address">Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="address" id="address" class="form-control" value="{{$contact->address}}">
                                    </div>
                                </div>
                                <label for="phone">Phone No</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{$contact->phone}}">
                                    </div>
                                </div>

                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" id="email" class="form-control" value="{{$contact->email}}">
                                    </div>
                                </div>
                                <label for="iframe">Iframe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="iframe" id="iframe" class="form-control" value="{{$contact->iframe}}">
                                    </div>
                                </div>
                                <br>
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
