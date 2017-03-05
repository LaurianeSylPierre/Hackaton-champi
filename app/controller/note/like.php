<?php
	$champi = new \app\controller\Champignon();
	$champi->setAddLike($_GET['id_champignon']);
	
	\core\HTML\flashmessage\FlashMessage::setFlash("Votre like a bien été pri en compte", "success");
	
	\core\HTML\flashmessage\FlashMessage::getFlash();