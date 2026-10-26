<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($this->renderSection('title') ?: 'Inventario') ?> | CodeIgniter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --ink: #172b3a;
            --muted: #718096;
            --line: #e7edf1;
            --brand: #167d70;
            --brand-dark: #11685e;
            --surface: #ffffff;
            --canvas: #f4f7f8;
        }

        body {
            min-height: 100vh;
            background: var(--canvas);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--line);
        }

        .topbar-inner {
            width: min(1120px, calc(100% - 40px));
            min-height: 68px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            color: var(--ink);
            font-size: 16px;
            font-weight: 750;
            letter-spacing: -.03em;
            text-decoration: none;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #e5f4f0;
            color: var(--brand);
        }

        .topbar-link {
            color: #526575;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .topbar-link:hover,
        .topbar-link.active {
            color: var(--brand);
        }

        .main-content {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
            padding: 48px 0 64px;
        }

        .page-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: var(--brand);
            font-size: 11px;
            font-weight: 750;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .page-title {
            margin: 0;
            color: var(--ink);
            font-size: clamp(27px, 4vw, 34px);
            font-weight: 750;
            letter-spacing: -.045em;
        }

        .page-description {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .btn-brand {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 0 16px;
            border: 1px solid var(--brand);
            border-radius: 9px;
            background: var(--brand);
            color: white;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
            transition: background .15s ease, border-color .15s ease, transform .15s ease;
        }

        .btn-brand:hover {
            transform: translateY(-1px);
            border-color: var(--brand-dark);
            background: var(--brand-dark);
            color: white;
        }

        .btn-secondary-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 16px;
            border: 1px solid var(--line);
            border-radius: 9px;
            background: white;
            color: #526575;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
        }

        .btn-secondary-soft:hover {
            background: #f7f9fa;
            color: var(--ink);
        }

        .content-card {
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--surface);
            box-shadow: 0 8px 24px rgba(23, 43, 58, .035);
        }

        .card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--line);
        }

        .card-heading h2 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .inventory-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            vertical-align: middle;
        }

        .inventory-table thead th {
            padding: 12px 24px;
            border: 0;
            background: #f9fbfb;
            color: #788896;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: .09em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .inventory-table tbody td {
            padding: 16px 24px;
            border-top: 1px solid #edf1f3;
            color: #465a68;
            font-size: 13px;
        }

        .inventory-table tbody tr:hover {
            background: #fbfdfd;
        }

        .product-name {
            color: var(--ink);
            font-weight: 650;
        }

        .product-id {
            color: #9aa7b1;
            font-size: 12px;
        }

        .price {
            color: var(--ink) !important;
            font-weight: 650;
            white-space: nowrap;
        }

        .stock-pill {
            display: inline-flex;
            min-width: 34px;
            justify-content: center;
            padding: 5px 9px;
            border-radius: 20px;
            background: #eaf5f1;
            color: #16745f;
            font-size: 11px;
            font-weight: 700;
        }

        .stock-pill.empty {
            background: #fff0ed;
            color: #c24d3d;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-link,
        .action-delete {
            padding: 6px 9px;
            border: 1px solid var(--line);
            border-radius: 7px;
            background: white;
            color: #526575;
            font-size: 11px;
            font-weight: 650;
            text-decoration: none;
        }

        .action-link:hover {
            border-color: #b8ddd3;
            background: #f2faf7;
            color: var(--brand);
        }

        .action-delete {
            border-color: #f0dddd;
            color: #b64e48;
        }

        .action-delete:hover {
            background: #fff6f4;
            color: #9d3935;
        }

        .empty-state {
            padding: 54px 20px !important;
            text-align: center;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 5px;
            color: var(--ink);
            font-size: 14px;
        }

        .empty-state span {
            color: var(--muted);
            font-size: 12px;
        }

        .form-card {
            max-width: 760px;
            padding: 28px;
        }

        .form-label {
            margin-bottom: 7px;
            color: #354b59;
            font-size: 12px;
            font-weight: 650;
        }

        .form-control {
            min-height: 43px;
            border-color: #dfe7eb;
            border-radius: 8px;
            color: var(--ink);
            font-size: 13px;
            box-shadow: none;
        }

        textarea.form-control {
            min-height: 105px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #78b8a9;
            box-shadow: 0 0 0 3px rgba(22, 125, 112, .1);
        }

        .form-hint {
            margin-top: 6px;
            color: #8a98a3;
            font-size: 11px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            padding-top: 6px;
        }

        .alert-success {
            margin-bottom: 24px;
            border: 1px solid #cce8dc;
            border-radius: 9px;
            background: #eff9f4;
            color: #24694f;
            font-size: 13px;
        }

        @media (max-width: 640px) {
            .topbar-inner,
            .main-content {
                width: min(100% - 28px, 1120px);
            }

            .main-content {
                padding-top: 32px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 16px;
            }

            .page-heading .btn-brand {
                width: 100%;
            }

            .card-heading {
                padding: 17px;
            }

            .inventory-table thead th,
            .inventory-table tbody td {
                padding-right: 14px;
                padding-left: 14px;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="<?= site_url('products') ?>">
                <span class="brand-mark" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="m12 3 9 5-9 5-9-5 9-5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="m3 12 9 5 9-5M3 16l9 5 9-5" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                    </svg>
                </span>
                CodeIgniter
            </a>
            <a class="topbar-link active" href="<?= site_url('products') ?>">Productos</a>
        </div>
    </header>

    <main class="main-content">
        <?php if ($success = session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="status"><?= esc($success) ?></div>
        <?php endif ?>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>