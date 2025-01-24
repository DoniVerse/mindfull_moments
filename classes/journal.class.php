<?php
require_once 'database.class.php';

class Journal extends Database {
    public function __construct() {
        $this->connect();
    }

    public function addEntry($entry) {
        $stmt = $this->conn->prepare("INSERT INTO journals (entry) VALUES (?)");
        $stmt->bind_param("s", $entry);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteEntry($id) {
        $stmt = $this->conn->prepare("DELETE FROM journals WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllEntries() {
        return $this->conn->query("SELECT * FROM journals ORDER BY created_at DESC");
    }

    
    public function __destruct() {
        $this->closeConnection();
    }
}