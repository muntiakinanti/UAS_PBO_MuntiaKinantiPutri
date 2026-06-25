<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti tambahan spesifik
    private string $namaInstalasiBeasiswa;
    private float $minimalIpkSyarat;

    public function __construct(
        int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal,
        string $namaInstalasiBeasiswa, float $minimalIpkSyarat
    ) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->namaInstalasiBeasiswa = $namaInstalasiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // Mengimplementasikan method abstrak hitungTagihanSemester
    public function hitungTagihanSemester(): float {
        // Misal skema beasiswa prestasi memotong UKT sebesar 50%
        return $this->tarifUktNominal * 0.5;
    }

    // Mengimplementasikan method abstrak tampilkanSpesifikasiAkademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>Spesifikasi Akademik Mahasiswa Prestasi</h3>";
        echo "Nama: {$this->namaMahasiswa}<br>";
        echo "NIM: {$this->nim}<br>";
        echo "Instansi Pemberi Beasiswa: {$this->namaInstalasiBeasiswa}<br>";
        echo "Syarat Minimal IPK: {$this->minimalIpkSyarat}<br>";
        echo "Tagihan Semester (Setelah Potongan 50%): Rp " . number_format($this->hitungTagihanSemester(), 0, ',', '.') . "<br>";
    }

    // Method spesifik dengan query SELECT - WHERE menggunakan PDO
    public function ambilDataPrestasiByInstansi(PDO $db, string $instansi): array {
        $sql = "SELECT id_mahasiswa, nama_mahasiswa, nim, nama_instalasi_beasiswa, minimal_ipk_syarat 
                FROM tabel_mahasiswa 
                WHERE jenis_pembiayaan = 'prestasi' AND nama_instalasi_beasiswa LIKE :instansi";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':instansi' => '%' . $instansi . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>