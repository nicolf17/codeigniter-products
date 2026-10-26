<?= csrf_field() ?>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>

<div class="mb-3">
    <label for="name" class="form-label">Nombre del producto</label>
    <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
        id="name" maxlength="255" required
        value="<?= esc(old('name', $product->name ?? '')) ?>">
    <?php if (isset($errors['name'])): ?><div class="invalid-feedback"><?= esc($errors['name']) ?></div><?php endif ?>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descripción <span class="text-muted fw-normal">(opcional)</span></label>
    <textarea name="description" id="description" class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>"><?= esc(old('description', $product->description ?? '')) ?></textarea>
    <?php if (isset($errors['description'])): ?><div class="invalid-feedback"><?= esc($errors['description']) ?></div><?php endif ?>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" min="0" step="0.01" name="price" id="price" required class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>"
            value="<?= esc(old('price', $product->price ?? '')) ?>">
        <?php if (isset($errors['price'])): ?><div class="invalid-feedback"><?= esc($errors['price']) ?></div><?php endif ?>
    </div>
    <div class="col-md-6 mb-3">
        <label for="stock" class="form-label">Existencias</label>
        <input type="number" min="0" step="1" name="stock" id="stock" required class="form-control <?= isset($errors['stock']) ? 'is-invalid' : '' ?>"
            value="<?= esc(old('stock', $product->stock ?? 0)) ?>">
        <?php if (isset($errors['stock'])): ?><div class="invalid-feedback"><?= esc($errors['stock']) ?></div><?php endif ?>
    </div>
</div>

<div class="form-actions">
    <button class="btn-brand" type="submit">Guardar producto</button>
    <a href="<?= site_url('products') ?>" class="btn-secondary-soft">Cancelar</a>
</div>