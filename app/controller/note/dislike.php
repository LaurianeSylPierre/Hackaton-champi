<?php
	$champi = new \app\controller\Champignon();
	$champi->setAddDislike($_GET['id_champignon']);
	
	\core\HTML\flashmessage\FlashMessage::setFlash("Votre dislike a bien été pri en compte", "success");
	
	\core\HTML\flashmessage\FlashMessage::getFlash();