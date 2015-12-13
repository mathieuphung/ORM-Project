<?php

namespace Model;

class titi
{
 protected $id;
 protected $username;
 protected $password;
 protected $email;

 public function getId()
 {
 return $this->id;
 }

 public function setId($id)
 {
 $this->id = $id;
 }

 public function getUsername()
 {
 return $this->username;
 }

 public function setUsername($username)
 {
 $this->username = $username;
 }

 public function getPassword()
 {
 return $this->password;
 }

 public function setPassword($password)
 {
 $this->password = $password;
 }

 public function getEmail()
 {
 return $this->email;
 }

 public function setEmail($email)
 {
 $this->email = $email;
 }

}
