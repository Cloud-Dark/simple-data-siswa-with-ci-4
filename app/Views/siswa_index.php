<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
    <title>Data Siswa - Syahdan Dev</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if (!empty(session()->getFlashdata('message'))) : ?>

                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('message'); ?>
                    </div>

                <?php endif ?>

                <a href="<?php echo base_url('siswa/create') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA SISWA</a>
                <table class="table table-bordered table-striped" id="table-artikel-query">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Nomor Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswas as $key => $siswa) : ?>

                            <tr>
                                <td><?php echo $siswa['nama_siswa'] ?></td>
                                <td><?php echo $siswa['nomor_telp'] ?></td>
                                <td><?php echo $siswa['alamat_siswa'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('siswa/edit/' . $siswa['id_siswa']) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                    <a href="<?php echo base_url('siswa/delete/' . $siswa['id_siswa']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php echo $pager->links('siswa', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-artikel-query').DataTable({

            });
        });
    </script>
</body>

</html>