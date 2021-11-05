let map;
function initMap() {
    const latlng = {lat: parseFloat($("#maps").data("lat")), lng: parseFloat($("#maps").data("lng"))};
    map = new google.maps.Map(document.getElementById("maps"), {
    center: latlng,
    zoom: 18,
  });
  const marker = new google.maps.Marker({
    position: latlng,
    map
  });
}