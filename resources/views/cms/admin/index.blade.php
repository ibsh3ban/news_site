
@extends('cms.parent')
@section('title','Admin')
@section('main_title','index Admin')
@section('sub_title','index Admin')

@section('styles')
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('admins.create')}}" type="button" class="btn btn-primary">Add New Admin</a>


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
                      <th>Image</th>
                      <th>Full name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Gender</th>
                      <th>City</th>
                      <th>Mobile</th>
                      <th>Settings</th>



                    </tr>
                  </thead>
                  <tbody>
                @foreach($admins as $admin)
                  <td><span class="tag tag-success">Approved</span></td>

                    <tr>
                        <td>{{$admin->id}}</td>

                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image)}}" width="60" height="60" alt="User Image">
                       </td>
                        <td>{{$admin->user->first_name .' '. $admin->user->last_name  }}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->user->mobile ?? ""}}</td>
                        <td>{{$admin->user->status ?? ""}}</td>
                        <td>{{$admin->user->gender ?? ""}}</td>
                        <td><span class="badge bg-info">({{$admin->user->city->name ?? ""}})</td>

                        <td>
                            <div class="btn group">
                              <a href="{{route('admins.edit' , $admin->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                              </a>

                            </div>
                        </td>

                @endforeach

                      </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
    {{ $admins-> links() }}

</section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id,referance){
     let url ='/cms/admin/admins/'+id;
     confirmDestroy(url,referance);
   }
  </script>
@endsection




