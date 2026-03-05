<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - Senior-to-Junior Workshop</title>
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
            <p class="text-slate-500">สร้างบัญชีผู้ใช้งานใหม่</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-10">
            <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                @csrf
                @if ($errors->any())
                    <div class="p-4 bg-rose-50 text-rose-600 rounded-2xl text-sm font-medium border border-rose-100">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">ชื่อ-นามสกุล</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="เช่น นายใจดี มีสุข">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">อีเมล</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="yourname@domain.com">
                </div>

                <div>
                    <label for="student_id" class="block text-sm font-semibold text-slate-700 mb-1">รหัสนักศึกษา</label>
                    <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="เช่น 6xxxxxxxx-x">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" required 
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-300" 
                        placeholder="อย่างน้อย 8 ตัวอักษร">
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-indigo-200 hover:shadow-indigo-300 transform hover:-translate-y-0.5">
                        สร้างบัญชี
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <p class="text-slate-500 text-sm">มีบัญชีผู้ใช้งานอยู่แล้ว? 
                    <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors">เข้าสู่ระบบ</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
