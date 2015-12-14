<?php

include_once __dir__ . '/../vendor/autoload.php';

$username = 'username';
$password = 'password';
$baseUrl = 'http://www.doxedo.com';
$monica = new \Monica\Client\Client($username, $password, $baseUrl);

$filter = [
    'types' => ['faq', 'how-to']
];

try {
    $topics = $monica->getTopics('doxedo/help', $filter);
    // the result is an array of Topic class instances

    foreach ($topics as $topic) {
        echo '[' . $topic->getName() . '] "'; // 'how-to-login-to-linkorb'
        echo $topic->getVersion()->getTitle(). '" by '; // “how to login to linkorb”
        echo $topic->getVersion()->getUser()->getUsername(). ' @'; // username of last version
        echo $topic->getType()->getName(); // faq
        echo PHP_EOL;
    }

    $topic = $monica->getTopic('doxedo/help', 'exploring-doxedo');
    print_r($topic);
    
    $html = $monica->getTopicHtml('doxedo/help', 'exploring-doxedo');
    echo $html . PHP_EOL;
    // returns rendered html
} catch (\Exception $e) {
    switch ($e->getCode()) {
        case 400:
            echo 'Bad Request: ', $e->getMessage();
            break;
        case 403:
            echo 'Access denied or Unauthorised: ', $e->getMessage();
            break;
        case 404:
            echo 'Not found: ', $e->getMessage();
            break;
    }
}
