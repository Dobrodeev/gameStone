<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 18.02.2019
 * Time: 20:53
 */

class Our_List
{
    public $start = null;
    public $count = 0;

    public function push_front($data)
    {
        include 'Node.php';
        $this->start = new Node($this->start, $data);
        $this->count++;
    }

    public function list_print()
    {
        if ($this->count > 0)
        {
            $temp = $this->start;
            do
            {
                echo $temp->data . '<br>';
                $temp = $temp->next;

            } while ($temp != null);
        }
    }
}