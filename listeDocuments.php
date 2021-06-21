<?php
// Page d'accueil du portail du site sio.lyceedelasalle.fr
// Modifié le 10/6/2016 par Jim
?>
<!doctype html>
<html>
<head>	
	<title>BTS SIO - Lycée De La Salle - Rennes</title> 
	<meta charset="utf-8">
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Style-Type content=text/css>
	<link rel="stylesheet" href="style2.css" type="text/css">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="icon" type="image/png" href="images/favicon.png" />
</head>
<?php include_once ('../ae2/modele/Outils.class.php');
      include_once ('../ae2/modele/DAO.class.portail.php');
      $dao = new DAO(); ?>
<body>
	<div id="page">
	
		<div id="header">
			<div id="header-menu">
				<ul id="menu-horizontal">
					<li><a href="index.php">Retour au portail</a></li>
				</ul>
			</div>
			<div id="header-logos">
				<img src="images/Logo_DLS.png" id="logo-gauche" alt="Lycée De La Salle (Rennes)" />
				<img src="images/Intitules_bts_ig_sio.png" id="logo-droite" alt="BTS Informatique" />
			</div>
		</div>
			
		<div id="content">
			 		
			<?php  
			$lesGroupes = $dao->getLesGroupesSansDocuments();
			foreach($lesGroupes as $leGroupe)
			{
			    ?><h2><?php echo $leGroupe->getNomGroupe();?></h2><?php 
			    $idGroupe = $leGroupe->getId();
			    $lesDocuments = $dao->getLesDocumentsDuGroupe($idGroupe);
			    foreach($lesDocuments as $leDocument)
			    {?> 
			        <p><a href="documents/<?php echo $leDocument->getNomDuFichier()?>" class="petit-bouton-menu" target="_blank"><?php echo $leDocument->getNomSurBouton()?></a>
			    <?php }
			}
			?>
			
		</div>
			
		<div id="footer">
			<p>Documents disponibles en téléchargement - BTS SIO - Lycée De La Salle (Rennes)</p>
		</div>
	</div>
</body>
</html>