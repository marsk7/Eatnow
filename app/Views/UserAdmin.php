<?= $this->extend('AdminTemplate') ?>
<?= $this->section('admin') ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Users Management</h2>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-lg-0">
            <form method="get" action="<?= base_url('admin/user'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                    <button class="btn btn-warning text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?= base_url('admin/user/edituser');?>" class="btn btn-warning text-white">Add New User</a>
        </div>
    </div>

    <table class="table table-striped" style="max-width: 100%;">
        <thead>
            <tr>
                <th>User ID</th>
                <th>UserName</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody style="max-width: 100%;">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['id']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['username']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['first_name']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['last_name']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['email']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($user['isAdmin']) ?></td>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                    <a href="<?= base_url('admin/user/showuser/'.$user['id']);?>">
                        <button class="btn btn-sm btn-success me-2 mb-1"><i class="bi bi-eye-fill"></i></button>
                    </a>
                    <a href="<?= base_url('admin/user/edituser/'.$user['id']);?>">
                        <button class="btn btn-sm btn-warning me-2 mb-1"><i class="bi bi-pencil-square"></i></button>
                    </a>
                    <a href="<?= base_url('admin/user/delete/'.$user['id']);?>" onclick="return confirm('Are you sure you want to delete this user?')">
                        <button class="btn btn-sm btn-danger me-2 mb-1"><i class="bi bi-trash-fill" ></i></button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No users found</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
