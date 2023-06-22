
@extends('cms.parent')
@section('title','author')
@section('main_title','index author')
@section('sub_title','index author')

@section('styles')
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('authors.create')}}" type="button" class="btn btn-primary">Add New author</a>


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
                      <th>Articles</th>
                      <th>Settings</th>



                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($authors as $author )
                      <tr>
                        <td>{{ $author->id }}</td>
                        <img class="img-circle img-bordered-sm" src="{{asset('storage/images/author/'.$author->user->image)}}" width="60" height="60" alt="User Image">

                        <td>{{ $author->user->first_name .' '.$author->user->last_name ?? ""}}</td>
                        <td>{{ $author->email ?? ""}}</td>
                        <td>{{ $author->user->status ?? ""}}<</td>
                        <td>{{ $author->user->gender ?? ""}}</td>
                        <td>{{ $author->user->city->name ?? ""}}</td>
                        <td>{{ $author->user->mobile ?? ""}}</td>
                        <td><a href="{{ route('indexArticle',['id'=>$author->id]) }}" class="btn btn-info">
                          ({{ $author->articles_count }})</a>
                        </td>

                        <td><div class="btn-group">
                            <a href="{{ route('authors.edit', $author->id) }}" type="button" class="btn btn-info">Edit</a>
                            <a type="button" onclick="performDestroy({{ $author->id }},this)" class="btn btn-danger">Remove</a>
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
    {{ $authors-> links() }}

</section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id,referance){
     let url ='/cms/admin/authors/'+id;
     confirmDestroy(url,referance);
   }
  </script>
@endsection




