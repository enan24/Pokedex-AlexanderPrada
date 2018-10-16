<?php

class Admin{
    private $nick;
    private $password;
    
    function __construct($nick, $password){
        $this->nick = $nick;
        $this->password = $password;
    }
    
    public function getNombre(){
		return $this->nick;
	}

	public function getPass(){
		return $this->pass;
	}
}