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
                                Show Detail About Us
                                <span>
                                    <a href="{{url('ratnapustakalaya/about/edit/'.$about->id)}}" class="btn btn-success edit_logo" style="border-radius: 50%; margin-left:10px" data-id="{{$about->id}}">
                                        <i class="fa fa-edit">Edit</i>
                                    </a>
                                </span>
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-striped table-hover">

                                <ul class="list-group col-md-12">
                                    <li class="list-group-item">
                                        <strong>Title</strong> : {{ $about->title }}
                                    </li>

                                    <li class="list-group-item">
                                        <strong>Description</strong> : {!! $about->description !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Created</strong> : {{ $about->created_at->diffForHumans() }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Updated</strong> : {{ $about->updated_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
