<?php

class Database {
    private string $host = "localhost";
    private string $username = "root";
    private string $password = ""; // Kosongkan jika pakai XAMPP/Laragon default, atau isi password MySQL-mu
    private string $dbName = "db_uas_pbo_ti1d_muntiakinantiputri";
    private ?PDO $conn = null;

    // Method untuk mendapatkan koneksi database
    public function hubungkan(): PDO {
        if ($this->conn === null) {
            try {
                // Mengatur DSN (Data Source Name)
                $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8mb4";
                
                // Membuat instance PDO baru
                $this->conn = new PDO($dsn, $this->username, $this->password);
                
                // Mengatur mode error PDO ke Exception untuk mempermudah debugging saat UAS
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                // Jika koneksi gagal, hentikan program dan tampilkan pesan error
                die("Koneksi Database Gagal: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
?>