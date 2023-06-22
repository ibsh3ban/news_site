
@extends('cms.parent')
@section('title','City')
@section('main_title','Index City')
@section('sub_title','Index City')

@section('styles')
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('cities.create')}}" type="button" class="btn btn-primary">Add New city</a>


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
                      <th>city Name</th>
                      <th>Street</th>
                      <th>Country</th>
                      <th>Created at</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cities as $city )
                      <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->street }}</td>
                        <td>{{ $city->country->name }}</td>
                        <td>{{ $city->created_at }}</td>
                        <td><div class="btn-group">
                            <a href="{{ route('cities.edit', $city->id) }}" type="button" class="btn btn-info">Edit</a>
                            <a type="button" onclick="performDestroy({{ $city->id }},this)" class="btn btn-danger">Remove</a>
                          </div>

                        </td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
    {{ $cities-> links() }}

</section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id,referance){
     let url ='/cms/admin/cities/'+id;
     confirmDestroy(url,referance);
   }
  </script>
@endsection




