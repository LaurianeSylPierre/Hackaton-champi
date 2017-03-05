	 		<div id="mapid" style="height:500px;"></div>
		<script>

		//get the marker data
		var mymap = L.map('mapid').setView([47.2378, 6.0241], 13);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
		}).addTo(mymap);

		var LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [38, 95],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
		});

		var greenIcon = new LeafIcon({iconUrl: '<?=TPLWEBROOT?>img/mark_green.svg'}),
    redIcon = new LeafIcon({iconUrl: '<?=TPLWEBROOT?>img/mark_red.svg'}),
    orangeIcon = new LeafIcon({iconUrl: '<?=TPLWEBROOT?>img/mark_orange.svg'});

		 var champignons = JSON.parse('<?=$json?>'); // point data
        var champignon = champignons.champignon;

        for (var i = 0; i < champignon.posx.length; i++) {
					if ((champignon.accessibilite[i] == 'facile') || (champignon.accessibilite[i] == null)) {
						L.marker([
							champignon.posx[i], champignon.posy[i]], {icon: greenIcon}).addTo(mymap).bindPopup(
								(champignon.toxique[i] == null)?'<img style="height: 33px; float: right;" src="<?=TPLWEBROOT?>img/icone_mini_skull.svg">'+
								champignon.nom[i]+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">':
								champignon.nom+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">');
							}

					else if (champignon.accessibilite[i] == 'moyen') {
						L.marker([
							champignon.posx[i], champignon.posy[i]], {icon: orangeIcon}).addTo(mymap).bindPopup(
								(champignon.toxique[i] == null)?'<img style="height: 33px; float: right;" src="<?=TPLWEBROOT?>img/icone_mini_skull.svg">'+
								champignon.nom[i]+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">':
								champignon.nom+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">');
							}
					else {
						L.marker([
							champignon.posx[i], champignon.posy[i]], {icon: redIcon}).addTo(mymap).bindPopup(
								(champignon.toxique[i] == null)?'<img style="height: 33px; float: right;" src="<?=TPLWEBROOT?>img/icone_mini_skull.svg">'+
								champignon.nom[i]+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">':
								champignon.nom+'<br>'+
								champignon.posx[i]+', '+champignon.posy[i]+'<br>'+
								'<img class="like" type="like" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/like.svg">'+
								'<img class="like" type="dislike" id-champ="'+champignon.id_champignon[i]+'" style="height: 33px;" src="<?=TPLWEBROOT?>img/unlike.svg">');
							}
						}

       // var marker = L.marker([47.2378, 6.0241]).addTo(mymap);

		/* var markers = new L.MarkerClusterGroup();
		 markers.addLayer(L.marker([47.2378, 6.0241]))
		 markers.addLayer(L.marker([47.2374, 6.024]));
		 mymap.addLayer(markers);*/
		</script>


		    <script>
			    $(document).ready(function() {
			        $(document).on("click", ".like", function(e) {
                        e.preventDefault();
                        console.log("dgdgdfg");

                        var type = $(this).attr("type");
                        var id_champ = $(this).attr("id-champ");

                        if (type == "like") {
                            var url = "<?=WEBROOT?>controller/note/like";
                        }
                        else {
                            var url = "<?=WEBROOT?>controller/note/dislike";
                        }

                        $.ajax({
                            type:"GET",
                            url:url,
	                        data:"id_champignon="+id_champ,
                            success: function(data){
                                $("body").prepend(data);
                            }
                        });
			        })
			    })
		    </script>
