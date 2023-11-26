<div class="container-fluid">
    <!-- Page Heading -->
    <h4 class="mb-5 text-gray-800">Rekap Laporan / <strong>Data Wajib KTP-EL Penduduk</strong></h4>

    <div class="card mx-auto" style="width: 55%">
        <div class="card-header bg-primary text-white text-center">
            Filter Laporan
        </div>

        <form method="POST" action="<?= base_url('admin/print_wajibktp/cetaklaporanwajibktp') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputpassword" class="col-sm-4 col-form-label">Dari Tanggal :</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="tanggal_awal" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputpassword" class="col-sm-4 col-form-label"> Sampai Tanggal :</label>
                    <div class="col-8">
                        <input type="date" class="form-control" name="tanggal_akhir" required>
                    </div>
                </div>
                <button style="width:100%" type="submit" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Cetak Laporan Data Wajib KTP-EL Penduduk</button>
            </div>
    </div>
    </form>
</div>