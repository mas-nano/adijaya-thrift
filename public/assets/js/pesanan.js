$("#filter").change(function(){
    var post = {
        user_id: $("#user_id").val(),
        _token: $("#_token").val()
    }
    if($("#filter").val()!=""){
        post.filter = $("#filter").val();
    }
    console.log(post);
    $.ajax({
        url: "/pesanan-masuk",
        type: "POST",
        dataType: 'json',
        data: post,
        success: function(data){
            if(data.length>0){
                $("#hasil").empty();
                $.each(data, function(index, obj){
                    if(obj.status_kirim){
                        let append = `<div class="status-produk">
                        <img src="${obj.produk.url}" alt="">
                        <div class="flex-5 mg-l-3">
                            <p class="louis-16">${obj.produk.nama_produk}</p>
                            <p class="louis fs-14 ${(obj.status_kirim=='Sudah dikirim')?"green":""}">${obj.status_kirim}</p>
                        </div>
                        <p class="flex-5 align-r louis-16"><a href="/detail-pemesanan/${obj.id}" class="td-0 black">Detail</a></p>
                        </div>
                        ${(index+1==data.length)?"":'<hr class="grey">'}`;
                        $("#hasil").append(append);
                    }else{
                        $("#hasil").empty();
                        let append = `<p class="warn">Penjualan tidak ditemukan</p>`;
                        $("#hasil").append(append);
                    }
                });
            }else{
                $("#hasil").empty();
                let append = `<p class="warn">Penjualan tidak ditemukan</p>`;
                $("#hasil").append(append);
            }
        }
    })
})