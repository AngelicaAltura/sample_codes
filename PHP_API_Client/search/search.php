<?php
include("/Users/aaltura/vendor/autoload.php");
include("config.php");

use Zendesk\API\HttpClient as ZendeskAPI;

/**
 * Replace the following with your own.
 */
    
$subdomain = ZSUB;
$username = ZDUSER;
$token = ZDAPIKEY;

$client = new ZendeskAPI($subdomain);
$client->setAuth('basic', ['username' => $username, 'token' => $token]);

try {
    // Search the current customer
    $params = ['query' =>'type:ticket status:' . TICKETSTATUS];
    $search = $client->search()->find('type:ticket external_id:' . EXTERNALID);
    $to_dump ="";
	
	//var_dump($search);
	
    if (empty($search->results)) {
        var_dump('0 results');
	} else {
           var_dump(count($search) . ' results');
	       foreach ($search->results as $ticketData) {
                 var_dump($ticketData->id);
           }
       
	}
    
} catch (\Zendesk\API\Exceptions\ApiResponseException $e) {
    echo $e->getMessage().'</br>';
}
