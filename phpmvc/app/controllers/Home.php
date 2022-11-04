<?php 

class Home extends Controller {
    public function index()
    {
        //! -----------------------------
        //! memanggil folder yang ada di view
        //! lalu ke folder ke home lalu ke index.php
        $data["judul"] = "Home";
        //? memanggil sebuah model, lalu memanggil method di dalam getUser 
        $data["nama"] = $this->model('User_model')->getUser();
        $this->view("templates/header", $data);
        $this->view("home/index",$data); //? lalu terkirim ke sini
        $this->view("templates/footer");
    }
}



?>