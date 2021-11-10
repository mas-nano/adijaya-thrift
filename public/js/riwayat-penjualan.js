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
        url: "http://localhost:8000/riwayat-penjualan",
        type: "POST",
        dataType: 'json',
        data: post,
        success: function(data){
            if(data.length>0){
                $("#hasil").empty();
                $.each(data, function(index, obj){
                    let append = `<div class="status-produk">
                    <img src="img/uploads/produk/${obj.produk.foto}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${obj.produk.nama_produk}</p>
                        <p class="louis-12 ${(obj.status_penjual=='Sudah dicairkan')?"green":""}">${(obj.status_penjual=='Sudah dikirim')?"Belum Diterima":obj.status_penjual}</p>
                    </div>
                    <p class="flex-5 align-r louis-12"><a href="/detail-pemesanan/${obj.id}" class="td-0 black link-detail${(obj.status_penjual=='Selesai')?" "+obj.status_penjual:""}">`;
                    if(obj.status_penjual=='Selesai'){
                        append = append+`Ajukan pencairan`
                    }else if(obj.status_penjual=='Sudah dicairkan'&&obj.status_penjual=='Proses'){
                    }else{
                        append = append+`Detail`;
                    }
                    append = append+`</a></p>
                    </div>
                    ${(index+1==data.length)?"":'<hr class="grey">'}`;
                    $("#hasil").append(append);
                });
            }else{
                $("#hasil").empty();
                let append = `<p class="warn">Penjualan tidak ditemukan</p>`;
                $("#hasil").append(append);
            }
        }
    })
})