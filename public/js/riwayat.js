function show(data){
    $.ajax({
        url: "http://localhost:8000/api/pemesanan",
        method: "GET",
        dataType: "json",
        data: data,
        success: function(data){
            if(data['bayar'].length>0){
                $("#produk").empty();
                for(let i=0; i<data['bayar'].length; i++){
                    let append = `<div class="status-produk">
                    <img src="img/uploads/produk/${data['produk'][i]['foto']}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${data['produk'][i]['nama_produk']}</p>
                        <p class="louis-16">${data['status_pembeli'][i]}</p>
                    </div>
                    <p class="flex-5 align-r louis-16"><a href="/detail-pemesanan/${data['pemesanan_id'][i]}" class="link-detail">Detail</a></p>
                </div>`;
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
let data = {
    user_id: $("#user_id").val()
}
show(data);
$("#filter").change(function(){
    let data = {
        user_id: $("#user_id").val(),
    }
    if($("#filter").val()!=""){
        data.filter = $("#filter").val();
    }
    show(data);
});