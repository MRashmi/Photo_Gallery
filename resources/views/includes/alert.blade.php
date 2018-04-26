<!-- Alert Modal -->
<div class="modal fade reset-mdl" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center" id="modal_display_icon">
                    {{--alert icon--}}
                </h5>

                <div class="text-center" id="modal_display_text">
                    {{--alert message--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showAlert(status,msg) {
        var icon='';
        var color='';
        if (status == "SUCCESS") {
            color = "green-text";
            icon = "fa-check-circle-o fa-5x";
        } else {
            color = "red-text";
            icon = "fa-times-circle-o fa-5x";
        }
        $("#modal_display_text").html('<h4 class="'+color+'">' + msg + '</h4>');
        $("#modal_display_icon").html('<i class="fa ' + icon + ' ' + color + ' text-center" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></i>');
        $('#alert_modal').modal('show');
        setTimeout(function () { $('#alert_modal').modal('hide')}, 3000);
    }
</script>
<!-- End Alert Modal -->

<!-- Confirm Modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center" id="confirm_modal_display_icon">
                    {{--confirm icon--}}
                </h5>
                <div class="text-center" id="confirm_modal_display_text">
                    {{--confirm message--}}
                </div>
                <div class="text-center" id="confirm_modal_display_buttons">
                    {{--confirm buttons--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirm(status,msg,callback) {
        var icon='';
        var color='';
        if (status == "DELETE") {
            color = "red-text";
            icon = "fa-times-circle-o fa-5x";

            $("#confirm_modal_display_text").html('<h4 class="'+color+'">' + msg + '</h4>');
            $("#confirm_modal_display_icon").html('<i class="fa ' + icon + ' ' + color + ' text-center" data-dismiss="modal" aria-label="Close" aria-hidden="true"></i>');
            $("#confirm_modal_display_buttons").html('<input class="btn btn-danger" onclick="'+callback+'" type="button" value="Delete" data-dismiss="modal"><input class="col-sm-offset-1 btn" type="button" value="Cancel" data-dismiss="modal">');
            $('#confirm_modal').modal('show');
        }
    }
</script>
<!-- End Confirm Alert Modal -->

<!-- View Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <div class="text-center" id="view_modal_display_text">
                    {{--confirm message--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End View Modal -->

