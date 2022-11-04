    <?php 

class App{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // bila url kosong
        // maka url tersebut akan instalasi ke controller
        if ($url == NULL) {
            $url = [$this->controller];
        }
        // -----------------------------

        // controller
        // ada ngagk file .php yang terdapat di contrpllers?
        if(file_exists('../app/controllers/'. $url[0]. '.php')) {
            // bila ada maka
           // controller yang di atas di timpa dengan yang baru
            // dan harus controller yang baru berisi dengan url home
            // bila tidak maka akan set default
            $this->controller = $url[0];
            // lalu menghilangkan paramater index 0 
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;


        // method   

        // jika ada, maka akan lakukan pengecekan

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // pengambilan paramater
        if (!empty($url)) {
            $this->params = array_values($url);
        }   



        //! jalankan controller & method, serta kirimkan params jika ada

        call_user_func_array([$this->controller, $this->method], $this->params);
        

    }

    // -----------------------------
    //! di bagian ini akan terjadi pemecahan ('/')
    //! yang nantinya akan di gunakan dalam routing

    public function parseURL() {
        //! jika url di ketik, akan terjadi proses get data
        if(isset($_GET['url'])) {

            //! fungsi rtrim untuk menghapus tanda ('/') yang akhir

            $url = rtrim( $_GET['url'], '/');

            //! filer url agar terhindar dari hack atau dari
            //! karakter aneh
            
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } 
        }
    }









?>