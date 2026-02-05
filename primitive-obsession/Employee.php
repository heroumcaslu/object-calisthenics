<?php

class Employee
{
    
    private Email $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

}