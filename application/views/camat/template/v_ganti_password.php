<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-4 text-gray-800">Account Settings - <strong>Security</strong></h4>
    </div>

    <div class="card" style="margin-bottom: 120px; width: 100%;">
        <div class="card-header font-weight-bold bg-primary text-white">
            Change Password
        </div>
        <div class="card-body" style="background-color: whitesmoke;">
            <form method="POST" action="<?php echo base_url('camat/password/gantipassword_aksi/') ?>">
                <div class="form-group">
                    <label><strong>Password Baru</strong></label>
                    <input type="password" name="passbaru" class="form-control" placeholder="Masukan Password Baru">
                    <?php echo form_error('passbaru', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label><strong>Ulangi Password Baru</strong></label>
                    <input type="password" name="passulang" class="form-control">
                    <?php echo form_error('passulang', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>