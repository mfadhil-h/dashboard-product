<?php 
session_start();
	if(!isset($_SESSION['login'])){
		header("Location:index.php");
		exit;
	
	}

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
            echo ' - '. $current->read_node().'<br>'.'<br>';
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
$link1->insert('1. Edwin Hadinata');
$link1->insert('2. Muhammad Fadhil');
$link1->insert('3. Satrio Bayu Wibowo');
$link1->insert('4. Ahmad Enryu');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>about</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage.php">Input Product</a></li>
            <li><a href="list.php">Daftar Product</a></li>
            <li><a href="about.php">About</a></li>
			<li class="logout"><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<header>
        <div>
			<h1>RECAST</h1>
			<p>Report Card Storage</p>
		</div>
	</header>
	<div class="banner">
		<div class="teks">
			<h3>Nama Anggota: <br> </h3>
			<ul>
			<?=$link1->read_list(); ?></ul>
</body>
</html>