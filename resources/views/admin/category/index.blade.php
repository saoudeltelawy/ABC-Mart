@extends('admin.layout.adminmaster')

@section( 'title' , 'all categories' )




@section('content')
    
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> @lang('site.Category') </h1>
  
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">@lang('site.home')</a></li>
                <li class="breadcrumb-item active">@lang('site.Category')</li>
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
                            <h3> {{$allcategories->count()}} </h3>
    
                            <p>@lang('site.categorynumber')</p>
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
    
                        <h3 class="card-title"> @lang('site.Category') </h3>
    
                        <div class="card-tools">
                           
    
    
    
    
    
    
                         <form action=" {{route('Category.index')}} " method="get">
                            <div class="input-group input-group-sm " style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="@lang('site.search')" value="{{request()->table_search}}" >
    
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
                                    @if (auth()->user()->isAbleTo('categories_delete|categories_update'))
                                    <th>@lang('site.action')</th>
                                    @endif
                                   
                                </tr>
    
                            </thead>
                            <tbody class="align-self-center">
    
                                @if ($allcategories->count()>0)
                               
                                    @foreach ($allcategories as $category)
                             
                                    <tr>
    
                                    <th>{{$category->id}}</th>
                                    <th>{{$category->name}}</th>

                                    <th>
    
                                    @if (auth()->user()->isAbleTo('categories_update'))
                                    
                                        <a href='{{url("/admin/Category/{$category->id}/edit")}}' class="btn btn-primary btn-sm "> <i class="fa fa-edit"></i> @lang('site.edt') </a>
   
                                    @endif
    
    
                                    @if (auth()->user()->isAbleTo('categories_delete'))
    
                                        <form action="{{route('Category.destroy',$category->id)}}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" >
                                            <button type="submit" class="btn btn-danger delete btn-sm " data_name="{{$category->name}}"> <i class="fa fa-trash"></i> @lang('site.dlt')</button>
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
                            {{-- <li class="page-item float-right">{{$allcategories->links()}}</li> --}}
    
                            </ul> 
    
                            @if ( auth()->user()->isAbleTo('categories_create') )
                            <div class="input-group input-group  p-2 col-2"  >
                                <a href="{{url('admin/Category/create')}}" class="btn btn-success col-12"> <i class="fa fa-plus"></i>  @lang('site.crt')</a>
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
    
