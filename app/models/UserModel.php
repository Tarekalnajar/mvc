<?php
namespace app\models;

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsers() {
        return $this->db->get('user');
    }

    public function addUser($data) {
        return $this->db->insert('user', $data);
    }

    public function getUserById($id) {
        return $this->db->where('id', $id)->getOne('user');
    }

    public function updateUser($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function searchUsers($searchTerm) {
        $this->db->where('email', $searchTerm, 'LIKE');
        return $this->db->get('user');
    }
}
