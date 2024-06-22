<?php
include_once("../vendor/model/Model.php");

class Like extends Model
{
    public $table = 'liked';

    public function create_like($params)
    {
        $this->insert($this->table, $params);
    }

    public function update_like($params)
    {
        $this->update($this->table, $params);
    }

    public function select_like()
    {
        $this->select_row($this->table);
    }

    public function delete_like()
    {
        $this->delete($this->table);
    }
}