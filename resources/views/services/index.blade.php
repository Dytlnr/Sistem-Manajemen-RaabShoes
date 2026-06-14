@extends('layouts.admin')

@section('page-title', 'Layanan & Harga')
@section('page-subtitle', 'Kelola, perbarui, dan sesuaikan layanan serta harga')
@section('active-menu', 'services')

@push('styles')
<style>
.top-actions{display:flex;justify-content:flex-end;margin-bottom:24px}.primary-btn{min-width:244px;height:64px;padding:0 24px;border-radius:24px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;font-size:.94rem;font-weight:600;display:inline-flex;align-items:center;justify-content:center;box-shadow:0 10px 20px rgba(245,124,0,.2)}.sections{display:flex;flex-direction:column;gap:24px}.service-section{background:rgba(255,255,255,.98);border-radius:34px;box-shadow:var(--shadow);padding:0 12px 18px;overflow:hidden}.section-header{margin:0;min-height:60px;padding:0 26px;border-radius:30px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;display:flex;align-items:center;gap:12px;font-size:1rem;font-weight:700}.section-header svg{width:28px;height:28px}.services-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px 24px;padding:18px 0 0}.service-card{min-height:170px;border:2px solid var(--orange);border-radius:18px;background:#fff;padding:10px 12px 14px;display:flex;flex-direction:column}.service-top{display:flex;align-items:flex-start;justify-content:space-between;gap:14px;margin-bottom:10px}.service-name{font-size:.98rem;font-weight:700;line-height:1.35}.service-toggle{width:20px;height:12px;border:1.5px solid var(--orange);border-radius:999px;position:relative;margin-top:4px;flex-shrink:0}.service-toggle::after{content:'';position:absolute;top:1px;right:1px;width:8px;height:8px;border-radius:50%;background:#fff;border:1.5px solid var(--orange)}.service-meta{display:grid;grid-template-columns:1fr auto;row-gap:8px;column-gap:10px;color:var(--muted);font-size:.95rem;margin-top:auto}.service-value{color:var(--orange);font-weight:700}.service-estimate{color:#6f6f75;font-weight:600}.edit-btn{align-self:center;margin-top:14px;min-width:132px;height:32px;padding:0 18px;border-radius:999px;border:2px solid var(--orange);display:inline-flex;align-items:center;justify-content:center;gap:6px;color:var(--orange);font-size:.9rem;font-weight:500;background:#fff;cursor:pointer}.edit-btn svg{width:15px;height:15px}.modal-overlay{position:fixed;inset:0;display:none;align-items:center;justify-content:center;padding:28px;background:rgba(16,16,18,.42);z-index:60}.modal-overlay:target,.modal-overlay.is-open{display:flex}.modal-backdrop{position:absolute;inset:0}.modal-card{position:relative;width:min(100%,690px);background:#fff;border-radius:30px;box-shadow:0 24px 60px rgba(19,16,10,.28);z-index:1;overflow:hidden}.modal-header{padding:18px 22px 16px;border-bottom:2px solid var(--orange)}.modal-title{margin:0;font-size:clamp(1.8rem,4vw,2.4rem);font-weight:700;letter-spacing:-.04em}.modal-body{padding:18px 22px 22px}.modal-form{display:flex;flex-direction:column;gap:18px}.modal-field{display:flex;flex-direction:column;gap:8px}.modal-label{font-size:.96rem;font-weight:500}.required{color:#e7461b}.modal-input{width:100%;height:62px;padding:0 16px;border:2px solid var(--orange);border-radius:16px;outline:none;background:#fff}.modal-actions{display:flex;justify-content:flex-end;gap:16px;padding-top:2px}.modal-btn{min-width:164px;height:50px;border-radius:16px;display:inline-flex;align-items:center;justify-content:center;border:2px solid transparent;font-size:.96rem;font-weight:600}.modal-btn.cancel{border-color:var(--orange);background:#fff;color:#4a4a4f}.modal-btn.save{background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff}@media(max-width:1200px){.services-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:700px){.primary-btn{min-width:0;width:100%}.services-grid{grid-template-columns:1fr}.modal-overlay{padding:14px}.modal-card{width:min(100%,100%);border-radius:24px}.modal-header,.modal-body{padding-left:18px;padding-right:18px}.modal-input{height:56px}.modal-actions{flex-direction:column}.modal-btn{width:100%;min-width:0}}
</style>
@endpush

@section('content')
@php($sections=[['title'=>'Fast Clean','items'=>[['name'=>'Fast Clean - Easy','price'=>'Rp. 20.000','estimate'=>'1-2 hari'],['name'=>'Fast Clean - Hard','price'=>'Rp. 25.000','estimate'=>'1-3 hari']]],['title'=>'Deep Clean','items'=>[['name'=>'Deep Clean - Flat Shoes','price'=>'Rp. 15.000','estimate'=>'1-2 hari'],['name'=>'Deep Clean - Reguler','price'=>'Rp. 30.000','estimate'=>'1-3 hari'],['name'=>'Deep Clean - Express','price'=>'Rp. 40.000','estimate'=>'1 hari'],['name'=>'Deep Clean - Express Half Day','price'=>'Rp. 50.000','estimate'=>'7-8 jam']]],['title'=>'Shoes Repair','items'=>[['name'=>'Reglue','price'=>'Rp. 15.000 - Rp. 35.000','estimate'=>'1-10 hari'],['name'=>'Unyellowing','price'=>'Rp. 15.000 - Rp. 25.000','estimate'=>'1-3 hari'],['name'=>'Repaint/Custom','price'=>'Rp. 100.000','estimate'=>'3-10 hari']]],['title'=>'Bag/Tas','items'=>[['name'=>'Bag/Tas - Small','price'=>'Rp. 20.000','estimate'=>'-'],['name'=>'Bag/Tas - Medium','price'=>'Rp. 25.000','estimate'=>'-'],['name'=>'Bag/Tas - Hard','price'=>'Rp. 35.000','estimate'=>'-']]],['title'=>'Hat','items'=>[['name'=>'Hat','price'=>'Rp. 20.000','estimate'=>'-']]]])
<div class="top-actions"><a href="#add-service" class="primary-btn">+ Tambah Layanan</a></div>
<div class="sections">@foreach($sections as $section)<section class="service-section"><h2 class="section-header"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 1 1.4 0l1.6 1.6a1 1 0 0 1 0 1.4l-8.9 8.9-4 1 1-4 8.9-8.9Z"/><path d="M13 8l3 3"/></svg><span>{{ $section['title'] }}</span></h2><div class="services-grid">@foreach($section['items'] as $item)<article class="service-card" data-section="{{ $section['title'] }}" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}" data-estimate="{{ $item['estimate'] }}"><div class="service-top"><div class="service-name">{{ $item['name'] }}</div><span class="service-toggle"></span></div><div class="service-meta"><span>Harga</span><span class="service-value">{{ $item['price'] }}</span><span>Estimasi</span><span class="service-estimate">{{ $item['estimate'] }}</span></div><button type="button" class="edit-btn" data-edit-service><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 1 1.4 0l1.6 1.6a1 1 0 0 1 0 1.4l-8.9 8.9-4 1 1-4 8.9-8.9Z"/></svg><span>Edit</span></button></article>@endforeach</div></section>@endforeach</div>
<section id="edit-service" class="modal-overlay" aria-label="Edit Layanan"><a href="#" class="modal-backdrop" data-close-modal></a><div class="modal-card"><div class="modal-header"><h2 class="modal-title">Edit Layanan</h2></div><div class="modal-body"><form class="modal-form" id="edit-service-form"><div class="modal-field"><label class="modal-label">Kategori <span class="required">*</span></label><input class="modal-input" id="service-section-input" type="text"></div><div class="modal-field"><label class="modal-label">Nama Layanan <span class="required">*</span></label><input class="modal-input" id="service-name-input" type="text"></div><div class="modal-field"><label class="modal-label">Harga <span class="required">*</span></label><input class="modal-input" id="service-price-input" type="text"></div><div class="modal-field"><label class="modal-label">Estimasi <span class="required">*</span></label><input class="modal-input" id="service-estimate-input" type="text"></div><div class="modal-actions"><a href="#" class="modal-btn cancel" data-close-modal>Batal</a><button type="submit" class="modal-btn save">Simpan Perubahan</button></div></form></div></div></section>
<section id="add-service" class="modal-overlay" aria-label="Tambah Layanan"><a href="#" class="modal-backdrop"></a><div class="modal-card"><div class="modal-header"><h2 class="modal-title">Tambah Layanan</h2></div><div class="modal-body"><form class="modal-form" action="#" method="post"><div class="modal-field"><label class="modal-label">Nama Layanan <span class="required">*</span></label><input class="modal-input" type="text"></div><div class="modal-field"><label class="modal-label">Kategori <span class="required">*</span></label><input class="modal-input" type="text"></div><div class="modal-field"><label class="modal-label">Harga (Rp) <span class="required">*</span></label><input class="modal-input" type="text"></div><div class="modal-field"><label class="modal-label">Estimasi (hari) <span class="required">*</span></label><input class="modal-input" type="text"></div><div class="modal-actions"><a href="#" class="modal-btn cancel">Batal</a><button type="submit" class="modal-btn save">Simpan</button></div></form></div></div></section>
@endsection

@push('scripts')
<script>
    (() => {
        const editModal = document.getElementById('edit-service');
        const editForm = document.getElementById('edit-service-form');
        const sectionInput = document.getElementById('service-section-input');
        const nameInput = document.getElementById('service-name-input');
        const priceInput = document.getElementById('service-price-input');
        const estimateInput = document.getElementById('service-estimate-input');
        let activeCard = null;

        if (!editModal || !editForm || !sectionInput || !nameInput || !priceInput || !estimateInput) {
            return;
        }

        const openModal = () => {
            editModal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        };

        const closeModal = () => {
            editModal.classList.remove('is-open');
            document.body.style.overflow = '';
            activeCard = null;
        };

        document.querySelectorAll('[data-edit-service]').forEach((button) => {
            button.addEventListener('click', () => {
                const card = button.closest('.service-card');
                if (!card) {
                    return;
                }

                activeCard = card;
                sectionInput.value = card.dataset.section || '';
                nameInput.value = card.dataset.name || '';
                priceInput.value = card.dataset.price || '';
                estimateInput.value = card.dataset.estimate || '';
                openModal();
            });
        });

        document.querySelectorAll('[data-close-modal]').forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        editForm.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!activeCard) {
                closeModal();
                return;
            }

            activeCard.dataset.section = sectionInput.value.trim();
            activeCard.dataset.name = nameInput.value.trim();
            activeCard.dataset.price = priceInput.value.trim();
            activeCard.dataset.estimate = estimateInput.value.trim();

            const serviceName = activeCard.querySelector('.service-name');
            const serviceValue = activeCard.querySelector('.service-value');
            const serviceEstimate = activeCard.querySelector('.service-estimate');
            const serviceSection = activeCard.closest('.service-section')?.querySelector('.section-header span');

            if (serviceName) {
                serviceName.textContent = activeCard.dataset.name;
            }

            if (serviceValue) {
                serviceValue.textContent = activeCard.dataset.price;
            }

            if (serviceEstimate) {
                serviceEstimate.textContent = activeCard.dataset.estimate;
            }

            if (serviceSection && activeCard.dataset.section) {
                serviceSection.textContent = activeCard.dataset.section;
            }

            closeModal();
        });

        window.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && editModal.classList.contains('is-open')) {
                closeModal();
            }
        });
    })();
</script>
@endpush
