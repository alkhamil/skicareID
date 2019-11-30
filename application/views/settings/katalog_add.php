<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header text-center text-white bg-dark">
            <?php echo $title ?>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('settings/katalog_add');?>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <small class="text-danger"><?= form_error('image') ?></small>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                    <small class="text-danger"><?= form_error('name') ?></small>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price">
                    <small class="text-danger"><?= form_error('price') ?></small>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" cols="10" rows="10" class="form-control"></textarea>
                    <small class="text-danger"><?= form_error('description') ?></small>
                </div>
                <button type="submit" class="btn btn-success">Submit Data</button>
            <?php echo form_close() ?>
        </div>
    </div>
    </div>
</div>
</div>