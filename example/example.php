<?php

include_once __dir__ . '/../vendor/autoload.php';
use Monica\Client;

$username = 'joe';
$password = 'secret';
$baseUrl = 'http://www.doxedo.com';
$monica = new Client($username, $password, $baseUrl);

$filter = [
    'types' => ['faq', 'wiki'],
    'folders' => ['getting-started'],
    'keywords' => ['login', 'button']
];

try {
    $topics = $monica->getTopics('linkorb/manual', $filter);
    // the result is an array of Topic class instances

    foreach($topics as $topic) {
        echo $topic->getName(); // 'how-to-login-to-linkorb'
        echo $topic->getVersion()->getTitle(); // “how to login to linkorb”
        echo $topic->getVersion()->getUser()->getUsername(); // username of last version
        echo $topic->getType()->getName(); // faq
    }

    $topic = $monica->getTopic('linkorb/manual', 'how-to-login-to-linkorb');
    // returns a single topic

    $html = $monica->getTopicHtml('linkorb/manual', 'how-to-login-to-linkorb');
    // returns rendered html
}
catch (\Exception $e)
{
    switch ($e->getCode())
    {
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
