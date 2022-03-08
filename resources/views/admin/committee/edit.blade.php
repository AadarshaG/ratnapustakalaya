@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Committee Member</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Member
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/committee/update/'.$committee->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="category_id">Category</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="category_id" id="category_id" class="form-control" value="{{$committee->category_id}}" readonly>
                                    </div>
                                </div>
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" value="{{$committee->title}}">
                                    </div>
                                </div>
                                <label for="position">Position</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="position" id="position" class="form-control" value="{{$committee->position}}">
                                    </div>
                                </div>
                                <label for="image">Image</label>
                                <div class="form-group">
                                    @if(isset($committee))
                                        <div class=" col-6">
                                            <span> <img src="{{asset('uploads/committee/'.$committee->image)}}" height="40px;"></span>
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
