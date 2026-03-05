<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้เข้าร่วม - {{ $workshop->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900 font-sans">
    <div class="max-w-7xl mx-auto px-6 py-12 lg:py-16">
        
        <!-- Header Section -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <a href="{{ route('workshops.index') }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors mb-4 group">
                    <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    กลับไปที่แผงควบคุม
                </a>
                <h1 class="text-4xl font-black text-slate-900 mb-2">{{ $workshop->title }}</h1>
                <div class="flex items-center gap-4 text-slate-400 text-sm font-semibold">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        ผู้ลงทะเบียน {{ $workshop->registrations->count() }} / {{ $workshop->capacity }} คน
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $workshop->location }}
                    </span>
                </div>
            </div>
            
                <a href="{{ route('workshops.export', $workshop) }}" class="flex items-center gap-2 px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-emerald-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    ส่งออก CSV
                </a>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 text-emerald-600 rounded-2xl text-sm font-bold border border-emerald-100 flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Participants Table -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">ข้อมูลนักศึกษา</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hidden md:table-cell">รหัสนักศึกษา</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hidden lg:table-cell">อีเมล</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">วันที่ลงทะเบียน</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($workshop->registrations as $registration)
                            <tr class="hover:bg-slate-50 transition-colors group">
                                <td class="px-8 py-7">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 font-black mr-4 mb-0.5">
                                            {{ mb_substr($registration->user->name ?? '?', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-black text-slate-900 leading-none mb-1 group-hover:text-indigo-600 transition-colors">{{ $registration->user->name ?? 'Unknown User' }}</p>
                                            <p class="text-xs font-semibold text-slate-400 md:hidden">{{ $registration->user->student_id ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-7 hidden md:table-cell">
                                    <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-lg border border-slate-200">
                                        {{ $registration->user->student_id ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-8 py-7 text-slate-400 text-sm font-medium hidden lg:table-cell">
                                    {{ $registration->user->email ?? '-' }}
                                </td>
                                <td class="px-8 py-7">
                                    <p class="text-sm font-bold text-slate-500">{{ $registration->created_at->format('d M Y') }}</p>
                                    <p class="text-[10px] font-bold text-slate-300 uppercase tracking-wider">{{ $registration->created_at->format('H:i') }} น.</p>
                                </td>
                                <td class="px-8 py-7 text-right">
                                    <form id="cancel-form-{{ $registration->id }}" action="{{ route('registrations.destroy', $registration) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmCancel('{{ $registration->id }}', '{{ $registration->user->name ?? 'นักศึกษา' }}')" class="p-2.5 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-xl transition-all" title="ยกเลิกการลงทะเบียน">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-24 text-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center mx-auto mb-4 text-slate-200">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">ยังไม่มีผู้ลงทะเบียนในกิจกรรมนี้</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmCancel(id, name) {
            Swal.fire({
                title: 'ยกเลิกการลงทะเบียน?',
                text: `คุณแน่ใจหรือไม่ว่าต้องการยกเลิกการลงทะเบียนของ "${name}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'ใช่, ยกเลิกเลย!',
                cancelButtonText: 'ปิด',
                customClass: {
                    popup: 'rounded-[2rem] border-none shadow-2xl',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancel-form-' + id).submit();
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
        .swal2-popup { font-family: 'Outfit', sans-serif !important; }
    </style>
</body>
</html>
