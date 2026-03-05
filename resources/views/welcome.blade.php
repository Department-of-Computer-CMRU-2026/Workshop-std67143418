<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior-to-Junior Workshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .hero-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 35%, #312e81 60%, #1e3a5f 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px -8px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen font-sans flex flex-col">

    <!-- Navbar -->
    <nav class="hero-bg sticky top-0 z-50 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-black text-white italic tracking-tight hover:text-indigo-300 transition-colors">Senior-to-Junior</a>
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

    <!-- Hero Section -->
    <div class="hero-bg py-20 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-white font-black text-[10px] uppercase tracking-[0.4em] mb-6">Senior-to-Junior Workshop Platform</p>
            <h1 class="text-4xl md:text-5xl font-black text-white leading-tight mb-6">
                เรียนรู้นอกห้องเรียน<br>
                <span class="text-indigo-300">ผ่านเวิร์กชอปเฉพาะกิจ</span>
            </h1>
            <p class="text-white text-base leading-relaxed max-w-2xl mx-auto">
                ออกแบบมาเพื่อคุณโดยเฉพาะ จำกัดที่นั่งเพื่อให้ดูแลได้อย่างทั่วถึง
            </p>

            @auth
                <div class="mt-10 inline-flex items-center gap-4 bg-white/10 backdrop-blur border border-white/20 rounded-2xl px-8 py-4">
                    <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-white/50 text-[10px] font-bold uppercase tracking-wider">สถานะการลงทะเบียนของคุณ</p>
                        <div class="flex items-center gap-4">
                            <p class="font-black text-lg text-white whitespace-nowrap">ลงทะเบียนแล้ว {{ count($userRegistrations) }} / 3 กิจกรรม</p>
                            <a href="{{ route('workshops.my') }}" class="text-[10px] font-black uppercase tracking-widest text-indigo-300 hover:text-white transition-all underline decoration-indigo-500/30 underline-offset-4">ดูรายละเอียด</a>
                        </div>
                    </div>
                    @if(count($userRegistrations) >= 3)
                        <span class="px-4 py-1.5 bg-rose-500/20 text-rose-300 text-[10px] font-black rounded-full uppercase tracking-widest border border-rose-500/30">เต็มโควตาแล้ว</span>
                    @else
                        <span class="px-4 py-1.5 bg-emerald-500/20 text-emerald-300 text-[10px] font-black rounded-full uppercase tracking-widest border border-emerald-500/30">ว่าง {{ 3 - count($userRegistrations) }} สิทธิ์</span>
                    @endif
                </div>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-6 py-16 w-full">

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl shadow-sm max-w-2xl mx-auto flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-8 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl shadow-sm max-w-2xl mx-auto flex items-center gap-3">
                <svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-10 flex items-center justify-between">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">เวิร์กชอปทั้งหมด</h2>
            <span class="text-slate-400 text-xs font-bold uppercase tracking-widest">{{ $workshops->count() }} กิจกรรม</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($workshops as $workshop)
                @php
                    $remaining = max(0, $workshop->capacity - $workshop->registrations_count);
                    $isFull = $remaining <= 0;
                    $fillPercent = ($workshop->registrations_count / $workshop->capacity) * 100;
                    $isAlreadyRegistered = in_array($workshop->id, $userRegistrations);
                    $isLimitReached = Auth::check() && count($userRegistrations) >= 3 && !$isAlreadyRegistered;
                @endphp
                <div class="bg-white rounded-[2rem] border border-slate-100 overflow-hidden flex flex-col card-hover shadow-sm">
                    <!-- Card Header -->
                    <div class="p-8 pb-5 flex-grow flex flex-col">
                        <!-- Tags row -->
                        <div class="flex items-center justify-between mb-5">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full tracking-widest uppercase">เวิร์กชอป</span>
                            <span class="text-slate-400 text-xs font-bold">{{ $workshop->scheduled_at->format('d M Y') }}</span>
                        </div>

                        <!-- Title & Description -->
                        <h2 class="text-xl font-black text-slate-900 mb-2 leading-tight">{{ $workshop->title }}</h2>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6 flex-grow">{{ $workshop->description }}</p>

                        <!-- Speaker -->
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-8 h-8 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-400 border border-indigo-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="font-bold text-sm text-slate-700">{{ $workshop->speaker }}</span>
                        </div>

                        <!-- Seats -->
                        <div class="border {{ $isFull ? 'border-rose-100 bg-rose-50/40' : 'border-slate-100 bg-slate-50/60' }} rounded-2xl p-4 flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-[10px] font-black tracking-widest uppercase">ที่นั่งว่าง</p>
                                <p class="font-black {{ $isFull ? 'text-rose-500' : 'text-slate-900' }} text-lg">
                                    {{ $remaining }} / {{ $workshop->capacity }}
                                </p>
                            </div>
                            <div class="w-20 h-2 bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full {{ $isFull ? 'bg-rose-400' : 'bg-indigo-500' }} transition-all duration-700 rounded-full" style="width: {{ $fillPercent }}%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    @if($isFull)
                        <button disabled class="w-full py-5 bg-slate-100 text-slate-400 font-black cursor-not-allowed uppercase tracking-widest text-sm border-t border-slate-100">
                            เต็มแล้ว (CLOSED)
                        </button>
                    @elseif($isAlreadyRegistered)
                        <div class="w-full py-5 bg-emerald-50 text-emerald-600 font-black text-center flex items-center justify-center gap-2 border-t border-emerald-100 text-sm uppercase tracking-widest">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            ลงทะเบียนแล้ว
                        </div>
                    @elseif($isLimitReached)
                        <button disabled class="w-full py-5 bg-slate-100 text-slate-400 font-black cursor-not-allowed uppercase tracking-widest text-sm border-t border-slate-100">
                            ลงทะเบียนครบถ้วนแล้ว (3/3)
                        </button>
                    @else
                        <a href="{{ route('workshops.register', $workshop) }}" class="block w-full text-center py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black transition-all uppercase tracking-widest text-sm">
                            ลงทะเบียนตอนนี้
                        </a>
                    @endif
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <p class="text-slate-400 text-lg font-medium">ยังไม่มีเวิร์กชอปที่เปิดรับสมัครในขณะนี้</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="border-t border-slate-200 py-10 text-slate-400 text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-black text-slate-900 italic text-lg">Senior-to-Junior</p>
            <p class="text-xs">© 2026 Senior-to-Junior Workshop. สงวนลิขสิทธิ์ทั้งหมด</p>
            <a href="{{ route('workshops.index') }}" class="hover:text-indigo-600 transition-colors font-medium text-xs">เข้าสู่ระบบแอดมิน →</a>
        </div>
    </footer>

    <script>
        function confirmLogout(event) {
            Swal.fire({
                title: 'ยืนยันการออกจากระบบ?',
                text: "คุณต้องเข้าสู่ระบบใหม่เพื่อลงทะเบียนกิจกรรม",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#f43f5e',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>
</html>
