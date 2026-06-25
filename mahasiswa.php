<?php

// Mendeklarasikan kelas sebagai abstract class
abstract class Mahasiswa {
    
    // Properti terenkapsulasi dengan hak akses protected
    protected int $idMahasiswa;
    protected string $namaMahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal; // Dipetakan pas dari kolom tarif_ukt_nominal di database

    // Constructor untuk menginisialisasi atribut global saat objek anak dibuat
    public function __construct(
        int $idMahasiswa, 
        string $namaMahasiswa, 
        string $nim, 
        int $semester, 
        float $tarifUktNominal
    ) {
        $this->idMahasiswa = $idMahasiswa;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal; // Nilai ini wajib diambil dari query database
    }

    // =========================================================================
    // DEKLARASI ABSTRACT METHODS (Tanpa isi/body)
    // Wajib di-override dan diimplementasikan secara spesifik oleh kelas anak
    // =========================================================================
    
    // Metode untuk menghitung total tagihan semester
    abstract public function hitungTagihanSemester(): float;

    // Metode untuk menampilkan detail spesifik akademik berdasarkan jalur pembiayaan
    abstract public function tampilkanSpesifikasiAkademik(): void;

    // =========================================================================
    // GETTER METHODS (Untuk akses data dari luar jika diperlukan)
    // =========================================================================
    public function getIdMahasiswa(): int { return $this->idMahasiswa; }
    public function getNamaMahasiswa(): string { return $this->namaMahasiswa; }
    public function getNim(): string { return $this->nim; }
    public function getSemester(): int { return $this->semester; }
    public function getTarifUktNominal(): float { return $this->tarifUktNominal; }
}

?>