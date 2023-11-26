<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?> <strong> ( Desa <?php echo $detail->nama_desa ?> )</strong></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body table-responsive">
            <a>Nama Pengirim : <?php echo $detail->nama_pengguna ?></a>
            <table class="table-bordered" style="width:100%;">
                <tbody>
                    <br>
                    <tr>
                        <td style="text-align: center;" rowspan="2"><strong>No</strong></td>
                        <td width="250px" style="text-align: center;" rowspan="2"><strong>Keterangan</strong></td>
                        <td style="text-align: center;" colspan="2"><strong>Jenis Kelamin</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><i>Laki - laki</i></td>
                        <td style="text-align: center;"><i>Perempuan<i></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td>Penduduk Awal</td>
                        <td style="text-align: center;"><?php echo $detail->penduduk_awal_l ?></td>
                        <td style="text-align: center;"><?php echo $detail->penduduk_awal_p ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td>Kelahiran</td>
                        <td style="text-align: center;"><?php echo $detail->kelahiran_l ?></td>
                        <td style="text-align: center;"><?php echo $detail->kelahiran_p ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">3</td>
                        <td>Kematian</td>
                        <td style="text-align: center;"><?php echo $detail->kematian_l ?></td>
                        <td style="text-align: center;"><?php echo $detail->kematian_p ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">4</td>
                        <td>Pendatang</td>
                        <td style="text-align: center;"><?php echo $detail->pendatang_l ?></td>
                        <td style="text-align: center;"><?php echo $detail->pendatang_p ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">5</td>
                        <td>Pindah</td>
                        <td style="text-align: center;"><?php echo $detail->pindah_l ?></td>
                        <td style="text-align: center;"><?php echo $detail->pindah_p ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"><strong>Total Jumlah Penduduk</strong></td>
                        <td class=" text-danger" style="text-align: center;"><strong>
                                <?php echo $detail->penduduk_awal_l + $detail->kelahiran_l - $detail->kematian_l + $detail->pendatang_l - $detail->pindah_l ?>
                            </strong></td>
                        <td class=" text-danger" style="text-align: center;"><strong>
                                <?php echo $detail->penduduk_awal_p + $detail->kelahiran_p - $detail->kematian_p + $detail->pendatang_p - $detail->pindah_p ?>
                            </strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?php echo base_url('admin/jumlah'); ?>" class="btn btn-primary mt-3">Kembali</a>
    </div>

</div>