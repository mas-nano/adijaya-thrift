$("#sort").change(function(){
    window.location.href = `http://localhost:8000/admin/bantuan?filter=${$("#sort").val()}`;
})
var balas = document.querySelectorAll(".balas");
for(let i=0; i<balas.length; i++){
    balas[i].addEventListener('click', balasBantuan);
}
function balasBantuan(){
    console.log($(this).data("id"));
    $.ajax({
        url: `http://localhost:8000/admin/bantuan/balas/${$(this).data("id")}`,
        type: 'POST',
        dataType: 'json',
        data: {
            _token: $("#_token").val()
        },
        success: function(){
            window.location.href = `http://localhost:8000/admin/bantuan`;
        }
    })
}