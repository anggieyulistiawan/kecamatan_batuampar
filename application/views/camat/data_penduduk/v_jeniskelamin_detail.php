<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?> <strong> ( Desa <?php echo $detail->nama_desa ?> )</strong></h1>
    </div>
    <a>Nama Pengirim : <?php echo $detail->nama_pengguna ?></a>
    <div class="card" style="width: 80%">
        <div class="card-body">
            <div class="card-body table-responsive">
                <a>Nama Pengirim : <?php echo $detail->nama_pengguna ?></a>
                <table class="table-bordered" style="width:100%;">
                    <tbody>
                        <tr>
                            <th>Laki - laki</th>
                            <td><?php echo $detail->jeniskelamin_l ?></td>
                        </tr>

                        <tr>
                            <th>Perempuan</th>
                            <td><?php echo $detail->jeniskelamin_p ?></td>
                        </tr>

                        <tr>
                            <th>Jumlah Keseluruhan</th>
                            <td class="text-success"><?php echo $detail->jeniskelamin_l + $detail->jeniskelamin_p ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('camat/jenis_kelamin'); ?>" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>