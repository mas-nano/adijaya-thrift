let tmp_side = 0;
$(".content").css("margin-left", 85+"px");
$("#logo").click(function(){
    if(tmp_side<1){
        $(".content").css("margin-left", 205+"px");
        $(".sidenav").width(200);
        $("#logo").addClass("flex");
        $("#logo").addClass("align-r");
        for(i=0; i<$(".icon").length; i++){
            if($(".icon").hasClass("ta-c")){
                $(".icon").removeClass("ta-c");
                $(".icon").addClass("mg-l-3");
                $(".icon").addClass("ta-l");
            }
            if($(".icon").hasClass("l0")){
                $(".icon").removeClass("l0");
            }
        }
        for(i=0; i<$(".icon-det").length; i++){
            if($(".icon-det").hasClass("none")){
                $(".icon-det").removeClass("none");
            }
        }
        tmp_side = 1;
    }else{
        $(".content").css("margin-left", 85+"px");
        $(".sidenav").width(80);
        for(i=0; i<$(".icon").length; i++){
            if($(".icon").hasClass("ta-l")){
                $(".icon").removeClass("ta-l");
                $(".icon").removeClass("mg-l-3");
                $(".icon").addClass("ta-c");
            }
            if(i==6){
                $(".icon").addClass("l0");
            }
        }
        for(i=0; i<$(".icon-det").length; i++){
            if(!$(".icon-det").hasClass("none")){
                $(".icon-det").addClass("none");
            }
            
        }
        tmp_side = 0;
    }
});