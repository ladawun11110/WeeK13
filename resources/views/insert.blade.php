@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เขียนบทความใหม่ - Admin Dashboard</title>
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

    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">เขียนบทความใหม่</h1>
                <p class="text-slate-500 mt-1">แบ่งปันเรื่องราวหรือข้อมูลใหม่ของคุณลงในระบบบล็อก</p>
            </div>
            <a href="{{ route('blog2') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm hover:bg-slate-50 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                ย้อนกลับ
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden p-8">
            <form action="{{ route('insert') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">หัวข้อบทความ</label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150 ease-in-out text-slate-950 font-medium"
                        placeholder="กรอกหัวข้อบทความที่น่าสนใจของคุณ...">
                </div>

                <!-- Content Input -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-slate-700 mb-2">เนื้อหาบทความ</label>
                    <textarea id="content" name="content" rows="8" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150 ease-in-out text-slate-950"
                        placeholder="เขียนคำบรรยายหรือรายละเอียดของบทความที่นี่..."></textarea>
                </div>

                <!-- Status Input -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">สถานะบทความ</label>
                    <div class="relative">
                        <select id="status" name="status"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-150 ease-in-out text-slate-950 font-medium">
                            <option value="1">เผยแพร่ทันที (Published)</option>
                            <option value="0">บันทึกเป็นฉบับร่าง (Draft)</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('blog2') }}" 
                       class="px-5 py-2.5 text-sm font-semibold text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition duration-150 ease-in-out">
                        ยกเลิก
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition duration-150 ease-in-out">
                        บันทึกบทความ
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
@endsection
</html>