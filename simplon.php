<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width">
<title>Tableau simplonien</title>
</head>
<body>
<table border=1>

<?php 
	$fichier = 'classe-simploniens.xml';
	$xml = simplexml_load_file($fichier);

foreach($xml as $personne){
	echo "<tr><td>".$personne->nom." ".$personne->prenom."</td><td>".$personne->date_naissance."</td></td></tr>";
}
?>

<?php
function age($annee_naissance, $mois_naissance, $jour_naissance, $timestamp = '') {
 
	//Si on veut vérifier à la date actuelle ( par défaut )
	if(empty($timestamp))
		$timestamp = time();
 
	//On evalue l'age, à un an par exces
	$age = date('Y',$timestamp) - $annee_naissance;
 
	//On retire un an si l'anniversaire n'est pas encore passé
	if($mois_naissance > date('n', $timestamp) || ( $mois_naissance== date('n', $timestamp) && $jour_naissance > date('j', $timestamp)))
		$age--;
 
	return $age;
}
?>
</table>
</body>
</html>