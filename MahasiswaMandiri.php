<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik
    private string $golonganUkt;
    private string $namaWali;

    public function __construct(
        int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal,
        string $golonganUkt, string $namaWali
    ) {
        // Memanggil constructor dari abstract class induk (Mahasiswa)
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Mengimplementasikan method abstrak hitungTagihanSemester
    public function hitungTagihanSemester(): float {
        // Jalur mandiri membayar UKT penuh sesuai nominal tarif
        return $this->tarifUktNominal + 10000; 
    }

    // Mengimplementasikan method abstrak tampilkanSpesifikasiAkademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>Spesifikasi Akademik Mahasiswa Mandiri</h3>";
        echo "Nama: {$this->namaMahasiswa}<br>";
        echo "NIM: {$this->nim}<br>";
        echo "Golongan UKT: {$this->golonganUkt}<br>";
        echo "Nama Wali: {$this->namaWali}<br>";
        echo "Total Tagihan: Rp " . number_format($this->hitungTagihanSemester(), 0, ',', '.') . "<br>";
    }

    // Method spesifik dengan query SELECT - WHERE menggunakan PDO
    public function ambilDataMandiriByGolongan(PDO $db, string $golongan): array {
        $sql = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, golongan_ukt, nama_wali 
                FROM tabel_mahasiswa 
                WHERE jenis_pembiayaan = 'mandiri' AND golongan_ukt = :golongan";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':golongan' => $golongan]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>