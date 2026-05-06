<?php

class Ticket {
    public $id;
    public $title;
    public $status;
    public $assigned_to;
    public $date;

    function __construct($id, $title, $status, $assigned_to, $date){
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
        $this->assigned_to = $assigned_to;
        $this->date = $date;
    }
}
?>