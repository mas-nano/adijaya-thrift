function kota(id, sel){
    $.ajax({
      url: `/kota`,
      type: "GET",
      dataType: "json",
      data: {
          id: id
      },
        success: function(data){
            for(let i=0; i<data.length;i++){
              sel.append($("<option></option>")
              .attr("value", data[i]["name"]).text(data[i]["name"]));
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
    url: `/pembayaran/${$("#id").val()}`,
    type: "DELETE",
    dataType: "json",
    data: {
      _token: $("#_token").val()
    },
    success: function(data){
        window.location.href = "/riwayat";
      }
});
})