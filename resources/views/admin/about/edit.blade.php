@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/About Us</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit About Us
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/about/update/'.$about->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" value="{{$about->title}}">
                                    </div>
                                </div>
{{--                                <label for="image">Image</label>--}}
{{--                                <div class="form-group">--}}
{{--                                    @if(isset($about))--}}
{{--                                        <div class=" col-6">--}}
{{--                                            <span> <img src="{{asset('uploads/about/'.$about->image)}}" height="40px;"></span>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    <br>--}}
{{--                                    <div class=" col-6">--}}
{{--                                        <input type="file" name="image">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <label for="description">Description</label>
                                <div class="form-group">
                                    <textarea type="text" id="description" name="description" rows="10">{{$about->description}}</textarea>
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
