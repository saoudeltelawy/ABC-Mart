@extends('admin.layout.adminmaster')

@section('title' , 'Edit category')

@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> @lang('site.edt') </h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">@lang('site.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/Category')}}">@lang('site.Category')</a></li>
                    <li class="breadcrumb-item active">@lang('site.edt')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->




<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('site.addcat')</h3>
                    </div>
                    <!-- /.card-header -->
                    @include('admin.fastinclude.errors')




                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data"
                        action="{{route('Category.update', $Category->id)}}">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.name') </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter name" value=" {{$Category->name}} " name="name">

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-edit"></i>
                                    @lang('site.edt')</button>

                                <a href="{{url('/admin/Category')}}" class="btn btn-danger">@lang('site.cncl')</a>

                            </div>

                        </div>
                        <!-- /.card-body -->

                          
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
</section>

@endsection