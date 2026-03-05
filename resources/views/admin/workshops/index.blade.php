<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแอดมิน - จัดการเวิร์กชอป</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900 font-sans">
    <div class="max-w-7xl mx-auto px-6 py-12 lg:py-16 flex flex-col lg:flex-row gap-12 h-screen overflow-hidden">
        
        <!-- Left Sidebar (Sticky) -->
        <div class="lg:w-1/4 flex flex-col h-full overflow-y-auto pr-2 custom-scrollbar">
            <div class="mb-10">
                <h1 class="text-3xl font-black text-slate-900 leading-tight mb-2">จัดการเวิร์กชอป</h1>
                <p class="text-slate-400 font-medium text-sm">ระบบดูแลหลักสูตรจากพี่สู่น้อง</p>
            </div>
            
            <form action="{{ route('workshops.index') }}" method="GET" class="relative mb-8">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="ค้นหาเวิร์กชอป..." 
                    class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all shadow-sm text-sm">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </form>

            <div class="space-y-4 mb-10">
                <a href="{{ route('workshops.create') }}" class="w-full px-6 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-indigo-100 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    เพิ่มกิจกรรมใหม่
                </a>
                
                <div class="grid grid-cols-1 gap-3">
                    <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">ทั้งหมด</p>
                            <h2 class="text-lg font-black">{{ $stats['total_workshops'] }} กิจกรรม</h2>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">ที่นั่งคงเหลือ</p>
                            <h2 class="text-lg font-black text-emerald-600">{{ $stats['total_remaining_seats'] }} ที่</h2>
                        </div>
                    </div>
                     <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-10 h-10 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">เต็มแล้ว</p>
                            <h2 class="text-lg font-black text-rose-600">{{ $stats['full_workshops'] }} กิจกรรม</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto space-y-4 pt-6">
                <a href="/" class="text-slate-400 hover:text-indigo-600 text-sm font-semibold transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    หน้าสำหรับนักศึกษา
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="button" onclick="confirmLogout()" class="w-full px-4 py-3 text-rose-500 hover:bg-rose-50 rounded-xl text-sm font-black transition-all flex items-center gap-2 group">
                        <div class="w-8 h-8 bg-rose-50 rounded-lg flex items-center justify-center group-hover:bg-rose-100 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </div>
                        ออกจากระบบ
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Content (Scrollable List) -->
        <div class="lg:w-3/4 flex flex-col h-full overflow-hidden bg-white rounded-[2.5rem] shadow-sm border border-slate-100">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-white/95 backdrop-blur-md z-10 sticky top-0">
                <h2 class="text-sm font-bold text-slate-400 uppercase tracking-widest">รายการเวิร์กชอป ({{ $workshops->count() }})</h2>
                <div class="flex gap-2">
                     <span class="w-3 h-3 rounded-full bg-emerald-500" title="เปิดอยู่"></span>
                     <span class="w-3 h-3 rounded-full bg-rose-500" title="เต็มแล้ว"></span>
                </div>
            </div>
            
            <div class="overflow-y-auto flex-grow custom-scrollbar">
                @if(session('success'))
                    <div class="mx-8 mt-6 p-4 bg-emerald-50 text-emerald-600 rounded-2xl text-sm font-bold border border-emerald-100">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="p-8 space-y-6">
                    @forelse($workshops as $workshop)
                        <div class="bg-white border border-slate-100 rounded-3xl p-6 hover:border-indigo-100 hover:shadow-lg hover:shadow-indigo-50/50 transition-all duration-300 relative group">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                                <div class="flex-grow">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-xs font-black {{ $workshop->registrations_count >= $workshop->capacity ? 'text-rose-500 bg-rose-50' : 'text-emerald-500 bg-emerald-50' }} px-2 py-0.5 rounded-md">
                                            {{ $workshop->registrations_count }} / {{ $workshop->capacity }} ที่นั่ง
                                        </span>
                                        <span class="text-xs font-bold text-slate-300 text-uppercase tracking-wider">{{ $workshop->scheduled_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="text-xl font-black text-slate-800 mb-2 truncate group-hover:text-indigo-600 transition-colors">{{ $workshop->title }}</h3>
                                    <p class="text-slate-400 text-sm line-clamp-1 leading-relaxed max-w-2xl">{{ $workshop->description }}</p>
                                    
                                    <div class="mt-4 flex items-center gap-4">
                                        <div class="flex items-center gap-1.5 px-3 py-1 bg-slate-50 rounded-full border border-slate-100">
                                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            <span class="text-[10px] font-bold text-slate-500">{{ $workshop->speaker }}</span>
                                        </div>
                                        @if($workshop->location)
                                        <div class="flex items-center gap-1.5 px-3 py-1 bg-slate-50 rounded-full border border-slate-100">
                                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                            <span class="text-[10px] font-bold text-slate-500">{{ $workshop->location }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 md:border-l md:border-slate-100 md:pl-6">
                                    <a href="{{ route('workshops.show', $workshop) }}" class="flex items-center gap-2 px-4 py-2.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 rounded-xl transition-all font-bold text-xs" title="ดูรายชื่อ">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                        รายชื่อ
                                    </a>
                                    <a href="{{ route('workshops.edit', $workshop) }}" class="p-2.5 text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-xl transition-all" title="แก้ไข">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form id="delete-form-{{ $workshop->id }}" action="{{ route('workshops.destroy', $workshop) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('{{ $workshop->id }}', '{{ $workshop->title }}')" class="p-2.5 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-xl transition-all" title="ลบ">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-20 text-center">
                            <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center mx-auto mb-4 text-slate-200">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </div>
                            <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">ยังไม่มีข้อมูลเวิร์กชอป</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id, title) {
            Swal.fire({
                title: 'ยืนยันการลบ?',
                text: `คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรม "${title}"? การกระทำนี้ไม่สามารถย้อนกลับได้`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก',
                customClass: {
                    popup: 'rounded-[2rem] border-none shadow-2xl',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
        function confirmLogout() {
            Swal.fire({
                title: 'ยืนยันการออกจากระบบ?',
                text: "คุณต้องการออกจากเซสชันแอดมินใช่หรือไม่?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                customClass: {
                    popup: 'rounded-[2rem] border-none shadow-2xl',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #e2e8f0; border-radius: 20px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #cbd5e1; }
        .swal2-popup { font-family: 'Outfit', sans-serif !important; }
    </style>
</body>
</html>
