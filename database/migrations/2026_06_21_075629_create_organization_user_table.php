<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organization_user', function (Blueprint $table) {
            $table->id();

            // Khóa ngoại liên kết với bảng users
            $table->unsignedBigInteger('user_id');

            // Khóa ngoại liên kết với bảng organizations của CRM
            // Lưu ý: Nếu bảng organizations của package có tên khác (ví dụ: crm_organizations),
            // bạn không cần dùng ->constrained() cứng mà chỉ cần cột id là đủ.
            $table->unsignedBigInteger('organization_id');

            // Cột role để phân quyền (owner, admin, user...)
            $table->string('role')->default('user');

            $table->timestamps();

            // Ràng buộc toàn vẹn dữ liệu (Tùy chọn nhưng khuyên dùng)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on(config('laravel-crm.db_table_prefix').'organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_user');
    }
};
