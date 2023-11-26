<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h4 class="mb-4 text-gray-800"> Dashboard Kecamatan Batu Ampar <strong>(Desa <?php echo $this->session->userdata('nama_desa') ?>)</strong></h4>

    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">
        Selamat datang, Anda login sebagai Kepala Desa <?php echo $this->session->userdata('nama_desa') ?>
    </div>

    <div class="card" style="margin-bottom: 120px; width: 100%;">
        <div class="card-header font-weight-bold bg-success text-white">
            Profil Pengguna
        </div>

        <?php foreach ($aakun as $a) : ?>
            <div class="card-body" style="background-color: whitesmoke;">
                <div class="row">
                    <div class="col-md-3">
                        <img style="width: 200px" src="<?php echo base_url('assets/foto/' . $a->foto) ?>">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td><strong>NIP/NIK</strong></td>
                                <td>:</td>
                                <td><?php echo $a->nip ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td><?php echo $a->nama_pengguna ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td>:</td>
                                <td><?php echo $a->jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>:</td>
                                <td><?php echo $a->username ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->