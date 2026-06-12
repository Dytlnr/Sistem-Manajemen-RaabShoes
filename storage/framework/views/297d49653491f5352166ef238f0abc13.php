<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot Password | Raab Shoes</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800" rel="stylesheet" />
        <style>
            *{box-sizing:border-box}body{margin:0;min-height:100vh;font-family:'Poppins',sans-serif;background:linear-gradient(90deg,#f57c00 0 48%,#fff 48% 100%);color:#101014}.auth-shell{min-height:100vh;display:grid;place-items:center;padding:30px;position:relative;overflow:hidden}.auth-shell::before{content:'';position:absolute;inset:0 0 0 48%;background:linear-gradient(90deg,rgba(255,255,255,.92),rgba(255,255,255,.2)),url('<?php echo e(asset('images/login-shoe-cleaning-bg.png')); ?>') center/cover no-repeat}.card{position:relative;z-index:1;width:min(100%,720px);padding:54px 58px;border-radius:34px;background:rgba(255,255,255,.96);box-shadow:0 24px 70px rgba(46,33,14,.18)}.back{display:inline-flex;align-items:center;gap:8px;margin-bottom:22px;color:#c26a00;font-weight:600}.eyebrow{margin:0 0 8px;color:#65656b}.title{margin:0 0 22px;font-size:clamp(2.35rem,5vw,3.55rem);line-height:1;font-weight:800;letter-spacing:-.04em}.text{margin:0 0 28px;color:#696a72;line-height:1.6}.flash{margin:0 0 18px;padding:14px 18px;border-radius:16px;background:#fff2e5;border:1px solid #ffd1a3;color:#8a4d10;font-weight:600}.flash.error{background:#fff0ee;border-color:#ffc9c0;color:#a33b2e}.field{display:grid;gap:10px;margin-bottom:22px}.field label{font-weight:700}.field input{height:62px;padding:0 18px;border:2px solid #f57c00;border-radius:18px;outline:none;font:inherit;background:#fff}.error-text{margin-top:-10px;margin-bottom:16px;color:#b42318;font-size:.9rem}.submit{width:100%;height:62px;border:0;border-radius:18px;background:linear-gradient(180deg,#ff8c0d,#f57c00);color:#fff;font-size:1rem;font-weight:800;cursor:pointer;box-shadow:0 14px 28px rgba(245,124,0,.22)}@media(max-width:760px){body{background:#f57c00}.auth-shell{padding:18px}.auth-shell::before{display:none}.card{padding:34px 24px;border-radius:26px}}
        </style>
    </head>
    <body>
        <main class="auth-shell">
            <section class="card">
                <a href="<?php echo e(route('login')); ?>" class="back">Kembali ke Login</a>
                <p class="eyebrow">Reset akses akun</p>
                <h1 class="title">Forgot Password</h1>
                <p class="text">Masukkan email atau username akun. Setelah ditemukan, Anda bisa langsung membuat password baru.</p>
                <?php if(session('success')): ?><div class="flash"><?php echo e(session('success')); ?></div><?php endif; ?>
                <?php if(session('error')): ?><div class="flash error"><?php echo e(session('error')); ?></div><?php endif; ?>
                <form action="<?php echo e(route('password.email')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="field">
                        <label for="identity">Email atau Username</label>
                        <input id="identity" name="identity" type="text" value="<?php echo e(old('identity')); ?>" placeholder="admin@raabshoes.com atau admin" autofocus>
                    </div>
                    <?php $__errorArgs = ['identity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-text"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <button type="submit" class="submit">Lanjut Reset Password</button>
                </form>
            </section>
        </main>
    </body>
</html>
<?php /**PATH /Users/user/Downloads/raabshoes/manajement-raabshoes/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>