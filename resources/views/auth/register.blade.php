<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - Senior-to-Junior Workshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        .animate-shake { animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-6">
    <div class="max-w-[640px] w-full">
        <!-- Main Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-10 md:p-14 text-center">
            <h1 class="text-4xl font-black text-slate-900 tracking-tight italic mb-2">Senior-to-Junior</h1>
            <p class="text-slate-500 text-xs uppercase tracking-[0.2em] font-bold mb-10">สร้างบัญชีผู้ใช้งานใหม่</p>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-8">
                @csrf
                
                @if ($errors->any())
                    <div class="p-6 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-xs font-bold animate-shake">
                        <ul class="space-y-1 opacity-90 text-left">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                    <div class="space-y-2">
                        <label for="name" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}"
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all font-bold text-slate-700 placeholder:text-slate-200" 
                            placeholder="เช่น นายใจดี มีสุข">
                    </div>

                    <div class="space-y-2">
                        <label for="student_id" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">รหัสนักศึกษา</label>
                        <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}"
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all font-bold text-slate-700 placeholder:text-slate-200" 
                            placeholder="เช่น 6xxxxxxxx-x">
                    </div>
                </div>

                <div class="space-y-2 text-left">
                    <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">อีเมล</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all font-bold text-slate-700 placeholder:text-slate-200" 
                        placeholder="yourname@domain.com">
                </div>

                <div class="space-y-2 text-left">
                    <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" required 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-slate-100 focus:border-slate-400 focus:bg-white outline-none transition-all font-bold text-slate-700 placeholder:text-slate-200" 
                        placeholder="อย่างน้อย 8 ตัวอักษร">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-100 active:scale-[0.98] uppercase tracking-widest">
                        ยืนยันการสมัครสมาชิก
                    </button>
                    <p class="mt-8 text-center text-slate-400 font-bold text-[10px] uppercase tracking-[0.2em]">
                        มีบัญชีผู้ใช้งานอยู่แล้ว? 
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline transition-colors ml-2">ย้อนกลับไปล็อกอิน</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="mt-12 text-center flex flex-col gap-4">
            <a href="/" class="inline-flex items-center justify-center text-slate-400 hover:text-slate-600 font-bold text-xs uppercase tracking-widest transition-all gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                กลับไปที่หน้าหลัก
            </a>
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">Senior to Junior Platform</p>
        </div>
    </div>
</body>
</html>
