@extends('layouts.admin')

@section('page-title', 'Order & Transaksi')
@section('page-subtitle', 'Berikut adalah daftar lengkap pesanan dan riwayat transaksi Anda')
@section('active-menu', 'orders')

@push('styles')
<style>
.top-actions{display:flex;justify-content:flex-end;margin-bottom:24px}.primary-btn{min-width:306px;height:74px;padding:0 30px;border-radius:30px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;font-size:.98rem;font-weight:600;display:inline-flex;align-items:center;justify-content:center;box-shadow:0 12px 24px rgba(245,124,0,.22)}.flash-message{margin:0 0 18px;padding:14px 18px;border-radius:18px;background:#fff4e7;border:1px solid rgba(245,124,0,.28);color:#8a4d10;font-size:.94rem}.search-panel,.empty-state,.orders-list{background:rgba(255,255,255,.98);box-shadow:var(--shadow)}.search-panel{padding:38px 34px;border-radius:40px;display:grid;grid-template-columns:minmax(0,1fr) 246px;gap:28px;align-items:start}.search-box{height:70px;border:2px solid var(--orange);border-radius:22px;background:#fff;display:flex;align-items:center;gap:14px;padding:0 24px}.filter-dropdown{position:relative}.search-box svg,.filter-trigger svg{width:34px;height:34px;color:#9d9da3;flex-shrink:0}.search-box input{width:100%;border:0;outline:none;font:inherit;font-size:.96rem;background:transparent}.search-box input::placeholder{color:#ababaf}.filter-dropdown[open]{z-index:12}.filter-trigger{list-style:none;height:70px;border:2px solid var(--orange);border-radius:22px;background:#fff;display:flex;align-items:center;justify-content:center;gap:14px;padding:0 24px;font-size:.98rem;font-weight:500;cursor:pointer}.filter-trigger::-webkit-details-marker{display:none}.filter-menu{position:absolute;top:calc(100% + 10px);left:0;right:0;padding:10px;background:#fff;border:2px solid rgba(245,124,0,.18);border-radius:22px;box-shadow:var(--shadow);display:grid;gap:6px}.filter-option{min-height:46px;padding:0 14px;border-radius:14px;display:flex;align-items:center;font-size:.94rem;font-weight:500;color:#3a3a40}.filter-option.active,.filter-option:hover{background:#fff3e2;color:var(--orange)}.orders-list{margin-top:34px;padding:24px;border-radius:34px;display:grid;gap:18px}.order-card{padding:22px 24px;border:2px solid rgba(245,124,0,.2);border-radius:24px;background:#fff;display:grid;grid-template-columns:1.1fr 1fr auto;gap:18px;align-items:start}.order-code{font-size:1rem;font-weight:700}.order-meta{margin-top:8px;color:#6d6d75;font-size:.92rem;line-height:1.6}.order-detail{display:grid;gap:8px;font-size:.92rem;color:#55565c}.order-detail-row{display:grid;grid-template-columns:180px minmax(0,1fr);gap:8px;align-items:start}.order-detail-label{font-weight:700;color:#202127}.order-actions{display:flex;flex-direction:column;align-items:flex-start;justify-content:flex-start;gap:12px}.status-badge{min-width:96px;height:40px;padding:0 16px;border-radius:999px;background:#fff3e2;color:var(--orange);display:inline-flex;align-items:center;justify-content:center;font-size:.9rem;font-weight:700}.status-form{display:flex;flex-direction:column;align-items:flex-start;gap:8px;width:100%}.status-label{font-size:.82rem;font-weight:600;color:#8d8d94}.status-select{width:188px;height:44px;padding:0 14px;border:2px solid var(--orange);border-radius:16px;background:#fff;color:#23242a;font-size:.9rem;font-weight:600;outline:none}.wa-link,.edit-link{min-width:188px;height:44px;padding:0 18px;border-radius:16px;display:inline-flex;align-items:center;justify-content:center;gap:8px;font-size:.9rem;font-weight:600}.wa-link{background:#1fa855;color:#fff}.edit-link{border:2px solid var(--orange);background:#fff;color:var(--orange)}.wa-link svg,.edit-link svg{width:18px;height:18px}.edit-modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;padding:24px;background:rgba(16,16,18,.46);z-index:70}.edit-modal:target{display:flex}.edit-modal-backdrop{position:absolute;inset:0}.edit-card{position:relative;width:min(100%,760px);max-height:calc(100vh - 48px);overflow:auto;background:#fff;border-radius:28px;box-shadow:0 24px 60px rgba(19,16,10,.28);z-index:1}.edit-header{padding:18px 22px 14px;border-bottom:2px solid var(--orange)}.edit-title{margin:0;font-size:1.35rem;font-weight:700}.edit-body{padding:18px 22px 22px}.edit-form{display:grid;grid-template-columns:1fr 1fr;gap:16px 18px}.edit-field{display:flex;flex-direction:column;gap:7px}.edit-field.full{grid-column:1/-1}.edit-field label{font-size:.9rem;font-weight:600}.edit-input,.edit-select,.edit-textarea{width:100%;border:2px solid var(--orange);border-radius:14px;background:#fff;outline:none;font:inherit}.edit-input,.edit-select{height:48px;padding:0 14px}.edit-textarea{min-height:96px;padding:12px 14px;resize:vertical}.edit-actions{grid-column:1/-1;display:flex;justify-content:flex-end;gap:12px;margin-top:4px}.edit-btn{min-width:130px;height:44px;border-radius:14px;border:2px solid transparent;display:inline-flex;align-items:center;justify-content:center;font-size:.9rem;font-weight:700}.edit-btn.cancel{border-color:var(--orange);background:#fff;color:#4a4a4f}.edit-btn.save{background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff}.empty-state{margin-top:64px;min-height:448px;padding:56px 34px 44px;border-radius:40px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.empty-state svg{width:88px;height:88px;color:#b6b6b9}.empty-text{margin:22px 0 32px;color:#99999f;font-size:1rem;font-weight:500}.empty-btn{min-width:362px;height:58px;padding:0 26px;border-radius:24px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:.98rem;font-weight:600;box-shadow:0 10px 20px rgba(245,124,0,.22)}@media(max-width:1280px){.search-panel{grid-template-columns:1fr}.order-card{grid-template-columns:1fr}}@media(max-width:640px){.primary-btn,.empty-btn,.wa-link,.edit-link,.status-select{min-width:0;width:100%}.search-panel,.orders-list{padding:22px 18px;border-radius:28px}.search-box,.filter-trigger{height:60px;border-radius:18px}.order-card{padding:18px}.order-actions,.status-form{align-items:stretch}.order-detail-row,.edit-form{grid-template-columns:1fr}.edit-modal{padding:14px}.edit-card{border-radius:24px}.edit-actions{flex-direction:column}.edit-btn{width:100%}.empty-state{min-height:340px;border-radius:28px}}
</style>
@endpush

@section('content')
@php($orders = $orders ?? [])
@php($activeStatus = $activeStatus ?? 'Semua Status')
@php($search = $search ?? '')
@php($statusOptions = $statusOptions ?? ['Semua Status', 'Baru', 'Diproses', 'Siap Diambil', 'Diambil'])
@php($editableStatusOptions = ['Baru', 'Diproses', 'Siap Diambil', 'Diambil'])
@php($itemOptions = ['Sepatu', 'Tas', 'Topi'])
@php($serviceOptions = ['Fast Clean - Easy', 'Fast Clean - Hard', 'Deep Clean - Flat Shoes', 'Deep Clean - Reguler', 'Deep Clean - Express', 'Deep Clean - Express Half Day', 'Reglue', 'Unyellowing', 'Repaint/Custom', 'Bag/Tas - Small', 'Bag/Tas - Medium', 'Bag/Tas - Hard', 'Hat'])
@php($conditionOptions = ['Masih cukup bersih', 'Kotor ringan', 'Kotor sedang', 'Kotor banget', 'Ada noda membandel', 'Perlu perawatan khusus'])
@php($paymentOptions = ['Cash (Tunai)', 'Transfer Bank', 'QRIS'])
<div class="top-actions"><a href="{{ route('orders.create') }}" class="primary-btn">+ Tambah Order Baru</a></div>
@if(session('success'))
    <div class="flash-message">{{ session('success') }}</div>
@endif
<section class="search-panel">
    <form method="get" action="{{ route('orders.index') }}" class="search-box">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3.5-3.5"></path></svg>
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari Order ID, nama pelanggan, atau nomor HP.....">
        <input type="hidden" name="status" value="{{ $activeStatus }}">
    </form>
    <details class="filter-dropdown">
        <summary class="filter-trigger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5h18l-7 8v5l-4 2v-7L3 5Z"></path></svg><span>{{ $activeStatus }}</span></summary>
        <div class="filter-menu">
            @foreach($statusOptions as $status)
                <a href="{{ route('orders.index', array_filter(['status' => $status, 'search' => $search])) }}" class="filter-option {{ $activeStatus === $status ? 'active' : '' }}">{{ $status }}</a>
            @endforeach
        </div>
    </details>
</section>
@if(count($orders))
    <section class="orders-list">
        @foreach($orders as $order)
            <article class="order-card">
                <div>
                    <div class="order-code">{{ $order['id'] }}</div>
                    <div class="order-meta">
                        {{ $order['customer_name'] }}<br>
                        {{ $order['phone'] }}<br>
                        {{ $order['created_at'] }}
                    </div>
                </div>
                <div class="order-detail">
                    <div class="order-detail-row"><span class="order-detail-label">Barang:</span><span>{{ $order['service_choice'] }}</span></div>
                    <div class="order-detail-row"><span class="order-detail-label">Layanan:</span><span>{{ $order['service'] }}</span></div>
                    <div class="order-detail-row"><span class="order-detail-label">Kondisi:</span><span>{{ $order['condition'] ?: '-' }}</span></div>
                    <div class="order-detail-row"><span class="order-detail-label">Merek:</span><span>{{ $order['brand'] ?: '-' }}</span></div>
                </div>
                <div class="order-actions">
                    <span class="status-badge">{{ $order['status'] }}</span>
                    <form action="{{ route('orders.status', $order['id']) }}" method="post" class="status-form">
                        @csrf
                        <input type="hidden" name="redirect_status" value="{{ $activeStatus }}">
                        <label class="status-label" for="status-{{ $order['id'] }}">Ubah Status</label>
                        <select class="status-select" id="status-{{ $order['id'] }}" name="status" onchange="this.form.submit()">
                            @foreach($editableStatusOptions as $statusOption)
                                <option value="{{ $statusOption }}" @selected(($order['status'] ?? null) === $statusOption)>{{ $statusOption }}</option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('orders.whatsapp', $order['id']) }}" target="_blank" rel="noopener" class="wa-link">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.7 14.9L2 22l5.3-1.3A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-3.1.8.8-3-.2-.3A8 8 0 1 1 12 20Zm4.4-5.6c-.2-.1-1.3-.6-1.5-.7-.2-.1-.4-.1-.5.1-.2.2-.6.7-.7.8-.1.1-.3.2-.5.1a6.6 6.6 0 0 1-1.9-1.2 7.2 7.2 0 0 1-1.3-1.7c-.1-.2 0-.3.1-.5l.3-.3.2-.3c.1-.1.1-.3 0-.5l-.7-1.6c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.5.1-.7.4-.2.2-.9.9-.9 2.1s.9 2.4 1 2.5c.1.2 1.8 2.9 4.5 4 .6.3 1.1.4 1.5.5.6.2 1.2.1 1.6.1.5-.1 1.3-.5 1.5-1 .2-.5.2-1 .2-1.1 0-.1-.2-.2-.4-.3Z"/></svg>
                        <span>Kirim WhatsApp</span>
                    </a>
                    <a href="#edit-order-{{ $order['id'] }}" class="edit-link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="m16.5 3.5 4 4L8 20H4v-4L16.5 3.5Z"/></svg>
                        <span>Edit Order</span>
                    </a>
                </div>
            </article>
            <section id="edit-order-{{ $order['id'] }}" class="edit-modal" aria-label="Edit order {{ $order['id'] }}">
                <a href="#" class="edit-modal-backdrop" aria-label="Tutup modal"></a>
                <div class="edit-card">
                    <div class="edit-header">
                        <h2 class="edit-title">Edit Order {{ $order['id'] }}</h2>
                    </div>
                    <div class="edit-body">
                        <form action="{{ route('orders.update', $order['id']) }}" method="post" class="edit-form">
                            @csrf
                            <input type="hidden" name="redirect_status" value="{{ $activeStatus }}">
                            <div class="edit-field">
                                <label for="edit-name-{{ $order['id'] }}">Nama Pelanggan</label>
                                <input id="edit-name-{{ $order['id'] }}" class="edit-input" type="text" name="customer_name" value="{{ $order['customer_name'] }}" required>
                            </div>
                            <div class="edit-field">
                                <label for="edit-phone-{{ $order['id'] }}">Nomor HP</label>
                                <input id="edit-phone-{{ $order['id'] }}" class="edit-input" type="text" name="phone" value="{{ $order['phone'] }}" required>
                            </div>
                            <div class="edit-field full">
                                <label for="edit-address-{{ $order['id'] }}">Alamat</label>
                                <input id="edit-address-{{ $order['id'] }}" class="edit-input" type="text" name="address" value="{{ $order['address'] }}">
                            </div>
                            <div class="edit-field">
                                <label for="edit-item-{{ $order['id'] }}">Barang</label>
                                <select id="edit-item-{{ $order['id'] }}" class="edit-select" name="service_choice" required>
                                    @foreach($itemOptions as $itemOption)
                                        <option value="{{ $itemOption }}" @selected(($order['service_choice'] ?? '') === $itemOption || ($order['item_type'] ?? '') === $itemOption)>{{ $itemOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="edit-field">
                                <label for="edit-service-{{ $order['id'] }}">Layanan</label>
                                <select id="edit-service-{{ $order['id'] }}" class="edit-select" name="service" required>
                                    @foreach($serviceOptions as $serviceOption)
                                        <option value="{{ $serviceOption }}" @selected(($order['service'] ?? '') === $serviceOption)>{{ $serviceOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="edit-field">
                                <label for="edit-condition-{{ $order['id'] }}">Kondisi</label>
                                <select id="edit-condition-{{ $order['id'] }}" class="edit-select" name="condition">
                                    <option value="">-</option>
                                    @foreach($conditionOptions as $conditionOption)
                                        <option value="{{ $conditionOption }}" @selected(($order['condition'] ?? '') === $conditionOption)>{{ $conditionOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="edit-field">
                                <label for="edit-brand-{{ $order['id'] }}">Merek</label>
                                <input id="edit-brand-{{ $order['id'] }}" class="edit-input" type="text" name="brand" value="{{ $order['brand'] }}">
                            </div>
                            <div class="edit-field">
                                <label for="edit-color-{{ $order['id'] }}">Warna</label>
                                <input id="edit-color-{{ $order['id'] }}" class="edit-input" type="text" name="color" value="{{ $order['color'] }}">
                            </div>
                            <div class="edit-field">
                                <label for="edit-payment-{{ $order['id'] }}">Metode Pembayaran</label>
                                <select id="edit-payment-{{ $order['id'] }}" class="edit-select" name="payment_method" required>
                                    @foreach($paymentOptions as $paymentOption)
                                        <option value="{{ $paymentOption }}" @selected(($order['payment_method'] ?? '') === $paymentOption)>{{ $paymentOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="edit-field">
                                <label for="edit-cash-{{ $order['id'] }}">Uang Dibayar</label>
                                <input id="edit-cash-{{ $order['id'] }}" class="edit-input" type="text" name="cash_paid" value="{{ $order['cash_paid'] ? number_format((int) $order['cash_paid'], 0, ',', '.') : '' }}">
                            </div>
                            <div class="edit-field">
                                <label for="edit-status-{{ $order['id'] }}">Status</label>
                                <select id="edit-status-{{ $order['id'] }}" class="edit-select" name="status" required>
                                    @foreach($editableStatusOptions as $statusOption)
                                        <option value="{{ $statusOption }}" @selected(($order['status'] ?? '') === $statusOption)>{{ $statusOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="edit-field full">
                                <label for="edit-notes-{{ $order['id'] }}">Catatan</label>
                                <textarea id="edit-notes-{{ $order['id'] }}" class="edit-textarea" name="notes">{{ $order['notes'] }}</textarea>
                            </div>
                            <div class="edit-actions">
                                <a href="#" class="edit-btn cancel">Batal</a>
                                <button type="submit" class="edit-btn save">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        @endforeach
    </section>
@else
    <section class="empty-state"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3h10l1 2h3v2l-1 1v10a3 3 0 0 1-3 3H8a5 5 0 0 1-5-5v-4h8v3a2 2 0 0 0 2 2h4V5H7V3Z"/><path d="M9 8h6"/><path d="M9 12h5"/></svg><p class="empty-text">{{ $activeStatus === 'Semua Status' ? 'Belum ada orderan' : 'Belum ada order dengan status ' . $activeStatus }}</p><a href="{{ route('orders.create') }}" class="empty-btn">+ Tambah Order Pertama</a></section>
@endif
@endsection
