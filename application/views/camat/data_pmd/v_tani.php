      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h4 class="mb-4 text-gray-800">Data Kasi PMD / <strong>Kelola Kelompok Tani</strong></h4>
          <?php echo $this->session->flashdata('pesan') ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <div class=" btn-group">
                      <div class=" btn-group">
                          <a class="btn btn-sm btn-primary m-0" href="<?php echo base_url('camat/print_tani') ?>">
                              <i class="fas fa-print"></i> Print</a>
                      </div>
                  </div>
                  <div class=" btn-group">
                      <form method="POST" action="<?= base_url('camat/tani/filter_tani'); ?>" class="form-inline">
                          <div class="form-group mb-2 ml-3">
                              <label for="staticEmail2">Bulan :</label>
                              <select class="form-control ml-3" name="bulan">
                                  <option value="">--- Pilih Bulan --- </option>
                                  <option value="01">Januari</option>
                                  <option value="02">Februari</option>
                                  <option value="03">Maret</option>
                                  <option value="04">April</option>
                                  <option value="05">Mei</option>
                                  <option value="06">Juni</option>
                                  <option value="07">Juli</option>
                                  <option value="08">Agustus</option>
                                  <option value="09">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                              </select>
                          </div>

                          <div class="form-group mb-2 ml-3">
                              <label for="staticEmail2">Tahun :</label>
                              <select class="form-control ml-3" name="tahun">
                                  <option value="">--- Pilih Tahun --- </option>
                                  <?php $tahun = date('Y');
                                    for ($t = 2020; $t < $tahun + 2; $t++) { ?>
                                      <option value="<?php echo $t ?>"><?php echo $t ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-secondary mb-2 ml-4"><i class="fas fa-eye"></i> Tampilkan Data</button>
                      </form>
                  </div>
              </div>
              <div class="card-body">
                  <div class=" table">
                      <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th>Tanggal</th>
                                  <th>Nama Desa</th>
                                  <th>Nama Kelompok</th>
                                  <th>Jenis Usaha</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1;
                                foreach ($tani as $t) : ?>
                                  <tr>
                                      <td>
                                          <center>
                                              <a class="btn btn-circle btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $t->id_tani ?>"><i class="fas fa-search-plus"></i></a>
                                          </center>
                                      </td>
                                      <td><?php echo format_indo(date($t->tgl_tani)); ?></td>
                                      <td><?php echo $t->nama_desa ?></td>
                                      <td><?php echo $t->nama_klmpok ?></td>
                                      <td><?php echo $t->jenis_usaha ?></td>
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
        foreach ($tani as $t) : ?>
          <div class="modal fade" id="exampleModal<?php echo $t->id_tani ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Detail Kasi PMD (Kelompok Tani)</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <div class="modal-body">
                          <table class="table bg-gray-300">
                              <tr>
                                  <th>Tanggal Upload</th>
                                  <td><?php echo format_indo(date($t->tgl_tani)); ?></td>
                              </tr>
                              <tr>
                                  <th>Nama Desa</th>
                                  <td>Desa <?php echo $t->nama_desa ?></td>
                              </tr>
                              <tr>
                                  <th>Nama Kelompok Tani</th>
                                  <td><?php echo $t->nama_klmpok ?></td>
                              </tr>
                          </table>

                          <table class="table">
                              <tr>
                                  <th>Tanggal Berdiri</th>
                                  <td><?php echo format_indo(date($t->tgl_berdiri)); ?></td>
                              </tr>

                              <tr>
                                  <th>Jenis Usaha</th>
                                  <td><?php echo $t->jenis_usaha ?></td>
                              </tr>

                              <tr>
                                  <th>Alamat</th>
                                  <td><?php echo $t->alamat_tani ?></td>
                              </tr>

                              <tr>
                                  <th>Keterangan</th>
                                  <td><?php echo $t->ket ?></td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>