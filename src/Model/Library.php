<?php

namespace Monica\Client\Model;

class Library
{
    private $libraryName;

    public function getLibraryName()
    {
        return $this->libraryName;
    }

    public function setLibraryName($name)
    {
        $this->libraryName = $name;
        return $this;
    }

    private $description;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    private $accountName;

    public function getAccountName()
    {
        return $this->accountName;
    }

    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;

        return $this;
    }

    private $visibility;

    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    private $domainName;

    public function getDomainName()
    {
        return $this->domainName;
    }

    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
        return $this;
    }

    private $language;

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
    
    
    public function fillData($data)
    {
        $this->setLibraryName($data['libraryName'])
            ->setAccountName($data['accountName'])
            ->setDescription($data['description'])
            ->setVisibility($data['visibility'])
            ->setDomainName($data['domainName'])
            ->setLanguage($data['language']);
    }
}
