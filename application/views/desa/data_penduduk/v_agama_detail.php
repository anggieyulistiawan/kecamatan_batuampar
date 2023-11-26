<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?> <strong> ( Desa <?php echo $detail->nama_desa ?> )</strong></h1>
    </div>

    <div class="card" style="width: 100%">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered" style="width:100%;">
                    <tbody>
                        <br>
                        <tr>
                            <td style="text-align: center;" rowspan="2"><strong>No</strong></td>
                            <td width="250px" style="text-align: center;" rowspan="2"><strong>Keterangan</strong></td>
                            <td style="text-align: center;" colspan="2"><strong>Agama</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><i>Laki - laki</i></td>
                            <td style="text-align: center;"><i>Perempuan<i></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Islam</td>
                            <td style="text-align: center;"><?php echo $detail->islam_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->islam_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Katholik</td>
                            <td style="text-align: center;"><?php echo $detail->katholik_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->katholik_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Kristen</td>
                            <td style="text-align: center;"><?php echo $detail->kristen_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->kristen_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <td>Hindu</td>
                            <td style="text-align: center;"><?php echo $detail->hindu_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->hindu_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <td>Budha</td>
                            <td style="text-align: center;"><?php echo $detail->budha_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->budha_p ?></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;">6</td>
                            <td>Kepercayaan</td>
                            <td style="text-align: center;"><?php echo $detail->kepercayaan_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->kepercayaan_p ?></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Jumlah Secara Keseluruhan</strong></td>
                            <td class=" text-success" style="text-align: center;"><strong>
                                    <?php echo  $detail->kepercayaan_l + $detail->budha_l + $detail->hindu_l + $detail->kristen_l + $detail->katholik_l + $detail->islam_l ?>
                                </strong></td>
                            <td class=" text-success" style="text-align: center;"><strong>
                                    <?php echo  $detail->kepercayaan_p + $detail->budha_p + $detail->hindu_p + $detail->kristen_p + $detail->katholik_p + $detail->islam_p ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Selisih dengan Data Jumlah Penduduk</strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->kepercayaan_l + $detail->budha_l + $detail->hindu_l + $detail->kristen_l + $detail->katholik_l + $detail->islam_l)
                                        - ($jumlah->penduduk_awal_l + $jumlah->kelahiran_l - $jumlah->kematian_l + $jumlah->pendatang_l - $jumlah->pindah_l) ?>
                                </strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->kepercayaan_p + $detail->budha_p + $detail->hindu_p + $detail->kristen_p + $detail->katholik_p + $detail->islam_p)
                                        - ($jumlah->penduduk_awal_p + $jumlah->kelahiran_p - $jumlah->kematian_p + $jumlah->pendatang_p - $jumlah->pindah_p) ?>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('desa/agama'); ?>" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>

</div>