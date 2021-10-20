$(".fa-star").click(function(){
    for(i=1; i<=5; i++){
        if(i<=this.id){
            $(`#${i}`).addClass("checked");
            
        }else{
            if($(`#${i}`).hasClass("checked")){
                $(`#${i}`).removeClass("checked");
            }
        }
    }
});