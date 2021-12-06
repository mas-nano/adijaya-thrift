function show(data){
    $.ajax({
        url: "/riwayat/pemesanan",
        method: "GET",
        dataType: "json",
        data: data,
        success: function(data){
            if(data['bayar'].length>0){
                $("#produk").empty();
                for(let i=0; i<data['bayar'].length; i++){
                    let append = `<div class="status-produk">
                    <img src="${data['produk'][i]['url']}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${data['produk'][i]['nama_produk']}</p>
                        <p class="louis-16">${data['status_pembeli'][i]}</p>
                    </div>
                    <p class="flex-5 align-r louis-16"><a href="/detail-pemesanan/${data['pemesanan_id'][i]}" class="link-detail">Detail</a></p>
                </div>
                ${(i+1==data['bayar'].length)?"":'<hr class="grey">'}`;
                $("#produk").append(append);
                }
            }else{
                $("#produk").empty();
                let append = `<p class="warn">Produk tidak ditemukan</p>`;
                $("#produk").append(append);
            }
        }
    });
}
function showTawar(data){
    $.ajax({
        url: "/riwayat/penawaran",
        method: "GET",
        dataType: "json",
        data: data,
        success: function(data){
            if(data['tawar'].length>0){
                $("#tawar").empty();
                $.each(data['tawar'], function(index, obj){
                    let append = `<div class="status-produk">
                    <img src="${obj.produk.url}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${obj.produk.nama_produk}</p>
                        <p class="louis-16 ${(obj.status=='Ditolak')?"red":""} ${(obj.status=='Diterima')?"green":""}">${obj.status}</p>
                    </div>
                    <p class="flex-5 align-r louis-16"><a href="/checkout/${obj.produk.id}" class="link-detail">${(obj.status=='Diterima')?"Detail":""}</a></p>
                </div>
                ${(index+1==data['tawar'].length)?"":'<hr class="grey">'}`;
                
                $("#tawar").append(append);
                });
            }else{
                $("#tawar").empty();
                let append = `<p class="warn">Penawaran tidak ditemukan</p>`;
                $("#tawar").append(append);
            }
        }
    });
}
let data = {
    user_id: $("#user_id").val()
}
show(data);
showTawar(data);
$("#filter").change(function(){
    let data = {
        user_id: $("#user_id").val(),
    }
    if($("#filter").val()!=""){
        data.filter = $("#filter").val();
    }
    show(data);
});
$("#f-tawar").change(function(){
    let data = {
        user_id: $("#user_id").val(),
    }
    if($("#f-tawar").val()!=""){
        data.filter = $("#f-tawar").val();
    }
    showTawar(data);
});