<?php
// Define the target URL you want to proxy
$targetUrl = 'https://example.com';

// Create a reverse proxy function
function proxy($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Get the requested URL from the query string
$requestedUrl = $_GET['url'];

// Check if the requested URL is allowed
$allowedUrls = ['https://replit.com', 'https://open.spotify.com'];
if (!in_array($requestedUrl, $allowedUrls)) {
    die('Invalid URL');
}

// Proxy the requested URL
$response = proxy($requestedUrl);

// Set the appropriate headers and output the response
header('Content-Type: text/html; charset=utf-8');
echo $response;
?>