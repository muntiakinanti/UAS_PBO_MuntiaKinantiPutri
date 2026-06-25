<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti tambahan spesifik
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(
        int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal,
        string $nomorKipKuliah, float $danaSakuSubsidi
    ) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Mengimplementasikan method abstrak hitungTagihanSemester
    public function hitungTagihanSemester(): float {
        // Mahasiswa Bidikmisi / KIP-K dibebaskan dari tagihan UKT (Rp 0)
        return 0.0;
    }

    // Mengimplementasikan method abstrak tampilkanSpesifikasiAkademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "<h3>Spesifikasi Akademik Mahasiswa Bidikmisi</h3>";
        echo "Nama: {$this->namaMahasiswa}<br>";
        echo "NIM: {$this->nim}<br>";
        echo "Nomor KIP Kuliah: {$this->nomorKipKuliah}<br>";
        echo "Dana Saku Subsidi/Bulan: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.') . "<br>";
        echo "Total Tagihan Semester: Rp " . number_format($this->hitungTagihanSemester(), 0, ',', '.') . " (Subsidi Penuh)<br>";
    }

    // Method spesifik dengan query SELECT - WHERE menggunakan PDO
    public function ambilDataBidikmisiBySubsidiMinimum(PDO $db, float $minSubsidi): array {
        $sql = "SELECT id_mahasiswa, nama_mahasiswa, nim, nomor_kip_kuliah, dana_saku_subsidi 
                FROM tabel_mahasiswa 
                WHERE jenis_pembiayaan = 'bidikmisi' AND dana_saku_subsidi >= :min_subsidi";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':min_subsidi' => $minSubsidi]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>