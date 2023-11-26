<style>
    table {
        font-size: 14px;

    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    thead {
        font-size: 16px;
    }

    .judul h3,
    h2,
    p {
        text-align: center;
        margin: 5px 0 5px 0;
    }

    .form-inline img {

        display: inline-block;
    }

    h2 {
        font-size: 30px;
    }

    .kop tr td {
        text-align: center;
        border: 2px solid white;
        border-collapse: collapse;
    }

    .gambar {
        margin-right: 10px;
    }

    .isi tr td {
        padding-left: 5px;
        padding-right: 5px;
    }

    .ttd {
        text-align: left;
        display: inline-block;
        float: right;
    }
</style>

<script>
    window.load = print_d();

    function print_d() {
        window.print();
    }
    window.onfocus = function() {
        window.close();
    }
</script>

<div class="container-fluid">
    <center>
        <table class="kop">
            <tr>
                <td rowspan="6"><img src="<?= base_url() ?>assets/img/logo tala.png" height="150" alt="" class="gambar"></td>
            </tr>
            <tr>
                <td style="font-size: 25px; font-weight: bold;">PEMERINTAHAN KABUPATEN TANAH LAUT</td>
            </tr>
            <tr>
                <td style="font-size: 30px; font-weight: bold;">KECAMATAN BATU AMPAR</td>
            </tr>
            <tr>
                <td>Jalan H.M. Sarbini No. 1 Kode Pos 70882</td>
            </tr>
        </table>
    </center>


    <hr size="2px" color="black" style="margin-bottom: 1px;">
    <hr size="2px" color="black" style="margin-top: 1px;">
    <center>
        <table class="kop mb-5">
            <td style="font-size: 30px; font-weight: bold;"> Data Penduduk Berdasarkan Usia </td>
        </table>
    </center>
    <br>
    <h6>Periode : <?php echo date('d-m-Y', strtotime($tanggal_awal)); ?> - <?php echo date('d-m-Y', strtotime($tanggal_akhir)); ?></h6>
    <div>
        <table class="isi" style="width:100%;">
            <tbody>
                <tr>
                    <td style="text-align: center;" rowspan="3">No</td>
                    <td width="190px" style="text-align: center;" rowspan="3">Nama Desa</td>
                    <td style="text-align: center;" colspan="20">Keterangan</td>
                    <td style="text-align: center;" rowspan="3">JUMLAH</td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">0 - 5</td>
                    <td style="text-align: center;" colspan="2">6 - 10</td>
                    <td style="text-align: center;" colspan="2">11 - 15</td>
                    <td style="text-align: center;" colspan="2">16 - 20</td>
                    <td style="text-align: center;" colspan="2">21 - 30</td>
                    <td style="text-align: center;" colspan="2">31 - 40</td>
                    <td style="text-align: center;" colspan="2">41 - 50</td>
                    <td style="text-align: center;" colspan="2">51 - 60</td>
                    <td style="text-align: center;" colspan="2">61 - 70</td>
                    <td style="text-align: center;" colspan="2">70 Lebih</td>
                </tr>
                <tr>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                    <td style="text-align: center;">L</td>
                    <td style="text-align: center;">P</td>
                </tr>

                <?php $no = 1;
                foreach ($print_usia as $p) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $p->nama_desa ?></td>
                        <td style="text-align: center;"><?php echo $p->u5_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u5_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u10_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u10_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u15_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u15_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u20_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u20_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u30_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u30_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u40_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u40_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u50_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u50_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u60_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u60_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u70_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u70_p ?></td>
                        <td style="text-align: center;"><?php echo $p->u70_lebih_l ?></td>
                        <td style="text-align: center;"><?php echo $p->u70_lebih_p ?></td>
                        <td style="text-align: center;">
                            <?php echo $p->u70_lebih_l + $p->u70_l + $p->u60_l + $p->u50_l +  $p->u40_l + $p->u30_l + $p->u20_l + $p->u15_l + $p->u10_l + $p->u5_l
                                + $p->u70_lebih_p + $p->u70_p + $p->u60_p + $p->u50_p +  $p->u40_p + $p->u30_p + $p->u20_p + $p->u15_p + $p->u10_p + $p->u5_p ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="ttd" style="display: inline-block;">
        <h5>Tanah Laut, <?= date('d-m-Y') ?></h5>
        <h5>Camat Batu Ampar</h5>
        <br>
        <br>
        <br>
        <h5 style="margin-top: 2px;">Yudo Restanto, S.STP, M.IP</h5>
        <hr size="" color="black" style="margin-top: 1px;">
        <h5 style="margin-top: px">NIP. 19860901 198612 1 002</h5>
    </div>
</div>