<?php
class Watchlist {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function removeCrypto($userId, $cryptoId) {
        $this->db->query("DELETE FROM watchlist WHERE user_id = :user_id AND id_cryptomonnaie = :crypto_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':crypto_id', $cryptoId);
        return $this->db->execute();
    }
}
?>
