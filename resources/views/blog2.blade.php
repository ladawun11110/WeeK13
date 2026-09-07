@extends('layouts.app')

@section('title', 'จัดการระบบบทความ - Admin')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                    <span>แผงควบคุม</span>
                    <span>/</span>
                    <span class="text-indigo-600 font-semibold">การจัดการบทความ</span>
                </div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">ระบบจัดการบทความ</h1>
                <p class="text-slate-500 text-sm mt-1">ตรวจสอบ เผยแพร่ แก้ไข และควบคุมสถานะบทความทั้งหมดในระบบ</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('blog') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 rounded-xl shadow-sm transition">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    มุมมองผู้อ่าน
                </a>
                <a href="{{ route('create') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] rounded-xl shadow-lg shadow-indigo-500/25 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    เขียนบทความใหม่
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200/80 overflow-hidden">
            @if(count($blogs) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200/80 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-20">ลำดับ</th>
                                <th class="py-4 px-6 min-w-[240px]">หัวข้อบทความ</th>
                                <th class="py-4 px-6 min-w-[320px]">เนื้อหาโดยสังเขป</th>
                                <th class="py-4 px-6 text-center">สถานะ</th>
                                <th class="py-4 px-6 text-center w-40">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @foreach ($blogs as $item)
                                <tr class="hover:bg-indigo-50/20 transition duration-150">
                                    <td class="py-4 px-6 text-center font-bold text-slate-400">
                                        #{{ $item->id }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900">
                                            {{ $item->title }}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-slate-500">
                                        <span class="line-clamp-2 leading-relaxed">{{ Str::limit($item->content, 90) }}</span>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        @if ($item->status)
                                            <a href="{{ route('change', $item->id) }}" 
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 transition shadow-xs"
                                               title="คลิกเพื่อสลับเป็นแบบร่าง">
                                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                                เผยแพร่แล้ว
                                            </a>
                                        @else
                                            <a href="{{ route('change', $item->id) }}" 
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition shadow-xs"
                                               title="คลิกเพื่อสลับเป็นเผยแพร่">
                                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                ฉบับร่าง
                                            </a>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <a href="{{ route('edit', $item->id) }}" 
                                               class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200/80 rounded-lg hover:bg-indigo-100 transition shadow-xs"
                                               title="แก้ไขบทความ">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                แก้ไข
                                            </a>
                                            <a href="{{ route('delete', $item->id) }}" 
                                               class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-rose-700 bg-rose-50 border border-rose-200/80 rounded-lg hover:bg-rose-100 transition shadow-xs"
                                               title="ลบบทความ"
                                               onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบบทความนี้?')">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                ลบ
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                    {{ $blogs->links() }}
                </div>
            @else
                <!-- Empty State Card -->
                <div class="p-16 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-1">ยังไม่มีบทความในระบบ</h3>
                    <p class="text-sm text-slate-500 mb-6">เริ่มต้นสร้างและแบ่งปันบทความแรกของคุณในระบบ</p>
                    <a href="{{ route('create') }}" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        สร้างบทความใหม่
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection