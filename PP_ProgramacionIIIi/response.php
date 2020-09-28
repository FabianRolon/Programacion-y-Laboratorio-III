
<?php

class Response{
    public $status;
    public $data; 

    public function __construct(){
        $this->status='fail';
        $this->data='no data';
    }

}