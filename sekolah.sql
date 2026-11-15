CREATE DATABASE IF NOT EXISTS sekolah;
USE sekolah;

CREATE TABLE kompetensi (
  kd_kompetensi   VARCHAR(10)  NOT NULL,
  nama_kompetensi VARCHAR(100) NOT NULL,
  prog_keahlian   VARCHAR(100) NOT NULL,
  PRIMARY KEY (kd_kompetensi)
) ENGINE=InnoDB;

CREATE TABLE guru (
  nip           VARCHAR(20)   NOT NULL,
  nama_guru     VARCHAR(100)  NOT NULL,
  tempat_lahir  VARCHAR(50)   NOT NULL,
  tgl_lahir     DATE          NOT NULL,
  jenkel        ENUM('L','P') NOT NULL,
  alamat        TEXT          NOT NULL,
  no_hp         VARCHAR(15)   NOT NULL,
  pend_akhir    VARCHAR(50)   NOT NULL,
  PRIMARY KEY (nip)
) ENGINE=InnoDB;

CREATE TABLE siswa (
  nis             VARCHAR(20)  NOT NULL,
  nama_siswa      VARCHAR(100) NOT NULL,
  tempat_lahir    VARCHAR(50)  NOT NULL,
  tgl_lahir       DATE         NOT NULL,
  alamat          TEXT         NOT NULL,
  no_telepon      VARCHAR(15)  NOT NULL,
  kd_kompetensi   VARCHAR(10)  NOT NULL,
  PRIMARY KEY (nis),
  FOREIGN KEY (kd_kompetensi) REFERENCES kompetensi(kd_kompetensi)
) ENGINE=InnoDB;

CREATE TABLE matpel (
  kd_matpel       VARCHAR(10)  NOT NULL,
  nama_matpel     VARCHAR(100) NOT NULL,
  jumlah_jam      INT(11)      NOT NULL,
  tingkat         VARCHAR(10)  NOT NULL,
  kd_kompetensi   VARCHAR(10)  NOT NULL,
  nip             VARCHAR(20)  NOT NULL,
  PRIMARY KEY (kd_matpel),
  FOREIGN KEY (kd_kompetensi) REFERENCES kompetensi(kd_kompetensi),
  FOREIGN KEY (nip) REFERENCES guru(nip)
) ENGINE=InnoDB;

CREATE TABLE nilai (
  kd_nilai   INT(11)      NOT NULL AUTO_INCREMENT,
  nis        VARCHAR(20)  NOT NULL,
  kd_matpel  VARCHAR(10)  NOT NULL,
  nilai_p    DECIMAL(5,2) NOT NULL,
  nilai_k    DECIMAL(5,2) NOT NULL,
  semester   ENUM('Ganjil','Genap') NOT NULL,
  tapel      VARCHAR(9)   NOT NULL,
  PRIMARY KEY (kd_nilai),
  FOREIGN KEY (nis) REFERENCES siswa(nis),
  FOREIGN KEY (kd_matpel) REFERENCES matpel(kd_matpel)
) ENGINE=InnoDB;

INSERT INTO kompetensi VALUES
('RPL', 'Rekayasa Perangkat Lunak', 'Teknologi Informasi'),
('TKJ', 'Teknik Komputer dan Jaringan', 'Teknologi Informasi');

INSERT INTO guru VALUES
('198001012005011001', 'Budi Santoso', 'Jakarta', '1980-01-01', 'L', 'Jl. Merdeka No. 1, Jakarta', '081234567890', 'S1'),
('198505052010012002', 'Siti Aminah', 'Bandung', '1985-05-05', 'P', 'Jl. Melati No. 5, Bandung', '081298765432', 'S2');
