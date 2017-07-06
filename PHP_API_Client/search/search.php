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
    $params = ['query' =>'type:ticket status:open'];
    $search = $client->search()->find('type:ticket external_id:012345');
    $to_dump ="";
	
	var_dump($search);
	
    if (empty($search->results)) {
        var_dump('0 results');
	} else {
	       foreach ($search->results as $ticketData) {
                 $to_dump = $to_dump . $ticketData->id . " results" . " <br>";
				/**echo "success";
	            $userId = $ticketData->id;	

	            // Show the results
	            echo "<pre>";
	            print_r($userId);
	            echo "</pre>";**/
           }
        var_dump($to_dump);
	}
    
} catch (\Zendesk\API\Exceptions\ApiResponseException $e) {
    echo $e->getMessage().'</br>';
}
