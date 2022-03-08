@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Social Links</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit {{$social->title}}
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/social/update/'.$social->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" value="{{$social->title}}">
                                    </div>
                                </div>
                                <label for="link">Social Link</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="link" id="link" class="form-control" value="{{$social->link}}">
                                    </div>
                                </div>
                                <label for="image">Image</label>
                                <div class="form-group">
                                    @if(isset($social))
                                        <div class=" col-6">
                                            <span> <img src="{{asset('uploads/social/'.$social->image)}}" height="40px;"></span>
                                        </div>
                                    @endif
                                    <br>
                                    <div class=" col-6">
                                        <input type="file" name="image">
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
