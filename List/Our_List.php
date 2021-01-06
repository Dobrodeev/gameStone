<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 18.02.2019
 * Time: 20:53
 */

//

/**
 * Class Our_List
 * Список из улов - обьектов класса Node.php
 */
class Our_List
{
    /**
     * @var null
     */
    public $start = null;
    /**
     * @var int
     */
    public $count = 0;

    /**
     * @param $data
     * Добавляет узел в список
     */
    public function push_front($data)
    {
        include 'List/Node.php';
        $this->start = new Node($this->start, $data);
        $this->count++;
    }

    /**
     * печатает все узлы списка
     */
    public function list_print()
    {
        if ($this->count > 0) {
            $temp = $this->start;
            do {
                echo $temp->data.'<br>';
                $temp = $temp->next;

            } while ($temp != null);
        }
    }
}