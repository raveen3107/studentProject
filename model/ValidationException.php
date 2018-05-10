<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ValidationException extends Exception {
    
    private $errors = NULL;
    
    public function __construct($errors) {
        parent::__construct("Validation error!");
        $this->errors = $errors;
        }

    
    public function getErrors() {
        return $this->errors;
    }
    
}

?>