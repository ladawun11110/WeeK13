<div class="max-w-4xl mx-auto py-8 px-4">
    <!-- Hero Greeting Card -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-700 to-purple-800 rounded-3xl p-8 sm:p-10 text-white shadow-2xl shadow-indigo-500/20 mb-8">
        <!-- Background decorative glow -->
        <div class="absolute -right-12 -top-12 w-64 h-64 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
        <div class="absolute right-1/4 -bottom-16 w-56 h-56 rounded-full bg-purple-500/20 blur-xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-white/15 backdrop-blur-md text-indigo-100 border border-white/20 mb-4">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                ยินดีต้อนรับสู่ระบบ
            </div>
            
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight leading-tight mb-3">
                สวัสดีคุณ {{ Auth::user()->name }} 👋
            </h1>
            
            <p class="text-indigo-100/90 text-sm sm:text-base leading-relaxed mb-6 font-normal">
                ยินดีต้อนรับสู่แพลตฟอร์มจัดการบล็อกส่วนตัว พร้อมให้คุณสร้างสรรค์เรื่องราว แลกเปลี่ยนมุมมอง และเผยแพร่สาระความรู้ได้อย่างอิสระและง่ายดาย
            </p>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('create') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-indigo-700 hover:bg-indigo-50 font-bold text-sm shadow-md transition-all active:scale-[0.98]">
                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    เขียนบทความใหม่
                </a>
                <a href="{{ route('blog') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-sm border border-white/20 backdrop-blur-sm transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    เปิดดูบทความทั้งหมด
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Features Highlight -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-800 text-sm">เขียนบทความง่าย</h4>
                <p class="text-xs text-slate-500 mt-0.5">เครื่องมือบันทึกและปรับแต่งบทความที่สะดวกและรวดเร็ว</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-800 text-sm">ควบคุมการเผยแพร่</h4>
                <p class="text-xs text-slate-500 mt-0.5">สลับสถานะเป็นฉบับร่าง หรือเปิดให้อ่านได้ในคลิกเดียว</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-800 text-sm">การจัดการที่ครอบคลุม</h4>
                <p class="text-xs text-slate-500 mt-0.5">แดชบอร์ดหลังบ้านพร้อมตารางรายการและการแบ่งหน้า</p>
            </div>
        </div>
    </div>
</div>