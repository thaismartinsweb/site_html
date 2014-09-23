<?php

class Validation {
	
	public $error = false;
	
	public function isLetter($item){
		
		if(ctype_alpha(str_replace(' ', '', $item))){
			return true;
		}
		
		$this->error = true;
		return false;
	}
	
	public function isEmail($item){
		
		$subst = array('@', '_', '-', '.');
		$not   = array('', '', '', '');
		$email = str_replace($subst, $not, $item);

		if(ctype_alnum($email)){
			return true;
		}
		
		$this->error = 'email';
		return false;
	}
	
	public function isSite($item){
	
		$subst = array(':', '/', '_', '-', '.');
		$not   = array('', '', '', '', '');
		$site = str_replace($subst, $not, $item);
	
		if(ctype_alnum($site)){
			return true;
		}
	
		$this->error = 'site';
		return false;
	}
	
	public function isTelephone($item){
		
		$subst = array('(', ')', '-', '.');
		$not   = array('', '', '', '');
		
		$numbers = str_replace($subst, $not, $item);
		
		if($this->isNumeric($numbers)){
			return true;
		}

		$this->error = 'telefone';
		return false;
	}
	
	public function isNumeric($item){
		
		if(is_numeric($item)){
			return true;
		}
		
		$this->error = 'numeric';
		return false;
	}
	
	public function purifier($item){
		return $item;
	}
	
	
}