@extends('layouts.admin')

@section('page-title', 'Laporan & Monitoring')
@section('page-subtitle', 'Pantau, analisis, dan evaluasi kinerja bisnis Anda (admin only)')
@section('active-menu', 'reports')

@push('styles')
<style>
.filter-card,.summary-card,.panel{background:rgba(255,255,255,.98);box-shadow:var(--shadow)}.filter-form{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr) 224px;gap:18px 22px;align-items:end}.filter-card{border-radius:34px;padding:26px 30px}.field{display:flex;flex-direction:column;gap:8px}.field label{font-size:1rem;font-weight:500}.field input{height:74px;padding:0 22px;border:2px solid var(--orange);border-radius:20px;outline:none;background:#fff;color:#222;font-size:.98rem;font-weight:600}.export-btn{height:76px;border:0;border-radius:28px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;display:inline-flex;align-items:center;justify-content:center;gap:12px;font-size:.98rem;font-weight:600}.export-btn svg{width:24px;height:24px}.summary-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px;margin-top:32px}.summary-card{min-height:144px;padding:26px 30px 22px;border-radius:28px}.summary-label{font-size:.98rem;font-weight:500}.summary-value{margin-top:14px;font-size:2.4rem;line-height:1;font-weight:700;letter-spacing:-.04em}.panel-grid{display:grid;grid-template-columns:1fr 1fr;gap:26px;margin-top:34px}.panel{min-height:448px;padding:28px;border-radius:34px;display:flex;flex-direction:column}.panel-title{margin:0;font-size:1rem;font-weight:700}.panel-empty{flex:1;display:flex;align-items:center;justify-content:center;color:#a5a5aa;font-size:1rem;font-weight:500}.data-list{display:grid;gap:14px;margin-top:18px}.data-row{padding:14px 16px;border-radius:18px;background:#fff8ef;border:1px solid #f4dec0;display:flex;justify-content:space-between;gap:14px;font-size:.94rem}.data-row strong{font-weight:700}.data-value{color:var(--orange);font-weight:700}@media(max-width:1280px){.filter-form{grid-template-columns:1fr 1fr}.export-btn{width:100%}}@media(max-width:980px){.summary-grid,.panel-grid{grid-template-columns:1fr}}@media(max-width:700px){.filter-form{grid-template-columns:1fr}.filter-card{padding:20px;border-radius:24px}.field input,.export-btn{height:62px;border-radius:18px}.panel,.summary-card{padding:20px;border-radius:24px}.data-row{flex-direction:column;align-items:flex-start}}
</style>
@endpush

@section('content')
@php($dateFrom = $dateFrom ?? '')
@php($dateTo = $dateTo ?? '')
@php($totalOrders = $totalOrders ?? 0)
@php($totalRevenue = $totalRevenue ?? 0)
@php($averageOrder = $averageOrder ?? 0)
@php($topServices = $topServices ?? [])
@php($dailyRevenue = $dailyRevenue ?? [])
<section class="filter-card">
    <form method="get" action="{{ route('reports.index') }}" class="filter-form">
        <div class="field"><label>Dari Tanggal</label><input type="date" name="date_from" value="{{ $dateFrom }}"></div>
        <div class="field"><label>Sampai Tanggal</label><input type="date" name="date_to" value="{{ $dateTo }}"></div>
        <button class="export-btn" formaction="{{ route('reports.export') }}" formtarget="_blank" type="submit"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v12"/><path d="M8 11l4 4 4-4"/><path d="M5 21h14a2 2 0 0 0 2-2v-4"/><path d="M3 15v4a2 2 0 0 0 2 2"/></svg><span>Export PDF</span></button>
    </form>
</section>
<section class="summary-grid"><article class="summary-card"><div class="summary-label">Total Order</div><div class="summary-value">{{ $totalOrders }}</div></article><article class="summary-card"><div class="summary-label">Total Pendapatan</div><div class="summary-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div></article><article class="summary-card"><div class="summary-label">Rata-Rata Order</div><div class="summary-value">Rp {{ number_format($averageOrder, 0, ',', '.') }}</div></article></section>
<section class="panel-grid"><article class="panel"><h2 class="panel-title">Pendapatan Harian</h2>@if(count($dailyRevenue))<div class="data-list">@foreach($dailyRevenue as $date => $amount)<div class="data-row"><strong>{{ $date }}</strong><span class="data-value">Rp {{ number_format($amount, 0, ',', '.') }}</span></div>@endforeach</div>@else<div class="panel-empty">Tidak ada data</div>@endif</article><article class="panel"><h2 class="panel-title">Layanan Terlaris</h2>@if(count($topServices))<div class="data-list">@foreach($topServices as $service => $count)<div class="data-row"><strong>{{ $service }}</strong><span class="data-value">{{ $count }}x</span></div>@endforeach</div>@else<div class="panel-empty">Tidak ada data</div>@endif</article></section>
@endsection
