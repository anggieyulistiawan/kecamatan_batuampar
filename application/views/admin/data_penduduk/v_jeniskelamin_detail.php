<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?> <strong> ( Desa <?php echo $detail->nama_desa ?> )</strong></h1>
    </div>
    <a>Nama Pengirim : <?php echo $detail->nama_pengguna ?></a>
    <div class="card" style="width: 80%">
        <div class="card-body table-responsive">
            <table class="table">
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
                    <td class=" text-success"><?php echo $detail->jeniskelamin_l + $detail->jeniskelamin_p ?></td>
                </tr>

                <tr>
                    <th>Selisih dengan Data Jumlah Penduduk</th>
                    <td class=" text-danger"><?php echo ($detail->jeniskelamin_l + $detail->jeniskelamin_p) -  ($jumlah->penduduk_awal_l + $jumlah->kelahiran_l - $jumlah->kematian_l + $jumlah->pendatang_l - $jumlah->pindah_l) ?></td>
                </tr>

            </table>
        </div>
        <a href="<?php echo base_url('admin/jenis_kelamin'); ?>" class="btn btn-primary">Kembali</a>
    </div>
</div>