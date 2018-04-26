@extends('layouts.default1')
@section('content')
        <script type="text/javascript">
            $(document).ready(function () {
                console.log("ok");
                $.ajax({
                    url:'https://api.unsplash.com/photos/random?count=20&client_id=e46700269a7bd306ddf93d58bf0fd3b7bab44d8ce0e11f408ffd8766eb0c7c1e',
//                    url: 'https://api.unsplash.com/photos/?client_id=e46700269a7bd306ddf93d58bf0fd3b7bab44d8ce0e11f408ffd8766eb0c7c1e',
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data[0].urls.full);
                        var html = "";
                        for(var x=0; x<data.length;x++){
                          var image_url = data[x].urls.full;
                          html+='<a href="" class="mark_image" id="'+[x]+'">';
                          html+='<div class="image_block">';
                          html+='<div class="image_image" style="background-image: url('+image_url+')" >';
                          html+='<input type="hidden" name="url" value="'+image_url+'" id="url-'+[x]+'">'
                          html+='<div class="block_img_overlay">';
                          html+='</div></div></div></a>';


                        }
                        $("#all").append(html);
                    }
                });
            });
            $(document).on("click",".mark_image",function (ev) {
                ev.preventDefault();
                var id = $(this).attr('id');
                var  url= document.getElementById('url-'+id).value;
                var imageUrl = document.getElementById("image_url");
                imageUrl.value = url;

                $("#mark_image-modal").modal('show');
            });
            $(document).on("click","#image_save",function () {

                var url = document.getElementById('image_url').value;
                var description = document.getElementById('image_des').value;
                var data = new FormData();
                data.append("url", url);
                data.append("description", description);
                data.append("_token", '{{csrf_token()}}' );

                $.ajax({
                    headers: { 'csrftoken' : '{{ csrf_token() }}' },
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'post',
                    data: data,
                    url: '/save_images',
                    success: function (data) {
                       $('#image_des').val('');
                    }
                });
            });
        </script>

        <div class="row">
            <div class="col-sm-12">
                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-sm-12 sub_navi_wrapper">
                        <ul class="nav nav-tabs sub_navi" role="tablist">
                            <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
                            <li role="presentation" ><a href="{{url("/images")}}" >Favorite Images</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="row">
                    <form method="get" class="set_margin_0" enctype="multipart/form-data">
                        <div class="col-sm-12 image_elemet_wrapper">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" >
                                    <div class="image_block_outer" id="all">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mark_image-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frm_edit" role="form"   method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Image Mark as Favorite </h4>
                        </div>
                        <div class="modal-body" id="001">
                            <h5 class="modal-title">Add a Description </h5>
                            <input  type="text" value="" id="image_des" >
                            <input type="hidden" id="image_url" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="image_save" class="btn btn-default" data-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
@endsection

