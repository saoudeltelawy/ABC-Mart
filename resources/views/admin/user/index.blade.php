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
                        <h3> {{$numofallusers->count()}} </h3>

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
                       






                     <form action=" {{route('user.index')}} " method="get">
                        <div class="input-group input-group-sm " style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="@lang('site.search')" value=" {{request()->table_search}} " >

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>






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
                                <th>@lang('site.img')</th>
                                @if (auth()->user()->isAbleTo('users_delete|users_update'))
                                <th>@lang('site.action')</th>
                                @endif
                            </tr>

                        </thead>
                        <tbody class="align-self-center">

                            @if ($allusers->count()>0)
                           
                                @foreach ($allusers as $user)
                         
                                <tr>

                                <th>{{$user->id}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th> <img src="{{asset('uploads/users/' . $user->profile_image)}}" class="img-thumbnail " width="65px" height="65px" alt="" srcset=""> </th>

                                <th>

                                @if (auth()->user()->isAbleTo('users_update'))
                                
                                    <a href='{{url("admin/user/{$user->id}/edit")}}' class="btn btn-primary btn-sm "> <i class="fa fa-edit"></i> @lang('site.edt') </a>

                                @endif


                                @if (auth()->user()->isAbleTo('users_delete'))

                                    <form action="{{route('user.destroy',$user->id)}}" method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" >
                                        <button type="submit" class="btn btn-danger delete btn-sm " data_name="{{$user->name}}"> <i class="fa fa-trash"></i> @lang('site.dlt')</button>
                                    </form>

                                @endif
                                
                                    </th>

                                </tr>


                                @endforeach
                          

                            @else
                                <h2> @lang('site.ndf') </h2>
                            @endif
                            
                        </tbody>
                    </table>
                    <div class="card-footer clearfix col-12">
                        <ul class="pagination pagination-sm m-0 float-right col-3 p-2  offset-7 float-right">
                        <li class="page-item float-right">{{$allusers->appends(request()->query())->links()}}</li>

                        </ul> 

                        @if ( auth()->user()->isAbleTo('users_create') )
                        <div class="input-group input-group  p-2 col-2"  >
                            <a href="{{url('/admin/user/create')}}" class="btn btn-success col-12"> <i class="fa fa-plus"></i>  @lang('site.crt')</a>
                        </div>
                        @endif

                      
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