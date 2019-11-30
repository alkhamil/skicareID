<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header text-center text-white bg-dark">
            <?php echo $title ?>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('settings/banner_edit/'.$banner['id']);?>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" cols="10" rows="10" class="form-control"><?= $banner['description'] ?></textarea>
                    <small class="text-danger"><?= form_error('description') ?></small>
                </div>
                <div class="form-group">
                    <label>Banner</label>
                    <input type="file" class="form-control" name="banner">
                    <small class="text-danger"><?= form_error('banner') ?></small>
                    <br>
                    <img src="<?= base_url('assets/upload/banner/'.$banner['banner']) ?>" width="100">
                </div>            
                <button type="submit" class="btn btn-success">Submit Data</button>
            <?php echo form_close() ?>
        </div>
    </div>
    </div>
</div>
</div>