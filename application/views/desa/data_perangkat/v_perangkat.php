<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="mb-4 text-gray-800">Data Perangkat Desa <?php echo $this->session->userdata('nama_desa') ?> <strong></strong></h4>
    <?php echo $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class=" btn-group">
                <a class="btn btn-sm btn-success m-0" href="<?php echo base_url('desa/perangkat/tambah_data') ?>">
                    <i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tanggal</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($perangkat as $k) : ?>
                            <tr>
                                <td>
                                    <center>
                                        <a class="btn btn-circle btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $k->id_perangkat ?>"><i class="fas fa-search-plus"></i></a>
                                    </center>
                                </td>
                                <td><?php echo format_indo(date($k->tanggal_perangkat)); ?></td>
                                <td><?php echo $k->nama_perangkat ?></td>
                                <td><?php echo $k->jabatan_perangkat ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<?php
foreach ($perangkat as $k) : ?>
    <div class="modal fade" id="exampleModal<?php echo $k->id_perangkat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Detail perangkat Desa <?php echo $k->nama_desa ?> </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table class="table bg-gray-300">
                        <tr>
                            <th>Tanggal Upload</th>
                            <td><?php echo format_indo(date($k->tanggal_perangkat)); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Desa</th>
                            <td>Desa <?php echo $k->nama_desa ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $k->jabatan_perangkat ?></td>
                        </tr>
                    </table>

                    <table class="table">
                        <tr>
                            <th>No Surat Kerja</th>
                            <td><?php echo $k->nosk_perangkat ?></td>
                        </tr>

                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?php echo $k->nama_perangkat ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo format_indo(date($k->tgllahir_perangkat)); ?></td>
                            <!-- <td><?php echo $k->tgllahir_perangkat ?></td> -->
                        </tr>

                        <tr>
                            <th>Periode Jabatan</th>
                            <td>Tahun <?php echo $k->periodeawal_perangkat ?> - <?php echo $k->periodeakhir_perangkat ?></td>
                        </tr>

                        <tr>
                            <th>No Telepon</th>
                            <td><?php echo $k->telp_perangkat ?></td>
                        </tr>

                        <tr>
                            <th>Actions</th>
                            <td>
                                <a class="btn btn-sm btn-primary" title="Edit" href="<?php echo base_url('desa/perangkat/update_data/' . $k->id_perangkat) ?>"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/perangkat/delete_data/' . $k->id_perangkat) ?>"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>