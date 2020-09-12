@extends('admin.layout.adminmaster')

@section('title' , 'Our Users')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> @lang('site.users') </h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">@lang('site.home')</a></li>
              <li class="breadcrumb-item active">@lang('site.users')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



<section class="content">
    <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> {{$allusers->count()}} </h3>

                        <p>@lang('site.usernumber')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>



<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title"> @lang('site.userdata') </h3>

                    <div class="card-tools">
                       
                     
                        <div class="input-group input-group-sm " style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="@lang('site.search')">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>

                            <tr>
                                <th>@lang('site.id')</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.action')</th>
                            </tr>

                        </thead>
                        <tbody>
                            @if ($allusers->count()>0)
                            <tr>
                                @foreach ($allusers as $user)
                                <th>{{$user->id}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th>
                                <a href='{{url("admin/user/{$user->id}/edit")}}' class="btn btn-primary btn-sm "> @lang('site.edt') </a>
                                <form action='{{url("/admin/user/{$user->id}")}}' method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-danger btn-sm ">Delete</button>
                                </form>
                                
                                </th>
                                @endforeach
                            </tr>

                            @else
                                <h2> @lang('site.ndf') </h2>
                            @endif
                            
                        </tbody>
                    </table>
                    <div class="input-group input-group col-2 offset-5 p-2"  >
                        <a href="{{url('/admin/user/create')}}" class="btn btn-success col-12"> <i class="fa fa-plus"></i>  @lang('site.crt')</a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

</div>

@endsection