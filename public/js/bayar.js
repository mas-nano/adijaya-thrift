function kota(id, sel){
    $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kota`,
        type: "GET",
        dataType: "json",
        data: {
            id_provinsi: id
        },
        success: function(data){
            for(let i=0; i<data["kota_kabupaten"].length;i++){
              sel.append($("<option></option>")
              .attr("value", data["kota_kabupaten"][i]["nama"]).text(data["kota_kabupaten"][i]["nama"]));
            }
          }
    });
}
const prov = $( "#provinsi option:selected" ).val();
if(prov != ""){
  const id = $( "#provinsi option:selected" ).attr("id");
  var sel = $("#kota");
  kota(id, sel);
}
$("#provinsi").change(function(){
  const id = $( "#provinsi option:selected" ).attr("id");
  var sel = $("#kota");
  sel.empty();
  kota(id, sel);
});
$("#batal").click(function(){
  $.ajax({
    url: `http://localhost:8000/api/pembayaran/${$("#id").val()}`,
    type: "DELETE",
    dataType: "json",
    success: function(data){
        window.location.href = "http://localhost:8000/riwayat";
      }
});
})