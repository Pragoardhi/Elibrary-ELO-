<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katalog_buku extends CI_Model
{
    public function getBook()
    {
        $data = $this->db->query("SELECT dbo.Book.ID,dbo.Book.Judul,dbo.Tipe_book.Tipe, dbo.Book.Penulis, dbo.Book.Penerbit, dbo.Book.ISBN, dbo.Book.Harga, dbo.Book.Keterangan, dbo.Book.Image, dbo.Book.Year FROM dbo.Book INNER JOIN dbo.Tipe_book ON dbo.Book.id_tipe = dbo.Tipe_book.id");
        // echo $data->result_array();
        return $data->result_array();
    }

    public function addPeminjaman($idUser, $idBook, $tglPeminjaman, $tglPengembalian, $notifikasi)
    {
        $this->db->query("INSERT INTO [dbo].[Peminjaman](id, ID_Buku, Tgl_Peminjaman, Tgl_Pengembalian,Notifikasi) VALUES ('$idUser', '$idBook', '$tglPeminjaman', '$tglPengembalian','$notifikasi')");
    }

    public function getPeminjaman($id)
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Peminjaman] WHERE id = '$id'");
        // echo $data->result_array();
        return $data->result_array();
    }

    public function getPinjamBooks()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Peminjaman]");
        // echo $data->result_array();
        return $data->result_array();
    }
}
