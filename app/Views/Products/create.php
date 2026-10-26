<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Nuevo producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="page-heading">
        <div>
            <div class="eyebrow">Catálogo</div>
            <h1 class="page-title">Nuevo producto</h1>
            <p class="page-description">Completa los datos para agregar un producto al inventario.</p>
        </div>
    </div>

    <form action="<?= site_url('products') ?>" method="POST" class="content-card form-card">
        <?= $this->include('products/_form') ?>
    </form>
<?= $this->endSection() ?>