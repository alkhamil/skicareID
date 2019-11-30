<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-12">
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
                        <th>Description</th>
                        <th>Banner</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($banners as $b) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['description'] ?></td>
                            <td><a target="_blank" href="<?= base_url('assets/upload/banner/'.$b['banner']) ?>"><img src="<?= base_url('assets/upload/banner/'.$b['banner']) ?>" width="200" alt="<?= $b['banner'] ?>" class="img-fluid"></a></td>
                            <td>
                                <a href="<?= base_url('settings/banner_edit/'.$b['id']) ?>" class="btn btn-danger btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>