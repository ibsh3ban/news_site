
@extends('cms.parent')

@section('title','Article')
@section('main_title','Edit Article')
@section('sub_title','Edit Article')

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
              <h3 class="card-title">Creat Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Article Name</label>
                  <input type="text" class="form-control" id="title" placeholder="Enter Article title">
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control select2" name="category_id" id="category_id" style="width: 100%;">
                            {{-- <option selected="selected">Alabama</option> --}}
                       @foreach ($categories as $category )

                           <option value="{{$category->id}}">{{$category->name}}</option>

                       @endforeach
                          </select>
                        </div>
                    </div>
                </div>

                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Author</label>
                          <select class="form-control select2" name="author_id" id="author_id" style="width: 100%;">
                            {{-- <option selected="selected">Alabama</option> --}}
                       @foreach ($authors as $author )

                           <option value="{{$author->id}}">{{$author->user->first_name . '' . $author->user->last_name}}</option>

                       @endforeach
                          </select>
                        </div>
                    </div>
                </div>

                </div>





                <div class="form-group">
                  <label for="short_description">///Description///</label>
                  <textarea type="text" class="form-control" id="short_description" name="short_description" placeholder="Enter decription"
                      cols="50"     > </textarea>
                </div>

                <div class="form-group">
                    <label for="full_description">///Description///</label>
                    <textarea type="text" class="form-control" id="full_description" name="full_description" placeholder="Enter decription"
                        cols="50"     > </textarea>
                  </div>

                  <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="image">
                </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$articles->id}})"  class="btn btn-primary">Add Article</button>
                <a href="{{ route('articles.index')}}" type="button" class="btn btn-primary">Return Back</a>
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
     formData.append('title',document.getElementById('title').value);
     formData.append('short_description',document.getElementById('short_description').value);
     formData.append('full_description',document.getElementById('full_description').value);
     formData.append('category_id',document.getElementById('category_id').value);
     formData.append('author_id',document.getElementById('author_id').value);
     formData.append('image',document.getElementById('image').files[0]);

     storeRoute('/cms/admin/update-articles/'+id,formData);

   }
  </script>
@endsection




