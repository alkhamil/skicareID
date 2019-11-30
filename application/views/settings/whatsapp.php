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
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($whatsapp as $w) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $w['contact'] ?></td>
                            <td><?= $w['message'] ?></td>
                            <td>
                                <a href="<?= base_url('settings/whatsapp_edit/'.$w['id']) ?>" class="btn btn-danger btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>