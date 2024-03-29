var take = 9;
let data = {
    search: $("#search").val(),
    promo: $("#promo").val(),
};
show(data, take);
$(".btn-filter").click(function (e) {
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
        max: $("#max").val(),
    };
    show(data, take);
});
$(".more").click(function (e) {
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
        max: $("#max").val(),
    };
    show(data, take);
});
function show(data = null, take) {
    $.ajax({
        url: `/produk/search/${take}`,
        type: "GET",
        dataType: "json",
        data: data,
        success: function (data) {
            if (data.length > 0) {
                $(".hasil").empty();
                var formatter = new Intl.NumberFormat("de-DE", {
                    maximumFractionDigits: 0,
                });
                for (let i = 0; i < data.length; i++) {
                    let append = `<div class="produk" data-id="${
                        data[i]["id"]
                    }">
                        <img src="${
                            data[i]["url"]
                        }" alt="" srcset="" class="gambar-produk">
                        <p class="nama-barang fs-18">${
                            data[i]["nama_produk"]
                        }</p>
                        <p class="harga-barang fs-18">Rp${
                            data[i]["promo"]
                                ? "<strike>" +
                                  formatter.format(data[i]["harga"]) +
                                  "</strike>"
                                : formatter.format(data[i]["harga"])
                        }</p>
                        ${
                            data[i]["promo"]
                                ? '<p class="harga-barang orange fs-26">Rp' +
                                  formatter.format(data[i]["promo"]) +
                                  " (-" +
                                  Math.round(
                                      ((data[i]["harga"] - data[i]["promo"]) /
                                          data[i]["harga"]) *
                                          100
                                  ) +
                                  "%)</p>"
                                : ""
                        }
                </div>`;
                    $(".hasil").append(append);
                }
            } else {
                $(".hasil").empty();
                let append = `<p class="warn">Produk tidak ditemukan</p>`;
                $(".hasil").append(append);
            }
        },
    });
}
$(".hasil").on("click", ".produk", function () {
    console.log($(this).data("id"));
    let id = $(this).data("id");
    window.location.href = `/produk/${id}`;
});
