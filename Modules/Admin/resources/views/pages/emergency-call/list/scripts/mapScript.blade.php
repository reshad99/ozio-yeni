<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer>
</script>
<script>
    var map;
    var markers = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 40.4093,
                lng: 49.8671
            }, // Örnek olarak New York'un koordinatları
            zoom: 12
        });
    }

    function removeMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }
    // Marker'ları ekleyen fonksiyon
    function addMarker(lat, lng, title, content, color = 'blue') {
        var marker = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            map: map,
            title: title,
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/' + color + '-dot.png'
            }
        });

        var infoWindow = new google.maps.InfoWindow({
            content: content,
            maxWidth: 200
        });

        infoWindow.open(map, marker);


        markers.push(marker);
    }
</script>
