<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบแอดมิน - Senior-to-Junior</title>
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
        <h1 class="text-3xl font-black text-white italic tracking-tight">Admin Portal</h1>
        <p class="text-white/70 text-xs font-bold uppercase tracking-[0.3em] mt-1">ระบบจัดการเวิร์กชอป</p>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-[440px] bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2.5rem] p-10 md:p-14 shadow-2xl">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-white/10 border border-white/20 rounded-2xl text-white mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <p class="text-white text-lg font-black">เข้าสู่ระบบแอดมิน</p>
            <p class="text-white text-xs mt-1">สำหรับผู้ดูแลระบบเท่านั้น</p>
        </div>

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            @if(session('error'))
                <div class="p-4 bg-rose-500/20 text-rose-200 rounded-2xl text-xs font-bold border border-rose-500/30">
                    {{ session('error') }}
                </div>
            @endif

            <div class="space-y-1.5">
                <label for="username" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">Username</label>
                <input type="text" name="username" id="username" required autocomplete="off"
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="ระบุชื่อผู้ใช้งาน">
            </div>

            <div class="space-y-1.5">
                <label for="password" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="ระบุรหัสผ่าน">
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full py-5 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-900/50 active:scale-[0.98] uppercase tracking-widest flex items-center justify-center gap-3">
                    ยืนยันการเข้าสู่ระบบ
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Footer links -->
    <div class="mt-8 text-center flex flex-col gap-3">
        <a href="/" class="inline-flex items-center justify-center text-white/70 hover:text-white font-bold text-xs uppercase tracking-widest transition-all gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            กลับไปที่หน้าหลัก
        </a>
        <p class="text-white/40 text-[10px] font-black uppercase tracking-[0.4em]">Administrative Access Only</p>
    </div>

</body>
</html>
