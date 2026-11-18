<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#143c38">
    <title>@yield('title', 'Katalog Kasir')</title>
    <style>
        :root{font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;color:#1c3431;background:#f5f6f1;font-synthesis:none}
        *{box-sizing:border-box}
        body{margin:0;min-width:320px}
        a{color:inherit}
        .topbar{background:#143c38;color:#fff}
        .topbar-inner,.container{width:min(1120px,calc(100% - 48px));margin:auto}
        .topbar-inner{min-height:76px;display:flex;align-items:center;justify-content:space-between;gap:20px}
        .brand{display:flex;align-items:center;gap:12px;text-decoration:none;font-weight:750;letter-spacing:-.02em}
        .brand-mark{display:grid;place-items:center;width:38px;height:38px;background:#c7edb4;color:#143c38;border-radius:11px;font-size:19px}
        .top-label{font-size:12px;font-weight:650;color:#c6ddd4;letter-spacing:.04em}
        .container{padding:56px 0 70px}
        .eyebrow{display:inline-flex;align-items:center;gap:8px;margin:0 0 14px;color:#438064;font-size:12px;font-weight:800;letter-spacing:.12em;text-transform:uppercase}
        .eyebrow::before{content:"";width:7px;height:7px;border-radius:50%;background:#6dbb83}
        h1{font-size:clamp(32px,4vw,48px);line-height:1.1;letter-spacing:-.045em;margin:0 0 12px;color:#183c35}
        .intro{margin:0;color:#667d75;line-height:1.7;font-size:15px;max-width:620px}
        .panel{margin-top:32px;background:#fff;border:1px solid #e0e8e1;border-radius:18px;box-shadow:0 12px 35px rgba(33,63,48,.045);overflow:hidden}
        .panel-header{padding:26px 28px;display:flex;align-items:center;justify-content:space-between;gap:22px;border-bottom:1px solid #edf1ed}
        .panel-title{margin:0 0 5px;font-size:18px;letter-spacing:-.02em}
        .panel-subtitle{margin:0;color:#7c8e86;font-size:13px}
        .search{display:flex;gap:8px;align-items:center;flex-wrap:wrap}
        .search input{width:230px;max-width:100%;padding:11px 13px;border:1px solid #d9e3db;border-radius:9px;font:inherit;font-size:14px;color:#203a32;outline:none}
        .search input:focus{border-color:#589879;box-shadow:0 0 0 3px #e1f2e5}
        .search button{background:#245f4e;color:#fff;border:0;border-radius:9px;padding:11px 16px;font:inherit;font-size:14px;font-weight:700;cursor:pointer}
        .search button:hover{background:#194c3e}
        .reset{font-size:13px;color:#326c58;font-weight:650;text-decoration:none;padding:8px 2px}
        .error{margin:0;padding:12px 28px;background:#fff5f1;color:#a13c28;font-size:13px}
        .table-wrap{overflow-x:auto}
        table{border-collapse:collapse;width:100%;min-width:670px}
        th,td{padding:17px 28px;text-align:left;border-bottom:1px solid #eef2ee;white-space:nowrap}
        th{font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#879a90;font-weight:750;background:#fbfcfa}
        td{font-size:14px;color:#526b61}
        tbody tr:last-child td{border-bottom:0}
        tbody tr:hover{background:#fbfdf9}
        .product-name{display:block;font-weight:750;color:#203f35;margin-bottom:4px}
        .sku{font-size:12px;color:#91a197;letter-spacing:.02em}
        .category{display:inline-block;padding:6px 10px;border-radius:7px;background:#f1f5ef;color:#607969;font-size:12px;font-weight:650}
        .price{color:#243e34;font-weight:700}
        .stock{display:inline-flex;align-items:center;gap:7px;font-size:13px;font-weight:650;color:#3b8058}
        .stock::before{content:"";width:7px;height:7px;border-radius:50%;background:#68b27a}
        .stock.empty{color:#aa6254}.stock.empty::before{background:#d58b79}
        .empty-state{text-align:center;padding:50px 24px;color:#758b7e;white-space:normal}
        .empty-state strong{display:block;color:#365448;font-size:15px;margin-bottom:7px}
        .panel-footer{display:flex;justify-content:space-between;gap:14px;align-items:center;padding:17px 28px;background:#fbfcfa;color:#82958a;font-size:12px;border-top:1px solid #edf1ed}
        .footer-note{margin:22px 0 0;color:#8b9b91;font-size:12px;line-height:1.6}
        @media(max-width:700px){.topbar-inner,.container{width:calc(100% - 32px)}.topbar-inner{min-height:66px}.top-label{display:none}.container{padding:40px 0}.panel-header{align-items:flex-start;flex-direction:column;padding:22px}.search{width:100%}.search input{width:auto;flex:1;min-width:120px}th,td{padding:16px 20px}.panel-footer{padding:16px 20px;align-items:flex-start;flex-direction:column}}
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="{{ route('katalog.index') }}"><span class="brand-mark" aria-hidden="true">✳</span> Kasir Toko</a>
            <span class="top-label">KATALOG PRODUK</span>
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
</body>
</html>
