<?php
/**
 * Template Name: Homepage
 */

get_header();
while ( have_posts() ) : the_post();
    the_content();
endwhile;
get_footer();

// Note: Requires cURL library
$TEST_MODE = false;

$connection_options = [
    'live' => [
        'api_host_port' => 'https://rr-n1-tor.opensrs.net:55443',
        'api_key' => '09310c1df9fc9e782f45eb770eb6d174407c573e0f565e9bf406d1dfe74d23ca56049f7f3a1cad1fa1155fa250e1c6f4980e4649f9b34fa7',
        'reseller_username' => 'host2media'
    ],
    'test' => [
        'api_host_port' => 'https://horizon.opensrs.net:55443',
        'api_key' => '09310c1df9fc9e782f45eb770eb6d174407c573e0f565e9bf406d1dfe74d23ca56049f7f3a1cad1fa1155fa250e1c6f4980e4649f9b34fa7',
        'reseller_username' => 'host2media'
    ]
];

if ($TEST_MODE) {
    $connection_details = $connection_options['test'];
} else {
    $connection_details = $connection_options['live'];
}

$xml = <<<EOD
<?xml version='1.0' encoding='UTF-8' standalone='no' ?>
<!DOCTYPE OPS_envelope SYSTEM 'ops.dtd'>
<OPS_envelope>
<header>
    <version>0.9</version>
</header>
<body>
<data_block>
    <dt_assoc>
        <item key="protocol">XCP</item>
        <item key="action">LOOKUP</item>
        <item key="object">DOMAIN</item>
        <item key="attributes">
         <dt_assoc>
                <item key="domain">host2media.com</item>
         </dt_assoc>
        </item>
    </dt_assoc>
</data_block>
</body>
</OPS_envelope>
EOD;

$data = [
    'Content-Type:text/xml',
    'X-Username:' . $connection_details['reseller_username'],
    'X-Signature:' . md5(md5($xml . $connection_details['api_key']) .  $connection_details['api_key']),
];

$ch = curl_init($connection_details['api_host_port']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $data);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

$response = curl_exec($ch);

// echo 'Request as reseller: ' . $connection_details['reseller_username'] . "\n" .  $xml . "\n";

echo "Response\n";
echo $response . "\n";
$response_string = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);

// Step 2: Convert the SimpleXMLElement object to JSON
$json = json_encode($response_string);

// Output the JSON
echo $json;
echo '<pre>'; print_r($json); echo '</pre>';
$array = json_decode($json, true); // Passing true converts it into an associative array
// Output the array
echo '<pre>'; print_r($array); echo '</pre>';
