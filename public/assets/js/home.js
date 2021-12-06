$(".lebih").click(function(e){
    e.preventDefault();
    showRekom(12);
    $(".more").empty();
});
function showRekom(jml){
    $.ajax({
        url: `/home/${jml}`,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(".rekom").empty();
            for(let i=0; i<data.length; i++){
                var formatter = new Intl.NumberFormat('de-DE', {
                    maximumFractionDigits: 0
                  });
                let append = `<li>
                <div class="produk" data-id="${data[i]["id"]}">
                    <img src="${data[i]["url"]}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang fs-24"><a href="/produk/${data[i]["id"]}">${data[i]["nama_produk"]}</a></p>
                    <p class="harga-barang fs-24">Rp${(data[i]["promo"])?"<strike>"+formatter.format(data[i]["harga"])+"</strike>":formatter.format(data[i]["harga"])}</p>
                    ${(data[i]["promo"])?'<p class="harga-barang orange fs-26">Rp'+formatter.format(data[i]["promo"])+"</p>":""}
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