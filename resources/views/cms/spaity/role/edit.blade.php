
@extends('cms.parent')

@section('title','Rples')
@section('main_title','Edit Roles')
@section('sub_title','Edit Roles')

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
              <h3 class="card-title">Creat Rples</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
               <div class="form-group">
                    <label for="guard_name">Gender</label>
                    <select class="form-control" id="guard_name" name="guard_name" placeholder="guard_name">
                       <option value="admin" @if($roles->guard_name == 'admin') selected @endif>Admin</option>
                       <option value="author" @if($roles->guard_name == 'author') selected @endif>Author</option>
                    </select>
                </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="name">Roles Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $roles->name }}" placeholder="Enter Roles name">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $roles->id }})"  class="btn btn-primary">Add Rples</button>
                <a href="{{ route('roles.index')}}" type="button" class="btn btn-primary">Return Back</a>
              </div>
            </form>
          </div>
        </div>


        </div>
    </div>


@endsection

@section('scripts')
<script>
    function performUpdate(id){
     let formData = new FormData();
     formData.append('name',document.getElementById('name').value);
     formData.append('guard_name',document.getElementById('guard_name').value);
     storeRoute('/cms/admin/update-roles/'+id,formData);


   }
  </script>
@endsection




