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
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-6">
    <div class="max-w-md w-full">
        <!-- Logo/Header Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-[2.5rem] shadow-2xl mb-6 transform -rotate-6 hover:rotate-0 transition-transform duration-500">
                <span class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-fuchsia-600">S2J</span>
            </div>
            <h1 class="text-5xl font-black text-white italic tracking-tighter mb-3 drop-shadow-lg">Senior-to-Junior</h1>
            <p class="text-white/80 font-bold text-lg tracking-wide">เข้าสู่ระบบเพื่อเริ่มการเดินทาง</p>
        </div>

        <!-- Login Card -->
        <div class="glass-panel rounded-[3.5rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.2)] p-10 md:p-14 relative overflow-hidden group">
            <!-- Decorative circle -->
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-fuchsia-500/10 rounded-full blur-3xl group-hover:bg-fuchsia-500/20 transition-colors duration-700"></div>

            <form action="{{ route('login.post') }}" method="POST" class="relative z-10 space-y-7">
                @csrf
                
                @if(session('error'))
                    <div class="p-6 bg-rose-50/80 border border-rose-100 text-rose-600 rounded-3xl text-sm font-bold animate-shake flex items-center gap-3">
                        <svg class="w-5 h-5 font-black flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <div class="space-y-2">
                    <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">อีเมลผู้ใช้งาน</label>
                    <div class="relative group/input">
                        <input type="email" name="email" id="email" required 
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                            placeholder="your@email.com">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within/input:text-indigo-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between ml-2">
                        <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">รหัสผ่าน</label>
                    </div>
                    <div class="relative group/input">
                        <input type="password" name="password" id="password" required 
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300" 
                            placeholder="••••••••">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within/input:text-indigo-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="group/btn relative w-full h-[72px] bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-3xl transition-all shadow-2xl shadow-indigo-200 hover:shadow-indigo-300 transform hover:-translate-y-1 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center gap-3 text-lg lowercase tracking-tighter">
                            เข้าสู่ระบบ
                            <svg class="w-6 h-6 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-fuchsia-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                    </button>
                    <p class="mt-8 text-center text-slate-400 font-bold text-sm">
                        พึ่งเคยมาครั้งแรก? 
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-fuchsia-600 transition-colors ml-1 decoration-2 underline-offset-4 hover:underline">สมัครสมาชิกที่นี่</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center flex flex-col items-center gap-6">
            <a href="/" class="text-white/60 hover:text-white font-bold text-sm transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                กลับไปที่หน้าหลัก
            </a>
            <p class="text-[10px] font-black text-white/40 uppercase tracking-[0.5em]">Senior to Junior • Workshop Platform</p>
        </div>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        .animate-shake { animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both; }
    </style>
</body>
</html>
