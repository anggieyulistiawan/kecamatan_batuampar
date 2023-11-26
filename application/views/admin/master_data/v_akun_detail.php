<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 80%">
        <div class="card-body table-responsive">
            <table class="table">

                <tr>
                    <th>Nama Pengguna</th>
                    <td><?php echo $detail->nama_pengguna ?></td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $detail->jenis_kelamin ?></td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td><?php echo $detail->username ?></td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td><?php echo $detail->password ?></td>
                </tr>


            </table>
            <a href="<?php echo base_url('admin/akun'); ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>

</div>