
@extends('cms.parent')

@section('title','Country')
@section('main_title','Create Country')
@section('sub_title','create Country')

@section('styles')
@endsection

@section('content')

    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Creat Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter country name">
                </div>
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control" id="code" placeholder="code">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()"  class="btn btn-primary">Add Country</button>
                <a href="{{ route('countries.index')}}" type="button" class="btn btn-primary">Return Back</a>
              </div>
            </form>
          </div>
        </div>


        </div>
    </div>


@endsection

@section('scripts')
<script>
    function performStore(){
     let formData = new FormData();
     formData.append('name',document.getElementById('name').value);
     formData.append('code',document.getElementById('code').value);
     store('/cms/admin/countries',formData);

   }
  </script>
@endsection




