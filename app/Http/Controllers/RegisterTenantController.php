<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use VentureDrake\LaravelCrm\Models\Organization;

class RegisterTenantController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name' => ['required', 'string', 'max:255'],
        ]);

        // 2. Tạo User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'crm_access' => 1,
        ]);

        // 3. Tạo Organization
        $organization = Organization::create([
            'name' => $request->company_name,
        ]);

        // 4. Liên kết User và Organization
        $user->organizations()->attach($organization->id, ['role' => 'owner']);
        $user->setActiveOrganization($organization);

        // ==========================================
        // BƯỚC QUAN TRỌNG ĐỂ FIX LỖI 403
        // ==========================================
        // Báo cho Spatie biết chúng ta đang cấp quyền trong phạm vi Organization nào
        if (config('permission.teams')) {
            setPermissionsTeamId($organization->id);
        }

        // Gán Role (Lưu ý: Mặc định của Laravel CRM là chữ 'Owner' viết hoa chữ O)
        $user->assignRole('Manager');

        // Xóa cache để Spatie nhận diện quyền mới ngay lập tức trong cùng 1 vòng đời request
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // ==========================================

        // 5. Kích hoạt sự kiện và Đăng nhập
        event(new \Illuminate\Auth\Events\Registered($user));
        auth()->login($user);

        // 6. Chuyển hướng tới Dashboard
        return redirect(route('laravel-crm.dashboard'));
    }
}
