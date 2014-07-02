<?php
  if(!$_POST) die();
  
  include_once "FirebaseToken.php";

  $secret = "bV11fhVrDhtEm5bBsyyI0mM67RtH070NK73b8oIa";
  $tokenGen = new Services_FirebaseTokenGenerator($secret);

  $token = $tokenGen->createToken(array("isAdmin" => true));

  print_r($token);
?>