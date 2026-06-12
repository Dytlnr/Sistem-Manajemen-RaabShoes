<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $__env->yieldContent('page-title', 'Admin'); ?> | Raab Shoes</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800" rel="stylesheet" />

        <style>
            :root {
                --panel: #ffffff;
                --sidebar-accent: #ffc98f;
                --orange: #f57c00;
                --text: #141414;
                --muted: #8d8d94;
                --blue-soft: #7f8fc2;
                --shadow: 0 16px 34px rgba(87, 66, 36, 0.12);
                --border-soft: rgba(232, 223, 208, 0.9);
                --bg-start: #fbfaf6;
                --bg-end: #f7f3ea;
                --topbar-bg: rgba(255, 255, 255, 0.96);
                --sidebar-bg: #fffefe;
                --icon-color: #1d1d1f;
                --pill-bg: #fffefe;
                --notif-bg: #ffffff;
                --notif-border: rgba(232, 223, 208, 0.92);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Poppins', sans-serif;
                color: var(--text);
                color-scheme: light;
                background:
                    radial-gradient(circle at top center, rgba(255, 217, 163, 0.16), transparent 22%),
                    linear-gradient(180deg, var(--bg-start) 0%, var(--bg-end) 100%);
                transition: background-color 0.25s ease, color 0.25s ease;
            }

            body.theme-dark {
                --panel: #1d232d;
                --sidebar-accent: #d69a61;
                --text: #f7f3eb;
                --muted: #a4a9b3;
                --blue-soft: #b4bdea;
                --shadow: 0 18px 36px rgba(0, 0, 0, 0.34);
                --border-soft: rgba(76, 86, 100, 0.65);
                --bg-start: #151922;
                --bg-end: #0d1017;
                --topbar-bg: rgba(26, 31, 41, 0.96);
                --sidebar-bg: #171c25;
                --icon-color: #f5f1e8;
                --pill-bg: #1c222c;
                --notif-bg: #1d232d;
                --notif-border: rgba(81, 91, 106, 0.7);
                color-scheme: dark;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            button,
            input,
            select,
            textarea {
                font: inherit;
            }

            .admin-shell {
                display: grid;
                grid-template-columns: 320px 1fr;
                min-height: 100vh;
            }

            .sidebar {
                background: var(--sidebar-bg);
                border-right: 1px solid var(--border-soft);
                box-shadow: 8px 0 22px rgba(62, 43, 14, 0.06);
                display: flex;
                flex-direction: column;
            }

            .sidebar-brand {
                height: 168px;
                padding: 34px;
                border-radius: 0 0 32px 0;
                background: var(--sidebar-accent);
                box-shadow: 0 14px 26px rgba(122, 81, 12, 0.12);
            }

            .brand {
                display: inline-flex;
                align-items: center;
            }

            .brand-logo {
                display: block;
                width: 210px;
                height: auto;
            }

            .sidebar-nav {
                padding: 34px 20px;
            }

            .nav-list {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .nav-item {
                position: relative;
                display: flex;
                align-items: center;
                gap: 14px;
                min-height: 54px;
                padding: 0 16px;
                border-radius: 18px;
                color: #9d9da3;
                font-size: 1rem;
                font-weight: 500;
            }

            .nav-item svg {
                width: 22px;
                height: 22px;
                flex-shrink: 0;
            }

            .nav-item.active {
                color: #2d2d2f;
                font-weight: 700;
            }

            .nav-item.active svg {
                color: var(--orange);
            }

            .nav-item.active::after {
                content: '';
                position: absolute;
                top: 7px;
                bottom: 7px;
                right: 12px;
                width: 4px;
                border-radius: 999px;
                background: var(--orange);
            }

            .main {
                padding-bottom: 40px;
            }

            .topbar {
                margin: 0 0 26px;
                padding: 28px 46px;
                background: var(--topbar-bg);
                border-radius: 0 0 28px 28px;
                box-shadow: 0 10px 30px rgba(89, 68, 37, 0.12);
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
            }

            .headline {
                margin: 0;
                font-size: clamp(1.9rem, 4vw, 2.3rem);
                font-weight: 700;
                letter-spacing: -0.04em;
            }

            .subheadline {
                margin: 6px 0 0;
                font-size: 0.98rem;
                color: var(--blue-soft);
                font-weight: 500;
            }

            .topbar-actions {
                display: flex;
                align-items: center;
                gap: 16px;
                position: relative;
            }

            .icon-btn {
                width: 56px;
                height: 56px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 1px solid transparent;
                padding: 0;
                border-radius: 16px;
                background: transparent;
                color: var(--icon-color);
                flex-shrink: 0;
                line-height: 1;
                cursor: pointer;
                transition: transform 0.18s ease, background-color 0.18s ease, color 0.18s ease;
            }

            .icon-btn svg {
                width: 30px;
                height: 30px;
                display: block;
            }

            .icon-btn:hover,
            .icon-btn:focus-visible {
                background: rgba(245, 124, 0, 0.1);
                border-color: rgba(245, 124, 0, 0.2);
                outline: none;
            }

            .icon-btn:active {
                transform: translateY(1px);
            }

            .icon-btn[data-active='true'] {
                background: rgba(245, 124, 0, 0.14);
            }

            .notification-btn {
                position: relative;
            }

            .notification-menu {
                position: relative;
            }

            .notification-dot {
                position: absolute;
                top: 12px;
                right: 13px;
                width: 11px;
                height: 11px;
                border-radius: 999px;
                background: var(--orange);
                box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.92);
            }

            body.theme-dark .notification-dot {
                box-shadow: 0 0 0 4px rgba(28, 34, 44, 0.96);
            }

            .admin-pill {
                min-width: 206px;
                height: 56px;
                padding: 0 16px 0 24px;
                border-radius: 18px;
                border: 3px solid var(--orange);
                display: inline-flex;
                align-items: center;
                justify-content: flex-end;
                gap: 18px;
                font-size: 1.08rem;
                font-weight: 700;
                background: var(--pill-bg);
                line-height: 1;
                box-sizing: border-box;
                cursor: pointer;
                color: var(--text);
                transition: transform 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
                position: relative;
            }

            .admin-menu {
                position: relative;
            }

            .admin-pill:hover,
            .admin-pill:focus-visible {
                box-shadow: 0 10px 20px rgba(245, 124, 0, 0.14);
                outline: none;
            }

            .admin-pill:active {
                transform: translateY(1px);
            }

            .admin-pill span {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                max-width: calc(100% - 76px);
                text-align: center;
            }

            .admin-pill svg {
                width: 30px;
                height: 30px;
                color: #55565c;
                flex-shrink: 0;
                transition: transform 0.18s ease, color 0.18s ease;
            }

            body.theme-dark .admin-pill svg {
                color: #e7ebf2;
            }

            .admin-pill[data-active='true'] svg {
                transform: rotate(180deg);
            }

            .admin-menu-panel {
                position: absolute;
                top: calc(100% + 12px);
                right: 0;
                width: 260px;
                padding: 14px;
                border-radius: 22px;
                background: var(--notif-bg);
                border: 1px solid var(--notif-border);
                box-shadow: var(--shadow);
                display: none;
                z-index: 20;
            }

            .admin-menu-panel.is-open {
                display: block;
            }

            .admin-menu-info {
                padding: 12px 14px 14px;
                border-radius: 16px;
                background: rgba(245, 124, 0, 0.08);
            }

            .admin-menu-name {
                display: block;
                font-size: 0.98rem;
                font-weight: 700;
                color: var(--text);
            }

            .admin-menu-email {
                display: block;
                margin-top: 4px;
                font-size: 0.84rem;
                color: var(--muted);
                word-break: break-word;
            }

            body.theme-dark .admin-menu-info {
                background: rgba(245, 124, 0, 0.14);
            }

            .admin-menu-actions {
                display: grid;
                gap: 10px;
                margin-top: 12px;
            }

            .admin-menu-action {
                width: 100%;
                min-height: 46px;
                padding: 0 14px;
                border: 0;
                border-radius: 14px;
                background: #fff3e2;
                color: var(--orange);
                display: inline-flex;
                align-items: center;
                justify-content: flex-start;
                gap: 10px;
                font-size: 0.92rem;
                font-weight: 700;
                cursor: pointer;
            }

            .admin-menu-action svg {
                width: 20px;
                height: 20px;
                flex-shrink: 0;
            }

            body.theme-dark .admin-menu-action {
                background: #332b22;
                color: #ffd39b;
            }

            .notification-panel {
                position: absolute;
                top: calc(100% + 12px);
                right: 0;
                width: 320px;
                padding: 18px;
                border-radius: 24px;
                background: var(--notif-bg);
                border: 1px solid var(--notif-border);
                box-shadow: var(--shadow);
                display: none;
                z-index: 20;
            }

            .notification-panel.is-open {
                display: block;
            }

            .notification-btn[data-active='true'] .notification-dot {
                transform: scale(0.72);
                opacity: 0.7;
            }

            .theme-icon {
                display: block;
            }

            .theme-icon.sun {
                display: none;
            }

            body.theme-dark .theme-icon.moon {
                display: none;
            }

            body.theme-dark .theme-icon.sun {
                display: block;
            }

            .notification-title {
                margin: 0 0 14px;
                font-size: 1rem;
                font-weight: 700;
            }

            .notification-list {
                display: grid;
                gap: 12px;
            }

            .notification-item {
                padding: 14px 16px;
                border-radius: 18px;
                background: rgba(245, 124, 0, 0.08);
            }

            body.theme-dark .notification-item {
                background: rgba(245, 124, 0, 0.14);
            }

            .notification-item strong {
                display: block;
                margin-bottom: 4px;
                font-size: 0.96rem;
            }

            .notification-item span {
                display: block;
                color: var(--muted);
                font-size: 0.88rem;
            }

            .dialog-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(17, 20, 26, 0.44);
                display: none;
                align-items: center;
                justify-content: center;
                padding: 24px;
                z-index: 60;
            }

            .dialog-backdrop.is-open {
                display: flex;
            }

            .dialog-card {
                width: min(100%, 420px);
                padding: 24px;
                border-radius: 28px;
                background: var(--panel);
                color: var(--text);
                box-shadow: var(--shadow);
                border: 1px solid var(--notif-border);
            }

            .dialog-title {
                margin: 0;
                font-size: 1.28rem;
                font-weight: 700;
            }

            .dialog-text {
                margin: 10px 0 0;
                color: var(--muted);
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .dialog-actions {
                display: flex;
                justify-content: flex-end;
                gap: 12px;
                margin-top: 24px;
            }

            .dialog-btn {
                min-width: 132px;
                height: 48px;
                padding: 0 18px;
                border-radius: 16px;
                border: 2px solid transparent;
                font-size: 0.92rem;
                font-weight: 700;
                cursor: pointer;
            }

            .dialog-btn.cancel {
                background: transparent;
                color: var(--text);
                border-color: rgba(245, 124, 0, 0.28);
            }

            .dialog-btn.confirm {
                background: linear-gradient(180deg, #ff8c0d 0%, #f57c00 100%);
                color: #fff;
            }

            body.theme-dark .content .stat-card,
            body.theme-dark .content .panel,
            body.theme-dark .content .notifications,
            body.theme-dark .content .search-panel,
            body.theme-dark .content .empty-state,
            body.theme-dark .content .filter-card,
            body.theme-dark .content .empty-card,
            body.theme-dark .content .form-panel,
            body.theme-dark .content .settings-card,
            body.theme-dark .content .summary-card,
            body.theme-dark .content .service-section,
            body.theme-dark .content .service-card,
            body.theme-dark .content .user-card,
            body.theme-dark .content .chart-card,
            body.theme-dark .content .modal-card,
            body.theme-dark .content .orders-list,
            body.theme-dark .content .history-list,
            body.theme-dark .content .customers-list,
            body.theme-dark .content .order-card,
            body.theme-dark .content .history-card,
            body.theme-dark .content .customer-card,
            body.theme-dark .content .receipt-card,
            body.theme-dark .content .filter-menu {
                background: #202733 !important;
                color: var(--text);
                border-color: rgba(79, 89, 104, 0.9);
                box-shadow: 0 16px 34px rgba(0, 0, 0, 0.28);
            }

            body.theme-dark .content .chart-card {
                background: #1a202b !important;
                border-color: rgba(79, 89, 104, 0.72);
            }

            body.theme-dark .content .search-box,
            body.theme-dark .content .filter-box,
            body.theme-dark .content .filter-trigger,
            body.theme-dark .content .control,
            body.theme-dark .content .input,
            body.theme-dark .content .select,
            body.theme-dark .content .textarea,
            body.theme-dark .content .upload-box,
            body.theme-dark .content .field input,
            body.theme-dark .content .modal-input,
            body.theme-dark .content .modal-textarea {
                background: #161c25 !important;
                color: var(--text) !important;
                border-color: var(--orange) !important;
            }

            body.theme-dark .content .search-box input,
            body.theme-dark .content .control input,
            body.theme-dark .content .field input,
            body.theme-dark .content .input,
            body.theme-dark .content .select,
            body.theme-dark .content .textarea,
            body.theme-dark .content .modal-input,
            body.theme-dark .content .modal-textarea,
            body.theme-dark .content .filter-trigger,
            body.theme-dark .content .filter-option {
                color: var(--text) !important;
            }

            body.theme-dark .content .select option {
                background: #161c25;
                color: var(--text);
            }

            body.theme-dark .content .search-box input::placeholder,
            body.theme-dark .content .control input::placeholder,
            body.theme-dark .content .field input::placeholder,
            body.theme-dark .content .input::placeholder,
            body.theme-dark .content .textarea::placeholder,
            body.theme-dark .content .modal-input::placeholder,
            body.theme-dark .content .modal-textarea::placeholder {
                color: #8e97a8 !important;
            }

            body.theme-dark .content .service-item,
            body.theme-dark .content .info-box,
            body.theme-dark .content .data-row,
            body.theme-dark .content .flash-message {
                background: linear-gradient(180deg, #2a313c 0%, #232a34 100%) !important;
                border-color: rgba(102, 111, 125, 0.75) !important;
            }

            body.theme-dark .content .service-count,
            body.theme-dark .content .role-badge.admin,
            body.theme-dark .content .status-badge,
            body.theme-dark .content .customer-badge {
                background: #332b22 !important;
                color: #ffd39b !important;
            }

            body.theme-dark .content .notification-pill {
                background: #3a2b1f !important;
                color: #ffe4bf !important;
            }

            body.theme-dark .content .chart-area {
                background:
                    linear-gradient(180deg, transparent 0 94%, rgba(91, 104, 139, 0.24) 94% 95%, transparent 95%),
                    repeating-linear-gradient(180deg, transparent 0 41px, rgba(91, 104, 139, 0.22) 41px 43px),
                    #121821 !important;
            }

            body.theme-dark .content .chart-header,
            body.theme-dark .content .chart-legend,
            body.theme-dark .content .service-meta,
            body.theme-dark .content .empty-text,
            body.theme-dark .content .panel-empty,
            body.theme-dark .content .user-meta,
            body.theme-dark .content .order-meta,
            body.theme-dark .content .history-meta,
            body.theme-dark .content .customer-meta,
            body.theme-dark .content .receipt-label,
            body.theme-dark .content .preview-help,
            body.theme-dark .content .ghost,
            body.theme-dark .content .card-note,
            body.theme-dark .content .summary-label {
                color: #a9b3c7 !important;
            }

            body.theme-dark .content .headline,
            body.theme-dark .content .value,
            body.theme-dark .content .label,
            body.theme-dark .content .panel-title,
            body.theme-dark .content .notifications-title,
            body.theme-dark .content .service-name,
            body.theme-dark .content .user-name,
            body.theme-dark .content .section-title,
            body.theme-dark .content .form-title,
            body.theme-dark .content .modal-title,
            body.theme-dark .content .modal-label,
            body.theme-dark .content .field label,
            body.theme-dark .content .control span,
            body.theme-dark .content .info-title,
            body.theme-dark .content .info-list,
            body.theme-dark .content .summary-value,
            body.theme-dark .content .order-code,
            body.theme-dark .content .history-code,
            body.theme-dark .content .order-detail-label,
            body.theme-dark .content .history-detail-label,
            body.theme-dark .content .data-row strong,
            body.theme-dark .content .customer-name,
            body.theme-dark .content .receipt-title,
            body.theme-dark .content .receipt-value,
            body.theme-dark .content .preview-name,
            body.theme-dark .content .flash-message,
            body.theme-dark .content .error-box {
                color: var(--text) !important;
            }

            body.theme-dark .content .service-estimate,
            body.theme-dark .content .upload-box strong,
            body.theme-dark .content .modal-btn.cancel,
            body.theme-dark .content .btn-outline,
            body.theme-dark .content .filter-btn.reset,
            body.theme-dark .content .back-link,
            body.theme-dark .content .order-detail,
            body.theme-dark .content .history-detail,
            body.theme-dark .content .order-detail strong {
                color: #d8dee9 !important;
            }

            body.theme-dark .content .modal-btn.cancel,
            body.theme-dark .content .btn-outline,
            body.theme-dark .content .filter-btn.reset {
                background: #1a202b !important;
            }

            body.theme-dark .content .filter-option.active,
            body.theme-dark .content .filter-option:hover {
                background: rgba(245, 124, 0, 0.16) !important;
                color: #ffd39b !important;
            }

            body.theme-dark .content .error-box {
                background: linear-gradient(180deg, #352026 0%, #2a1a20 100%) !important;
                border-color: rgba(214, 102, 92, 0.45) !important;
            }

            .content {
                padding: 0 36px;
            }

            @media (max-width: 980px) {
                .admin-shell {
                    grid-template-columns: 1fr;
                }

                .sidebar {
                    border-right: 0;
                    border-bottom: 1px solid rgba(236, 231, 220, 0.9);
                }

                .sidebar-brand {
                    border-radius: 0 0 28px 28px;
                }

                .topbar,
                .content {
                    padding-left: 24px;
                    padding-right: 24px;
                }
            }

            @media (max-width: 700px) {
                .topbar {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .topbar-actions {
                    width: 100%;
                    justify-content: flex-start;
                    gap: 12px;
                }

                .admin-pill {
                    min-width: 0;
                    flex: 1;
                }

                .notification-panel {
                    right: 0;
                    width: min(320px, calc(100vw - 48px));
                }

                .admin-menu-panel {
                    right: 0;
                    width: min(260px, calc(100vw - 48px));
                }

                .dialog-actions {
                    flex-direction: column-reverse;
                }

                .dialog-btn {
                    width: 100%;
                }
            }
        </style>
        <?php echo $__env->yieldPushContent('styles'); ?>
    </head>
    <body>
        <?php
            $activeMenu = trim($__env->yieldContent('active-menu'));
            $authUser = session('social_auth');
            $accountLabel = (($authUser['role'] ?? 'admin') === 'pegawai') ? 'Pegawai' : 'Admin';
            $newOrdersCount = \App\Models\Order::query()
                ->where('status', 'Baru')
                ->whereDate('created_at', now()->toDateString())
                ->count();
            $readyOrdersCount = \App\Models\Order::query()
                ->where('status', 'Siap Diambil')
                ->count();
            $processingOrdersCount = \App\Models\Order::query()
                ->where('status', 'Diproses')
                ->count();
            $rewardReadyCount = \App\Models\Customer::query()
                ->with('orders')
                ->get()
                ->sum(fn ($customer) => $customer->available_rewards);
            $adminNotifications = [];

            if ($newOrdersCount > 0) {
                $adminNotifications[] = [
                    'title' => $newOrdersCount . ' order baru hari ini',
                    'body' => 'Cek dan ubah status order baru ke diproses.',
                    'url' => route('orders.index', ['status' => 'Baru']),
                ];
            }

            if ($readyOrdersCount > 0) {
                $adminNotifications[] = [
                    'title' => $readyOrdersCount . ' order siap diambil',
                    'body' => 'Hubungi pelanggan untuk proses pengambilan.',
                    'url' => route('orders.index', ['status' => 'Siap Diambil']),
                ];
            }

            if ($processingOrdersCount > 0) {
                $adminNotifications[] = [
                    'title' => $processingOrdersCount . ' order sedang diproses',
                    'body' => 'Pantau pengerjaan agar selesai sesuai estimasi.',
                    'url' => route('orders.index', ['status' => 'Diproses']),
                ];
            }

            if ($rewardReadyCount > 0) {
                $adminNotifications[] = [
                    'title' => $rewardReadyCount . ' reward member bisa diklaim',
                    'body' => 'Ada pelanggan dengan stempel penuh.',
                    'url' => route('customers.index'),
                ];
            }

            if (empty($adminNotifications)) {
                $adminNotifications[] = [
                    'title' => 'Belum ada notifikasi',
                    'body' => 'Aktivitas order dan member masih aman.',
                    'url' => null,
                ];
            }

            $notificationCount = $newOrdersCount + $readyOrdersCount + $processingOrdersCount + $rewardReadyCount;
        ?>

        <div class="admin-shell">
            <aside class="sidebar">
                <div class="sidebar-brand">
                    <a href="/" class="brand" aria-label="Raab Shoes">
                        <img src="<?php echo e(asset('images/raabshoes-logo.svg')); ?>" alt="Raab Shoes" class="brand-logo">
                    </a>
                </div>

                <nav class="sidebar-nav" aria-label="Sidebar navigation">
                    <div class="nav-list">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-item <?php echo e($activeMenu === 'dashboard' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 3l9 7h-3v10h-5v-6H11v6H6V10H3l9-7Z"/></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="<?php echo e(route('orders.index')); ?>" class="nav-item <?php echo e($activeMenu === 'orders' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 3a2 2 0 0 1 2 2v1h6V5a2 2 0 1 1 4 0v1h1a2 2 0 0 1 2 2v10a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V8a2 2 0 0 1 2-2h1V5a2 2 0 0 1 2-2Zm12 8H5v7a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-7Z"/></svg>
                            <span>Order/Transaksi</span>
                        </a>
                        <a href="<?php echo e(route('customers.index')); ?>" class="nav-item <?php echo e($activeMenu === 'customers' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm8 1a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM4 20a5 5 0 0 1 10 0H4Zm9.5 0a4.5 4.5 0 0 1 8.5 0h-8.5Z"/></svg>
                            <span>Pelanggan</span>
                        </a>
                        <a href="<?php echo e(route('services.index')); ?>" class="nav-item <?php echo e($activeMenu === 'services' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h7v7H4V4Zm9 0h7v7h-7V4ZM4 13h7v7H4v-7Zm9 0h7v7h-7v-7Z"/></svg>
                            <span>Layanan &amp; Harga</span>
                        </a>
                        <a href="<?php echo e(route('reports.index')); ?>" class="nav-item <?php echo e($activeMenu === 'reports' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 3h11a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm2 4v2h7V7H7Zm0 4v2h9v-2H7Zm0 4v2h6v-2H7Zm12-1 3 3-3 3v-2h-4v-2h4v-2Z"/></svg>
                            <span>Laporan</span>
                        </a>
                        <a href="<?php echo e(route('transaction-history.index')); ?>" class="nav-item <?php echo e($activeMenu === 'transaction-history' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm1 5h-2v5.4l4.1 2.4 1-1.7-3.1-1.8V7Z"/></svg>
                            <span>Riwayat Transaksi</span>
                        </a>
                        <a href="<?php echo e(route('settings.index')); ?>" class="nav-item <?php echo e($activeMenu === 'settings' ? 'active' : ''); ?>">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M10.3 2h3.4l.5 2.1c.5.1 1 .3 1.5.6l1.9-1.1 2.4 2.4-1.1 1.9c.3.5.5 1 .6 1.5L22 10.3v3.4l-2.1.5c-.1.5-.3 1-.6 1.5l1.1 1.9-2.4 2.4-1.9-1.1c-.5.3-1 .5-1.5.6L13.7 22h-3.4l-.5-2.1c-.5-.1-1-.3-1.5-.6l-1.9 1.1-2.4-2.4 1.1-1.9c-.3-.5-.5-1-.6-1.5L2 13.7v-3.4l2.1-.5c.1-.5.3-1 .6-1.5L3.6 6.4 6 4l1.9 1.1c.5-.3 1-.5 1.5-.6L10.3 2Zm1.7 6.5A3.5 3.5 0 1 0 12 15.5a3.5 3.5 0 0 0 0-7Z"/></svg>
                            <span>Pengaturan</span>
                        </a>
                    </div>
                </nav>
            </aside>

            <main class="main">
                <header class="topbar">
                    <div>
                        <h1 class="headline"><?php echo $__env->yieldContent('page-title'); ?></h1>
                        <p class="subheadline"><?php echo $__env->yieldContent('page-subtitle'); ?></p>
                    </div>

                    <div class="topbar-actions">
                        <button
                            type="button"
                            class="icon-btn"
                            id="theme-toggle"
                            aria-label="Ubah tema gelap atau terang"
                            title="Ubah tema"
                        >
                            <svg class="theme-icon moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20.4 14.6A8.6 8.6 0 0 1 9.4 3.6 7.2 7.2 0 1 0 20.4 14.6Z"/>
                            </svg>
                            <svg class="theme-icon sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2.5v2.5"></path>
                                <path d="M12 19v2.5"></path>
                                <path d="m4.9 4.9 1.8 1.8"></path>
                                <path d="m17.3 17.3 1.8 1.8"></path>
                                <path d="M2.5 12H5"></path>
                                <path d="M19 12h2.5"></path>
                                <path d="m4.9 19.1 1.8-1.8"></path>
                                <path d="m17.3 6.7 1.8-1.8"></path>
                            </svg>
                        </button>
                        <div class="notification-menu">
                            <button
                                type="button"
                                class="icon-btn notification-btn"
                                id="notification-toggle"
                                aria-label="Buka notifikasi"
                                aria-expanded="false"
                                aria-controls="notification-panel"
                                title="Notifikasi"
                            >
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M18 8.8a6 6 0 0 0-12 0c0 6.8-2.5 7.7-2.5 7.7h17S18 15.6 18 8.8Z"/>
                                    <path d="M9.8 19a2.3 2.3 0 0 0 4.4 0"/>
                                </svg>
                                <span class="notification-dot" aria-hidden="true" <?php if($notificationCount === 0): ?> hidden <?php endif; ?>></span>
                            </button>

                            <div class="notification-panel" id="notification-panel" role="dialog" aria-label="Daftar notifikasi">
                                <p class="notification-title">Notifikasi</p>
                                <div class="notification-list">
                                    <?php $__currentLoopData = $adminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($notification['url']): ?>
                                            <a href="<?php echo e($notification['url']); ?>" class="notification-item">
                                                <strong><?php echo e($notification['title']); ?></strong>
                                                <span><?php echo e($notification['body']); ?></span>
                                            </a>
                                        <?php else: ?>
                                            <div class="notification-item">
                                                <strong><?php echo e($notification['title']); ?></strong>
                                                <span><?php echo e($notification['body']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="admin-menu">
                            <button
                                type="button"
                                class="admin-pill"
                                id="admin-menu-toggle"
                                aria-label="Buka menu admin"
                                aria-expanded="false"
                                aria-controls="admin-menu-panel"
                            >
                                <span><?php echo e($accountLabel); ?></span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </button>
                            <div class="admin-menu-panel" id="admin-menu-panel" role="menu" aria-label="Menu admin">
                                <div class="admin-menu-info">
                                    <span class="admin-menu-name"><?php echo e($accountLabel); ?></span>
                                    <span class="admin-menu-email"><?php echo e($authUser['email'] ?? 'admin@raabshoes.com'); ?></span>
                                </div>
                                <div class="admin-menu-actions">
                                    <button type="button" class="admin-menu-action" id="logout-trigger" role="menuitem">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                            <path d="m16 17 5-5-5-5"/>
                                            <path d="M21 12H9"/>
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </main>
        </div>

        <div class="dialog-backdrop" id="logout-dialog" aria-hidden="true">
            <div class="dialog-card" role="dialog" aria-modal="true" aria-labelledby="logout-dialog-title">
                <h2 class="dialog-title" id="logout-dialog-title">Keluar dari akun?</h2>
                <p class="dialog-text">Kalau keluar sekarang, Anda perlu login lagi untuk mengakses dashboard admin.</p>
                <div class="dialog-actions">
                    <button type="button" class="dialog-btn cancel" id="logout-cancel">Batal</button>
                    <form method="post" action="<?php echo e(route('logout')); ?>" id="logout-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dialog-btn confirm">Ya, Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            (function () {
                const body = document.body;
                const themeToggle = document.getElementById('theme-toggle');
                const notificationToggle = document.getElementById('notification-toggle');
                const notificationPanel = document.getElementById('notification-panel');
                const adminMenuToggle = document.getElementById('admin-menu-toggle');
                const adminMenuPanel = document.getElementById('admin-menu-panel');
                const logoutTrigger = document.getElementById('logout-trigger');
                const logoutDialog = document.getElementById('logout-dialog');
                const logoutCancel = document.getElementById('logout-cancel');
                const storageKey = 'raab-admin-theme';

                if (themeToggle) {
                    const applyTheme = (theme) => {
                        const isDark = theme === 'dark';
                        body.classList.toggle('theme-dark', isDark);
                        themeToggle.setAttribute('aria-pressed', String(isDark));
                        themeToggle.dataset.active = String(isDark);
                    };

                    const savedTheme = localStorage.getItem(storageKey);
                    applyTheme(savedTheme === 'dark' ? 'dark' : 'light');

                    themeToggle.addEventListener('click', () => {
                        const nextTheme = body.classList.contains('theme-dark') ? 'light' : 'dark';
                        localStorage.setItem(storageKey, nextTheme);
                        applyTheme(nextTheme);
                    });
                }

                const setNotificationOpen = (open) => {
                    if (!notificationToggle || !notificationPanel) {
                        return;
                    }

                    notificationPanel.classList.toggle('is-open', open);
                    notificationToggle.setAttribute('aria-expanded', String(open));
                    notificationToggle.dataset.active = String(open);
                };

                if (notificationToggle && notificationPanel) {
                    notificationToggle.addEventListener('click', (event) => {
                        event.stopPropagation();
                        const willOpen = !notificationPanel.classList.contains('is-open');
                        if (adminMenuPanel) {
                            adminMenuPanel.classList.remove('is-open');
                        }
                        if (adminMenuToggle) {
                            adminMenuToggle.setAttribute('aria-expanded', 'false');
                            adminMenuToggle.dataset.active = 'false';
                        }
                        setNotificationOpen(willOpen);
                    });

                    notificationPanel.addEventListener('click', (event) => {
                        event.stopPropagation();
                    });
                }

                const setAdminMenuOpen = (open) => {
                    if (!adminMenuToggle || !adminMenuPanel) {
                        return;
                    }

                    adminMenuPanel.classList.toggle('is-open', open);
                    adminMenuToggle.setAttribute('aria-expanded', String(open));
                    adminMenuToggle.dataset.active = String(open);
                };

                if (adminMenuToggle && adminMenuPanel) {
                    adminMenuToggle.addEventListener('click', (event) => {
                        event.stopPropagation();
                        const willOpen = !adminMenuPanel.classList.contains('is-open');
                        setNotificationOpen(false);
                        setAdminMenuOpen(willOpen);
                    });

                    adminMenuPanel.addEventListener('click', (event) => {
                        event.stopPropagation();
                    });
                }

                const setLogoutDialogOpen = (open) => {
                    if (!logoutDialog) {
                        return;
                    }

                    logoutDialog.classList.toggle('is-open', open);
                    logoutDialog.setAttribute('aria-hidden', String(!open));
                    body.style.overflow = open ? 'hidden' : '';
                };

                if (logoutTrigger && logoutDialog) {
                    logoutTrigger.addEventListener('click', () => {
                        setAdminMenuOpen(false);
                        setLogoutDialogOpen(true);
                    });
                }

                if (logoutCancel && logoutDialog) {
                    logoutCancel.addEventListener('click', () => {
                        setLogoutDialogOpen(false);
                    });
                }

                if (logoutDialog) {
                    logoutDialog.addEventListener('click', (event) => {
                        if (event.target === logoutDialog) {
                            setLogoutDialogOpen(false);
                        }
                    });
                }

                document.addEventListener('click', () => {
                    setNotificationOpen(false);
                    setAdminMenuOpen(false);
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        setNotificationOpen(false);
                        setAdminMenuOpen(false);
                        setLogoutDialogOpen(false);
                    }
                });

            }());
        </script>
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH /Users/user/Downloads/raabshoes/manajement-raabshoes/resources/views/layouts/admin.blade.php ENDPATH**/ ?>