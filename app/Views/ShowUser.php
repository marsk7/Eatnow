<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <h2>User Details</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>User ID:</strong> <?= esc($user['id']) ?></p>
                        <p><strong>UserName:</strong> <?= esc($user['username']) ?></p>
                        <p><strong>First Name:</strong> <?= esc($user['first_name']) ?></p>
                        <p><strong>Last Name:</strong> <?= esc($user['last_name']) ?></p>
                        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                        <p><strong>Is Admin:</strong> <?= esc($user['isAdmin']) ?></p>
                        <p><strong>Created At:</strong> <?= esc($user['created_at']) ?></p>
                        <p><strong>Created From:</strong> <?= esc($user['created_from']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>