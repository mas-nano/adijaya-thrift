$(".btn-foto").click(function(){
    $("#foto").click();
});
$("#foto").change(function(e){
   $("#file-name").val(e.target.files[0].name);
});
let markers = [];
function initMap() {
    if($("#lat").val()==""){
        var myLatlng = { lat: 0.08207915823301208, lng: 119.0684741280404 };
        var zoom = 3;
    }else{
        var myLatlng = { lat: parseFloat($("#lat").val()), lng: parseFloat($("#lng").val()) };
        var zoom = 17;
    }

    const map = new google.maps.Map(document.getElementById("maps"), {
      zoom: zoom,
      center: myLatlng,
    });
    if(($("#lat").val()!="")){
        const marker = new google.maps.Marker({
            position: myLatlng,
            map
        });
        markers.push(marker);
    }
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        const marker = new google.maps.Marker({
            position: mapsMouseEvent.latLng,
            map
        });
        let pos = mapsMouseEvent.latLng.toJSON();
        $("#lat").val(pos['lat']);
        $("#lng").val(pos['lng']);
        markers.push(marker);
        marker.setMap(null);
        if(markers.length!=1){
            markers[0].setMap(null);
            markers.shift();
            markers[0].setMap(map);
        }else{
            markers[0].setMap(map);
        }
    });
  }
  function kota(id, sel){
      $.ajax({
          url: `https://emsifa.github.io/api-wilayah-indonesia/api/regencies/${id}.json`,
          type: "GET",
          dataType: "json",
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