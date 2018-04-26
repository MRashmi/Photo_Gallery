@extends('layouts.default1')
@section('content')
    <script type="text/javascript">
        $(document).on("click",".delete_image",function (ev) {
            ev.preventDefault();
            var image_id = $(this).attr('id');

            showConfirm("DELETE", "Do you want to delete this image ?","deleteImage("+image_id+")");
        });
        function deleteImage(id){
            $.ajax({
                type: 'get',
                url: '{!! url('delete_images') !!}',
                data: {image_id: id},
                success: function (data) {
                    if (data == "SUCCESS") {
                        $( '#'+id +'-del').empty();
                        location.reload();
                        showAlert("SUCCESS","Delete image successful");

                    }
                }, error: function (data) {
                    showAlert("FAIL","Delete image fail");
                }
            });

        }

        $(document).on("click",".delete_des",function (ev) {
            ev.preventDefault();
            var des_id = $(this).attr('id');

            showConfirm("DELETE", "Do you want to delete this description ?","deleteDes("+des_id+")");
        });
        function deleteDes(id){
            $.ajax({
                type: 'get',
                url: '{!! url('delete_des') !!}',
                data: {des_id: id},
                success: function (data) {
                    if (data == "SUCCESS") {
                        $('#'+ id +'-des').hide();
                        showAlert("SUCCESS","Delete description successful");
                    }
                }, error: function (data) {
                    showAlert("FAIL","Delete description fail");
                }
            });

        }
    </script>

    <div class="row">
        <div class="col-sm-12">
            <!-- Nav tabs -->
            <div class="row">
                <div class="col-sm-12 sub_navi_wrapper">
                    <ul class="nav nav-tabs sub_navi" role="tablist">
                        <li role="presentation" class="active"><a href="{{url("home")}}">Home</a></li>
                        <li role="presentation" class="active"><a href="" aria-controls="all" role="tab" data-toggle="tab">Favorite Images</a></li>

                    </ul>
                </div>
            </div>

            <!-- images  -->
            <div class="row">
                <form method="get" class="set_margin_0" enctype="multipart/form-data">
                    <div class="col-sm-12 image_elemet_wrapper">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" >
                                <div class="image_block_outer" id="all">
                                    @if($images != null)
                                        @foreach($images as $image)
                                                <div class="image_block">
                                                    @if($image->description != null)
                                                        <a href="" class="delete_des" id="{{$image->description->id}}">
                                                            <div id="{{$image->description->id}}-des">{{$image->description->description}}</div>
                                                        </a>
                                                        <input type="hidden" name="url" value="{{$image->description}}">
                                                    @endif
                                                        <a href="" class="delete_image" id="{{$image->id}}">
                                                        <div class="image_image" id="{{$image->id}}}-del" style="background-image: url({{$image->image_url}}); margin-top: 22px;"  >
                                                            <input type="hidden" name="url" value="{{$image->image_url}}" >
                                                            <div class="block_img_overlay"></div>
                                                        </div>
                                                        </a>
                                                </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection