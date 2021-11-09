function showTawar(data){
    $.ajax({
        url: "http://localhost:8000/api/penawaran",
        method: "GET",
        dataType: "json",
        data: data,
        success: function(data){
            console.log(data['tawar']);
            if(data['tawar'].length>0){
                $("#tawar").empty();
                $.each(data['tawar'], function(index, obj){
                    console.log(obj);
                    let append = `<div class="status-produk">
                    <img src="img/sepatu.png" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${obj.user.name}</p>
                        <p class="louis-16">${obj.produk.nama_produk}</p>
                    </div>
                    <div class="flex-5 align-r">
                        <p class="louis-16">Rp${new Intl.NumberFormat('de-DE').format(obj.nominal)}</p>
                        <button class="btn bg-orange">Terima</button>
                        <button class="btn bg-red">Tolak</button>
                    </div>
                </div>`;
                
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
    penjual_id: $("#penjual_id").val()
};
