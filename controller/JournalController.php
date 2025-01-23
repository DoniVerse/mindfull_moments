<?php
require_once 'C:\Program Files\Ampps\www\mindfull_moments\classes\journal.php';

class JournalController {
    private $journal;

    public function __construct() {
        $this->journal = new Journal('localhost','root', '123', 'user_db');
    }

    public function addEntry($entry) {
        $this->journal->addEntry($entry);
    }

    public function deleteEntry($id) {
        $this->journal->deleteEntry($id);
    }

    public function getAllEntries() {
        return $this->journal->getAllEntries();
    }

    
}