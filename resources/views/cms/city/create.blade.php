
@extends('cms.parent')

@section('title','city')
@section('main_title','Create city')
@section('sub_title','create city')

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
              <h3 class="card-title">Creat city</h3>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control select2" name="country_name" id="country_id" style="width: 100%;">
                        {{-- <option selected="selected">Alabama</option> --}}
                   @foreach ($countries as $country )

                       <option value="{{$country->id}}">{{$country->name}}</option>

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
                  <label for="name">city Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter city name">
                </div>
                <div class="form-group">
                  <label for="street">street</label>
                  <input type="text" class="form-control" id="street" placeholder="street">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()"  class="btn btn-primary">Add city</button>
                <a href="{{ route('cities.index')}}" type="button" class="btn btn-primary">Return Back</a>
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
     formData.append('street',document.getElementById('street').value);
     formData.append('country_id',document.getElementById('country_id').value);

     store('/cms/admin/cities',formData);

   }
  </script>
@endsection




