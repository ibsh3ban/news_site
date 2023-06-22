
@extends('cms.parent')

@section('title','Country')
@section('main_title','Edit Country')
@section('sub_title','edit Country')

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
              <h3 class="card-title">Edit Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Country</label>
                          <select class="form-control select2" name="country_name" id="country_id" style="width: 100%;">
                            {{-- <option selected="selected">Alabama</option> --}}
                            <option selected="selected">{{ $cities->country->name }}</option>
                       @foreach ($countries as $country )

                           <option value="{{$country->id}}">{{$country->name}}</option>

                       @endforeach
                          </select>
                        </div>
                    </div>
                </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" value="{{ $cities->name }}" class="form-control"  id="name" placeholder="Enter country name">
                </div>
                <div class="form-group">
                  <label for="street">street</label>
                  <input type="text" value="{{ $cities->street }}" class="form-control" id="street" placeholder="Password">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $cities->id }})" class="btn btn-primary">Update</button>
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

function performUpdate(id){
    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('street',document.getElementById('street').value);
    formData.append('country_id',document.getElementById('country_id').value);

    storeRoute('/cms/admin/update-cities/'+id,formData);

  }
</script>
@endsection




