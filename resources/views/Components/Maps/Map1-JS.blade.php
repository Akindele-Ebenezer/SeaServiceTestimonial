<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> 
<script>
    var map = L.map('map').setView([6.448576, 3.372903], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);
    @php
        $Coordinates = [];
    @endphp

    @foreach (\DB::table('vessel_availabilities')->select(['Vessel', \DB::raw('MAX(Location) as Location')])
            ->whereNotNull('Location')->groupBy(['Vessel'])->where('TillNow', 'YES')->get() as $Vessel)  
        @php
            array_push($Coordinates, $Vessel->Location);
            ${"Location_" . $loop->index } = str_replace(", ", " ", $Vessel->Location); 
        @endphp
        let lat_{{ $loop->index }} = {{ explode(", ", $Coordinates[$loop->index])[0] }};
        let lng_{{ $loop->index }} = {{ explode(", ", $Coordinates[$loop->index])[1] }};
        var marker_{{ $loop->index }} = L.marker([lat_{{ $loop->index }}, lng_{{ $loop->index }}]).addTo(map);
        var geocoder_{{ $loop->index }} = L.Control.Geocoder.nominatim();
        
        function getAddress_{{ $loop->index }}(lat_{{ $loop->index }}, lng_{{ $loop->index }}, marker_{{ $loop->index }}) {
            var latlng_{{ $loop->index }} = L.latLng(lat_{{ $loop->index }}, lng_{{ $loop->index }});
            geocoder_{{ $loop->index }}.reverse(latlng_{{ $loop->index }}, map.options.crs.scale(map.getZoom()), function(results) {
                var Address;
                if (results.length > 0) {
                    Address = '<strong>{{ $Vessel->Vessel }}</strong> ' + results[0].name;  
                } else {
                    Address = '<strong>{{ $Vessel->Vessel }}</strong>';  
                } 
                marker_{{ $loop->index }}.bindPopup(Address).openPopup(); 
            }); 
        }  
        getAddress_{{ $loop->index }}(lat_{{ $loop->index }}, lng_{{ $loop->index }}, marker_{{ $loop->index }});
    @endforeach   
    
    let DisplayMap1Button = document.querySelector('.DisplayMap1Button');
    let Map_ = document.querySelector('.Map');
    let Map_CloseButton = document.querySelector('.Map .cancel-button-map');
    DisplayMap1Button.addEventListener('click', () => {
        Map_.style.display = 'flex';
        Map_.style.visibility = 'visible';
    })
    Map_CloseButton.addEventListener('click', () => {
        Map_.style.visibility = 'hidden';
    })
</script>   
 