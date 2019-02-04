<?php

namespace Data\Users;

class User
{
    private $id;

    private $firstName;

    private $lastName;

    private $username;

    private $email;

    private $picture;

    private $password;

    /**
    * Get the value of id
    */ 
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set the value of id
    *
    * @return  self
    */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
    * Get the value of firstName
    */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
    * Set the value of firstName
    *
    * @return  self
    */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

        /**
    * Get the value of lastName
    */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
    * Set the value of lastName
    *
    * @return  self
    */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
    * Get the value of username
    */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
    * Set the value of username
    *
    * @return  self
    */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
    * Get the value of email
    */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
    * Set the value of email
    *
    * @return  self
    */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

        /**
    * Get the value of picture
    */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
    * Set the value of picture
    *
    * @return  self
    */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
    * Get the value of password
    */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
    * Set the value of password
    *
    * @return  self
    */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}