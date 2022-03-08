@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Information</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Information
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{url('ratnapustakalaya/information/store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="title">Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <label for="count">Data Count</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="count" id="count" class="form-control" placeholder="Enter Data Count">
                                    </div>
                                </div>
                                <label for="image">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image">
                                    </div>
                                </div>
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
