<?php

namespace Monica\Client\Model;

class Topic
{
    private $id;
    private $name;
    private $libraryName;
    private $redirect;
    private $version;
    private $type;

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

    public function getLibraryName()
    {
        return $this->libraryName;
    }

    public function setLibraryName($libraryName)
    {
        $this->libraryName = $libraryName;
        return $this;
    }

    public function getRedirect()
    {
        return $this->redirect;
    }

    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])
            ->setName($data['name'])
            ->setLibraryName($data['libraryName'])
            ->setRedirect($data['redirect']);

        $type = new TopicType();
        $type->fillData($data['type']);

        $this->setType($type);

        $version = new TopicVersion();
        $version->fillData($data['version']);

        $this->setVersion($version);
    }
}
