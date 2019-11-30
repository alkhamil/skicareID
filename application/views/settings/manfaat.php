<div class="container">
<div class="row justify-content-center mt-2">
    <div class="col-md-12">
        <div class="mb-2">
            <a href="<?= base_url('settings/manfaat_add') ?>" class="btn btn-success">
                Add Manfaat
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($manfaat as $m) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $m['title'] ?></td>
                            <td><?= $m['description'] ?></td>
                            <td>
                                <a href="<?= base_url('settings/manfaat_delete/'.$m['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>