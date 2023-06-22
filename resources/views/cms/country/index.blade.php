
@extends('cms.parent')
@section('title','Country')
@section('main_title','Index Country')
@section('sub_title','Index Country')

@section('styles')
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <form action="" method="get" style="margin-bottom:2%">

               <div>
                <div class="input-icon col-md-2">

                  <input type="text" class="form-control" name="name" @if (request()->name) value={{ request()->name }} @endif>
                </div>

                 <button class="btn btn-success btn-md" type="submit">filter</button>
                 <a href="{{ route('countries.index') }}" class="btn btn-danger" >end filter</a>
                 <a href="{{ route('countries.create')}}" type="button" class="btn btn-primary">Add New Country</a>


               </div>
              </form>


              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Country Name</th>
                      <th>Code</th>
                      <th>Number of Cities</th>
                      <th>Created at</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($countries as $country )
                      <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->code }}</td>
                        <td>( {{ $country->cities_count }} )city</td>
                        <td>{{ $country->created_at }}</td>

                        <td><div class="btn-group">
                            <a href="{{ route('countries.edit', $country->id) }}" type="button" class="btn btn-info">Edit</a>
                            <a type="button" onclick="performDestroy({{ $country->id }},this)" class="btn btn-danger">Remove</a>
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
    {{ $countries-> links() }}

</section>

@endsection

@section('scripts')
  <script>
    function performDestroy(id,referance){
     let url ='/cms/admin/countries/'+id;
     confirmDestroy(url,referance);
   }
  </script>
@endsection




