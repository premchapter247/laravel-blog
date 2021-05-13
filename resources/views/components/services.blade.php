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
           {{-- <pre>{{$serviceData}}</pre> --}}
           {{-- <pre>{{$serviceData[0]->title}}</pre> --}}
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-2" style="margin: auto; background: #fff">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{url('/store-service')}}" id="services" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                          <div class="form-group">
                            <label for="serviceTitle" class="form-label mt-4">Service Title</label>
                            <input type="text" name="title" class="form-control" id="serviceTitle" value="@if($serviceData[0]->title){{trim($serviceData[0]->title)}} @else {{old('title')}} @endif" placeholder="Enter Service Title">
                            @if($errors->has('title'))
                                <p class="error">{{$errors->first('title') }}</p>
                            @endif
                          </div>
                          <div class="form-group">
                            <input type="file" name="image_url" class="form-control" id="image-input">
                            <div class="service-img pip">
                                <img src="{{$serviceData[0]->image_url}}"><br>
                                <span class="remove">Remove image</span>
                            </div>
                          </div>
                            @if($errors->has('image_url'))
                                <p class="error">{{$errors->first('image_url') }}</p>
                            @endif
                          <div class="form-group">
                            <label for="serviceTitle" class="form-label mt-4">Service Content</label>
                                <textarea id="editor" name="content" >@if($serviceData[0]->title) {{trim($serviceData[0]->content)}} @else {{old('content')}} @endif </textarea>
                             @if($errors->has('content'))
                                <p class="error">{{$errors->first('content') }}</p>
                            @endif
                          </div> 
                          <div class="form-group">
                            <button type="submit" id="serviceBtn"> Submit</button>
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