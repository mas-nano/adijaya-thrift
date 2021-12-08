var id = "";
// Get modal element
var modal = document.getElementById("modalBox");
var modalShare = document.getElementById("modalShare");
// Get open modal button
var modalBtn = document.querySelectorAll("#modal");
// Get close button
var tidak = document.getElementById("tidak");
// Listen for open click
for (let i = 0; i < modalBtn.length; i++) {
    modalBtn[i].addEventListener("click", openModal);
}
$(".fa-share-alt").click(function () {
    modalShare.style.display = "block";
});
$(".fa-link").click(function () {
    navigator.clipboard.writeText($("#link").val());
    alert("Link sudah tersalin di papan klip");
});
$("#tawar").click(function () {
    modal.style.display = "block";
});
// Listen for close click
$(".modal").on("click", ".close", closeModal);

// Listen for outside click
window.addEventListener("click", outsideClick);
if (tidak) {
    tidak.addEventListener("click", closeModal);
}

// Function to open modal
function openModal() {
    modal.style.display = "block";
    id = $(this).data("id");
}

// Function to close modal
function closeModal() {
    modal.style.display = "none";
    modalShare.style.display = "none";
    $("#modalLoading").css("display", "none");
}

// Function to close modal if outside click
function outsideClick(e) {
    if (e.target == modal || e.target == modalShare) {
        modal.style.display = "none";
        modalShare.style.display = "none";
    }
}
$(".fa-heart").click(function () {
    if ($(".fa-heart").hasClass("orange")) {
        $.ajax({
            url: `/wishlist/${$(this).data("id")}`,
            type: "DELETE",
            dataType: "json",
            data: {
                _token: $("#_token").val(),
            },
            success: function () {
                $(".fa-heart").removeClass("orange");
                $(".fa-heart").removeClass("fas");
                $(".fa-heart").addClass("far");
            },
            error: function (e) {
                console.log(e);
            },
        });
    } else {
        $.ajax({
            url: "/wishlist",
            type: "POST",
            dataType: "json",
            data: {
                _token: $("#_token").val(),
                user_id: $(this).data("user"),
                produk_id: $(this).data("produk"),
            },
            success: function (data) {
                $(".fa-heart").addClass("orange");
                $(".fa-heart").removeClass("far");
                $(".fa-heart").addClass("fas");
                id = data.data.id;
            },
            error: function (e) {
                console.log(e);
            },
        });
    }
});
$("#yakin-admin").click(function () {
    let url = `/admin/admin/hapus/${id}`;
    let loc = "admin";
    hapus(url, loc);
});
$("#yakin-user").click(function () {
    let url = `/admin/pengguna/hapus/${id}`;
    let loc = "pengguna";
    hapus(url, loc);
});
$("#yakin-produk").click(function () {
    let url = `/admin/produk/hapus/${id}`;
    let loc = "produk";
    hapus(url, loc);
});
function hapus(url, loc) {
    $.ajax({
        url: url,
        type: "DELETE",
        dataType: "json",
        data: {
            _token: $("#_token").val(),
        },
        success: function (data) {
            window.location.href = `/admin/${loc}`;
        },
    });
}
$(".fa-comment-alt").click(function () {
    $("#modalLoading").css("display", "block");
    $.ajax({
        url: `/produk/${$(this).data("id")}/chat`,
        type: "POST",
        dataType: "json",
        data: {
            _token: $("#_token").val(),
        },
        success: function () {
            window.location.href = "/chat";
        },
        error: function () {
            $(".modalLoading").empty();
            $(".modalLoading").css("background-color", "white");
            let append = `<p class="close fa fa-chevron-left"></p>
            <p class="sub">Terjadi kesalahan jaringan</p>
            <button type="button" class="btnBack"><a href="/" class="beli">Kembali</a></button>`;
            $(".modalLoading").append(append);
        },
    });
});
$(".fa-print").click(() => {
    PrintDiv("print", "Nota Pembelian");
});
function PrintDiv(divid, title) {
    var contents = document.getElementById(divid).innerHTML;
    var frame1 = document.createElement("iframe");
    frame1.name = "frame1";
    frame1.style.position = "absolute";
    frame1.style.top = "-1000000px";
    document.body.appendChild(frame1);
    var frameDoc = frame1.contentWindow
        ? frame1.contentWindow
        : frame1.contentDocument.document
        ? frame1.contentDocument.document
        : frame1.contentDocument;
    frameDoc.document.open();
    frameDoc.document.write(`<html><head><style>* {
        font-size: 12px;
        font-family: 'Times New Roman';
    }
    
    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }
    table {
        width: 100%;
    }
    td.quantity,
    th.quantity {
        width: 20px;
        max-width: 20px;
        word-break: break-all;
        text-align: center;
    }
    .centered {
        text-align: center;
        align-content: center;
    }
    .ticket {
        width: 60mm;
        max-width: 200px;
    }
    .mh{
        height: 50px;
        width: 100px;
        object-fit: cover;
        margin: auto;
        display: block;
    }
    .m-0{
        margin: 0px;
    }
    </style>`);
    frameDoc.document.write("</head><body>");
    frameDoc.document.write(contents);
    frameDoc.document.write("</body></html>");
    frameDoc.document.close();
    setTimeout(function () {
        window.frames["frame1"].focus();
        window.frames["frame1"].print();
        document.body.removeChild(frame1);
    }, 500);
    return false;
}
