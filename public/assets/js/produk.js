var id = '';
// Get modal element
var modal = document.getElementById('modalBox');
// Get open modal button
var modalBtn = document.querySelectorAll('#modal');
// Get close button
var closeBtn = document.getElementsByClassName('close')[0];
var tidak = document.getElementById('tidak');
// Listen for open click
for(let i=0; i<modalBtn.length; i++){
    modalBtn[i].addEventListener('click', openModal);
}
$(".fa-share-alt").click(function(){
    $(".fill").empty()
    let append = `<p class="sub">Bagikan ke</p>
    <div class="flex ai-center jc-sa mt-1">
    <i class="fas fa-link fa-5x icon"></i>
    <a href="https://www.facebook.com/sharer/sharer.php?u=${$("#link").val()}" class="td-0 black" target="_blank">
    <i class="fab fa-facebook-square fa-5x"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%3A8000%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Eshare%7Ctwgr%5E&text=Produk%20-%20Adijaya%20Thrift&url=${$("#link").val()}" target="_blank"><i class="fab fa-twitter-square fa-5x td-0 black"></i></a>
</div>`
    $(".fill").append(append)
    openModal()
    $(".fa-link").click(function(){
        navigator.clipboard.writeText($("#link").val())
        alert('Link sudah tersalin di papan klip')
    })
})
$("#tawar").click(function(){
    $(".fill").empty()
    $(".fill").append(`<p class="sub">Buat Penawaran</p>
        <input type="text" name="nominal" id="" placeholder="Masukkan Harga...">
        <button type="submit">Buat Penawaran</button>`)
    openModal();
})
// Listen for close click
closeBtn.addEventListener('click', closeModal);
 
// Listen for outside click
window.addEventListener('click', outsideClick);
if(tidak){
    tidak.addEventListener('click', closeModal);
}
 
// Function to open modal
function openModal(){
    modal.style.display = 'block';
    id = $(this).data("id");
}
 
// Function to close modal
function closeModal(){
    modal.style.display = 'none';
 
}
 
// Function to close modal if outside click
function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
 
}
var id = $(".fa-heart").data("id");
$(".fa-heart").click(function(){
    if($(".fa-heart").hasClass("red")){
        $.ajax({
            url: `/wishlist/${id}`,
            type: "DELETE",
            dataType: "json",
            data: {
                _token: $("#_token").val()
            },
            success: function(){
                $(".fa-heart").removeClass("red")
            },
            error: function(e){
                console.log(e);
            }
        })
    }else{
        $.ajax({
            url: "/wishlist",
            type: "POST",
            dataType: "json",
            data: {
                _token: $("#_token").val(),
                user_id: $(this).data("user"),
                produk_id: $(this).data("produk")
            },
            success: function(data){
                $(".fa-heart").addClass("red")
                id = data.data.id
            },
            error: function(e){
                console.log(e);
            }
        })
    }
});
$("#yakin-admin").click(function(){
    let url = `/admin/admin/hapus/${id}`;
    let loc = 'admin';
    hapus(url,loc);
})
$("#yakin-user").click(function(){
    let url = `/admin/pengguna/hapus/${id}`;
    let loc = 'pengguna';
    hapus(url,loc);
})
$("#yakin-produk").click(function(){
    let url = `/admin/produk/hapus/${id}`;
    let loc = 'produk';
    hapus(url,loc);
})
function hapus(url, loc){
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        data: {
            _token: $("#_token").val()
        },
        success: function(data){
            window.location.href = `/admin/${loc}`
        }
    });
}
$(".fa-comment-alt").click(function(){
    console.log('uy');
    $.ajax({
        url: `/produk/${$(this).data("id")}/chat`,
        type: 'POST',
        dataType: 'json',
        data: {
            _token: $("#_token").val()
        },
        success: function(){
            window.location.href = '/chat'
        }
    })
})