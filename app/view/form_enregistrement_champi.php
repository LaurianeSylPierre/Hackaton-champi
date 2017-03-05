<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>

        function init() {
            if(navigator.geolocation){
                var latitude;
                var longitude;
                navigator.geolocation.getCurrentPosition(function(position){
                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                });
                return [document.getElementById('latitude').value, document.getElementById('longitude').value];
            }
        }

        function cb(json) {
            document.getElementById('ville').value = json.address.city;
        }

        function search() {
            var set = init();
            var s = document.createElement('script');
            s.src = 'http://nominatim.openstreetmap.org/reverse?json_callback=cb&format=json&lat='+ set[0] +'&lon='+ set[1] +'&zoom=27&addressdetails=1';
            document.getElementsByTagName('head')[0].appendChild(s);
        };

    </script>
    <title>Enregistrer un coin à Champipi</title>
</head>

<body onload="init();">

    <form method="post" action="<?=WEBROOT?>controller/insert_coin_champi">
        <label>Contributeur : </label>
        <input type="text" name="contributeur" onblur="search();"><br/>
        <input type="hidden" name="ville" id="ville"><br/>
        <label>Type de Champignon : </label>
        <input type="text" name="champignon">
        <select name="toxcomestible">
            <option value="comestible">Comestible</option>
            <option value="toxique">Toxique</option>
        </select><br/>

        <select name="difficulty" id="" required>
            <option value="" selected disabled>Sélectionner une difficulté d'accès</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
        </select><br/>
        <input type="hidden" name="latitude" id="latitude" value="'+ latitude +'">
        <input type="hidden" name="longitude" id="longitude" value="'+ longitude +'">

        <button type="submit">Partagez votre coin !</button>
    </form>

</body>
</html>
