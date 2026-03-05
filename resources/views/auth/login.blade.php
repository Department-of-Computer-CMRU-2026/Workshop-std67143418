<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Senior-to-Junior Workshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-slate-900 mb-2 italic tracking-tight">Senior-to-Junior</h1>
            <p class="text-slate-500">เข้าสู่ระบบเพื่อลงทะเบียนกิจกรรม</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-10">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                @if(session('error'))
                    <div class="p-4 bg-rose-50 text-rose-600 rounded-2xl text-sm font-medium border border-rose-100">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">อีเมล</label>
                    <input type="email" name="email" id="email" required 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="yourname@gmail.com">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold text-slate-700">รหัสผ่าน</label>
                    </div>
                    <input type="password" name="password" id="password" required 
                        class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-indigo-200 hover:shadow-indigo-300 transform hover:-translate-y-0.5">
                        เข้าสู่ระบบ
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-8 border-t border-slate-100 text-center">
                <p class="text-slate-500">ยังไม่มีชื่อผู้ใช้งาน? 
                    <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors">สมัครสมาชิกที่นี่</a>
                </p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="text-slate-400 hover:text-indigo-600 font-medium transition-colors">← กลับไปที่หน้าหลัก</a>
        </div>
    </div>
</body>
</html>
