<?php

namespace Monica\Client;

use GuzzleHttp\Client as GuzzleClient;
use Monica\Client\Model\Library;
use Monica\Client\Model\Topic;


class Client
{
    private $username;
    private $password;
    private $baseUrl;
    private $httpClient;

    public function __construct($username, $password, $baseUrl)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseUrl = $baseUrl;

        $this->httpClient = new GuzzleClient();
    }

    public function getLibrary($accountLibraryName)
    {
        $res = $this->httpClient->get($this->baseUrl.'/api/v1/'.$accountLibraryName,
            ['auth' => [$this->username, $this->password]]);

        if ($res->getStatusCode() == 200)
        {
            $data = json_decode($res->getBody(), true);
            $obj = new Library();
            $obj->fillData($data);

            return $obj;
        }

        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getTopics($accountLibraryName, $filter = [])
    {
        $getString = '';
        if ($filter)
        {
            $getArray = [];
            if (array_key_exists('types', $filter))
            {
                $getArray[] = 'types='.implode(',', $filter['types']);
            }

            if (array_key_exists('folders', $filter))
            {
                $getArray[] = 'folders='.implode(',', $filter['folders']);
            }

            if (array_key_exists('keywords', $filter))
            {
                $getArray[] = 'keywords='.implode(',', $filter['keywords']);
            }

            $getString = '?'.implode('&',$getArray);
        }

        $res = $this->httpClient->get($this->baseUrl.'/api/v1/'.$accountLibraryName.'/topics'.$getString,
            ['auth' => [$this->username, $this->password]]);

        if ($res->getStatusCode() == 200)
        {
            $ret = [];
            $data = json_decode($res->getBody(), true);

            foreach ($data['topics'] as $topic)
            {
                $obj = new Topic();
                $obj->fillData($topic);
                $ret[] = $obj;
            }

            return $ret;
        }

        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getTopic($accountLibraryName, $topicName)
    {
        $res = $this->httpClient->get($this->baseUrl.'/api/v1/'.$accountLibraryName.'/topics/'.$topicName,
            ['auth' => [$this->username, $this->password]]);

        if ($res->getStatusCode() == 200)
        {
            $data = json_decode($res->getBody(), true);

            $obj = new Topic();
            $obj->fillData($data);

            return $obj;
        }

        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getTopicHtml($accountLibraryName, $topicName)
    {
        $res = $this->httpClient->get($this->baseUrl.'/api/v1/'.$accountLibraryName.'/topics/'.$topicName.'/html',
            ['auth' => [$this->username, $this->password]]);

        if ($res->getStatusCode() == 200)
        {
            return json_decode($res->getBody(), true)['html'];
        }

        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }
}
