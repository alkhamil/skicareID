<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header text-center text-white bg-dark">
            <?php echo $title ?>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('settings/whatsapp_edit/'.$whatsapp['id']);?>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact" value="<?= $whatsapp['contact'] ?>">
                    <small class="text-danger"><?= form_error('contcat') ?></small>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control" cols="20" rows="5"><?= $whatsapp['message'] ?></textarea>
                    <small class="text-danger"><?= form_error('banner') ?></small>
                </div>            
                <button type="submit" class="btn btn-success">Submit Data</button>
            <?php echo form_close() ?>
        </div>
    </div>
    </div>
</div>
</div>