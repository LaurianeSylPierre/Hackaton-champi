<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>

        function init() {
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(function(position){
                    console.log("pouet");
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                });
            }
        }

        function ajoutChamp(){
            var c, c2, ch1, ch2;

            c=document.getElementById('cadre');
            c2=c.getElementsByTagName('input');
            ch1=document.createElement('input');
            ch2=document.createElement('input');

            ch1.setAttribute('type','text');
            ch1.setAttribute('name','ch1'+c2.length);
            ch1.setAttribute('readonly','readonly');
            ch1.setAttribute('value', 'etiquette'+c2.length/2);
            ch1.setAttribute('style','border:none');

            ch2.setAttribute('type','text');
            ch2.setAttribute('name','ch2'+c2.length);
            c.appendChild(ch1);
            c.appendChild(ch2);

            document.getElementById('sup').style.display='inline';
        }

    </script>
    <title>Enregistrer un coin à Champipi</title>
</head>

<body onload="init();">

    <form method="post" action="insert_coin_champi.php">
        <label>Contributeur : </label>
        <input type="text" name="contributeur"><br/>
        <label>Ville proche : </label>
        <input type="text" name="ville"><br/>
        <label>Type de Champignon : </label>
        <input type="text" name="champignon">
        <select name="comestible">
            <option value="comestible">Comestible</option>
            <option value="toxique">Toxique</option>
        </select>
        <div id="cadre"></div>
        <input type="button" onClick="ajoutChamp()" value="Ajouter un champi"><br/>
        <select name="difficulty" id="">
            <option value="" selected disabled>Sélectionner une difficulté d'accès</option>
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très facile">Très difficile</option>
        </select><br/>
        <input type="hidden" name="latitude" id="latitude" value="'+ latitude +'">
        <input type="hidden" name="longitude" id="longitude" value="'+ longitude +'">

        <button type="submit">Partagez votre coin !</button>
    </form>

</body>
</html>
