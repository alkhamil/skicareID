<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <?php  
            if ($this->session->flashdata('msg')) {
                echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('msg').'</div>';
            }
        ?>
        
        <div class="card">
            <div class="card-header bg-dark text-center text-white">
                Login
            </div>
            <div class="card-body">
                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                        <strong class="text-danger"><?= form_error('username')  ?></strong>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                        <strong class="text-danger"><?= form_error('username')  ?></strong>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery/jquery-2.2.4.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/active.js') ?>"></script>
</body>
</html>