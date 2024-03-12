<?php
// Load the link from the json file.
$url_data = file_get_contents('url.json');
if ($url_data !== false) {
    $data = json_decode($url_data, true);
    if (isset($data['url'])) {
        header("Location: " . $data['url']);
        exit();
    }
}

// if no URL set in the json file, redirect to the main page.
header("Location: https://maierfabian.de");
exit();
?>
