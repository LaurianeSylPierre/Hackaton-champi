<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Login toad</title>
		<meta charset="utf-8">
		<meta name="description" content="Login toad">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>admin/view/template/css/reset.css">
		<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>admin/view/template/css/login.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="<?=WEBROOT?>admin/view/template/js/login.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?=LIBSWEBROOT?>font_awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?=LIBSWEBROOT?>font_awesome/css/animate.css">
	</head>
	<?=\core\HTML\flashmessage\FlashMessage::getFlash(); ?>
	<body class="login">
		<div class="inner">
			<div class="login-form active" id="login">
				<form  action="<?=ADMWEBROOT?>controller/login" method="POST">
					
					<h1>Connexion à Toad</h1>
					
					<div class="modifier-contenu">
						<div class="bloc">
							<label class="label" for="pseudo" type-val="string" min="3" max="15" data-error="Le doit être comprise entre 3 et 15 caractères">Pseudo</label>
							<input type="text" name="pseudo" required/>
						</div>
						
						<div class="bloc">
							<label class="label" for="mdp" type-val="string" min="3" max="15" data-error="Le mot de passe être comprise entre 3 et 15 caractères">Mot de passe</label>
							<input type="password" name="mdp" required/>
						</div>
					</div>
					
					<input type="submit" class="submit-contenu submit-standard no-shadow full-width" value="Connexion">
					<input type="hidden" name="admin" value="true"/>
				</form>
			</div>
		</div>
	</body>
</html>