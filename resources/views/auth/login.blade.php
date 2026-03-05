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
            background-color: #f8fafc;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-50 p-6">
    <div class="max-w-[440px] w-full">
        <!-- Main Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-10 md:p-12 text-center">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight italic mb-2">Senior-to-Junior</h1>
            <p class="text-slate-500 text-sm mb-8">เข้าสู่ระบบเพื่อลงทะเบียนกิจกรรม</p>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                
                @if(session('error'))
                    <div class="p-4 bg-red-50 text-red-600 rounded-2xl text-xs font-bold border border-red-100 flex items-center gap-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="space-y-2 text-left">
                    <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">อีเมล</label>
                    <input type="email" name="email" id="email" required 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all text-slate-700 font-bold" 
                        placeholder="your@email.com">
                </div>

                <div class="space-y-2 text-left">
                    <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all text-slate-700 font-bold" 
                        placeholder="••••••••">
                </div>

                <div class="flex items-center px-1">
                    <label class="inline-flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                        <span class="ml-2 text-[10px] font-bold uppercase tracking-widest text-slate-500">จดจำฉันไว้</span>
                    </label>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-100 active:scale-[0.98] uppercase tracking-widest">
                        ยืนยันการเข้าสู่ระบบ
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-100">
                <p class="text-slate-500 text-xs font-medium">
                    ยังไม่มีบัญชีผู้ใช้งาน? 
                    <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline transition-colors ml-1">สมัครสมาชิกได้เลย</a>
                </p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="inline-flex items-center text-slate-400 hover:text-slate-600 font-bold text-xs uppercase tracking-widest transition-all gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                กลับไปที่หน้าหลัก
            </a>
        </div>
    </div>
</body>
</html>
