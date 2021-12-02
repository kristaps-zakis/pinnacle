<?php

class Subscription {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getList() {
        $query = 'SELECT * FROM subscribers';
        $queryFilter = '';

        $byType = false;

        if (isset($_GET['filter-by-type'])) {
            $emailType = htmlentities($_GET['filter-by-type'], ENT_QUOTES, 'UTF-8');

            $queryFilter .= " WHERE `email` LIKE '%" . $emailType . "%' ";
            
            $byType = true;
        }

        if (isset($_GET['search'])) {
            $search = htmlentities($_GET['search'], ENT_QUOTES, 'UTF-8');

            if ($search !== '') {
                if ($byType) {
                    $queryFilter .= " AND ";
                } else {
                    $queryFilter .= " WHERE ";
                }

                $queryFilter .= " `email` LIKE '%" . $search . "%' ";
            }
        }

        if (isset($_GET['sortby'])) {
            if ($_GET['sortby'] === "0") {
                $queryFilter .= ' ORDER BY timestamp ASC';
            } else {
                $queryFilter .= ' ORDER BY email ASC';
            }
        } else {
            $queryFilter .= ' ORDER BY timestamp ASC';
        }

        $query .= $queryFilter;

        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }

    public function addPost($email) {
        $this->db->query('INSERT INTO subscribers ( email ) VALUES (:email)');
        $this->db->bind(':email', $email);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMultiples($ids) {
        foreach ($ids as $id) {
            $this->db->query('DELETE FROM subscribers WHERE id IN (:id)');
            $this->db->bind(':id', $id);
            $this->db->execute();
        }
    }

    public function deletePost($id) {
        $this->db->query('DELETE FROM subscribers WHERE id = :id');
        $this->db->bind(':ids', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}