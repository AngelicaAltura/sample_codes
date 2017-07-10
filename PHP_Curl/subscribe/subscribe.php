<?php
include("config.php");

/* Notes
 *
 * This script expects there to be a config.php file in the same directory as this file.
 *
 * Instructions:
 * for custom fields, you'll create text boxes that have c_ but are followed by the custom field ID number.
 */

function curlWrap($url, $json)
{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, ZDURL . $url);
    curl_setopt($ch, CURLOPT_USERPWD, ZDUSER . "/token:" . ZDAPIKEY);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json'
    ));
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $info = curl_getinfo($ch);
    $output = curl_exec($ch);
    curl_close($ch);
    $decoded = json_decode($output);
    return $decoded;

    $info = curl_getinfo($ch);
    return $info;

}

$arr = array();

foreach ($_POST as $key => $value) {
    if (preg_match('/^z_/i', $key)) {
        $arr[strip_tags($key)] = strip_tags($value);
    }
}


$ticket = array(
    'subscription' => array(
        'source_locale' => $_POST['locale'],
		'include_comments' => "false",
		'user_id' => $arr['z_user']
       
    )
);

$ticket = json_encode($ticket);
$param = "/".$arr['z_section']."/subscriptions.json";
$return = curlWrap($param, $ticket);

echo 'You are now subscribed to: <br>' ;
echo '<a href=&"' . ZDURL . "/" . $arr['z_section'] . '&">' . ZDURL . "/" . $arr['z_section'] . '</a>';
?>
