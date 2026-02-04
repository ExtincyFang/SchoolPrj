CREATE DATABASE db_aspirasi_ukom26;

CREATE TABLE tb_kelas(
    id_kelas INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR (50) NOT NULL,
    tahun_ajaran VARCHAR (10) NOT NULL, --> 2025/2026
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tb_kategori(
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR (50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tb_feedback(
    id_feedback INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_aspirasi INT NOT NULL,
    isi_feedback VARCHAR (50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tb_user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_kelas INT NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    role ENUM('admin','siswa') NOT NULL DEFAULT 'siswa',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tb_aspirasi (
    id_aspirasi INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_kategori INT NOT NULL,
    lokasi VARCHAR(50) NOT NULL,
    isi_aspirasi TEXT NOT NULL,
    status_aspirasi ENUM('pending', 'diproses', 'selesai') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); 

