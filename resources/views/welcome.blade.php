<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel CRM') }} - Chào mừng</title>

    <link rel="shortcut icon" type="image/x-icon" href="/vendor/laravel-crm/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/vendor/laravel-crm/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/vendor/laravel-crm/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/vendor/laravel-crm/favicon-16x16.png">
    <link rel="manifest" href="/vendor/laravel-crm/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: '#05b3a9', // teal 600
                        primaryHover: '#05b3a9', // teal 700
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 antialiased min-h-screen flex flex-col selection:bg-teal-100 selection:text-teal-900 relative overflow-hidden">

    <div class="absolute top-0 left-0 w-full h-[50vh] bg-gradient-to-b from-teal-50 to-transparent -z-10"></div>
    <div class="absolute top-[-10%] right-[-5%] w-[40vw] h-[40vw] bg-teal-500/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-[-10%] left-[-5%] w-[30vw] h-[30vw] bg-blue-500/5 rounded-full blur-3xl -z-10"></div>

    <header class="w-full max-w-6xl mx-auto px-6 py-6 sm:py-8 flex items-center justify-between z-10 relative">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-teal-600 rounded-xl flex items-center justify-center shadow-md shadow-teal-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <span class="text-xl font-bold text-slate-800 tracking-tight">{{ config('app.name', 'Laravel CRM') }}</span>
        </div>

        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-teal-600 transition-colors">
                        Bảng điều khiển
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-block text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors">
                        Đăng nhập
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-primary hover:bg-primaryHover rounded-xl shadow-md shadow-teal-200 transition-all active:scale-[0.98]">
                            Tạo Không gian
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="flex-grow flex items-center justify-center px-6 py-12 z-10 relative">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">

            <div class="text-center lg:text-left space-y-8">
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-teal-50 border border-teal-100 text-teal-700 text-xs font-semibold tracking-wide uppercase">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                        </span>
                        Sẵn sàng cho doanh nghiệp
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Quản lý khách hàng <br class="hidden sm:block">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-blue-500">thông minh hơn</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Nền tảng CRM toàn diện giúp bạn tối ưu hóa quy trình bán hàng, tương tác khách hàng và quản lý đội ngũ hiệu quả trong một không gian duy nhất.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 text-base font-semibold text-white bg-primary hover:bg-primaryHover rounded-xl shadow-lg shadow-teal-200 transition-all active:scale-[0.98]">
                            Bắt đầu miễn phí
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @endif
                    <a href="https://laravel.com/docs" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 text-base font-semibold text-slate-700 bg-white border border-slate-200 hover:border-teal-300 hover:bg-teal-50 rounded-xl transition-all">
                        Xem Tài liệu
                    </a>
                </div>

                <ul class="pt-6 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-4 text-left max-w-2xl mx-auto lg:mx-0">
                    <li class="flex items-center gap-3 text-slate-700">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium text-sm">Quản lý Multi-tenant</span>
                    </li>
                    <li class="flex items-center gap-3 text-slate-700">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium text-sm">Bảo mật dữ liệu cao</span>
                    </li>
                    <li class="flex items-center gap-3 text-slate-700">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium text-sm">Giao diện hiện đại</span>
                    </li>
                    <li class="flex items-center gap-3 text-slate-700">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="font-medium text-sm">Laravel Engine</span>
                    </li>
                </ul>
            </div>

            <div class="relative hidden lg:block">
                <div class="relative bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 p-6 overflow-hidden transform transition-transform hover:-translate-y-2 duration-500">
                    <div class="flex items-center gap-2 mb-6 border-b border-slate-100 pb-4">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>
                        <div class="ml-4 h-6 w-1/2 bg-slate-100 rounded-md"></div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="h-24 w-1/3 bg-teal-50 rounded-2xl border border-teal-100/50 p-4 flex flex-col justify-between">
                                <div class="w-8 h-8 rounded-full bg-teal-100 mb-2"></div>
                                <div class="h-2 w-1/2 bg-teal-200 rounded-full"></div>
                                <div class="h-2 w-3/4 bg-teal-200 rounded-full mt-2"></div>
                            </div>
                            <div class="h-24 w-1/3 bg-emerald-50 rounded-2xl border border-emerald-100/50 p-4 flex flex-col justify-between">
                                <div class="w-8 h-8 rounded-full bg-emerald-100 mb-2"></div>
                                <div class="h-2 w-1/2 bg-emerald-200 rounded-full"></div>
                                <div class="h-2 w-3/4 bg-emerald-200 rounded-full mt-2"></div>
                            </div>
                            <div class="h-24 w-1/3 bg-amber-50 rounded-2xl border border-amber-100/50 p-4 flex flex-col justify-between">
                                <div class="w-8 h-8 rounded-full bg-amber-100 mb-2"></div>
                                <div class="h-2 w-1/2 bg-amber-200 rounded-full"></div>
                                <div class="h-2 w-3/4 bg-amber-200 rounded-full mt-2"></div>
                            </div>
                        </div>

                        <div class="h-48 w-full bg-slate-50 rounded-2xl border border-slate-100 p-4 flex items-end gap-2">
                            <div class="w-full bg-teal-200 rounded-t-sm h-[40%]"></div>
                            <div class="w-full bg-teal-300 rounded-t-sm h-[60%]"></div>
                            <div class="w-full bg-teal-400 rounded-t-sm h-[30%]"></div>
                            <div class="w-full bg-teal-500 rounded-t-sm h-[80%]"></div>
                            <div class="w-full bg-teal-400 rounded-t-sm h-[50%]"></div>
                            <div class="w-full bg-teal-600 rounded-t-sm h-[90%]"></div>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Tăng trưởng</p>
                        <p class="text-lg font-bold text-slate-800">+245%</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="w-full max-w-6xl mx-auto px-6 py-8 border-t border-slate-200 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between z-10 relative">
        <p class="text-sm text-slate-500 font-medium">
            Laravel v{{ app()->version() }} (PHP v{{ PHP_VERSION }})
        </p>
        <p class="text-sm text-slate-500 mt-2 sm:mt-0">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel CRM') }}. All rights reserved.
        </p>
    </footer>

</body>
</html>
