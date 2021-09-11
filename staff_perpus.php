<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Staff Perpustakaan</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success" >
      <div class="container" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="staff_perpus.php" style="color:white;">Beranda</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                Form Buku
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="?menu=input_buku">Input Buku</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                Inputan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="?menu=data_input_buku">Data Buku Masuk</a></li>
                <li><a class="dropdown-item" href="?menu=data_buku_siswa">Data Siswa Pinjam Buku</a></li>
              </ul>
            </li>
        </ul>
        <form class="d-flex">
            <ul class="nav navbar-expand-lg justify-content-end ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                        Staff Perpustakaan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?menu=ubah_pass">Ubah Password</a></li>
                    </ul>
                </li>
                <li class="nav-right">
                    <a class="nav-link" aria-current="page" href="index.php" style="color:white;"onclick="return confirm('Anda Yakin Ingin Keluar?')">Logout</a>
                </li>
            </ul>
          </form>
        </div>
      </div>
    </nav>
    <aside>
        <div class="box" >
            <img src="img/2.jpg" height="250px" width="200px">
            <div class="text-center mt-3">
              <h3 class="">Perpustakaan</h3>
              Jl. Wangun Atas
            </div>
        </div>
    </aside>
    <br>
    <?php 
        switch(@$_GET['menu']){
  
            case 'input_buku';
            include 'input_buku.php';
            break;

            case 'data_input_buku';
            include 'data_input_buku.php';
            break;

            case 'data_buku_siswa';
            include 'data_buku_siswa.php';
            break;

            case 'ubah_pass';
            include 'ubah_pass.php';
            break;
            
            
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableAll').DataTable();
        } );
    </script>
  </body>
</html>