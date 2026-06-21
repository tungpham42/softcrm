<?php

use App\Http\Controllers\RegisterTenantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
// Multi-tenant SaaS Registration Routes
Route::get('/register', [RegisterTenantController::class, 'create'])->name('register');
Route::post('/register', [RegisterTenantController::class, 'store']);

Route::match(['get', 'post'], '/reset-password/{token}', function (Request $request, $token) {
    // Nếu là POST: Xử lý lưu mật khẩu
    if ($request->isMethod('post')) {
        // Logic đổi mật khẩu thực tế
        return redirect('/login')->with('status', 'Đã đổi mật khẩu thành công!');
    }

    // Nếu là GET (Click từ email): Hiển thị form
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->query('email')
    ]);
})->name('password.reset');
