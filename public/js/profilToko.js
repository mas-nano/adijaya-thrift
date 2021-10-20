let map;

function initMap() {
    const latlng = {lat: -7.6296784, lng: 111.5280593};
    map = new google.maps.Map(document.getElementById("maps"), {
    center: latlng,
    zoom: 17,
  });
  const contentString =
    '<div id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<h1 id="firstHeading" class="firstHeading">Stadion e Brian</h1>' +
    '<div id="bodyContent">' +
    "<p>Saiki Brian duwe Stadion</p>" +
    "</div>" +
    "</div>";
  const marker = new google.maps.Marker({
    position: latlng,
    map,
    title: "Stadion e Brian",
  });
  const infowindow = new google.maps.InfoWindow({
    content: contentString,
  });
  marker.addListener("click", () => {
    infowindow.open({
      anchor: marker,
      map,
      shouldFocus: false,
    });
  });
}