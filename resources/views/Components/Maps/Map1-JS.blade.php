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

    @foreach (\DB::table('vessel_availabilities')->select(['Vessel','id', 'Location'])
            ->groupBy(['Vessel','id', 'Location'])->orderBy('EndTime', 'DESC')->orderBy('EndDate', 'DESC')
            ->get() as $Vessel)  
        @php
            array_push($Coordinates, $Vessel->Location);
            ${"Location_" . $Vessel->id } = str_replace(", ", " ", $Vessel->Location); 
        @endphp

        let lat_{{ $Vessel->id }} = {{ explode(", ", $Coordinates[$loop->index])[0] }};
        let lng_{{ $Vessel->id }} = {{ explode(", ", $Coordinates[$loop->index])[1] }};
        var marker_{{ $Vessel->id }} = L.marker([lat_{{ $Vessel->id }}, lng_{{ $Vessel->id }}]).addTo(map);
        var geocoder_{{ $Vessel->id }} = L.Control.Geocoder.nominatim();
        function getAddress_{{ $Vessel->id }}(lat_{{ $Vessel->id }}, lng_{{ $Vessel->id }}, marker_{{ $Vessel->id }}) {
            var latlng_{{ $Vessel->id }} = L.latLng(lat_{{ $Vessel->id }}, lng_{{ $Vessel->id }});
            geocoder_{{ $Vessel->id }}.reverse(latlng_{{ $Vessel->id }}, map.options.crs.scale(map.getZoom()), function(results) {
                var Address;
                if (results.length > 0) {
                    Address = '<strong>{{ $Vessel->Vessel }}</strong> ' + results[0].name;  
                } else {
                    Address = '<strong>{{ $Vessel->Vessel }}</strong>';  
                } 
                marker_{{ $Vessel->id }}.bindPopup(Address).openPopup(); 
            }); 
        }  
        getAddress_{{ $Vessel->id }}(lat_{{ $Vessel->id }}, lng_{{ $Vessel->id }}, marker_{{ $Vessel->id }});
    @endforeach   
</script>   
 