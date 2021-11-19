showRekom(6);
$(".lebih").click(function(e){
    e.preventDefault();
    showRekom(12);
    $(".more").empty();
});
function showRekom(jml){
    $.ajax({
        url: `api/produk/${jml}`,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(".rekom").empty();
            for(let i=0; i<data.length; i++){
                let append = `<li>
                <div class="produk" data-id="${data[i]["id"]}">
                    <img src="/assets/img/uploads/produk/${data[i]["foto"]}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang fs-24"><a href="/produk/${data[i]["id"]}">${data[i]["nama_produk"]}</a></p>
                    <p class="harga-barang fs-24">Rp${(data[i]["promo"])?"<strike>"+data[i]["harga"]+"</strike>":data[i]["harga"]}</p>
                    ${(data[i]["promo"])?'<p class="harga-barang orange fs-26">Rp'+data[i]["promo"]+"</p>":""}
                </div>
            </li>`;
            $(".rekom").append(append);
            }
        }
    });
}
$(".rekom").on("click",".produk",function(){
    let id = $(this).data("id");
    window.location.href = `/produk/${id}`;
})