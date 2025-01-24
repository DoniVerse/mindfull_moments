<?php
require_once 'includes/autoloader.inc.php';
// require_once 'classes/journal.php';

class JournalController extends Journal {
    private $journal;

    public function __construct() {
        $this->journal = new Journal('localhost','root', '', 'user_db');
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