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
                            <td>Usia 0 - 5</td>
                            <td style="text-align: center;"><?php echo $detail->u5_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u5_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Usia 6 - 10</td>
                            <td style="text-align: center;"><?php echo $detail->u10_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u10_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Usia 11 - 15</td>
                            <td style="text-align: center;"><?php echo $detail->u15_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u15_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <td>Usia 16 - 20</td>
                            <td style="text-align: center;"><?php echo $detail->u20_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u20_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <td>Usia 21 - 30</td>
                            <td style="text-align: center;"><?php echo $detail->u30_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u30_p ?></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;">6</td>
                            <td>Usia 31 - 40</td>
                            <td style="text-align: center;"><?php echo $detail->u40_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u40_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7</td>
                            <td>Usia 41 - 50</td>
                            <td style="text-align: center;"><?php echo $detail->u50_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u50_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">8</td>
                            <td>Usia 51 - 60</td>
                            <td style="text-align: center;"><?php echo $detail->u60_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u60_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">9</td>
                            <td>Usia 61 - 70</td>
                            <td style="text-align: center;"><?php echo $detail->u70_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u70_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">10</td>
                            <td>Usia 70 Lebih</td>
                            <td style="text-align: center;"><?php echo $detail->u70_lebih_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->u70_lebih_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Jumlah Secara Keseluruhan</strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->u70_lebih_l + $detail->u70_l + $detail->u60_l + $detail->u50_l +  $detail->u40_l + $detail->u30_l + $detail->u20_l + $detail->u15_l + $detail->u10_l + $detail->u5_l ?>
                                </strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->u70_lebih_p + $detail->u70_p + $detail->u60_p + $detail->u50_p +  $detail->u40_p + $detail->u30_p + $detail->u20_p + $detail->u15_p + $detail->u10_p + $detail->u5_p ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Selisih dengan Data Jumlah Penduduk</strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->u70_lebih_l + $detail->u70_l + $detail->u60_l + $detail->u50_l +  $detail->u40_l + $detail->u30_l + $detail->u20_l + $detail->u15_l + $detail->u10_l + $detail->u5_l)
                                        - ($jumlah->penduduk_awal_l + $jumlah->kelahiran_l - $jumlah->kematian_l + $jumlah->pendatang_l - $jumlah->pindah_l) ?>
                                </strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->u70_lebih_p + $detail->u70_p + $detail->u60_p + $detail->u50_p +  $detail->u40_p + $detail->u30_p + $detail->u20_p + $detail->u15_p + $detail->u10_p + $detail->u5_p)
                                        - ($jumlah->penduduk_awal_p + $jumlah->kelahiran_p - $jumlah->kematian_p + $jumlah->pendatang_p - $jumlah->pindah_p) ?>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('desa/usia'); ?>" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>

</div>