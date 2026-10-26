<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Inventario<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="page-heading">
        <div>
            <div class="eyebrow">Gestión de catálogo</div>
            <h1 class="page-title">Inventario</h1>
            <p class="page-description">Administra tus productos, precios y existencias desde un solo lugar.</p>
        </div>
        <a href="<?= site_url('products/create') ?>" class="btn-brand">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Agregar producto
        </a>
    </div>

    <section class="content-card" aria-labelledby="products-heading">
        <div class="card-heading">
            <div>
                <h2 id="products-heading">Productos registrados</h2>
                <p>Listado de productos del catálogo</p>
            </div>
        </div>
        <div class="table-responsive">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Existencias</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="4" class="empty-state">
                                <strong>Aún no hay productos</strong>
                                <span>Agrega tu primer producto para comenzar a organizar el inventario.</span>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="product-name"><?= esc($product->name) ?></span>
                                    <span class="product-id d-block">#<?= esc($product->id) ?></span>
                                </td>
                                <td class="price">$<?= number_format($product->price, 2) ?></td>
                                <td>
                                    <span class="stock-pill <?= $product->stock < 1 ? 'empty' : '' ?>">
                                        <?= esc($product->stock) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="<?= site_url('products/' . $product->id . '/edit') ?>" class="action-link">Editar</a>
                                        <form action="<?= site_url('products/' . $product->id . '/delete') ?>" method="POST"
                                            onsubmit="return confirm('¿Eliminar este producto?')">
                                            <?= csrf_field() ?>
                                            <button class="action-delete" type="submit">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <?php if (isset($pager)): ?>
            <div class="px-4 py-3 border-top">
                <?= $pager->links() ?>
            </div>
        <?php endif ?>
    </section>
<?= $this->endSection() ?>