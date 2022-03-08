@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Blogs</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Detail {{$blog->title}}
                                <span>
                                    <a href="{{url('ratnapustakalaya/blog/edit/'.$blog->id)}}" class="btn btn-success edit_logo" style="border-radius: 50%; margin-left:10px" data-id="{{$blog->id}}">
                                        <i class="fa fa-edit">Edit</i>
                                    </a>
                                </span>
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-striped table-hover">
                                <div class="col-md-6 pull-right">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h4> Image</h4>
                                        </div>
                                        <div class="box-body">
                                            <img src="{{ asset('uploads/blog'.'/'.$blog->image) }}" width="100%">
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group col-md-6">
                                    <li class="list-group-item">
                                        <strong>Title</strong> : {{ $blog->title }}
                                    </li>

                                    <li class="list-group-item">
                                        <strong>Author Name</strong> : {{ $blog->author }}
                                    </li>

                                    <li class="list-group-item">
                                        <strong>Description</strong> : {!! $blog->description !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Created</strong> : {{ $blog->created_at->diffForHumans() }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Updated</strong> : {{ $blog->updated_at->diffForHumans() }}
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
