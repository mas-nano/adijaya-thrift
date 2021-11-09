var take = 9;
let data = {
    search: $("#search").val(),
    promo: $("#promo").val()
};
show(data, take);
$(".btn-filter").click(function(e){
    e.preventDefault();
    take = 9;
    let data = {
        promo: $("#promo").val(),
        take: take,
        search: $("#search").val(),
        kategori: $("#kategori").val(),
        sort: $("#sort").val(),
        daerah: $("#daerah").val(),
        min: $("#min").val(),
        max: $("#max").val()
    };
    show(data, take);
});
$(".more").click(function(e){
    e.preventDefault();
    take += 9;
    let data = {
        promo: $("#promo").val(),
        take: take,
        search: $("#search").val(),
        kategori: $("#kategori").val(),
        sort: $("#sort").val(),
        daerah: $("#daerah").val(),
        min: $("#min").val(),
        max: $("#max").val()
    };
    show(data, take);
})
function show(data=null, take){
    $.ajax({
        url: `http://localhost:8000/api/produk/${take}`,
        type: "GET",
        dataType: "json",
        data: data,
        success: function(data){
            if(data.length>0){
                $(".hasil").empty();
                for(let i=0; i<data.length; i++){
                    let append = `<li>
                    <div class="produk" data-id="${data[i]["id"]}">
                        <img src="img/uploads/produk/${data[i]['foto']}" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang fs-18">${data[i]["nama_produk"]}</p>
                        <p class="harga-barang fs-18">Rp${(data[i]["promo"])?"<strike>"+data[i]["harga"]+"</strike>":data[i]["harga"]}</p>
                        <p class="harga-barang fs-20 orange">${(data[i]["promo"])?"Rp"+data[i]["promo"]:""}</p>
                    </div>
                </li>`;
                $(".hasil").append(append);
                }
            }else{
                $(".hasil").empty();
                let append = `<p class="warn">Produk tidak ditemukan</p>`;
                $(".hasil").append(append);
            }
        }
    });
}
$(".hasil").on("click",".produk",function(){
    console.log($(this).data("id"));
    let id = $(this).data("id");
    window.location.href = `http://localhost:8000/produk/${id}`;
})