<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน - {{ $workshop->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-indigo-600 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Back Link -->
        <div class="mb-6 text-center">
            <a href="/" class="inline-flex items-center text-sm font-bold text-white/70 hover:text-white transition-colors group">
                <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                กลับไปที่หน้าหลัก
            </a>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-white/20">
            <div class="p-10 md:p-12">
                <div class="text-center mb-10">
                    <div class="w-20 h-20 bg-indigo-600 rounded-[2rem] flex items-center justify-center text-white mx-auto mb-6 shadow-xl shadow-indigo-100 ring-8 ring-indigo-50">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">ยืนยันการลงทะเบียน</h1>
                    <p class="text-indigo-600 font-bold text-sm tracking-wide bg-indigo-50 inline-block px-4 py-1.5 rounded-full">{{ $workshop->title }}</p>
                </div>

                <!-- Registration Info -->
                <div class="space-y-4 mb-10">
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">นักศึกษา</span>
                        <span class="text-slate-900 font-bold">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">รหัสประจำตัว</span>
                        <span class="text-slate-900 font-bold tracking-wider">{{ Auth::user()->student_id }}</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-indigo-50/50 rounded-2xl border border-indigo-100">
                        <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest">โควตาคงเหลือ</span>
                        <span class="text-indigo-600 font-black">{{ 3 - Auth::user()->registrations()->count() }} / 3 กิจกรรม</span>
                    </div>
                </div>

                <!-- Action Form -->
                <form action="{{ route('workshops.register.store', $workshop) }}" method="POST">
                    @csrf
                    
                    <div class="relative mb-8 text-center px-4">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-slate-100"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-3 bg-white text-[10px] font-black text-slate-300 uppercase tracking-widest italic">โปรดตรวจสอบข้อมูล</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-[1.5rem] transition-all shadow-xl shadow-indigo-100 hover:shadow-indigo-200 transform hover:-translate-y-1 active:scale-[0.98]">
                        ยืนยันและลงทะเบียน
                    </button>
                    
                    <p class="mt-6 text-center text-[10px] text-slate-300 font-bold uppercase tracking-widest leading-relaxed">
                        จัดโดย <span class="text-slate-400">{{ $workshop->speaker }}</span> • {{ $workshop->scheduled_at->format('d M Y') }}
                    </p>
                </form>
            </div>
        </div>
        
        <p class="mt-10 text-center text-white/30 text-[10px] font-black uppercase tracking-[0.3em]">Workshop Management v2.0</p>
    </div>
</body>
</html>
