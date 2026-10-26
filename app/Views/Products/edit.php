<?php /** @var object $product */ ?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Editar producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="page-heading">
        <div>
            <div class="eyebrow">Catálogo</div>
            <h1 class="page-title">Editar producto</h1>
            <p class="page-description">Actualiza la información de <?= esc($product->name) ?>.</p>
        </div>
    </div>

    <form action="<?= site_url('products/' . $product->id) ?>" method="POST" class="content-card form-card">
        <?= $this->include('products/_form') ?>
    </form>
<?= $this->endSection() ?>