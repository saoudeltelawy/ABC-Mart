@extends('admin.layout.adminmaster')

@section('title' , 'Add product')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> @lang('site.crt') </h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">@lang('site.home')</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/product')}}">@lang('site.product')</a></li>
                    <li class="breadcrumb-item active">@lang('site.crt')</li>
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
                <form role="form" method="POST" action="{{route('product.store')}}">

                    {{ csrf_field() }}




                    <div class="card-body">



                            @foreach (config('translatable.locales') as $locale)

                            <div class="form-group">

                            <label for="exampleInputname1"> @lang('site.' . $locale . '.name') </label>
                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Category"
                            name="{{$locale}}[name]"  value="{{old($locale . '.name')}}">

                            </div>

                            @endforeach


                           




                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i>
                            @lang('site.crt')</button>
                    </div>
                   
                       
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

@endsection