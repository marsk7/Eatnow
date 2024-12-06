<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($users) ? 'Edit User' : 'Add User' ?></h2>
                <?php if (!empty($users['id'])): ?>
                    <p><strong>User ID:</strong> <?= esc($users['id']) ?></p>
                <?php endif; ?>
                <form method="post" action="<?= base_url('admin/user/edituser' . (isset($users) ? '/' . $users['id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">UserName</label>
                        <input type="form-control" class="form-control" id="username" name="username" value="<?= isset($users) ? esc($users['username']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="form-control" class="form-control" id="first_name" name="first_name" value="<?= isset($users) ? esc($users['first_name']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="form-control" class="form-control" id="last_name" name="last_name" value="<?= isset($users) ? esc($users['last_name']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="form-control" class="form-control" id="email" name="email" value="<?= isset($users) ? esc($users['email']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="isAdmin" class="form-label">Is Admin</label>
                        <input type="form-control" class="form-control" id="isAdmin" name="isAdmin" value="<?= isset($users) ? esc($users['isAdmin']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Created At</label>
                        <input type="form-control" class="form-control" id="created_at" name="created_at" value="<?= isset($users) ? esc($users['created_at']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="created_from" class="form-label">Created From</label>
                        <input type="form-control" class="form-control" id="created_from" name="created_from" value="<?= isset($users) ? esc($users['created_from']) : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-warning text-white"><?= isset($users) ? 'Update User' : 'Add User' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
