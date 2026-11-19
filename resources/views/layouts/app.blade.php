<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita') — Portal Berita</title>
    <style>
        :root {
            --bg: #f4f6f9;
            --surface: #ffffff;
            --surface-alt: #f8fafc;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --primary: #1d4ed8;
            --primary-hover: #1e40af;
            --primary-soft: #eff6ff;
            --danger: #b91c1c;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
            --success: #15803d;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --radius: 12px;
            --radius-sm: 8px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1020px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .site-header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav {
            max-width: 1020px;
            margin: 0 auto;
            padding: 0.85rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .brand {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text);
            margin-right: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .brand:hover {
            text-decoration: none;
        }

        .brand-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--primary);
            display: inline-block;
        }

        .nav-link {
            padding: 0.45rem 0.75rem;
            border-radius: var(--radius-sm);
            color: var(--muted);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link:hover {
            background: var(--surface-alt);
            color: var(--text);
            text-decoration: none;
        }

        .nav-link.active {
            background: var(--primary-soft);
            color: var(--primary);
            font-weight: 600;
        }

        .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .inline {
            display: inline;
            margin: 0;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.35rem;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .stack-lg > * + * {
            margin-top: 1.25rem;
        }

        .row {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        }

        .muted {
            color: var(--muted);
            font-size: 0.92rem;
        }

        .flash {
            background: var(--success-soft);
            color: var(--success);
            border: 1px solid var(--success-border);
            padding: 0.75rem 1rem;
            border-radius: var(--radius-sm);
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .error {
            background: var(--danger-soft);
            color: var(--danger);
            border: 1px solid var(--danger-border);
            padding: 0.85rem 1rem;
            border-radius: var(--radius-sm);
            margin: 1rem 0;
            font-size: 0.95rem;
        }

        .error ul {
            margin: 0.35rem 0 0 1.15rem;
            padding: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.5rem 0.9rem;
            border-radius: var(--radius-sm);
            border: 1px solid transparent;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.15s ease, border-color 0.15s ease;
        }

        .btn:hover {
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text);
            border-color: var(--border);
        }

        .btn-secondary:hover {
            background: var(--surface-alt);
        }

        .btn-danger {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: var(--danger-border);
        }

        .btn-danger:hover {
            background: #fee2e2;
        }

        .btn-sm {
            padding: 0.32rem 0.65rem;
            font-size: 0.82rem;
        }

        .form-group {
            margin-top: 1rem;
        }

        form label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: 600;
            font-size: 0.92rem;
        }

        input[type=text],
        input[type=url],
        input[type=email],
        input[type=password],
        textarea {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text);
            background: var(--surface);
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-soft);
        }

        .form-actions {
            margin-top: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.2rem 0;
            color: var(--text);
        }

        .article-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0;
        }

        .article-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 0.9rem 0;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .article-item:last-child {
            border-bottom: none;
        }

        .article-title-link {
            font-weight: 600;
            font-size: 1rem;
            color: var(--text);
        }

        .article-title-link:hover {
            color: var(--primary);
        }

        .article-actions {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .news-card-body {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .news-thumb {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: var(--radius-sm);
            flex-shrink: 0;
        }

        .dash-thumb {
            width: 110px;
            height: 75px;
            object-fit: cover;
            border-radius: var(--radius-sm);
            flex-shrink: 0;
        }

        .pagination-wrap {
            margin-top: 1.25rem;
        }

        .pagination {
            display: flex;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            align-items: center;
        }

        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 0.35rem 0.65rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            color: var(--text);
            background: var(--surface);
        }

        .pagination li.active span {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            font-weight: 700;
        }

        .site-footer {
            max-width: 1020px;
            margin: 0 auto;
            padding: 1.25rem 1rem 2rem;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 0.88rem;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        @media (max-width: 640px) {
            .news-card-body {
                flex-direction: column;
            }

            .news-thumb {
                width: 100%;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        @include('partials.nav')
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <span>Portal Berita Sederhana — Laravel CRUD</span>
        <span>@yield('footer_note', 'Praktikum Pemrograman Web')</span>
    </footer>
</body>
</html>