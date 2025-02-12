<?php
class Watchlist {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getWatchlist() {
        $query = "SELECT 
                    c.id_cryptomonnaie,
                    w.creation_date, 
                    c.nom AS crypto_name, 
                    c.symbole AS symbol, 
                    c.slug, 
                    c.max_supply, 
                    c.prix AS price, 
                    c.classement AS rank, 
                    c.marketCap AS market_cap, 
                    c.volume24h AS volume_24h, 
                    c.circulatingSupply, 
                    c.total_Supply, 
                    u.nexusid,
                    u.nom AS user_name, 
                    u.prenom AS user_surname, 
                    u.email 
                  FROM Watchlist w
                  JOIN users u ON w.user_id = u.nexusId
                  JOIN cryptomonnaie c ON w.id_cryptomonnaie = c.id_cryptomonnaie";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function removeCrypto($userId, $cryptoId) {
        $this->db->query("DELETE FROM watchlist WHERE user_id = :user_id AND id_cryptomonnaie = :crypto_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':crypto_id', $cryptoId);
        return $this->db->execute();
    }

    public function addToWatchList($userId, $cryptoId) {
        $this->db->query("INSERT INTO watchlist (user_id, id_cryptomonnaie) VALUES (:user_id, :crypto_id)");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':crypto_id', $cryptoId);
        return $this->db->execute();
    }
}

