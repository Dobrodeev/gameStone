<?php

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

class Our_List
{
	public $start = null;
	public $count = 0;

	public function push_front($data)
	{
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
			}
			while ($temp != null);
		}
	}
}
