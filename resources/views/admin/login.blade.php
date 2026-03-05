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
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-50 p-6">
    <div class="max-w-[440px] w-full">
        <!-- Main Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-10 md:p-14 text-center">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight italic mb-2">Admin Portal</h1>
            <p class="text-slate-500 text-sm mb-8">ระบบจัดการเวิร์กชอป</p>

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-8">
                @csrf
                
                @if(session('error'))
                    <div class="p-4 bg-red-50 text-red-600 rounded-2xl text-xs font-bold border border-red-100 flex items-center gap-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="space-y-2 text-left">
                    <label for="username" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="username" id="username" required autocomplete="off"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all text-slate-900 font-bold placeholder:text-slate-200" 
                        placeholder="ระบุชื่อผู้ใช้งาน">
                </div>

                <div class="space-y-2 text-left">
                    <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password</label>
                    <input type="password" name="password" id="password" required 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all text-slate-900 font-bold placeholder:text-slate-200" 
                        placeholder="ระบุรหัสผ่าน">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-100 active:scale-[0.98] uppercase tracking-widest flex items-center justify-center gap-3">
                        ยืนยันการเข้าสู่ระบบ
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </button>
                </div>
            </form>

        </div>

        <div class="mt-10 text-center flex flex-col gap-4">
            <a href="/" class="text-slate-400 hover:text-indigo-600 font-bold text-xs transition-colors tracking-widest uppercase">← กลับไปที่หน้าหลัก</a>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.4em]">Administrative Access Only</p>
        </div>
    </div>
</body>
</html>
