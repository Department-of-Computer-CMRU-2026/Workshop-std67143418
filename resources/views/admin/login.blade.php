<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบแอดมิน - Senior-to-Junior</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-[#f8f9fa] min-h-screen flex items-center justify-center p-6">
    <div class="max-w-[440px] w-full">
        <!-- Logo/Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-[2rem] text-white shadow-xl shadow-indigo-100 mb-6 transform rotate-12">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black text-slate-900 italic tracking-tight mb-2">Admin Portal</h1>
            <p class="text-slate-400 font-medium">จัดการเวิร์กชอปของคุณ</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-[3rem] shadow-sm border border-slate-100 p-10 md:p-12 relative overflow-hidden group">
            <!-- Decorative Accent -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition-transform duration-700"></div>

            <form action="{{ route('admin.login.post') }}" method="POST" class="relative z-10 space-y-7">
                @csrf
                
                @if(session('error'))
                    <div class="p-4 bg-rose-50 border border-rose-100 text-rose-600 rounded-2xl text-xs font-bold animate-shake">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="space-y-2">
                    <label for="username" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Username</label>
                    <div class="relative">
                        <input type="text" name="username" id="username" required autocomplete="off"
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition-all text-slate-900 font-bold placeholder:text-slate-300" 
                            placeholder="ระบุชื่อผู้ใช้งาน">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required 
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition-all text-slate-900 font-bold placeholder:text-slate-300" 
                            placeholder="ระบุรหัสผ่าน">
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-100 hover:shadow-indigo-200 transform hover:-translate-y-1 active:scale-[0.98] flex items-center justify-center gap-3">
                        เข้าสู่ระบบแอดมิน
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 text-center flex flex-col gap-4">
            <a href="/" class="text-slate-400 hover:text-indigo-600 font-bold text-sm transition-colors tracking-wide">← กลับไปที่หน้าหลัก</a>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">Workshop Management System</p>
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
