$("#filter").change(function () {
    var post = {
        user_id: $("#user_id").val(),
        _token: $("#_token").val(),
    };
    if ($("#filter").val() != "") {
        post.filter = $("#filter").val();
    }
    $.ajax({
        url: "/riwayat-penjualan",
        type: "POST",
        dataType: "json",
        data: post,
        success: function (data) {
            if (data.length > 0) {
                $("#hasil").empty();
                $.each(data, function (index, obj) {
                    let append = `<div class="status-produk">
                    <img src="${obj.produk.url}" alt="">
                    <div class="flex-5 mg-l-3">
                        <p class="louis-16">${obj.produk.nama_produk}</p>
                        <p class="louis-12 ${
                            obj.status_ajukan == "Sudah dicairkan"
                                ? "green"
                                : ""
                        }">${
                        !obj.status_ajukan
                            ? obj.status_terima
                            : obj.status_ajukan
                    }</p>
                    </div>
                    <p class="flex-5 align-r louis-12"><a href="/detail-pemesanan/${
                        obj.id
                    }" class="td-0 black${
                        obj.status_terima == "Selesai"
                            ? " " + obj.status_terima
                            : ""
                    }" data-pemesanan_id="${obj.id}">`;
                    if (obj.status_terima == "Selesai") {
                        if (
                            !obj.status_ajukan &&
                            obj.pembayaran.metode_bayar != "cod"
                        ) {
                            append =
                                append +
                                `<span class="link-detail">Ajukan pencairan</span>`;
                        }
                    } else {
                        append =
                            append + `<span class="link-detail">Detail</span>`;
                    }
                    append =
                        append +
                        `</a></p>
                    </div>
                    ${index + 1 == data.length ? "" : '<hr class="grey">'}`;
                    $("#hasil").append(append);
                });
            } else {
                $("#hasil").empty();
                let append = `<p class="warn">Penjualan tidak ditemukan</p>`;
                $("#hasil").append(append);
            }
        },
    });
});
$("#hasil").on("click", ".Selesai", function (e) {
    e.preventDefault();
    $.ajax({
        url: "/riwayat-penjualan/ajukan",
        type: "POST",
        dataType: "json",
        data: {
            user_id: $("#user_id").val(),
            _token: $("#_token").val(),
            pemesanan_id: $(this).data("pemesanan_id"),
            status_ajukan: "Belum dicairkan",
        },
        success: function (data) {
            window.location.href = "/riwayat-penjualan";
        },
    });
});
