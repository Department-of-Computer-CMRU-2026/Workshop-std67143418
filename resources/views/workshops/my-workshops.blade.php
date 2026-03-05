<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมของฉัน - Senior-to-Junior</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; }
        .hero-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 35%, #312e81 60%, #1e3a5f 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <!-- Navigation -->
    <nav class="hero-bg px-6 py-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-black text-white italic tracking-tight">Senior-to-Junior</a>
            
            <div class="flex items-center gap-6">
                @auth
                    <span class="text-white/80 text-[10px] font-black uppercase tracking-widest">สวัสดี, {{ Auth::user()->name }}</span>
                    <a href="{{ route('workshops.my') }}" class="text-white hover:text-indigo-300 transition-colors font-bold text-xs uppercase tracking-widest">กิจกรรมของฉัน</a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" class="inline">
                        @csrf
                        <button type="button" onclick="confirmLogout(event)" class="px-5 py-2 text-white/70 hover:text-white transition-colors font-bold text-xs uppercase tracking-widest">ออกจากระบบ</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-indigo-300 transition-colors font-bold text-xs uppercase tracking-widest">เข้าสู่ระบบ</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-indigo-500 hover:bg-indigo-400 text-white rounded-full transition-all shadow-lg shadow-indigo-900/50 font-black text-xs uppercase tracking-widest">สมัครสมาชิก</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="hero-bg pt-20 pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <a href="{{ route('home') }}" class="inline-flex items-center text-xs font-bold text-indigo-300 hover:text-white transition-colors mb-4 group">
                        <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        กลับไปที่หน้าหลัก
                    </a>
                    <p class="text-white/60 font-black text-[10px] uppercase tracking-[0.4em] mb-4">Student Dashboard</p>
                    <h1 class="text-4xl font-black text-white tracking-tight">กิจกรรมของ {{ Auth::user()->name }}</h1>
                    <p class="text-white/70 text-sm mt-2 font-medium">รวมกิจกรรมย่อยที่คุณลงทะเบียนเข้าร่วมไว้ทั้งหมด</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl px-6 py-4 flex items-center gap-4">
                    <div class="p-3 bg-indigo-500 rounded-xl text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-white/50 text-[10px] font-bold uppercase tracking-widest">สถานะการลงทะเบียน</p>
                        <p class="text-white text-lg font-black">{{ $registrations->count() }} / 3 กิจกรรม</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 -mt-16 pb-20">
        @if(session('success'))
            <script>
                Swal.fire({ icon: 'success', title: 'สำเร็จ!', text: "{{ session('success') }}", confirmButtonColor: '#6366f1' });
            </script>
        @endif

        @if($registrations->isEmpty())
            <div class="bg-white rounded-[2rem] p-16 text-center shadow-xl border border-slate-200">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 rounded-2xl text-slate-300 mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800">คุณยังไม่ได้ลงทะเบียนกิจกรรมใดๆ</h2>
                <p class="text-slate-500 mt-2 mb-8">ออกไปค้นหาเวิร์กชอปที่น่าสนใจและเริ่มต้นการเรียนรู้กันเลย!</p>
                <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-4 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl transition-all shadow-lg shadow-indigo-200 uppercase tracking-widest text-xs">ไปที่หน้ากิจกรรม</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($registrations as $reg)
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl border border-slate-100 hover:shadow-2xl transition-all group flex flex-col h-full">
                        <div class="p-8 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-full font-black text-[10px] uppercase tracking-widest">
                                    {{ $reg->workshop->speaker }}
                                </span>
                                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                                    {{ \Carbon\Carbon::parse($reg->workshop->date)->format('d M Y') }}
                                </span>
                            </div>

                            <h3 class="text-xl font-black text-slate-800 mb-2 group-hover:text-indigo-600 transition-colors">
                                {{ $reg->workshop->title }}
                            </h3>
                            
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                                {{ $reg->workshop->description }}
                            </p>

                            <div class="mt-auto space-y-4 text-slate-400">
                                <form action="{{ route('registrations.destroy', $reg->id) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmCancel(this.form)" class="w-full py-4 border-2 border-slate-100 hover:border-rose-100 hover:bg-rose-50 hover:text-rose-600 text-slate-400 font-black rounded-2xl transition-all uppercase tracking-widest text-[10px]">
                                        ยกเลิกการลงทะเบียน
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        function confirmLogout(event) {
            Swal.fire({
                title: 'ยืนยันการออกจากระบบ?',
                text: "คุณต้องการออกจากระบบหรือไม่",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#312e81',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true,
                borderRadius: '1.5rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }

        function confirmCancel(form) {
            Swal.fire({
                title: 'ยืนยันการยกเลิก?',
                text: "คุณต้องการยกเลิกการลงทะเบียนในกิจกรรมนี้ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true,
                borderRadius: '1.5rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
</body>
</html>
