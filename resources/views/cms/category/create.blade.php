
@extends('cms.parent')

@section('title','Category')
@section('main_title','Create Category')
@section('sub_title','create Category')

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
              <h3 class="card-title">Creat Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Category Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Category name">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" placeholder="status">
                        <option value="active" >Active</option>
                        <option value="inactive" selected >Inactive</option></select>
                </div>

                <div class="form-group">
                  <label for="description">///Description///</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter decription"
                      cols="50"     > </textarea>
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()"  class="btn btn-primary">Add Category</button>
                <a href="{{ route('categories.index')}}" type="button" class="btn btn-primary">Return Back</a>
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
     formData.append('description',document.getElementById('description').value);
     formData.append('status',document.getElementById('status').value);

     store('/cms/admin/categories',formData);

   }
  </script>
@endsection




