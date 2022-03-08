@extends('admin.layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home/Enquiry</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Detail
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-striped table-hover">

                                <ul class="list-group col-md-12">
                                    <li class="list-group-item">
                                        <strong>Name</strong> : {{ $enquiry->name }}
                                    </li>

                                    <li class="list-group-item">
                                        <strong>Email</strong> : {!! $enquiry->email !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Phone No</strong> : {!! $enquiry->phone !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Message</strong> : {!! $enquiry->messages !!}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Created</strong> : {{ $enquiry->created_at->diffForHumans() }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Updated</strong> : {{ $enquiry->updated_at->diffForHumans() }}
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
