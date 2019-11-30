<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-12">
        <div class="mb-2">
            <a href="<?= base_url('settings/testimonial_add') ?>" class="btn btn-success">
                Add Testimonial
            </a>
        </div>
        <?php  
            if ($this->session->flashdata('msg')) {
                echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('msg').'</div>';
            }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($testi as $t) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><a target="_blank" href="<?= base_url('assets/upload/testimonial/'.$t['image']) ?>"><img src="<?= base_url('assets/upload/testimonial/'.$t['image']) ?>" width="200" alt="<?= $t['image'] ?>" class="img-fluid"></a></td>
                            <td><?= $t['name'] ?></td>
                            <td>
                                <a href="<?= base_url('settings/testimonial_delete/'.$t['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>