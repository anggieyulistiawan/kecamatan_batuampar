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
                            <td style="text-align: center;" colspan="2"><strong>Jenis Kelamin</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><i>Laki - laki</i></td>
                            <td style="text-align: center;"><i>Perempuan<i></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Tidak/Belum Sekolah</td>
                            <td style="text-align: center;"><?php echo $detail->tidak_sekolah_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->tidak_sekolah_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Tidak Tamat SD</td>
                            <td style="text-align: center;"><?php echo $detail->tidak_sd_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->tidak_sd_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Tamat SD</td>
                            <td style="text-align: center;"><?php echo $detail->tamatsd_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->tamatsd_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <td>SLTP/Sederajat</td>
                            <td style="text-align: center;"><?php echo $detail->sltp_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->sltp_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <td>SLTA/Sederajat</td>
                            <td style="text-align: center;"><?php echo $detail->slta_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->slta_p ?></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;">6</td>
                            <td>Diploma I,II</td>
                            <td style="text-align: center;"><?php echo $detail->diploma12_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->diploma12_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7</td>
                            <td>Diploma III</td>
                            <td style="text-align: center;"><?php echo $detail->diploma3_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->diploma3_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">8</td>
                            <td>Diploma IV/Strata I</td>
                            <td style="text-align: center;"><?php echo $detail->strata1_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->strata1_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">9</td>
                            <td>Strata II</td>
                            <td style="text-align: center;"><?php echo $detail->strata2_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->strata2_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">10</td>
                            <td>Strata III</td>
                            <td style="text-align: center;"><?php echo $detail->strata3_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->strata3_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Jumlah Secara Keseluruhan</strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->strata3_l + $detail->strata2_l + $detail->strata1_l + $detail->diploma3_l +  $detail->diploma12_l + $detail->slta_l + $detail->sltp_l + $detail->tamatsd_l + $detail->tidak_sd_l + $detail->tidak_sekolah_l ?>
                                </strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->strata3_p + $detail->strata2_p + $detail->strata1_p + $detail->diploma3_p +  $detail->diploma12_p + $detail->slta_p + $detail->sltp_p + $detail->tamatsd_p + $detail->tidak_sd_p + $detail->tidak_sekolah_p ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Selisih dengan Data Jumlah Penduduk</strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->strata3_l + $detail->strata2_l + $detail->strata1_l + $detail->diploma3_l +  $detail->diploma12_l + $detail->slta_l + $detail->sltp_l + $detail->tamatsd_l + $detail->tidak_sd_l + $detail->tidak_sekolah_l)
                                        - ($jumlah->penduduk_awal_l + $jumlah->kelahiran_l - $jumlah->kematian_l + $jumlah->pendatang_l - $jumlah->pindah_l) ?>
                                </strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->strata3_p + $detail->strata2_p + $detail->strata1_p + $detail->diploma3_p +  $detail->diploma12_p + $detail->slta_p + $detail->sltp_p + $detail->tamatsd_p + $detail->tidak_sd_p + $detail->tidak_sekolah_p)
                                        - ($jumlah->penduduk_awal_p + $jumlah->kelahiran_p - $jumlah->kematian_p + $jumlah->pendatang_p - $jumlah->pindah_p) ?>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('desa/pendidikan'); ?>" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>

</div>