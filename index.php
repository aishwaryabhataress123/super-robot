<?php
define("USERNAME", "aishwarya.bhat@aress.com");
define("PASSWORD", "Aishwarya123$");
define("SECURITY_TOKEN", "bsPsOkhFAW3mOv0yiViGaSyqS");

require_once ('soapclient/SforcePartnerClient.php');

$mySforceConnection = new SforcePartnerClient();
$mySforceConnection->createConnection("PartnerWSDL.xml");
$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);

$query = "SELECT Id, FirstName, LastName, Phone from Contact";
$response = $mySforceConnection->query($query);

foreach ($response->records as $record)
{
echo '<tr>
	<td>'.$record->Id.'</td>
	<td>'.$record->fields->FirstName.'</td>
	<td>'.$record->fields->LastName.'</td>
	<td>'.$record->fields->Phone.'</td>
	 </tr>';
 }
?>
