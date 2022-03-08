@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Committee Members</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Member
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/committee/store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="category_id">Category</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="category_id">
                                            <option selected disabled> -- Select Category --</option>
                                            @foreach($category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <label for="position">Position</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="position" id="position" class="form-control" placeholder="Enter Position">
                                    </div>
                                </div>
                                <label for="image">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection
