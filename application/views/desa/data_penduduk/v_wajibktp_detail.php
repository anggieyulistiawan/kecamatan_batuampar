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
                            <td style="text-align: center;" colspan="2"><strong>Wajib KTP-EL</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><i>Laki - laki</i></td>
                            <td style="text-align: center;"><i>Perempuan<i></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Jumlah Kartu Keluarga</td>
                            <td style="text-align: center;"><?php echo $detail->jumlahkk_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->jumlahkk_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Sudah Memiliki KTP-EL</td>
                            <td style="text-align: center;"><?php echo $detail->sudahktpel_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->sudahktpel_p ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Belum Memiliki KTP-EL</td>
                            <td style="text-align: center;"><?php echo $detail->belumktpel_l ?></td>
                            <td style="text-align: center;"><?php echo $detail->belumktpel_p ?></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Jumlah Secara Keseluruhan</strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->sudahktpel_l + $detail->belumktpel_l + $detail->jumlahkk_l ?>
                                </strong></td>
                            <td class="text-success" style="text-align: center;"><strong>
                                    <?php echo $detail->sudahktpel_p + $detail->belumktpel_p + $detail->jumlahkk_p ?>
                                </strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><strong>Selisih dengan Data Jumlah Penduduk</strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->sudahktpel_l + $detail->belumktpel_l + $detail->jumlahkk_l)
                                        - ($jumlah->penduduk_awal_l + $jumlah->kelahiran_l - $jumlah->kematian_l + $jumlah->pendatang_l - $jumlah->pindah_l) ?>
                                </strong></td>
                            <td class=" text-danger" style="text-align: center;"><strong>
                                    <?php echo ($detail->sudahktpel_p + $detail->belumktpel_p + $detail->jumlahkk_p)
                                        - ($jumlah->penduduk_awal_p + $jumlah->kelahiran_p - $jumlah->kematian_p + $jumlah->pendatang_p - $jumlah->pindah_p) ?>
                                </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo base_url('desa/wajibktp'); ?>" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
</div>