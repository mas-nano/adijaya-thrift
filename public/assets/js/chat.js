if($(".last").length){
    $('.wrapper-pesan').animate({
        scrollTop: $(".wrapper-pesan").get(0).scrollHeight
    });
}
$(".left").on("click", ".pengirim", function(){
    $(".pengirim").removeClass("click")
    $(this).addClass("click")
    let userChat = $(this).data("id")
    $.ajax({
        url: `/chat/${userChat}`,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(".wrapper-pesan").empty()
            if(data.length){
                $.each(data, function(index, obj){
                    let append = `<div class="${(obj.user_id==$("#user_id").val())?"send":"receive"} ${(index+1==data.length)?"last":""}">
                        <p>${obj.pesan}</p>
                    </div>`
                    $(".wrapper-pesan").append(append)
                    if(index+1==data.length){
                        id = obj.id
                    }
                })
            }
            $("#userChatId").val(userChat)
            if($(".last").length){
                let target = $(".last")
                $('.wrapper-pesan').animate({
                    scrollTop: target.offset().top
                });
            }
        }
    })
})
$("#form-send").keydown(function(e){
    if(e.keyCode==13){
        e.preventDefault()
        sendMessage($("#_token").val(), $("#pesan").val(), $("#userChatId").val())
        $("#pesan").val("")
    }
})
$(".img-send").click(function(){
    sendMessage($("#_token").val(), $("#pesan").val(), $("#userChatId").val())
    $("#pesan").val("")
})
function sendMessage(token, pesan, userChatId){
    $.ajax({
        url: `/chat/${userChatId}`,
        type: "POST",
        dataType: "json",
        data: {
            _token: token,
            pesan: pesan,
            user_chat_id: userChatId
        },
        success: function(data){
            console.log(data);
            $(".send").removeClass("last")
            $(".receive").removeClass("last")
            let append = `<div class="${(data.user_id==$("#user_id").val())?"send":"receive"} last">
                <p>${data.pesan}</p>
            </div>`
            $(".wrapper-pesan").append(append)
            id = data.id
            console.log($(".last").length);
            $('.wrapper-pesan').animate({
                scrollTop: $(".wrapper-pesan").get(0).scrollHeight
            });
        }
    })
}
setInterval(function(){
    $.ajax({
        url: `/chat/latest/${$("#userChatId").val()}`,
        type: "GET",
        dataType: "json",
        success: function(data){
            if(data){
                if(data.id!=id){
                    id = data.id
                    $(".send").removeClass("last")
                    $(".receive").removeClass("last")
                    let append = `<div class="${(data.user_id==$("#user_id").val())?"send":"receive"} last">
                        <p>${data.pesan}</p>
                    </div>`
                    $(".wrapper-pesan").append(append)
                    $('.wrapper-pesan').animate({
                        scrollTop: $(".wrapper-pesan").get(0).scrollHeight
                    });
                }
            }
        }
    })
    $.ajax({
        url: `/chat/latest/user/get`,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(".left").empty()
            $.each(data, function(index, obj){
                let append = `<div class="pengirim ${(obj.id==$("#userChatId").val())?"click":""}" data-id="${obj.id}">
                <div class="nama">
                    <p class="nama-asli">${(obj.penerima_id==$("#user_id").val())?obj.user.name:obj.penerima.name}</p>
                    <p class="username">${(obj.penerima_id==$("#user_id").val())?'@'+obj.user.username:'@'+obj.penerima.username}</p>
                </div>
            </div>`
            $(".left").append(append)
            })
        }
    })
}, 5000)