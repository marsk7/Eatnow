<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2 class="text-center mb-4">Login</h2>
                        <form action="<?= base_url('login'); ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-warning btn-lg mb-3 mb-lg-0 text-white w-100">Login</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?= base_url('register'); ?>" class="btn btn-primary btn-warning btn-lg mb-3 mb-lg-0 text-white w-100">Signup</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?= $this->endSection() ?>
