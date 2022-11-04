<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data["judul"] = 'Daftar Mahasiswa';
        $data["mhs"] = $this->model("Mahasiswa_model")->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        $data["judul"] = 'Daftar Mahasiswa';
        $data["mhs"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // function yang bertugas untuk tambah
    public function tambah()
    {
        //! bila fungsi berhasil di jalankan, maka akan berpindah lokasi web  
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'succes');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // function yang bertugas untuk menghapus
    public function hapus($id)
    {
        //! bila fungsi berhasil di jalankan, maka akan berpindah lokasi web  
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'succes');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }


    public function getUbah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        //! bila fungsi berhasil di jalankan, maka akan berpindah lokasi web  
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'succes');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari() 
    {
        $data["judul"] = 'Daftar Mahasiswa';
        $data["mhs"] = $this->model("Mahasiswa_model")->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');        
    }
}
