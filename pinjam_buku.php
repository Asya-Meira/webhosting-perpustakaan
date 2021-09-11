<?php
include 'config/koneksi.php';
include 'library/controller.php';

    $go = new controller();
    $tabel = "tbl_pinjam";
    $redirect = "?menu=pinjam_buku";
    @$where = "nis= $_GET[id]";
    
    if (isset($_POST['simpan'])) {
        @$field = array('nis'=>$_POST['nis'],
            'nama'=>$_POST['nama'],
            'rombel'=>$_POST['rombel'], 
            'rayon'=>$_POST['rayon'],
            'judul_buku'=>$_POST['judul_buku'],
            'tanggal_pinjam'=>$_POST['tanggal_pinjam']);
        // var_dump($field);
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if (isset($_GET['hapus'])) {
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if (isset($_GET['edit'])) {
        $edit = $go->edit($con, $tabel, $where);
    }
    if (isset($_POST['ubah'])) {
        @$field = array('nis'=>$_POST['nis'],
            'nama'=>$_POST['nama'],
            'rombel'=>$_POST['rombel'], 
            'rayon'=>$_POST['rayon'],
            'judul_buku'=>$_POST['judul_buku'],
            'tanggal_pinjam'=>$_POST['tanggal_pinjam']);
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
        <div class="card">
            <div class="card-header">
                Form Pinjam Buku
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">NIS</label>
                        <input type="text" name="nis" class="form-control" value="<?php echo @$edit['nis'] ?>" id="exampleFormControlInput1" placeholder="Masukan NIS Anda (Angka)" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo @$edit['nama'] ?>" id="exampleFormControlInput1" placeholder="Masukan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Rombel</label>
                        <input type="text" name="rombel" class="form-control" value="<?php echo @$edit['rombel'] ?>" id="exampleFormControlInput1" placeholder="Masukan Rombel" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Rayon</label>
                        <input type="text" name="rayon" class="form-control" value="<?php echo @$edit['rayon'] ?>" id="exampleFormControlInput1" placeholder="Masukan Rayon" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo @$edit['judul_buku'] ?>" id="exampleFormControlInput1" placeholder="Masukan judl buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-bold">Tanggal Pinjam</label>
                        <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo @$edit['tanggal_pinjam'] ?>" id="exampleFormControlInput1" placeholder="Masukan tanggal pinjam" required>
                    </div>
                    <?php if(@$_GET['id'] ==""){ ?>
                        <input type="submit" class="btn btn-primary"name="simpan" value="Simpan Data">
                    <?php }else{ ?>
                        <input type="submit" class="btn btn-primary" name="ubah" value="Ubah Data">
                    <?php } ?>
            </form>
            </div>
        </div>
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
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = $go->tampil($con, $tabel);
                            $no = 0;
                            if($data==""){
                                echo "<tr><td colspan='4'>No Data</td></tr>";
                            }else{
                            foreach($data as $r){
                            $no++
                        ?>
                        <tr>
                            <td><?php echo @$r['nis']?></td>
                            <td><?php echo @$r['nama']?></td>
                            <td><?php echo @$r['rombel']?></td>
                            <td><?php echo @$r['rayon']?></td>
                            <td><?php echo @$r['judul_buku']?></td>
                            <td><?php echo @$r['tanggal_pinjam']?></td>
                            <td><a class="btn btn-warning" type="submit" href="?menu=pinjam_buku&edit&id=<?php echo @$r['nis']?>">Edit</a></td>
                            <td><a class="btn btn-danger" type="submit" href="?menu=pinjam_buku&hapus&id=<?php echo @$r['nis']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
