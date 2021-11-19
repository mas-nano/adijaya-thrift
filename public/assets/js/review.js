$(".fa-star").click(function(){
    for(i=1; i<=5; i++){
        if(i<=this.id){
            if($(`#${i}`).hasClass("far")){
                $(`#${i}`).removeClass("far");
                $(`#${i}`).addClass("fas");
            }
        }else{
            if($(`#${i}`).hasClass("fas")){
                $(`#${i}`).removeClass("fas");
                $(`#${i}`).addClass("far");
            }
        }
    }
    $("#rating").val(this.id);
});