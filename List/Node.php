<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 18.02.2019
 * Time: 20:53
 */

//

/**
 * Class Node
 * узел списка
 */
class Node
{
    /**
     * @var null
     * указатеь на следующий элемент списка
     */
    public $next = null;
    /**
     * @var
     * значение узла списка
     */
    public $data;

    /**
     * Node constructor.
     * @param $next
     * @param $data
     */
    public function __construct($next, $data)
    {
        $this->next = $next;
        $this->data = $data;
    }
}