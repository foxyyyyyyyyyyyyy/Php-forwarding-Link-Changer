<?php
// function to save the URL to a json file
function saveURL($url) {
    $data = ['url' => $url];
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('url.json', $json_data);
}

// function to redirect to the saved URL
function redirectToSavedURL() {
    $url_data = file_get_contents('url.json');
    if ($url_data !== false) {
        $data = json_decode($url_data, true);
        if (isset($data['url'])) {
            header("Location: " . $data['url']);
            exit();
        }
    }
}

// check if url is set
if (isset($_POST['url'])) {
    $url = $_POST['url'];
    saveURL($url);
    echo "URL erfolgreich gespeichert: $url";
    header("Location: index.php");
    exit();
}

// Weiterleitung zur gespeicherten URL

