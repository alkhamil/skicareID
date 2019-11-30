<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-12">
        <div class="mb-2">
            <a href="<?= base_url('settings/katalog_add') ?>" class="btn btn-success">
                Add Katalog
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
                        <th>Price</th>
                        <th>Description</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($katalogs as $k) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><a target="_blank" href="<?= base_url('assets/upload/katalog/'.$k['image']) ?>"><img src="<?= base_url('assets/upload/katalog/'.$k['image']) ?>" width="200" alt="<?= $k['image'] ?>" class="img-fluid"></a></td>
                            <td><?= $k['name'] ?></td>
                            <td><?= $k['price'] ?></td>
                            <td><?= $k['description'] ?></td>
                            <td>
                                <a href="<?= base_url('settings/katalog_delete/'.$k['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>