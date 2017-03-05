<!-- page d'accueil du site inclue dans template/principal.php -->
	<!-- ce fichier incluera les pages des vues -->
		<!-- header goes here -->
		<header>
		<div id="header">
			<div class="container">
			
				<div  class="row">
					<div class="col-xs-6 col-xs-offset-1">
						<img src="<?=TPLWEBROOT?>img/cs_logo1.svg"/>
					</div>
					
					<div id="more_spot" class="col-xs-2 col-xs-offset-3">
						<img class="icone" id="cross" src="<?=TPLWEBROOT?>img/button_whitecross.svg"/>
					</div>
				</div>
			</div>
			</div>
		</header>
		
		
		
		<!-- footer goes here -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-9 col-xs-offset-1">
						<img src="<?=TPLWEBROOT?>img/button_loupe.svg"/>
						<form class="searchbar">
							<select>
								<option selected> Choisissez votre type de champignons</option>
								<option value="morilles">Morilles</option>
								<option value="amanites">Amanites </option>
								<option value="cepes">Cèpes</option>
							</select>
						</form>
					
						
					</div>
					<div id="more_spot" class="col-xs-2">
						<img class="icone" src="<?=TPLWEBROOT?>img/button_info.svg"/>
					</div>
				</div>
			</div>
		</footer>