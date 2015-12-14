<?php

namespace Monica\Client\Model;

class TopicType
{
    private $id;
    private $name;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])->setName($data['name']);
    }
}
