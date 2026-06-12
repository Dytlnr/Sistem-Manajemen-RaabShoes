<?php $__env->startSection('page-title', 'Pengaturan Sistem'); ?>
<?php $__env->startSection('page-subtitle', 'Konfigurasi dan kelola seluruh pengaturan sistem (admin only)'); ?>
<?php $__env->startSection('active-menu', 'settings'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.settings-card{background:rgba(255,255,255,.98);border-radius:34px;box-shadow:var(--shadow);overflow:hidden}.tabs{display:flex;align-items:center;justify-content:space-between;gap:24px;padding:24px 34px 22px;border-bottom:2px solid var(--orange)}.tabs-left{display:flex;align-items:center;gap:34px;flex-wrap:wrap}.tab{display:inline-flex;align-items:center;gap:12px;font-size:.98rem;font-weight:700;color:#7f7f84}.tab svg{width:28px;height:28px}.tab.active{color:var(--orange)}.add-user-btn{min-width:290px;height:72px;padding:0 28px;border:0;border-radius:30px;background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:1rem;font-weight:700;box-shadow:0 12px 24px rgba(245,124,0,.22);cursor:pointer}.settings-body{padding:30px 34px 34px}.flash-message{margin:0 0 18px;padding:14px 18px;border-radius:18px;background:#fff4e7;border:1px solid rgba(245,124,0,.28);color:#8a4d10;font-size:.94rem}.flash-message.error{background:#fff1ef;border-color:rgba(214,102,92,.28);color:#a54a3c}.section-title{margin:0 0 16px;font-size:1rem;font-weight:700}.user-list{display:flex;flex-direction:column;gap:28px}.user-card{min-height:142px;padding:28px 34px;background:#fff;border-radius:28px;box-shadow:var(--shadow);display:flex;align-items:center;justify-content:space-between;gap:24px}.user-name{font-size:.98rem;font-weight:700;margin-bottom:4px}.user-meta{font-size:.96rem;line-height:1.6}.role-badge{min-width:144px;height:62px;padding:0 28px;border-radius:28px;display:inline-flex;align-items:center;justify-content:center;font-size:.98rem;font-weight:700;box-shadow:0 10px 20px rgba(65,44,18,.1)}.role-badge.admin{background:#ffd29d}.role-badge.staff{background:#0a5b8d;color:#fff}.info-box{margin-top:28px;padding:26px 32px;border-radius:30px;background:#ffd29d}.info-title{margin:0 0 10px;font-size:.98rem;font-weight:700}.info-list{margin:0;padding-left:24px;line-height:1.65;font-size:.96rem}.modal-backdrop{position:fixed;inset:0;background:rgba(17,20,26,.44);display:none;align-items:center;justify-content:center;padding:24px;z-index:70}.modal-backdrop.is-open{display:flex}.modal-card{width:min(100%,680px);padding:28px;border-radius:30px;background:var(--panel);box-shadow:var(--shadow);border:1px solid var(--notif-border)}.modal-header{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;margin-bottom:22px}.modal-title{margin:0;font-size:1.35rem;font-weight:700}.modal-subtitle{margin:8px 0 0;color:var(--muted);font-size:.95rem}.modal-close{width:46px;height:46px;border:0;border-radius:14px;background:#fff3e2;color:var(--orange);display:inline-flex;align-items:center;justify-content:center;cursor:pointer}.modal-close svg{width:22px;height:22px}.modal-form{display:grid;gap:18px}.field-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.field{display:flex;flex-direction:column;gap:8px}.field label{font-size:.95rem;font-weight:600}.field input{height:58px;padding:0 16px;border:2px solid var(--orange);border-radius:16px;outline:none;background:#fff;font-size:.95rem}.field input::placeholder{color:#ababaf}.field.full{grid-column:1 / -1}.helper-text{margin:0;color:var(--muted);font-size:.84rem}.error-list{margin:0;padding:14px 18px 14px 34px;border-radius:18px;background:#fff1ef;border:1px solid rgba(214,102,92,.28);color:#a54a3c;font-size:.9rem}.modal-actions{display:flex;justify-content:flex-end;gap:12px;margin-top:4px}.modal-btn{min-width:150px;height:52px;padding:0 18px;border-radius:16px;border:2px solid transparent;font-size:.94rem;font-weight:700;cursor:pointer}.modal-btn.cancel{background:transparent;color:var(--text);border-color:rgba(245,124,0,.28)}.modal-btn.submit{background:linear-gradient(180deg,#ff8c0d 0%,#f57c00 100%);color:#fff}@media(max-width:980px){.tabs{flex-direction:column;align-items:flex-start}.user-card{flex-direction:column;align-items:flex-start}.add-user-btn{width:100%;min-width:0}}@media(max-width:700px){.tabs-left{flex-direction:column;align-items:flex-start;gap:16px}.settings-body{padding-left:20px;padding-right:20px}.role-badge{min-width:0;width:100%}.field-grid{grid-template-columns:1fr}.modal-actions{flex-direction:column-reverse}.modal-btn{width:100%}}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php ($users = $users ?? []); ?>
<section class="settings-card">
    <div class="tabs">
        <div class="tabs-left">
            <a href="<?php echo e(route('settings.index')); ?>" class="tab active"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm8 1a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM4 20a5 5 0 0 1 10 0H4Zm9.5 0a4.5 4.5 0 0 1 8.5 0h-8.5Z"/></svg><span>Manajemen Akun Pegawai</span></a>
            <a href="<?php echo e(route('settings.password')); ?>" class="tab"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 9h-1V7a4 4 0 0 0-8 0v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2Zm-6 6.7V17a1 1 0 1 0 2 0v-1.3a2 2 0 1 0-2 0ZM10 9V7a2 2 0 1 1 4 0v2h-4Z"/></svg><span>Ganti Password</span></a>
        </div>
        <button type="button" class="add-user-btn" id="open-add-user">+ Tambah Akun</button>
    </div>

    <div class="settings-body">
        <?php if(session('success')): ?>
            <div class="flash-message"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="flash-message error"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h2 class="section-title">Daftar Pengguna</h2>
        <div class="user-list">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="user-card">
                    <div>
                        <div class="user-name"><?php echo e($user['name']); ?></div>
                        <div class="user-meta">
                            <?php echo e($user['email']); ?><br>
                            Username: <?php echo e($user['username'] ?: '-'); ?><br>
                            No. HP: <?php echo e($user['phone'] ?: '-'); ?>

                        </div>
                    </div>
                    <span class="role-badge <?php echo e(($user['role'] ?? 'pegawai') === 'admin' ? 'admin' : 'staff'); ?>">
                        <?php echo e(($user['role'] ?? 'pegawai') === 'admin' ? 'Admin' : 'Pegawai'); ?>

                    </span>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="info-box">
            <h3 class="info-title">Informasi</h3>
            <ul class="info-list">
                <li>Admin memiliki akses penuh ke semua fitur.</li>
                <li>Pegawai hanya dapat login jika akunnya sudah dibuat oleh admin.</li>
                <li>Halaman daftar umum dinonaktifkan agar akun tidak bisa dibuat sembarang orang.</li>
                <li>Akun admin default pertama: `admin@raabshoes.com` / `admin12345` bila belum ada akun admin di sistem.</li>
            </ul>
        </div>
    </div>
</section>

<div class="modal-backdrop <?php echo e($errors->any() ? 'is-open' : ''); ?>" id="add-user-modal" aria-hidden="<?php echo e($errors->any() ? 'false' : 'true'); ?>">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="add-user-title">
        <div class="modal-header">
            <div>
                <h2 class="modal-title" id="add-user-title">Tambah Akun Pegawai</h2>
                <p class="modal-subtitle">Hanya akun yang dibuat admin di sini yang bisa dipakai login ke sistem.</p>
            </div>
            <button type="button" class="modal-close" id="close-add-user" aria-label="Tutup form tambah akun">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12"/><path d="M18 6 6 18"/></svg>
            </button>
        </div>

        <?php if($errors->any()): ?>
            <ul class="error-list">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <form method="post" action="<?php echo e(route('settings.users.store')); ?>" class="modal-form">
            <?php echo csrf_field(); ?>
            <div class="field-grid">
                <div class="field">
                    <label for="staff-name">Nama Pegawai</label>
                    <input id="staff-name" name="name" type="text" value="<?php echo e(old('name')); ?>" placeholder="Contoh: Pegawai 2">
                </div>
                <div class="field">
                    <label for="staff-username">Username</label>
                    <input id="staff-username" name="username" type="text" value="<?php echo e(old('username')); ?>" placeholder="contoh: pegawai2">
                    <p class="helper-text">Spasi akan otomatis diubah, misalnya `Dyata Lintar` menjadi `dyata-lintar`.</p>
                </div>
                <div class="field">
                    <label for="staff-email">Email</label>
                    <input id="staff-email" name="email" type="email" value="<?php echo e(old('email')); ?>" placeholder="pegawai@raabshoes.com">
                </div>
                <div class="field">
                    <label for="staff-phone">Nomor HP</label>
                    <input id="staff-phone" name="phone" type="text" value="<?php echo e(old('phone')); ?>" placeholder="08xxxxxxxxxx">
                </div>
                <div class="field">
                    <label for="staff-password">Password</label>
                    <input id="staff-password" name="password" type="password" placeholder="Minimal 8 karakter">
                </div>
                <div class="field">
                    <label for="staff-password-confirmation">Konfirmasi Password</label>
                    <input id="staff-password-confirmation" name="password_confirmation" type="password" placeholder="Ulangi password">
                </div>
            </div>
            <p class="helper-text">Role akun ini otomatis `Pegawai`.</p>
            <div class="modal-actions">
                <button type="button" class="modal-btn cancel" id="cancel-add-user">Batal</button>
                <button type="submit" class="modal-btn submit">Simpan Akun</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    (function () {
        const modal = document.getElementById('add-user-modal');
        const openBtn = document.getElementById('open-add-user');
        const closeBtn = document.getElementById('close-add-user');
        const cancelBtn = document.getElementById('cancel-add-user');

        if (!modal) {
            return;
        }

        const setOpen = (open) => {
            modal.classList.toggle('is-open', open);
            modal.setAttribute('aria-hidden', String(!open));
            document.body.style.overflow = open ? 'hidden' : '';
        };

        if (openBtn) {
            openBtn.addEventListener('click', () => setOpen(true));
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => setOpen(false));
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', () => setOpen(false));
        }

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                setOpen(false);
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                setOpen(false);
            }
        });
    }());
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/user/Downloads/raabshoes/manajement-raabshoes/resources/views/settings/index.blade.php ENDPATH**/ ?>