<x-app-layout>
    <x-header/> 
        <script src="https://cdn.tiny.cloud/1/ydhj1qx7icjnrvwcswi9n4mmwfizv245xc95dorua04vlfr7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false,
           // selector: 'textarea',  // change this value according to your HTML
            plugins: 'code',
            toolbar: 'code',
            menubar: 'tools'
        });
        </script>
       <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-2" style="margin: auto; background: #fff">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{url('/store-blog')}}/{{$postData->id}}" id="services" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                        <div class="form-group">
                            <label for="blogTitle" class="form-label mt-4">Blog Title</label>
                            <input type="text" name="title" class="form-control" id="blogTitle" value="{{$postData->title}}" placeholder="Enter Blog Title">
                            @if($errors->has('title'))
                                <p class="error">{{$errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tag" class="form-label mt-4">Add Tag</label>
                            <select class="form-control" name="tag" id="tag" >
                                <option value="">Please Select Tag</option>
                                @foreach(all_tags() as $key => $value)
                                    <option value="{{$key}}" @if($postData->tag==$key) selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tag'))
                                <div class="error">{{ $errors->first('tag') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label mt-4">Add Category</label>
                            <select class="form-control" name="category_id" id="category" />
                            <?php $category = \App\Models\Category::all(); ?>
                                <option value="">Please Select Category</option>
                                @foreach($category as $value)
                                    <option value="{{$value->id}}" @if($postData->category_id==$value->id) selected @endif>{{$value->category}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="error">{{ $errors->first('category') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label mt-4">Status</label>
                            <select class="form-control" name="status" id="status" />
                                <option value="">Select Status</option>
                                <option value="1" @if($postData->status==1) selected @endif>Active</option>
                                <option value="2" @if($postData->status==2) selected @endif>Inactive</option>
                            </select>
                        @if($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                        @endif
                        </div>
                        <div class="form-group">
                            <input type="file" name="image_url" class="form-control" id="image-input">
                            <div class="service-img pip">
                                <img src="{{asset($postData->main_image)}}"><br>
                                <span class="remove">Remove image</span>
                            </div>
                          </div>
                        @if($errors->has('image_url'))
                            <p class="error">{{$errors->first('image_url') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="blogTitle" class="form-label mt-4">Blog Content</label>
                                <textarea id="editor" name="description" >{{$postData->description}}</textarea>
                             @if($errors->has('description'))
                                <p class="error">{{$errors->first('description') }}</p>
                            @endif
                        </div> 
                        <div class="form-group">
                            <button type="submit" id="blogBtn" class="btn btn-primary"> Submit</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <style>
            .tox-notification__body p{
                display: none
            }
            .tox-notifications-container{
                display: none
            }
            #editor {
                height: 400px;  
            }
            .error{
                color: red;
            }
            .service-img {
                max-width: 267px;
                margin-top: 20px;
            }
            
            input[type="file"] {
            display: block;
            }
            .imageThumb {
            max-height: 200px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
            }
            .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
            }
            .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
            }
            .remove:hover {
            background: white;
            color: black;
            }
        </style>
    </div>
<x-footer/> 
<script>
$(document).ready(function() {
    $('#image-input').css('display','none');
    
    $(".remove").click(function(){
        $('#image-input').css('display','block');
        $(this).parent(".pip").remove();
    });
  if (window.File && window.FileList && window.FileReader) {
    $("#image-input").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
        if(filesLength)
            $('#image-input').css('display','none');

      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#image-input");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
            $('#image-input').css('display','block');
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
</x-app-layout>