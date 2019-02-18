<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 18.02.2019
 * Time: 20:53
 */

class Node
{
    public $next = null;
    public $data;

    public function __construct($next, $data)
    {
        $this->next = $next;
        $this->data = $data;
    }
}