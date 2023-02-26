<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Tambah Data Siswa - Syahdan Dev</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } 
                if($siswa) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('siswa/update/') ?>" method="POST">
                        <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa; ?>"/>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $siswa->nama_siswa; ?>" placeholder="Masukkan Title">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telephone</label>
                                <input type="number" class="form-control" name="nomor_telp" value="<?php echo $siswa->nomor_telp; ?>" placeholder="Masukkan Nomor Telp">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat_siswa" rows="4" placeholder="Masukkan Konten"><?php echo $siswa->alamat_siswa; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>