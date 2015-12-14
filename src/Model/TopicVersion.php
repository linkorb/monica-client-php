<?php

namespace Monica\Client\Model;

class TopicVersion
{
    private $id;
    private $title;
    private $content;
    private $created_at;
    private $remarks;
    private $metadata;
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getRemarks()
    {
        return $this->remarks;
    }

    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])
            ->setContent($data['content'])
            ->setCreatedAt($data['created_at'])
            ->setMetadata($data['metadata'])
            ->setRemarks($data['remarks'])
            ->setTitle($data['title']);

        $user = new User();
        $user->setUsername($data['user']['username']);

        $this->setUser($user);
    }
}
