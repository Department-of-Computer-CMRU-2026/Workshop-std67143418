<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Senior-to-Junior Workshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 35%, #312e81 60%, #1e3a5f 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6">

    <!-- Brand -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-black text-white italic tracking-tight">Senior-to-Junior</h1>
        <p class="text-white/70 text-xs font-bold uppercase tracking-[0.3em] mt-1">Workshop Platform</p>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-[440px] bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2.5rem] p-10 md:p-12 shadow-2xl">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-white/10 border border-white/20 rounded-2xl text-white mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
            </div>
            <p class="text-white text-lg font-black">เข้าสู่ระบบ</p>
            <p class="text-white text-xs mt-1">เพื่อลงทะเบียนกิจกรรม</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            @if(session('error'))
                <div class="p-4 bg-rose-500/20 text-rose-200 rounded-2xl text-xs font-bold border border-rose-500/30">
                    {{ session('error') }}
                </div>
            @endif

            <div class="space-y-1.5">
                <label for="email" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">อีเมล</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="your@email.com">
            </div>

            <div class="space-y-1.5">
                <label for="password" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">รหัสผ่าน</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center px-1 pt-1">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/30 bg-white/10 text-indigo-500 focus:ring-indigo-400">
                    <span class="ml-2 text-[10px] font-bold uppercase tracking-widest text-white">จดจำฉันไว้</span>
                </label>
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full py-5 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-900/50 active:scale-[0.98] uppercase tracking-widest">
                    ยืนยันการเข้าสู่ระบบ
                </button>
            </div>
        </form>

        <div class="mt-8 pt-7 border-t border-white/10 text-center">
            <p class="text-white text-xs font-medium">
                ยังไม่มีบัญชีผู้ใช้งาน?
                <a href="{{ route('register') }}" class="text-indigo-300 hover:text-white font-bold ml-1 transition-colors">สมัครสมาชิกได้เลย</a>
            </p>
        </div>
    </div>

    <!-- Back link -->
    <div class="mt-8">
        <a href="/" class="inline-flex items-center text-white/70 hover:text-white font-bold text-xs uppercase tracking-widest transition-all gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            กลับไปที่หน้าหลัก
        </a>
    </div>

</body>
</html>
