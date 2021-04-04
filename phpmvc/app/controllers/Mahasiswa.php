<?php 


class Mahasiswa extends Controller {
    public function index(){

        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header',$data);
        $this->view('Mahasiswa/index', $data);
        $this->view('template/footer');

    }

    public function detail($id){

        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header',$data);
        $this->view('Mahasiswa/detail', $data);
        $this->view('template/footer');

    }

    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)> 0){
            Flasher::setFlash('berhasil','ditambahkan', 'success');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal','ditambahkan', 'danger');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id)> 0){
            Flasher::setFlash('berhasil','dihapus', 'success');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal','dihapus', 'danger');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)> 0){
            Flasher::setFlash('berhasil','diubah', 'success');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal','diubah', 'danger');
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function cari(){
        if(isset($_POST['keyword'])){
            $data['judul'] = 'Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
            $this->view('template/header',$data);
            $this->view('Mahasiswa/index', $data);
            $this->view('template/footer');
        }else {
            header('location: '. BASEURL . '/mahasiswa');
            exit;
        };
    }
}




?>