    <?php

class About extends Controller
{
    //! agar pemanggilan controller yang about, tidak error
    //! kenapa error? karena tidak ada method default(index)

    // ! -------------   ⬇    ----------------

    public function index($nama = "Admin",$pekerjaan = "Admin",$umur = 99)

    // ! -------------   ⬆    ----------------

    //! dalam function index() <- akan "menerima/mengambil" 
    //! variabel parameter dengan nama index($nama,$pekerjaan) 
     
    {

        //! 3 data ini akan terkirim ke view index 
        $data["nama"] = $nama;
        $data["pekerjaan"] = $pekerjaan;
        $data["umur"] = $umur;
        //! -----------------------------
        //! membuat data judul agar setiap web di buka
        //! nama halaman ya berubah sesuai apa yang sedang di akses 
        $data["judul"] = "About Me"; 
        
        $this->view("templates/header", $data); 
        // ! -------------   ⬇    ----------------
        //! dari this view ini akan terkirim ke template/header dan data
        
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page()
    {
        //! membuat data judul agar setiap web di buka
        //! nama halaman ya berubah sesuai apa yang sedang di akses 
        $data["judul"] = "Pages";
        //! -----------------------------
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}
