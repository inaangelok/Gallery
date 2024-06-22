<?php
//include_once ('../controller/Session.php');
//extends  Session
session_start();

class Model
{

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'gallery';
    public $conn = '';
    public $sql = '';

    public function __construct()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$conn) {
            $_SESSION['error'] = "Couldn't connect";
            echo "Couldn't connect";
        } else {
            $this->conn = $conn;
        }
    }

    public function insert($table, $params)
    {
        $keys = array();
        $values = array();
        foreach ($params as $key => $value) {
            $keys[] = '`' . $key . '`';
            $values[] = "'" . $value . "'";
        }
        $kys = implode(',', $keys);
        $vls = implode(',', $values);
        $this->sql = "INSERT INTO `" . $table . "` (" . $kys . ") VALUES (" . $vls . ")";
        mysqli_query($this->conn, $this->sql);
    }


    public function select_all($table)
    {
        $sql = "SELECT * FROM `" . $table . "`";
        $this->sql = $sql;
    }

    public function select($table, $key)
    {
        $arr = [];
        foreach ($key as $value) {
            $arr[] = "`" . $value . "`";
        }
        $kys = implode(',', $arr);
        $this->sql = "SELECT " . $kys . " FROM `" . $table . "` ";
        return $this->sql;
    }

    public function select_row($table)
    {
        $this->sql = "SELECT * FROM `" . $table . "`";
        return $this->sql;
    }

    public function where($params)
    {
        $elmts = [];
        foreach ($params as $key => $value) {
            $elmts[] = $key . "= '" . $value . "'";
        }
        $imp = implode(' AND ', $elmts);
        $this->sql .= "WHERE " . $imp . " ";
        return $this->sql;
    }

    public function query()
    {
//        var_dump($this->sql);die();
        $res = mysqli_query($this->conn, $this->sql);
        $row = mysqli_fetch_assoc($res);
        return $row;

    }

    public function query_all()
    {
        $rez = mysqli_query($this->conn, $this->sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($rez)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function query_update()
    {
        mysqli_query($this->conn, $this->sql);
    }

    public function delete($table)
    {
        $this->sql = "DELETE FROM `" . $table . "` ";
        return $this->sql;
    }

    public function update($table, $params)
    {
        $vals = array();
        foreach ($params as $key => $value) {
            $vals[] = ' `' . $key . '`' . "= '" . $value . "' ";
        }
        $vls = implode(',', $vals);
        $this->sql = "UPDATE `" . $table . "` SET " . $vls . " ";
        return $this->sql;
    }
}