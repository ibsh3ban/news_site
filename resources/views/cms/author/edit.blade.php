
@extends('cms.parent')

@section('title','author')
@section('main_title','Edit author')
@section('sub_title','edit author')

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
              <h3 class="card-title">Edit Author</h3>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <select class="form-control select2" name="city_id" id="city_id"  style="width: 100%;">
                        {{-- <option selected="selected">Alabama</option> --}}
                    @foreach ($cities as $city )
                        {{-- <option selected="selected">{{$city->name}}</option> --}}

                    <option value="{{$city->id}}">{{$city->name}}</option>

                   @endforeach

                      </select>
                    </div>
                </div>
            </div>

            </div>

            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
                <div class="form-group">
                  <label for="first_name">author first Name</label>
                  <input type="text" class="form-control" id="first_name" value="{{ $authors->user->first_name }}" placeholder="Enter author first_name">
                </div>
                <div class="form-group">
                  <label for="last_name">last name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $authors->user->last_name }}" placeholder="last_name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $authors->email }}" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" id="mobile" value="{{ $authors->user->mobile }}" placeholder="mobile">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="{{ $authors->user->address }}" placeholder="address">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" placeholder="status" value="{{ $authors->status }}" >
                        <option value="active" selected>active</option>
                        <option value="inactive">inactive</option></select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" value="{{ $authors->gender }}" placeholder="gender">
                        <option value="male" selected>male</option>
                        <option value="female">female</option></select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" value="{{ $authors->user->date }}" id="date" placeholder="date">
                </div>
                <div class="form-group">
                    <label for="image">Address</label>
                    <input type="file" class="form-control" value="{{ $authors->user->image }}"  id="image" placeholder="image">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $authors->id }})"  class="btn btn-primary">Save Change</button>
                <a href="{{ route('authors.index')}}" type="button" class="btn btn-primary">Return Back</a>
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
     formData.append('first_name',document.getElementById('first_name').value);
     formData.append('last_name',document.getElementById('last_name').value);
     formData.append('status',document.getElementById('status').value);
     formData.append('gender',document.getElementById('gender').value);
     formData.append('date',document.getElementById('date').value);
     formData.append('city_id',document.getElementById('city_id').value);
     formData.append('email',document.getElementById('email').value);
    //  formData.append('password',document.getElementById('password').value);
     formData.append('mobile',document.getElementById('mobile').value);
     formData.append('address',document.getElementById('address').value);
     formData.append('image',document.getElementById('image').files[0]);

     storeRoute('/cms/admin/update-authors/'+id ,formData);

   }
  </script>
@endsection




