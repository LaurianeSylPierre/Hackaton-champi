<?php
	//contiendra les test pour savoir si on doit inclure un controller getter
	if ($page == "map") {
		require_once(CTRROOT."index.php");
	}
	
	if ($page == "ajouter-champignon") {
		require_once(CTRROOT."get_ajouter_champignon.php");
	}