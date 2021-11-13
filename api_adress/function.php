<?php
function citation(){
	$url="https://raw.githubusercontent.com/Moulayli/Cloud-Priv-/main/public/json/citation.json";
	$options=array(
      CURLOPT_URL            => $url,  // Url cible (l'url la page que vous voulez télécharger)
      CURLOPT_RETURNTRANSFER => true,  // Retourner le contenu téléchargé dans une chaine (au lieu de l'afficher directement)
      CURLOPT_HEADER         => false, // Ne pas inclure l'entête de réponse du serveur dans la chaine retournée
      CURLOPT_FAILONERROR    => true ,
      CURLOPT_SSL_VERIFYPEER => false // Gestion des codes d'erreur HTTP supérieurs ou égaux à 400
	);
	$CURL=curl_init();
	// Erreur suffisante pour justifier un die()
	if(empty($CURL)){
		die("ERREUR curl_init : Il semble que cURL ne soit pas disponible.");}
	 
	      // Configuration des options de téléchargement
	      curl_setopt_array($CURL,$options);
	      // Exécution de la requête
	      $content=curl_exec($CURL);       // Le contenu téléchargé est enregistré dans la variable $content. Libre à vous de l'afficher.
	      $content=json_decode($content,true);
	      //$tab_key=array_keys($content[]);
	      $citation_numero=rand(0,count($content));
	      $resultat_api = array('citation' =>  $content[$citation_numero]);
	      echo json_encode($resultat_api);
	      //echo "string";
	      //$mot_français=$content['resultat']['français'];
	      //$mot_shimaore=$content['resultat']['shimaore'];
	      //return $mot_français." se dit ".$mot_shimaore." en ".$tab_key[1];
	      if(curl_errno($CURL)){
	            // Le message d'erreur correspondant est affiché
	            echo "ERREUR curl_exec : ".curl_error($CURL);
	      }
	curl_close($CURL);
}

