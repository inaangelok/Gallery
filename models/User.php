<?php
include_once("../vendor/model/Model.php");

class User extends Model
{
    public $table = 'users';

    public function create_user($params)
    {
        $this->insert($this->table, $params);
    }

    public function update_user($params)
    {
        $this->update($this->table, $params);
    }

    public function select_user()
    {
        $this->select_row($this->table);
    }

    public function delete_user()
    {
        $this->delete($this->table);
    }
}