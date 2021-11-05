showRekom(6);
$(".lebih").click(function(e){
    e.preventDefault();
    showRekom(12);
    $(".more").empty();
});
function showRekom(jml){
    $.ajax({
        url: `http://localhost:8000/api/produk/${jml}`,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(".rekom").empty();
            for(let i=0; i<data.length; i++){
                let append = `<li>
                <div class="produk" data-id="${data[i]["id"]}">
                    <img src="img/uploads/produk/${data[i]["foto"]}" alt="" srcset="" class="gambar-produk">
                    <p class="nama-barang"><a href="/produk/${data[i]["id"]}">${data[i]["nama_produk"]}</a></p>
                    <p class="harga-barang">Rp${data[i]["harga"]}</p>
                </div>
            </li>`;
            $(".rekom").append(append);
            }
        }
    });
}
$(".rekom").on("click",".produk",function(){
    console.log($(this).data("id"));
    let id = $(this).data("id");
    window.location.href = `http://localhost:8000/produk/${id}`;
})