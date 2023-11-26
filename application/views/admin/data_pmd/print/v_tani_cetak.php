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
            <td style="font-size: 30px; font-weight: bold;"> Data Kelompok Tani di Kecamatan Batu Ampar </td>
        </table>
    </center>
    <br>
    <h6>Periode : <?php echo date('d-m-Y', strtotime($tanggal_awal)); ?> - <?php echo date('d-m-Y', strtotime($tanggal_akhir)); ?></h6>
    <div>
        <table class="isi" style="width:100%;">
            <thead style="line-height: 40px;">
                <tr>
                    <th class="text-center">No</th>
                    <!-- <th class="text-center">Tanggal</th> -->
                    <th class="text-center">Desa</th>
                    <th class="text-center">Tanggal Berdiri</th>
                    <th class="text-center">Nama Kelompok Tani</th>
                    <th class="text-center">Jenis Usaha</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Keterangan</th>

                </tr>
            </thead>
            <tbody style="line-height: 30px;" class="text-center">
                <?php $no = 1;
                foreach ($print_tani as $k) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <!-- <td><?php echo format_indo(date($k->tanggal_tani)); ?></td> -->
                        <td><?php echo $k->nama_desa ?></td>
                        <td><?php echo date('d-m-Y', strtotime($k->tgl_berdiri)); ?></td>
                        <td><?php echo $k->nama_klmpok ?></td>
                        <td><?php echo $k->jenis_usaha ?></td>
                        <td><?php echo $k->alamat ?></td>
                        <td><?php echo $k->ket ?></td>
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