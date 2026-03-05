<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior-to-Junior Workshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#f8f9fa] text-slate-800 min-h-screen font-sans flex flex-col justify-between">
    <nav class="bg-white border-b border-slate-100 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-black text-indigo-600 italic tracking-tight hover:text-indigo-700 transition-colors">Senior-to-Junior</a>
            <div class="flex items-center space-x-4 text-sm font-semibold">
                @auth
                    <span class="text-slate-500 mr-2">สวัสดี, {{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="button" onclick="confirmLogout(event)" class="px-5 py-2 text-slate-600 hover:text-slate-900 transition-colors">ออกจากระบบ</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-slate-900 transition-colors">เข้าสู่ระบบ</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-full transition-all shadow-sm hover:bg-indigo-700">สมัครสมาชิก</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-6 py-16 w-full">
        <header class="text-center mb-16 px-4">
            <h1 class="text-slate-400 text-lg md:text-xl font-bold max-w-3xl mx-auto leading-relaxed">
                เรียนรู้นอกห้องเรียนผ่านเวิร์กชอปที่ออกแบบมาเพื่อคุณโดยเฉพาะ จำกัดที่นั่งเพื่อให้ดูแลได้อย่างทั่วถึง
            </h1>
        </header>

        @if(Auth::check())
            <div class="mb-8 p-4 bg-indigo-50 border-indigo-100 text-indigo-700 rounded-2xl shadow-sm border max-w-2xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider opacity-60">สถานะการลงทะเบียนของคุณ</p>
                        <p class="font-black text-lg">ลงทะเบียนแล้ว {{ count($userRegistrations) }} / 3 กิจกรรม</p>
                    </div>
                </div>
                @if(count($userRegistrations) >= 3)
                    <span class="px-4 py-1.5 bg-rose-100 text-rose-600 text-[10px] font-black rounded-full uppercase tracking-widest animate-pulse">เต็มโควตาแล้ว</span>
                @else
                    <span class="px-4 py-1.5 bg-emerald-100 text-emerald-600 text-[10px] font-black rounded-full uppercase tracking-widest">ว่าง {{ 3 - count($userRegistrations) }} สิทธิ์</span>
                @endif
            </div>
        @endif

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border-emerald-200 text-emerald-800 rounded-lg shadow-sm border max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-8 p-4 bg-rose-50 border-rose-200 text-rose-800 rounded-lg shadow-sm border max-w-2xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            @forelse($workshops as $workshop)
                <div class="bg-white rounded-[2rem] shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col border border-slate-200 group">
                    <div class="p-8 pb-4 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                            <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full tracking-wide">เวิร์กชอป</span>
                            <span class="text-slate-400 text-xs font-bold">{{ $workshop->scheduled_at->format('d Mar Y') }}</span>
                        </div>
                        
                        <h2 class="text-2xl font-black text-slate-900 mb-3 leading-tight">{{ $workshop->title }}</h2>
                        <p class="text-slate-400 text-sm leading-relaxed mb-8 flex-grow">{{ $workshop->description }}</p>
                        
                        <div class="flex items-center text-slate-700 mb-6">
                            <div class="w-8 h-8 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mr-3 text-slate-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="font-semibold text-sm">{{ $workshop->speaker }}</span>
                        </div>

                        <div class="mt-auto pt-2 mb-4">
                            @php
                                $remaining = max(0, $workshop->capacity - $workshop->registrations_count);
                                $isFull = $remaining <= 0;
                            @endphp
                            <div class="border {{ $isFull ? 'border-rose-100 bg-rose-50/30' : 'border-slate-200' }} rounded-2xl p-4 flex items-center justify-between">
                                <div>
                                    <p class="text-slate-400 text-[10px] font-bold tracking-wide">ที่นั่งว่าง</p>
                                    <p class="font-black {{ $isFull ? 'text-rose-500' : 'text-slate-900' }} text-lg">
                                        {{ $remaining }} / {{ $workshop->capacity }}
                                    </p>
                                </div>
                                <div class="w-16 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                     <div class="h-full {{ $isFull ? 'bg-rose-500' : 'bg-indigo-500' }} transition-all duration-500" style="width: {{ ($workshop->registrations_count / $workshop->capacity) * 100 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $isAlreadyRegistered = in_array($workshop->id, $userRegistrations);
                        $isLimitReached = Auth::check() && count($userRegistrations) >= 3 && !$isAlreadyRegistered;
                    @endphp

                    @if($isFull)
                        <button disabled class="w-full py-5 bg-rose-50 text-rose-300 font-black cursor-not-allowed uppercase tracking-widest border border-rose-100">
                            เต็มแล้ว (Closed)
                        </button>
                    @elseif($isAlreadyRegistered)
                        <div class="w-full py-5 bg-emerald-50 text-emerald-600 font-black text-center flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            ลงทะเบียนแล้ว
                        </div>
                    @elseif($isLimitReached)
                        <button disabled class="w-full py-5 bg-rose-50 text-rose-400 font-bold cursor-not-allowed" title="จำกัดสูงสุด 3 กิจกรรม">
                            ลงทะเบียนครบถ้วนแล้ว (3/3)
                        </button>
                    @else
                        <a href="{{ route('workshops.register', $workshop) }}" class="block w-full text-center py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition-all group-hover:bg-indigo-800">
                            ลงทะเบียนตอนนี้
                        </a>
                    @endif
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 text-lg font-medium">ยังไม่มีเวิร์กชอปที่เปิดรับสมัครในขณะนี้</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="text-center py-8 text-slate-400 text-sm">
        <p class="mb-2">&copy; 2026 Senior-to-Junior Workshop. สงวนลิขสิทธิ์ทั้งหมด</p>
        <a href="{{ route('workshops.index') }}" class="hover:text-indigo-600 transition-colors font-medium">เข้าสู่ระบบแอดมิน</a>
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
                borderRadius: '1.5rem',
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
