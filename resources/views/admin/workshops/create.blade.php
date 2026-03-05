<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างกิจกรรมใหม่</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900 font-sans">
    <div class="max-w-3xl mx-auto px-6 py-12 lg:py-16">
        
        <!-- Header -->
        <div class="mb-10 flex items-center justify-between">
            <div>
                <a href="{{ route('workshops.index') }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors mb-2 group">
                    <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    ยกเลิกและกลับหน้าหลัก
                </a>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">เพิ่มกิจกรรมใหม่</h1>
            </div>
            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-[2rem] flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-10 md:p-16">
                <form id="create-workshop-form" action="{{ route('workshops.store') }}" method="POST" class="space-y-10">
                    @csrf
                    
                    <!-- Title Section -->
                    <div class="space-y-3">
                        <label for="title" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            ชื่อหัวข้อกิจกรรม
                        </label>
                        <input type="text" name="title" id="title" required 
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all placeholder:text-slate-300 font-bold text-lg" 
                            placeholder="เช่น พื้นฐานการเขียนโปรแกรมด้วย Python 🐍">
                    </div>

                    <!-- Speaker & Location Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label for="speaker" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                วิทยากร
                            </label>
                            <input type="text" name="speaker" id="speaker" required 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all placeholder:text-slate-300 font-bold" 
                                placeholder="ชื่อ-นามสกุล">
                        </div>
                        <div class="space-y-3">
                            <label for="location" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                สถานที่จัด
                            </label>
                            <input type="text" name="location" id="location" required 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all placeholder:text-slate-300 font-bold" 
                                placeholder="ห้องเรียน, อาคาร">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-3">
                        <label for="description" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                            รายละเอียด
                        </label>
                        <textarea name="description" id="description" rows="5" 
                            class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all resize-none placeholder:text-slate-300 font-semibold" 
                            placeholder="กิจกรรมนี้เกี่ยวกับอะไร? บอกข้อมูลสั้นๆ เพื่อให้นักศึกษาสนใจ..."></textarea>
                    </div>

                    <!-- Capacity & Schedule Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label for="capacity" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                จำนวนที่นั่งทั้งหมด
                            </label>
                            <input type="number" name="capacity" id="capacity" required min="1" 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all placeholder:text-slate-300 font-bold" 
                                placeholder="เช่น 20">
                        </div>
                        <div class="space-y-3">
                            <label for="scheduled_at" class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                วันที่และเวลาที่จัด
                            </label>
                            <input type="datetime-local" name="scheduled_at" id="scheduled_at" required 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all font-bold">
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 pt-10 pb-4 border-t border-slate-100 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="confirmSave()" class="flex-grow py-6 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-[2rem] transition-all shadow-xl shadow-indigo-100 hover:shadow-indigo-200 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            สร้างกิจกรรมทันที
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <p class="mt-10 text-center text-slate-400 text-[10px] font-black uppercase tracking-[0.3em]">Workshop Management System v2.0</p>
    </div>
    <script>
        function confirmSave() {
            Swal.fire({
                title: 'ยืนยันการสร้างกิจกรรม?',
                text: "คุณต้องการประกาศรายชื่อกิจกรรมนี้ใหม่ใช่หรือไม่?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'สร้างกิจกรรม',
                cancelButtonText: 'ย้อนกลับ',
                customClass: {
                    popup: 'rounded-[3rem] border-none shadow-2xl',
                    confirmButton: 'rounded-2xl px-8 py-4 font-bold',
                    cancelButton: 'rounded-2xl px-8 py-4 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('create-workshop-form').submit();
                }
            })
        }
    </script>
</body>
</html>
