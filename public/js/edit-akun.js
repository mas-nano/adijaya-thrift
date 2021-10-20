$(".btn-foto").click(function(){
    $("#foto").click();
});
$("#foto").change(function(e){
   $("#file-name").val(e.target.files[0].name);
});
let markers = [];
function initMap() {
    const myLatlng = { lat: 0.08207915823301208, lng: 119.0684741280404 };
    const map = new google.maps.Map(document.getElementById("maps"), {
      zoom: 3,
      center: myLatlng,
    });

    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        const marker = new google.maps.Marker({
            position: mapsMouseEvent.latLng,
            map
        });
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