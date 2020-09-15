@extends('admin.layout.adminmaster')

@section('title' , 'Edit User')

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
                    <li class="breadcrumb-item"><a href="{{url('/admin/user')}}">@lang('site.users')</a></li>
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
                        <h3 class="card-title">@lang('site.adduser')</h3>
                    </div>
                    <!-- /.card-header -->
                    @include('admin.fastinclude.errors')




                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data"
                        action="{{route('user.update', $user->id)}}">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1"> @lang('site.username') </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter username" value=" {{$user->name}} " name="name">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('site.email')</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" value=" {{$user->email}} " name="email">
                            </div>



                        </div>
                        <!-- /.card-body -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Custom Elements</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <h4>@lang('site.choose_permissions')</h4>

                                                <div class="custom-control custom-checkbox"> <input
                                                        class="custom-control-input" type="checkbox"
                                                        id="customCheckbox1" 
                                                        name="permissions[]" 
                                                        {{ $user->isAbleTo('users_create') ? 'checked' : '' }}
                                                        value="users_create"> <label
                                                        for="customCheckbox1"
                                                        class="custom-control-label">@lang('site.crt')</label> </div>

                                                <div class="custom-control custom-checkbox"> <input
                                                        class="custom-control-input" type="checkbox"
                                                        id="customCheckbox3" 
                                                        name="permissions[]" 
                                                        {{ $user->isAbleTo('users_read') ? 'checked' : '' }}
                                                        value="users_read"> <label
                                                        for="customCheckbox3"
                                                        class="custom-control-label">@lang('site.red')</label> </div>



                                                @if (auth()->user()->isAbleTo('users_delete'))

                                                <div class="custom-control custom-checkbox"> <input
                                                        class="custom-control-input" type="checkbox"
                                                        id="customCheckbox2" 
                                                        name="permissions[]" 
                                                        {{ $user->isAbleTo('users_update') ? 'checked' : '' }}
                                                        value="users_update"> <label
                                                        for="customCheckbox2"
                                                        class="custom-control-label">@lang('site.udt')</label> </div>

                                                <div class="custom-control custom-checkbox"> <input
                                                        class="custom-control-input" type="checkbox"
                                                        id="customCheckbox4" 
                                                        name="permissions[]" 
                                                        {{ $user->isAbleTo('users_delete') ? 'checked' : '' }}
                                                        value="users_delete"> <label
                                                        for="customCheckbox4"
                                                        class="custom-control-label">@lang('site.dlt')</label> </div>
                                                @endif





                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- radio -->
                                            <div class="form-group">
                                                <h4>@lang('site.choose_role')</h4>





                                                @if (auth()->user()->isAbleTo('users_delete'))
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input"
                                                        {{ $user->hasRole('manager') ? 'checked' : '' }} type="radio"
                                                        id="customRadio1" name="role" value="manager">
                                                    <label for="customRadio1"
                                                        class="custom-control-label">@lang('site.Manager')</label>
                                                </div>
                                                @endif





                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input"
                                                        {{ $user->hasRole('admin') ? 'checked' : '' }} type="radio"
                                                        id="customRadio2" name="role" value="admin">
                                                    <label for="customRadio2"
                                                        class="custom-control-label">@lang('site.admin')</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input"
                                                        {{ $user->hasRole('user') ? 'checked' : '' }} type="radio"
                                                        id="customRadio3" name="role" value="user">
                                                    <label for="customRadio3"
                                                        class="custom-control-label">@lang('site.user')</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-edit"></i>
                                    @lang('site.edt')</button>

                                <a href="{{url('/admin/user')}}" class="btn btn-danger">@lang('site.cncl')</a>

                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
</section>

@endsection