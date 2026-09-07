@extends('layouts.app')

@section('title', 'แก้ไขบทความ - ' . $blogs->title)

@section('content')
<div class="py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <!-- Breadcrumbs & Back -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ route('blog2') }}" class="hover:text-indigo-600 transition flex items-center gap-1 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    กลับสู่หน้าจัดการ
                </a>
                <span>/</span>
                <span class="text-slate-800 font-semibold">แก้ไขบทความ</span>
            </div>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                รหัสบทความ #{{ $blogs->id }}
            </span>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 overflow-hidden">
            <!-- Card Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">แก้ไขข้อมูลบทความ</h1>
                    <p class="text-sm text-slate-500 mt-1">ปรับปรุงเนื้อหา รายละเอียด หรือสถานะการแสดงผลของบทความนี้</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('update', $blogs->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                <input type="hidden" name="ref" value="{{ url('/author/blog') }}">

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-bold text-slate-700 mb-2">
                        หัวข้อบทความ <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="text" id="title" name="title" value="{{ $blogs->title }}" required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl text-slate-900 font-medium placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition"
                            placeholder="ระบุหัวข้อบทความที่กระชับและน่าสนใจ...">
                    </div>
                </div>

                <!-- Content -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="content" class="block text-sm font-bold text-slate-700">
                            เนื้อหาบทความ <span class="text-rose-500">*</span>
                        </label>
                        <span class="text-xs text-slate-400 font-medium">รองรับข้อความและบรรยายรายละเอียด</span>
                    </div>
                    <div class="relative rounded-xl shadow-sm">
                        <textarea id="content" name="content" rows="10" required
                            class="block w-full p-4 bg-slate-50/50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition leading-relaxed"
                            placeholder="เริ่มเขียนเนื้อหา เล่าเรื่องราว หรือข้อมูลที่คุณต้องการถ่ายทอดที่นี่...">{{ $blogs->content }}</textarea>
                    </div>
                </div>

                <!-- Status Selection -->
                <div>
                    <label for="status" class="block text-sm font-bold text-slate-700 mb-2">สถานะการเผยแพร่</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <label class="relative flex items-center p-3.5 border rounded-xl cursor-pointer transition hover:bg-slate-50 {{ $blogs->status == 1 ? 'border-emerald-300 bg-emerald-50/40 ring-1 ring-emerald-400' : 'border-slate-200 bg-white' }}">
                            <input type="radio" name="status" value="1" {{ $blogs->status == 1 ? 'checked' : '' }} class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-slate-300">
                            <div class="ml-3 flex flex-col">
                                <span class="text-sm font-bold text-slate-900 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    เผยแพร่ทันที (Published)
                                </span>
                                <span class="text-xs text-slate-500 mt-0.5">ทุกคนสามารถเปิดอ่านบทความนี้ได้</span>
                            </div>
                        </label>

                        <label class="relative flex items-center p-3.5 border rounded-xl cursor-pointer transition hover:bg-slate-50 {{ $blogs->status == 0 ? 'border-amber-300 bg-amber-50/40 ring-1 ring-amber-400' : 'border-slate-200 bg-white' }}">
                            <input type="radio" name="status" value="0" {{ $blogs->status == 0 ? 'checked' : '' }} class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-slate-300">
                            <div class="ml-3 flex flex-col">
                                <span class="text-sm font-bold text-slate-900 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                    ฉบับร่าง (Draft)
                                </span>
                                <span class="text-xs text-slate-500 mt-0.5">บันทึกไว้ก่อน ยังไม่แสดงบนหน้าเว็บหลัก</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Action Footer Buttons -->
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                    <a href="{{ route('blog2') }}"
                        class="px-5 py-2.5 text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200/80 rounded-xl transition ease-in-out">
                        ยกเลิก
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] rounded-xl shadow-lg shadow-indigo-500/25 transition ease-in-out">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        บันทึกการแก้ไข
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection