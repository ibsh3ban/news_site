@extends('cms.parent')

@section('title' , ' sliders')

@section('main-title' , 'Index sliders')

@section('sub-title' , 'index sliders')

@section('styles')

@endsection

@section('content')
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title"> Index Data of sliders</h3> --}}
                <a href="{{ route('zliders.create') }}" type="button" class="btn btn-info">Add New sliders</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Descreption</th>
                      <th>Image</th>
                      <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($zliders as $zlider )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                    <tr>
                        <td>{{$zlider->id}}</td>


                        {{--  <td>{{$sliders->user->first_name  . ' ' . $sliders->user->last_name ?? ""}}</td>  --}}
                        <td>{{$zlider->title  ?? ""}}</td>
                        <td>{{$zlider->description  ?? ""}}</td>

                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/zlider/'.$zlider->image)}}" width="60" height="60" alt="User Image">
                         </td>


                        <td>
                            <div class="btn group">
                              <a href="{{route('zliders.edit' , $zlider->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $zlider->id }} , this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                              </a>

                            </div>
                          </td>

                        <td></td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{ $zliders->links()}}
          </div>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('scripts')
  <script>
    function performDestroy(id , referance){
      let url = '/cms/admin/zliders/'+id;
      confirmDestroy(url , referance );
    }
</script>
@endsection
