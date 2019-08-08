<?php

/**
 * Class Node
 */
class Node
{
    public $data;
    public $next;

    public function __construct($item)
    {
        $this->data = $item;
        $this->next = null;
    }
}

/**
 * Class LinkList
 */
class LinkList
{
    public $head = null;

    private static $count = 0;

    /**
     * @return int
     */
    public function GetCount()
    {
        return self::$count;
		
    }

    /**
     * @param mixed $item
     */
    public function InsertAtFist($item) 
	{
        if ($this->head == null) 
		{
            $this->head = new Node($item);
        } 
		else 
		{
            $temp = new Node($item);

            $temp->next = $this->head;

            $this->head = $temp;
        }

        self::$count++;
    }

    /**
     * @param mixed $item
     */
    public function InsertAtLast($item) 
	{
        if ($this->head == null) 
		{
            $this->head = new Node($item);
        } 
		else 
		{
            /** @var Node $current */
            $current = $this->head;
            while ($current->next != null)
            {
                $current = $current->next;
            }

            $current->next = new Node($item);
        }

        self::$count++;
    }

    /**
     * Delete the node which value matched with provided key
     * @param $key
     */
    public function Delete($key)
    {
        /** @var Node $current */
        $current = $previous = $this->head;

        while($current->data != $key) 
		{
            $previous = $current;
            $current = $current->next;
        }

        // For the first node
        if ($current == $previous) 
		{
            $this->head = $current->next;
        }

        $previous->next = $current->next;

        self::$count--;
    }
	
	
		public function bubbleSort(&$items) 
		{ 
			$n = sizeof($items); 
			
			// Traverse through all array elements 
			for($i = 0; $i < $n; $i++)  
			{ 
				// Last i elements are already in place 
				for ($j = 0; $j < $n - $i - 1; $j++)  
				{ 
					// traverse the array from 0 to n-i-1 
					// Swap if the element found is greater 
					// than the next element 
					if ($items[$j] > $items[$j+1]) 
					{ 
						$t = $items[$j]; 
						$items[$j] = $items[$j+1]; 
						$items[$j+1] = $t; 
					} 
				} 
			} 
		}
	
	
	

    /**
     * Print the link list as string like 1->3-> ...
     */
    public function PrintAsList()
    {
        $items = array();
        /** @var Node $current */
        $current = $this->head;
        while($current != null) 
		{
			
            array_push($items, $current->data);
            $current = $current->next;
        }
		
		$this->bubbleSort($items);
		
        foreach($items as $item)
        {
			echo $item . "->";
        }

        echo PHP_EOL;
    }
	
	public function sortl() 
	{
		if ( $this->head !== NULL ) 
		{
			if ( $this->head->next !== NULL ) 
			{
				for ( $i = 0; $i < self::$count; $i++ ) 
				{
					$temp = NULL;
					$current = $this->head;
					while ( $current !== NULL ) 
					{
						if ( $current->next !== NULL && $current->data > $current->next->data ) 
						{
							$temp = $current->data;
							$current->data = $current->next->data;
							$current->next->data = $temp;
						}
						$current = $current->next;
					}
				}
			}
		}
	}
	
	public function duplicate()
	{
		$ptr1 = NULL;
		$ptr2 = NULL;
		$dup = NULL;
		$ptr1 = $this->head;
		while($ptr1 != NULL and $ptr1->next != NULL)
		{
			$ptr2 = $ptr1;
			
			while($ptr2->next != NULL)
			{
				if($ptr1->data == $ptr2->next->data)
				{
					$dup = $ptr2->next;
					$ptr2->next = $ptr2->next->next;
				}
				else
				{
					$ptr2 = $ptr2->next;
				}
			}
			$ptr1 = $ptr1->next;
		}
	}
	
	public function printl()
	{
		$current = $this->head;
		while($current != null)
		{
			echo $current->data . '->';
			$current = $current->next;
		}
	}
	
}


$ll = new LinkList();

$ll->InsertAtFist(67);
$ll->InsertAtFist(45);
$ll->InsertAtFist(11);
$ll->InsertAtFist(88);
$ll->InsertAtFist(56);
$ll->InsertAtFist(100);
$ll->InsertAtFist(199);
$ll->InsertAtFist(500);
$ll->InsertAtFist(56);

$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount();
echo PHP_EOL;
$ll->Delete(45);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount();
echo PHP_EOL;
$ll->Delete(500);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount();
echo PHP_EOL;
$ll->Delete(100);
$ll->PrintAsList();
echo 'Total elements ' . $ll->GetCount();
echo PHP_EOL;

/**
 * from here on firstly all the duplicate entries are removed;
                then the link list is sorted;
				then it is printed on the screen.
 */


$ll->duplicate();
$ll->sortl();
$ll->printl();

echo PHP_EOL;