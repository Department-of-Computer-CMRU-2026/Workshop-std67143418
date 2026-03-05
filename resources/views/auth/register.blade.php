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
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 35%, #312e81 60%, #1e3a5f 100%);
            min-height: 100vh;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        .animate-shake { animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both; }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center py-12 px-6">

    <!-- Brand -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-black text-white italic tracking-tight">Senior-to-Junior</h1>
        <p class="text-white/70 text-xs font-bold uppercase tracking-[0.3em] mt-1">Workshop Platform</p>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-[640px] bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2.5rem] p-10 md:p-14 shadow-2xl">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-white/10 border border-white/20 rounded-2xl text-white mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <p class="text-white text-lg font-black">สร้างบัญชีใหม่</p>
            <p class="text-white text-xs mt-1">เข้าร่วมแพลตฟอร์มการเรียนรู้</p>
        </div>

        <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="p-5 bg-rose-500/20 border border-rose-500/30 text-rose-200 rounded-2xl text-xs font-bold animate-shake">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1.5">
                    <label for="name" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">ชื่อ-นามสกุล</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                        placeholder="เช่น นายใจดี มีสุข">
                </div>

                <div class="space-y-1.5">
                    <label for="student_id" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">รหัสนักศึกษา</label>
                    <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}"
                        class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                        placeholder="เช่น 6xxxxxxxx-x">
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="email" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">อีเมล</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="yourname@domain.com">
            </div>

            <div class="space-y-1.5">
                <label for="password" class="block text-[10px] font-black text-white uppercase tracking-widest ml-1">รหัสผ่าน</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-2xl focus:ring-4 focus:ring-indigo-400/20 focus:border-indigo-400/60 focus:bg-white/15 outline-none transition-all text-white font-bold placeholder:text-white/25"
                    placeholder="อย่างน้อย 8 ตัวอักษร">
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full py-5 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl transition-all shadow-xl shadow-indigo-900/50 active:scale-[0.98] uppercase tracking-widest">
                    ยืนยันการสมัครสมาชิก
                </button>
            </div>
        </form>

        <div class="mt-8 pt-7 border-t border-white/10 text-center">
            <p class="text-white text-xs font-medium">
                มีบัญชีผู้ใช้งานอยู่แล้ว?
                <a href="{{ route('login') }}" class="text-indigo-300 hover:text-white font-bold ml-1 transition-colors">ย้อนกลับไปล็อกอิน</a>
            </p>
        </div>
    </div>

    <!-- Back link -->
    <div class="mt-8 text-center flex flex-col gap-3">
        <a href="/" class="inline-flex items-center justify-center text-white/70 hover:text-white font-bold text-xs uppercase tracking-widest transition-all gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            กลับไปที่หน้าหลัก
        </a>
        <p class="text-white/40 text-[10px] font-black uppercase tracking-[0.5em]">Senior to Junior Platform</p>
    </div>

</body>
</html>
