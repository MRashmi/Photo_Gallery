/**
 * Created by Akalanka Imesh on 2/2/2017.
 */

//game window height set
$(document).ready(function () {
set_game_win();
$(window).resize(set_game_win);
function set_game_win() {


    $(".chat_feed").height($(window).height()-29);
    $(".side-bar").height($(window).height()-90);
    $(".com_tab_cont").height($(window).height()-224);
    $(".com_tab_cont_reply").height($(window).height()-166);
    $(".home_header_bg").height($(window).width()/3);
    if($(window).width()<768){
        $(".game_window").height($(window).height()-50);
        $(".navi_styles").addClass("navi_mini");
        $(".imi_side_bar").height($(window).height()-50);
        $(".com_tab_cont").height($(window).height()-180);
        $(".com_tab_cont_reply").height($(window).height()-166);
    }else{
        scroll_funcs();
        $(".game_window").height($(window).height()-70);
        $(".imi_side_bar").height($(window).height()-69);
        $(".com_tab_cont").height($(window).height()-223);
        $(".com_tab_cont_reply").height($(window).height()-166);
    }
}



    //game block rating display
    /*$(".game_rating, .user_rating,.recent_bar_rate").rateYo({
        starWidth: "15px",
        maxValue: 5,
        halfStar: true,
        readOnly: true,
        spacing   : "5px",
        normalFill: "#ebebeb",
        ratedFill: "#ffd321",
        rating : 3.5,
        starSvg: "<svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'>"+
        "<path d='M12.6,1.9l3,6.3l6.9,1c0.6,0.1,0.8,0.8,0.4,1.2l-5,4.8l1.2,6.9c0.1,0.6-0.5,1-1,0.7L12,19.4l-6.1,3.3 c-0.5,0.3-1.1-0.2-1-0.7l1.2-6.9l-5-4.8C0.6,9.9,0.9,9.2,1.4,9.1l6.9-1l3-6.3C11.6,1.4,12.4,1.4,12.6,1.9z'/>"+
        "</svg>"
    });*/

    //end of game block rating display
    //user rating
    $(".user_star_rating").rateYo({
        starWidth: "30px",
        maxValue: 5,
        halfStar: true,
        spacing   : "5px",
        normalFill: "#ebebeb",
        onSet: function (rating) {
            /*setTimeout(function () {
             disply_rate(rating);
             },100);*/
        },
        ratedFill: "#ffd321",
        rating : 0.0,
        starSvg: "<svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'>"+
        "<path d='M12.6,1.9l3,6.3l6.9,1c0.6,0.1,0.8,0.8,0.4,1.2l-5,4.8l1.2,6.9c0.1,0.6-0.5,1-1,0.7L12,19.4l-6.1,3.3 c-0.5,0.3-1.1-0.2-1-0.7l1.2-6.9l-5-4.8C0.6,9.9,0.9,9.2,1.4,9.1l6.9-1l3-6.3C11.6,1.4,12.4,1.4,12.6,1.9z'/>"+
        "</svg>"
    });

    $(function () {

        $(".user_star_rating").rateYo()
            .on("rateyo.change", function (e, data) {
                //alert("change");
                var rating = data.rating;
                $(".rating_value").text(rating.toFixed(1));
            });
    });
    //maximum number of elements in a row
    /*function calculateLIsInRow() {
     var lisInRow = 0;
     $('ul li').each(function() {
     if($(this).prev().length > 0) {
     if($(this).position().top != $(this).prev().position().top) return false;
     lisInRow++;
     }
     else {
     lisInRow++;
     }
     });

     var lisInLastRow = $('ul li').length % lisInRow;
     if(lisInLastRow == 0) lisInLastRow = lisInRow;

     //$('.result').html('No: of lis in a row = ' + lisInRow + '<br>' + 'No: of lis in last row = ' + lisInLastRow  );
     }

     calculateLIsInRow();

     $(window).resize(calculateLIsInRow);*/


    $('.recently_played').on('mousemove', function(e) {
            $('.bottom_recent_wrapper').scrollLeft(e.pageX*2);
    });

    //recent game list toggle
    $(".recent_games").click(function () {
        $(this).toggleClass("recent_games_transform");
        $(".recently_played").toggleClass("bot_0");
        if($(".recently_played").is(".bot_0")){
            $(".game_overlay").fadeIn();
        }else{
            $(".game_overlay").fadeOut();
        }
        $(".imi_side_bar, .chat_feed").removeClass("right_0");
    });

    $(".side_bar_tog i").click(function () {
        $(".imi_side_bar").toggleClass("right_0");
        $(".recently_played").removeClass("bot_0");
        $(".recent_games").removeClass("recent_games_transform");
    });


    $(".game_overlay").click(function () {
        $(this).fadeOut();
        var gat_elements = $(".imi_side_bar, .chat_feed, .recently_played, .recent_games");
        if(gat_elements.is(".right_0")){
            gat_elements.removeClass("right_0");
        }
        if(gat_elements.is(".bot_0")){
            gat_elements.removeClass("bot_0");
        }
        if(gat_elements.is(".recent_games_transform")){
            gat_elements.removeClass("recent_games_transform");
        }
    });

    $(".side_bar_tog i:eq(0)").click(function () {
        $('.sidebar_tabs li:eq(0) a').tab('show');
        $(".sidebar_title").text("Comments");
        $(".game_overlay").fadeIn();
    });

    $(".side_bar_tog i:eq(1)").click(function () {
        $('.sidebar_tabs li:eq(1) a').tab('show');
        $(".sidebar_title").text("Leaderboard");
        $(".game_overlay").fadeIn();
    });

    $(".side_bar_tog i:eq(2)").click(function () {
        $('.sidebar_tabs li:eq(2) a').tab('show');
        $(".sidebar_title").text("Chat");
        $(".game_overlay").fadeIn();

    });


    $(".display_bar_close").click(function () {
        $("#light").removeClass("bg_pulse");
        $(".imi_side_bar").toggleClass("right_0");
        $(".game_overlay").fadeOut();
    });



    $(".reply_btn").click(function () {
        $(".chat_feed").toggleClass("right_0");
    });

    $(".chat_feed_close").click(function () {
        $(".chat_feed").toggleClass("right_0");
    });

    $(".comments").click(function () {
        $(".sidebar_title").text("Comments");
    });

    $(".leaderboard").click(function () {
        $(".sidebar_title").text("Leaderboard");
    });

    $(".chat").click(function () {
        $(".sidebar_title").text("Chat");
    });

    //sing in , sign up side bar and forgotpw
    $(".side_bar_singin").click(function () {
        $(".side-bar-singin").toggleClass("right_0");
        if($(".side-bar-singup, .side-bar-forgotpw").is(".right_0")){
            $(".side-bar-singup, .side-bar-forgotpw").removeClass("right_0");
        }
    });

    $(".side_bar_singup").click(function () {
        $(".side-bar-singup").toggleClass("right_0");
        if($(".side-bar-singin, .side-bar-forgotpw").is(".right_0")){
            $(".side-bar-singin, .side-bar-forgotpw").removeClass("right_0");
        }
    });

    $(".forgot_pw").click(function () {
        $(".side-bar-forgotpw").toggleClass("right_0");
        if($(".side-bar-singup").is(".right_0")){
            $(".side-bar-singup").removeClass("right_0");
        }
    });


    $(".close_singin").click(function () {
        $(".side-bar-singin").toggleClass("right_0");
    });

    $(".close_singup").click(function () {
        $(".side-bar-singup").toggleClass("right_0");
    });

    $(".close_forgotpw").click(function () {
        $(".side-bar-forgotpw").toggleClass("right_0");
    });





    //profile edit UX
    $(".propic_update").click(function () {
        //$(".propic_uploader").click();
    });

    $(".propic_preview").click(function () {
        $("#propic_upload").click();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var filename = input.value;
                var lastIndex = filename.lastIndexOf("\\");
                if (lastIndex >= 0) {
                    filename = filename.substring(lastIndex + 1);
                }
                //alert(filename);
                $('.propic_selector').css('background-image', 'url('+e.target.result+')');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".propic_uploader").change(function(){
        readURL(this);
    });

    $("#propic_upload").change(function(){
        readURL(this);
    });

    //footer animate in and out
    if($(window).width()<768){
        $(".navi_styles").addClass("navi_mini");
    }

    if($(document).scrollTop()>100){
        if(!$(".footer").is(".bottom_0")) {
            //$(".footer").addClass("bottom_0");
            $(".navi_styles").addClass("navi_mini");
            $(".side-bar").css("top", "45px");
        }
    }

    /*if($(document).height()>$("body").height()){
     if(!$(".footer").is(".bottom_0")) {
     $(".footer").addClass("bottom_0");
     }
     }*/

    $(window).scroll(function () {
        scroll_funcs();
    });

    function scroll_funcs() {
        var doc_scrolltop = $(document).scrollTop();

        if(doc_scrolltop>100){
            if(!$(".footer").is(".bottom_0")) {
                //$(".footer").addClass("bottom_0");
                $(".navi_styles").addClass("navi_mini");
                $(".side-bar").css("top", "45px");
                $(".side-bar").height($(window).height()-60);
            }

        }
        else{
            //$(".footer").removeClass("bottom_0");
            if($(window).width()>768){
                $(".navi_styles").removeClass("navi_mini");
                $(".side-bar").css("top", "70px");
                $(".side-bar").height($(window).height()-90);
            }
        }
    }

    //set game blocks center
    getBrowserWith();
    function getBrowserWith(){

        //return screen.width;
        //alert(screen.width);
    }

    setTimeout(function () {
        set_blocks_center();
    },2000);



    $(window).resize(set_blocks_center);

    function set_blocks_center() {
        var win_width = $(window).width();
        var block_width = $(".game_block").outerWidth(true);
        var block_count = (win_width/block_width).toFixed(2);
        var num_length = block_count.length;
        var low_ful_num = block_count.substring(0, num_length-3);
        var block_outer = (block_width*low_ful_num)+22;
        $(".game_block_outer").width(block_outer);
        $(".sub_navi").css("padding-left", (win_width-block_outer)/2+"px");
        $(".pw_reset_bg").height($(window).height());
        setTimeout(function () {
            $(".bottom_recent_list").width(block_width*10);
        },100);
        //console.log("Block count "+low_ful_num+" , window width "+win_width+" , block width "+block_width);
    }


    //form validation
    $("input").focusout(function () {
        var slec_label = $(this).siblings("label").children("span");
        //text inputs
        if($(this).is( "[type=text]" )){
            var usrname = $(this).val();
            if (usrname.length == 0) {
                slec_label.text("Please enter Username");
                error = true;
            }
            else if (usrname.length > 20) {
                slec_label.text("It's too long");
                error = true;
            }
            else if (usrname.length < 3) {
                slec_label.text("It's too short");
                error = true;
            }
            else {
                slec_label.text("");
            }
        }

        //password input
        if($(this).is("[type=password]")){
            var password = $(this).val();
            if (password.length == 0) {
                slec_label.text("Please enter Password");
                error = true;
            }
        }

        //email input
        if($(this).is( "[type=email]" )){
            var email = $(this).val();
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");

            if (email.length == 0) {
                slec_label.text("Pelase enter your Email");
                error = true;
            }
            else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length && email.length > 0) {
                slec_label.text("Invalid Email");
                error = true;
            }

            else {
                slec_label.text("");
            }
        }
    });

});
