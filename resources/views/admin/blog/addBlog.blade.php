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
            <div class="col-md-4">
                <div class="card-box">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h4 class="m-t-0 m-b-30 header-title">Add Blog Post</h4>

                    <form action="{{url('store-blog')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Title</label>
                            <input type="text" id="blog_title"  name="blog_title" class="form-control" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <input type="text" id="blog_slug"  name="blog_slug" class="form-control" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Title</label>
                        <textarea name="blog_details"  class="form-control blog_details" rows="10"></textarea>
                        </div>
                        <div class="from-group">
                            <label for="">Blog Image</label>
                            <input type="file" onchange="loadfile(event)" id="blah" name="blog_image" class="form-control">
                            <img src="" id="preimage" width="200" height="200" alt="">
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div>
            </div>
                    <div class="col-lg-8">
                        <div class="card-box">
                            <div class="card-header">

                                <h4 class="m-t-0 header-title">All Blog Post</h4>
                            </div>
                            <div class="card-body">
                                    @if (session('delete'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('delete') }}
                                    </div>
                                @endif

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post Title</th>
                                    <th>Post Details</th>
                                    <th>Post Image</th>
                                    <th>Post Time</th>
                                    <th>Update Time</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_blog_post as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}} </th>
                                            <td>{{$item->blog_title}} </th>
                                            <td width="200">{{Str::words($item->blog_details, 10)}} </th>
                                            <td><img width="100" src="{{url($item->blog_image)}}" alt=""></th>
                                            <td>{{$item->created_at}} </th>
                                            <td>{{$item->updated_at ?$item->updated_at : 'N/A'}} </th>
                                            <td>
                                                <a  href="{{ url('edit-blog') }}/{{$item->id}} " class="btn btn-info">Edit</a>
                                                <a  href="{{ url('delete-blog') }}/{{$item->id}} " class="btn btn-danger">Delete</a>
                                            </th>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                <h4>no data found</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- end row -->
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
