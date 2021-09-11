<?php
include 'config/koneksi.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_pinjam";
    @$field = array('nis'=>$_POST['nis'],
                'nama'=>$_POST['nama'],
                'rombel'=>$_POST['rombel'], 
                'rayon'=>$_POST['rayon'],
                'judul_buku'=>$_POST['judul_buku'],
                'tanggal_pinjam'=>$_POST['tanggal_pinjam']);
    $redirect = "?menu=data_buku";
    @$where = "nis= $_GET[id]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    LAPORAN SEMUA BUKU
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <div class="table-responsive mt-3">
                    <table align="center" border="1" class="mt-4 table table-striped table-hover bg-white" id="tableAll">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Rombel</th>
                                <th>Rayon</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tbl_pinjam ";
                                $jalan = mysqli_query($con, $sql);
                                while($r = mysqli_fetch_array($jalan)){
                            ?>
                            <tr>
                                <td><?php echo $r['nis']?></td>
                                <td><?php echo $r['nama']?></td>
                                <td><?php echo $r['rombel']?></td>
                                <td><?php echo $r['rayon']?></td>
                                <td><?php echo $r['judul_buku']?></td>
                                <td><?php echo $r['tanggal_pinjam'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>