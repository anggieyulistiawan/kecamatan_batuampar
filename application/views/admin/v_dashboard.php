<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h4 class="mb-4 text-gray-800"> Dashboard <strong>( Kecamatan Batu Ampar)</strong></h4>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $akun ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Desa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $desa ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Bumdesa </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $bumdesa ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Kelompok Tani</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tani ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tree fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-primary font-weight-bold mb-4" style="width: 100%">
        Selamat datang, Anda login sebagai Admin
    </div>

    <div class="card" style="margin-bottom: 120px; width: 100%;">
        <div class="card-header font-weight-bold bg-primary text-white">
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