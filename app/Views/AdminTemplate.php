<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <section class="py-5">
        <div class="container">
            <div class="col-md-6 text-me-end mb-3">
                <a href="<?= base_url('admin/user');?>" class="btn btn-warning text-white">User</a>
                <a href="<?= base_url('admin');?>" class="btn btn-warning text-white">MenuItem</a>
                <a href="<?= base_url('admin/category');?>" class="btn btn-warning text-white">Category</a>
                <a href="<?= base_url('admin/table');?>" class="btn btn-warning text-white">Table</a>
            </div>

            <?= $this->renderSection('admin') ?> <!-- Placeholder for admin page content -->

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link text-warning" href="#"><i class="bi bi-caret-left-fill"></i>Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link text-warning" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-warning" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link text-warning" href="#">Next<i class="bi bi-caret-right-fill"></i></a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </section>

<?= $this->endSection() ?>
