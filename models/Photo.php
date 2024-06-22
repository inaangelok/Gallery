<?php
include_once("../vendor/model/Model.php");

class Photo extends Model
{
    public $table = 'photos';

    public function create_photo($params)
    {
        $this->insert($this->table, $params);
    }

    public function update_photo($params)
    {
        $this->update($this->table, $params);
    }

    public function select_photo()
    {
        $this->select_row($this->table);
    }

    public function delete_photo()
    {
        $this->delete($this->table);
    }
}