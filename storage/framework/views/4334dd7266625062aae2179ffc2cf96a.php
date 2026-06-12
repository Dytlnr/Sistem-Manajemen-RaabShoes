<?php $__env->startSection('page-title', 'Welcome Back, Admin'); ?>
<?php $__env->startSection('page-subtitle', 'Pantau dan kelola semua pesanan Anda dalam satu tempat'); ?>
<?php $__env->startSection('active-menu', 'dashboard'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.stats-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px 24px}.stat-card,.panel{background:rgba(255,255,255,.98);box-shadow:var(--shadow)}.stat-card{min-height:194px;padding:22px;border-radius:28px;display:flex;flex-direction:column;justify-content:space-between}.card-note{text-align:right;font-size:.92rem}.value{font-size:2.4rem;font-weight:600;letter-spacing:-.04em}.label{font-size:.96rem}.panels{display:grid;grid-template-columns:1.15fr .95fr;gap:22px 36px;margin-top:84px}.panel{min-height:462px;padding:30px;border-radius:32px}.panel-title{display:flex;align-items:center;gap:14px;margin:0 0 26px;font-size:1.05rem;font-weight:700}.panel-title svg{width:26px;height:26px;color:var(--orange)}.chart-card{margin:30px auto 0;width:min(100%,580px);padding:22px;border-radius:28px;background:#fff;box-shadow:0 12px 24px rgba(48,55,76,.12);border:1px solid rgba(232,236,245,.9)}.chart-header{display:flex;justify-content:space-between;align-items:flex-start;gap:18px;margin-bottom:18px;color:#1f2440}.chart-period{font-size:1.3rem;font-weight:700;letter-spacing:-.02em}.chart-sub{font-size:.92rem;color:#9097b0;font-weight:500}.chart-peak{flex:0 0 auto;margin-top:4px;padding:8px 12px;border-radius:14px;background:#f6f8fc;color:#737d9a;font-size:.86rem;font-weight:700}.chart-area{position:relative;height:300px;border-radius:24px;background:#fbfcff;overflow:hidden;padding:24px 86px 56px 24px}.chart-plot-bg{position:absolute;inset:24px 86px 56px 24px;background:repeating-linear-gradient(180deg,rgba(152,160,188,.14) 0 2px,transparent 2px 58px);border-bottom:2px solid rgba(152,160,188,.16);pointer-events:none}.chart-grid-labels{position:absolute;top:17px;right:24px;bottom:52px;width:58px;display:flex;flex-direction:column;justify-content:space-between;pointer-events:none}.chart-grid-label{font-size:.76rem;color:#9aa3b8;text-align:right;white-space:nowrap}.chart-axis{position:absolute;left:24px;right:86px;bottom:18px;display:grid;grid-template-columns:repeat(7,1fr);gap:8px;text-align:center;font-size:.78rem;font-weight:700;color:#8b92ab}.chart-svg{position:absolute;inset:24px 86px 56px 24px;width:calc(100% - 110px);height:calc(100% - 80px);overflow:visible}.chart-line.current{stroke:#4569dc;stroke-width:4;fill:none;stroke-linecap:round;stroke-linejoin:round}.chart-line.previous{stroke:#ff5b87;stroke-width:3;fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:9 9}.chart-area-fill{fill:url(#lineArea);opacity:.16}.chart-point{fill:#4569dc;stroke:#fff;stroke-width:4}.chart-tip{position:absolute;top:24px;left:50%;transform:translateX(-50%);background:#1e2240;color:#fff;padding:7px 12px;border-radius:13px;font-size:.82rem;font-weight:700;box-shadow:0 12px 24px rgba(30,34,64,.18);white-space:nowrap}.chart-tip::after{content:'';position:absolute;left:50%;bottom:-7px;transform:translateX(-50%);border:7px solid transparent;border-top-color:#1e2240}.chart-empty{position:absolute;left:24px;right:86px;top:50%;transform:translateY(-50%);text-align:center;color:#8f98b2;font-size:.9rem;font-weight:600;pointer-events:none}.chart-legend{display:flex;justify-content:center;gap:22px;margin-top:18px;color:#59607c;font-size:.92rem}.legend-item{display:flex;align-items:center;gap:8px}.legend-dot{width:11px;height:11px;border-radius:50%;display:inline-block}.services-list{display:flex;flex-direction:column;gap:16px;margin-top:12px}.service-item{padding:18px 20px;border-radius:20px;background:linear-gradient(180deg,#fff9ef 0%,#fff4de 100%);border:1px solid #f8e3bc;display:flex;justify-content:space-between;align-items:center;gap:18px}.service-name{font-size:1rem;font-weight:600}.service-meta{color:var(--muted);font-size:.9rem}.service-count{min-width:68px;text-align:center;padding:10px 12px;border-radius:14px;background:#fff;color:var(--orange);font-weight:700;box-shadow:0 8px 22px rgba(87,66,36,.1)}@media (max-width:1280px){.stats-grid,.panels{grid-template-columns:repeat(2,minmax(0,1fr))}.panels .panel:last-child{grid-column:span 2}}@media (max-width:980px){.stats-grid,.panels{grid-template-columns:1fr}.panels .panel:last-child{grid-column:auto}.chart-card{width:100%}}@media (max-width:640px){.panel,.stat-card{padding-left:20px;padding-right:20px}.chart-card{padding:16px}.chart-header{display:block}.chart-peak{display:inline-flex;margin-top:12px}.chart-area{height:260px;padding-right:72px}.chart-plot-bg,.chart-svg{right:72px;width:calc(100% - 96px)}.chart-grid-labels{right:16px;width:50px}.chart-axis{right:72px;font-size:.72rem}}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php ($todayRevenue = $todayRevenue ?? 0); ?>
<?php ($chartLabels = $chartLabels ?? ['Jan','Feb','Mar','Apr','Mei','Jun','Jul']); ?>
<?php ($chartThisYear = $chartThisYear ?? [0,0,0,0,0,0,0]); ?>
<?php ($chartPrevYear = $chartPrevYear ?? [0,0,0,0,0,0,0]); ?>
<?php ($maxChartValue = max(array_merge($chartThisYear, $chartPrevYear, [1]))); ?>
<?php ($chartMax = (int) ceil($maxChartValue / 10000) * 10000 ?: 10000); ?>
<?php ($chartGridLabels = [$chartMax, (int) round($chartMax * 0.75), (int) round($chartMax * 0.5), (int) round($chartMax * 0.25), 0]); ?>
<?php ($pointSpacing = count($chartLabels) > 1 ? 360 / (count($chartLabels) - 1) : 360); ?>
<?php ($buildPoints = function ($series) use ($chartMax, $pointSpacing) { $points = []; foreach ($series as $index => $value) { $x = 20 + ($index * $pointSpacing); $y = 188 - (($value / max($chartMax, 1)) * 156); $points[] = ['x' => round($x, 2), 'y' => round($y, 2), 'value' => $value]; } return $points; }); ?>
<?php ($currentPoints = $buildPoints($chartThisYear)); ?>
<?php ($previousPoints = $buildPoints($chartPrevYear)); ?>
<?php ($currentPath = 'M ' . collect($currentPoints)->map(fn ($point) => $point['x'] . ' ' . $point['y'])->implode(' L ')); ?>
<?php ($previousPath = 'M ' . collect($previousPoints)->map(fn ($point) => $point['x'] . ' ' . $point['y'])->implode(' L ')); ?>
<?php ($areaPath = $currentPath . ' L ' . optional(collect($currentPoints)->last())['x'] . ' 188 L ' . optional(collect($currentPoints)->first())['x'] . ' 188 Z'); ?>
<?php ($peakPoint = collect($currentPoints)->sortBy('y')->first()); ?>
<?php ($peakValue = collect($chartThisYear)->max() ?: 0); ?>
<?php ($lastChartLabel = $chartLabels[array_key_last($chartLabels)]); ?>
<?php ($formatChartValue = function ($value) { if ($value >= 1000000) { return 'Rp ' . number_format($value / 1000000, 1, ',', '.') . ' jt'; } if ($value >= 1000) { return 'Rp ' . number_format($value / 1000, 0, ',', '.') . ' rb'; } return 'Rp ' . number_format($value, 0, ',', '.'); }); ?>
<?php ($topServices = $topServices ?? []); ?>

<div class="stats-grid">
    <article class="stat-card"><div class="card-note">Hari ini</div><div><div class="value"><?php echo e($todayOrders ?? 0); ?></div><div class="label">Total Order Hari Ini</div></div></article>
    <article class="stat-card"><div class="card-note">Hari ini</div><div><div class="value">Rp <?php echo e(number_format($todayRevenue, 0, ',', '.')); ?></div><div class="label">Pendapatan Hari Ini</div></div></article>
    <article class="stat-card"><div class="card-note">&nbsp;</div><div><div class="value"><?php echo e($inProgress ?? 0); ?></div><div class="label">Order Dalam Proses</div></div></article>
    <article class="stat-card"><div class="card-note">&nbsp;</div><div><div class="value"><?php echo e($completed ?? 0); ?></div><div class="label">Order Tuntas</div></div></article>
    <article class="stat-card"><div class="card-note">&nbsp;</div><div><div class="value"><?php echo e($readyPickup ?? 0); ?></div><div class="label">Siap Diambil</div></div></article>
    <article class="stat-card"><div class="card-note">&nbsp;</div><div><div class="value"><?php echo e($totalCustomers ?? 0); ?></div><div class="label">Total Pelanggan</div></div></article>
</div>

<div class="panels">
    <section class="panel">
        <h2 class="panel-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l5-6 4 4 7-9"/><path d="M17 6h4v4"/></svg><span>Pendapatan Bulanan</span></h2>
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-period"><?php echo e($chartLabels[0]); ?> - <?php echo e($lastChartLabel); ?> <?php echo e(now()->format('Y')); ?></div>
                    <div class="chart-sub">Perbandingan 7 bulan terakhir</div>
                </div>
                <div class="chart-peak">Puncak: <?php echo e($formatChartValue($peakValue)); ?></div>
            </div>
            <div class="chart-area">
                <div class="chart-plot-bg"></div>
                <?php if($peakValue > 0 && $peakPoint): ?>
                    <div class="chart-tip" style="left: calc(24px + <?php echo e((($peakPoint['x'] - 20) / 360) * 75); ?>%);"><?php echo e($formatChartValue($peakValue)); ?></div>
                <?php else: ?>
                    <div class="chart-empty">Belum ada pendapatan pada periode ini</div>
                <?php endif; ?>
                <div class="chart-grid-labels">
                    <?php $__currentLoopData = $chartGridLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gridValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="chart-grid-label"><?php echo e($formatChartValue($gridValue)); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <svg class="chart-svg" viewBox="0 0 400 210" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="lineArea" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#4b6de0"/>
                            <stop offset="100%" stop-color="#4b6de0" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <path d="<?php echo e($areaPath); ?>" class="chart-area-fill"></path>
                    <path d="<?php echo e($previousPath); ?>" class="chart-line previous"></path>
                    <path d="<?php echo e($currentPath); ?>" class="chart-line current"></path>
                    <?php if($peakPoint): ?>
                        <circle cx="<?php echo e($peakPoint['x']); ?>" cy="<?php echo e($peakPoint['y']); ?>" r="7" class="chart-point"></circle>
                    <?php endif; ?>
                </svg>
                <div class="chart-axis">
                    <?php $__currentLoopData = $chartLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><?php echo e($label); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="chart-legend">
                <span class="legend-item"><span class="legend-dot" style="background:#4569dc"></span>Tahun Ini</span>
                <span class="legend-item"><span class="legend-dot" style="background:#ff5b87"></span>Tahun Lalu</span>
            </div>
        </div>
    </section>
    <section class="panel">
        <h2 class="panel-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4l6 6"/><path d="M17 7l-3 3"/><path d="M4 20l6-6"/><path d="M7 17l3 3"/><path d="M14 14l6 6"/><path d="M17 17l3-3"/><path d="M4 4l6 6"/><path d="M7 7L4 10"/></svg><span>Layanan Terlaris</span></h2>
        <div class="services-list">
            <?php $__empty_1 = true; $__currentLoopData = $topServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceName => $serviceCount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="service-item"><div><div class="service-name"><?php echo e($serviceName); ?></div><div class="service-meta">Paling sering dipesan akhir-akhir ini</div></div><div class="service-count"><?php echo e($serviceCount); ?>x</div></article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <article class="service-item"><div><div class="service-name">Belum ada data layanan</div><div class="service-meta">Tambahkan order untuk melihat statistik layanan.</div></div><div class="service-count">0x</div></article>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Downloads/raabshoes/manajement-raabshoes/resources/views/dashboard/index.blade.php ENDPATH**/ ?>