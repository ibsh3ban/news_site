
@extends('cms.parent')
@section('title','Category')
@section('main_title','Index Category')
@section('sub_title','Index Category')

@section('styles')
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('categories.create')}}" type="button" class="btn btn-primary">Add New category</a>


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
                      <th>category Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category )
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->status ?? "" }}</td>

                        <td><div class="btn-group">
                            <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-info">Edit</a>
                            <a type="button" onclick="performDestroy({{ $category->id }},this)" class="btn btn-danger">Remove</a>
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
    {{ $categories-> links() }}

</section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id,referance){
     let url ='/cms/admin/categories/'+id;
     confirmDestroy(url,referance);
   }
  </script>
@endsection




