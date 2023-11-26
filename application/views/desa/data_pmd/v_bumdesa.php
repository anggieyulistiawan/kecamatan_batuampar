      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h4 class="mb-4 text-gray-800">Data Kasi PMD <?php echo $this->session->userdata('nama_desa') ?> / <strong>Kelola Bumdesa</strong></h4>
          <?php echo $this->session->flashdata('pesan') ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <div class=" btn-group">
                      <a class="btn btn-sm btn-success m-0" href="<?php echo base_url('desa/bumdesa/tambah_data') ?>">
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
                                  <th>Nama Bumdesa</th>
                                  <th>Jenis Usaha</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                                foreach ($bumdesa as $b) : ?>
                                  <tr>
                                      <td>
                                          <center>
                                              <a class="btn btn-circle btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $b->id_bumdesa ?>"><i class="fas fa-search-plus"></i></a>
                                          </center>
                                      </td>
                                      <td><?php echo format_indo(date($b->tgl_bumdesa)); ?></td>
                                      <td><?php echo $b->nama_bumdesa ?></td>
                                      <td><?php echo $b->jenis_usaha ?></td>
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
        foreach ($bumdesa as $b) : ?>
          <div class="modal fade" id="exampleModal<?php echo $b->id_bumdesa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Detail Kasi PMD (Bumdesa)</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <div class="modal-body">
                          <table class="table bg-gray-300">
                              <tr>
                                  <th>Tanggal Upload</th>
                                  <td><?php echo format_indo(date($b->tgl_bumdesa)); ?></td>
                              </tr>
                              <tr>
                                  <th>Nama Desa</th>
                                  <td>Desa <?php echo $b->nama_desa ?></td>
                              </tr>
                              <tr>
                                  <th>Nama Bumdesa</th>
                                  <td><?php echo $b->nama_bumdesa ?></td>
                              </tr>
                          </table>

                          <table class="table">
                              <tr>
                                  <th>Tanggal Berdiri</th>
                                  <td><?php echo format_indo(date($b->tgl_berdiri)); ?></td>
                              </tr>

                              <tr>
                                  <th>Jenis Usaha</th>
                                  <td><?php echo $b->jenis_usaha ?></td>
                              </tr>

                              <tr>
                                  <th>Alamat</th>
                                  <td><?php echo $b->alamat_bumdes ?></td>
                              </tr>

                              <tr>
                                  <th>Modal Awal</th>
                                  <td>Rp. <?php echo $b->modal_awal ?></td>
                              </tr>

                              <tr>
                                  <th>Surat BPOM</th>
                                  <td>
                                      <?php if ($b->bpom == null) { ?>
                                          <a class="btn btn-sm btn-success disabled" title="Download"><i class="fas fa-cloud-download-alt"></i> Download</a>
                                          <a class="btn btn-sm btn-secondary disabled" title="Views"><i class="fas fa-eye"></i> Views</a>
                                      <?php } else { ?>
                                          <a class="btn btn-sm btn-success" title="Download" href="<?php echo base_url() ?>assets/bpom/<?php echo $b->bpom ?>" download><i class="fas fa-cloud-download-alt"></i> Download</a>
                                          <a class="btn btn-sm btn-secondary" title="Views" href="<?php echo base_url('desa/bumdesa/detail_views/' . $b->id_bumdesa) ?>" target="_blank"><i class="fas fa-eye"></i> Views</a>
                                      <?php } ?>
                                  </td>
                              </tr>

                              <tr>
                                  <th>Actions</th>
                                  <td>
                                      <a class="btn btn-sm btn-primary" title="Edit" href="<?php echo base_url('desa/bumdesa/update_data/' . $b->id_bumdesa) ?>"><i class="fas fa-edit"></i> Edit</a>
                                      <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/bumdesa/delete_data/' . $b->id_bumdesa) ?>"><i class="fas fa-trash"></i> Delete</a>
                                  </td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>