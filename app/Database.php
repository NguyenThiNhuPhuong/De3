<?php
class Database{
    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "de3";
    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->database);
        mysqli_query($this->con, "SET NAMES 'utf8' ");
    }
    // dung cho insert, update, delete (tao chuoi truy van ben ngoai roi truyen vao)
    function execute($query)
    {
        mysqli_query($this->con, $query);

    }

    // tra ve ket qua cho select, select *(tao chuoi truy van ben ngoai roi truyen vao)
    function executeResult($query, $isSingle = false)
    {
        $result = mysqli_query($this->con, $query);
        $list = [];
        if ($isSingle) {
            $list = mysqli_fetch_array($result, 1);
        } else {
            while ($row = mysqli_fetch_array($result, 1)) {
                $list[] = $row;
            }
        }

        return  $list;
    }
}