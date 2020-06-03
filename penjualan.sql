CREATE DATABASE penjualan;
USE penjualan;

CREATE TABLE tb_transaksi(
  kode_transaksi varchar(15) PRIMARY KEY,
  tanggal timestamp()
);
