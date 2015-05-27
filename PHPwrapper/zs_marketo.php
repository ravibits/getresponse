<?php

require_once('GetResponseAPI.class.php');
$api = new GetResponse(API_KEY);

// marketo-leads campaign: Viom9
$contacts   = (array)$api->getContacts(["Viom9"]);

$file = fopen("marketo_contacts.csv","r");

while(! feof($file))
{
  $c = fgetcsv($file);
  $api->addContact("Viom9",$c[4],$c[6],'standard',0,array('Title' => $c[5], 'Company_name' => $c[1],
    'Website_address' => $c[2], 'Contact_name'=> $c[4]));
}

fclose($file);
?>