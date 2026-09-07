@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทความทั้งหมด - My Blog</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800">

    <div class="container mx-auto px-4 py-10 max-w-6xl">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">บทความทั้งหมด (Blog Feed)</h1>
                <p class="text-slate-500 mt-1">อ่านบทความ สาระน่ารู้ และเนื้อหาที่น่าสนใจได้ที่นี่</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('blog2') }}" 
                   class="inline-flex items-center px-4 py-2.5 text-sm font-semibold text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm hover:bg-slate-50 transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 3m0-3a2 2 0 110 3m-3.793-3a3 3 0 01-2.17-1.025M15.793 3a3 3 0 012.17-1.025M3 18v-2a4 4 0 014-4h10a4 4 0 014 4v2m-3-10a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    ระบบหลังบ้าน (Admin)
                </a>
                <a href="{{ route('create') }}" 
                   class="inline-flex items-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    เขียนบทความใหม่
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            <th class="py-4 px-6 text-center w-16">ID</th>
                            <th class="py-4 px-6">ชื่อบทความ</th>
                            <th class="py-4 px-6 text-center w-32">สถานะ</th>
                            <th class="py-4 px-6 text-center w-32">แก้ไข</th>
                            <th class="py-4 px-6 text-center w-32">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($blogs as $item)
                            <tr class="hover:bg-slate-50/80 transition duration-150 ease-in-out">
                                <td class="py-4 px-6 text-center text-sm font-semibold text-slate-500">
                                    {{ $item->id }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 text-base">{{ $item->title }}</div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    @if ($item->status)
                                        <a href="{{ route('change', $item->id) }}" 
                                           class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 transition duration-150 ease-in-out"
                                           title="คลิกเพื่อเปลี่ยนเป็นฉบับร่าง">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full"></span>
                                            เผยแพร่แล้ว
                                        </a>
                                    @else
                                        <a href="{{ route('change', $item->id) }}" 
                                           class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition duration-150 ease-in-out"
                                           title="คลิกเพื่อเผยแพร่บทความ">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-amber-500 rounded-full"></span>
                                            ฉบับร่าง
                                        </a>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('edit', $item->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200 rounded-md hover:bg-indigo-100 transition duration-150 ease-in-out">
                                        แก้ไข
                                    </a>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('delete', $item->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-rose-700 bg-rose-50 border border-rose-200 rounded-md hover:bg-rose-100 transition duration-150 ease-in-out"
                                       onclick="return confirm('คุณต้องการลบบทความนี้จริงหรือไม่?')">
                                        ลบ
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 text-sm">
                                    ไม่มีข้อมูลบทความในขณะนี้
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    </div>

</body>
@endsection
</html>
