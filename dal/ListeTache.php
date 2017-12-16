<?php

class ListeTache{

    private $arrTache = array();
    private $nb;


    public function getArrTache() {
        return $this->arrTache;
    }
    public function addItem($obj, $key = null) {
    	if ($key == null) {
        	$this->arrTache[] = $obj;
		$this->nb = $nb+1;
    	}
    	else {
        	if (isset($this->arrTache[$key])) {
            		throw new Exception("Key $key already in use.");
        	}
        	else {
            		$this->arrTache[$key] = $obj;
			$this->nb = $nb+1;
			
        	}
    	}
    }
    public function deleteItem($key) {
    	if (isset($this->arrTache[$key])) {
        	unset($this- >arrTache[$key]);
    	}
    	else {
        	throw new Exception("Invalid key $key.");
    	}
    }

    public function getItem($key) {
    	if (isset($this->arrTache[$key])) {
        	return $this->arrTache[$key];
    	}
   	else {
        	throw new Exception("Invalid key $key.");
    	}
    }
}


?>
