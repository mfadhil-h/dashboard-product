<?php 
class ListNode
{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }

    function read_node()
    {
        return $this->data;
    }
}

class LinkList
{
    private $first_node;
    private $last_node;
    private $count;

    function __construct()
    {
        $this->first_node = NULL;
        $this->last_node = NULL;
        $this->count = 0;
    }

    function size()
    {
        return $this->count;
    }

    public function read_list()
    {
        $listData = array();
        $current = $this->first_node;
        while($current != NULL)
        {
            echo $current->read_node().' <br>';
            $current = $current->next;
        }
    }

    public function insert($data)
    {
        $new_node = new ListNode($data);

        if($this->first_node != NULL)
        {
            $this->last_node->next = $new_node;
            $new_node->next = NULL;
            $this->last_node = &$new_node;
            $this->count++;
        }
        else
        {
            $new_node->next = $this->first_node;
            $this->first_node = &$new_node;

            if($this->last_node == NULL)
                $this->last_node = &$new_node;

            $this->count++;
        }
    }
}
//Create linked list
$link1 = new LinkList();


//Insert elements
$link1->insert('senin');
$link1->insert('selasa');
$link1->insert('rabu');
$link1->insert('kamis');
$link1->insert('jumat'); 
      
?>
<!DOCTYPE html>
<html>
<head>
    <title>coba</title>
</head>
<body>
    <h1>Mahasiswa</h1>
    <p>Bonus Nilai: </p>
    <p><?=$link1->read_list(); ?></p>
    <p><?= $link1->size()?></p>
</body>
</html> 