@extends('admin.master')

@section('content')
<style>
        .form-error {

        border: 2px solid red;
        }
        </style>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Form Layouts</h4>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-8 m-auto" >
                <div class="card-box">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h4 class="m-t-0 m-b-30 header-title">Update Blog Post</h4>

                    <form action="{{url('update-blog')}}/ " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Title</label>
                            <input type="text" id="blog_title" value="{{$oldValue->blog_title}}"  name="blog_title" class="form-control" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="blog_slug" value="{{$oldValue->blog_slug}}" name="blog_slug" class="form-control" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Title</label>
                        <textarea name="blog_details"  class="form-control blog_details" rows="10">{{$oldValue->blog_details}}"</textarea>
                        </div>
                        <div class="from-group">
                            <label for="">Blog Image</label>
                            <input type="file" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" class="form-control" id="blah" name="blog_image" class="form-control">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Preview</label>
                                <img id="image" width="150" src="{{ url($oldValue->blog_image) }}" alt="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function loadfile(event) {
        var output=document.getElementById('preimage');
        output.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
@section('footer_js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
$(document).ready(function(){


    // =====================================


// ==========================================================
    $('#blog_title').keyup(function() {
            $('#blog_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });


// ========================================================

        var editor_config = {
    path_absolute : "/",
    selector: "textarea.blog_details",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
//   ========================================
})

</script>
@endsection
