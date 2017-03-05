
		<div id="mapid" style="height:500px;"></div>
		<script>

		//get the marker data
		var mymap = L.map('mapid').setView([47.2378, 6.0241], 13);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
		}).addTo(mymap);

		 var champignons = JSON.parse('<?=$json?>'); // point data
        var champignon = champignons.champignon;
		
        //console.log(champignon.champignon.posx[0]);
        for (var i = 0; i < champignon.posx.length; i++) {
			L.marker([champignon.posx[i], champignon.posy[i]]).addTo(mymap);
		}
        
       // var marker = L.marker([47.2378, 6.0241]).addTo(mymap);
		
		/* var markers = new L.MarkerClusterGroup();
		 markers.addLayer(L.marker([47.2378, 6.0241]))
		 markers.addLayer(L.marker([47.2374, 6.024]));
		 mymap.addLayer(markers);*/
		</script>