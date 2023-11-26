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
            <td style="font-size: 30px; font-weight: bold;"> Data Penduduk Berdasarkan Agama </td>
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
                    <td style="text-align: center;" colspan="12">Keterangan</td>
                    <td style="text-align: center;" rowspan="3">JUMLAH</td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">Islam</td>
                    <td style="text-align: center;" colspan="2">Katholik</td>
                    <td style="text-align: center;" colspan="2">Kristen</td>
                    <td style="text-align: center;" colspan="2">Hindu</td>
                    <td style="text-align: center;" colspan="2">Budha</td>
                    <td style="text-align: center;" colspan="2">Kepercayaan</td>
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
                </tr>

                <?php $no = 1;
                foreach ($print_agama as $p) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++ ?></td>
                        <td><?php echo $p->nama_desa ?></td>
                        <td style="text-align: center;"><?php echo $p->islam_l ?></td>
                        <td style="text-align: center;"><?php echo $p->islam_p ?></td>
                        <td style="text-align: center;"><?php echo $p->katholik_l ?></td>
                        <td style="text-align: center;"><?php echo $p->katholik_p ?></td>
                        <td style="text-align: center;"><?php echo $p->kristen_l ?></td>
                        <td style="text-align: center;"><?php echo $p->kristen_p ?></td>
                        <td style="text-align: center;"><?php echo $p->hindu_l ?></td>
                        <td style="text-align: center;"><?php echo $p->hindu_p ?></td>
                        <td style="text-align: center;"><?php echo $p->budha_l ?></td>
                        <td style="text-align: center;"><?php echo $p->budha_p ?></td>
                        <td style="text-align: center;"><?php echo $p->kepercayaan_l ?></td>
                        <td style="text-align: center;"><?php echo $p->kepercayaan_p ?></td>
                        <td style="text-align: center;">
                            <?php echo $p->kepercayaan_l + $p->budha_l + $p->hindu_l + $p->kristen_l + $p->katholik_l + $p->islam_l
                                + $p->kepercayaan_p + $p->budha_p + $p->hindu_p + $p->kristen_p + $p->katholik_p + $p->islam_p ?>
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