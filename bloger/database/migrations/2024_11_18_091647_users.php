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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Otomatik artan birincil anahtar
            $table->string('name'); // Kullanıcı adı için metin sütunu
            $table->string('email')->unique(); // E-posta için benzersiz sütun  
            $table->string('password'); // Şifre sütunu
            $table->boolean('is_admin')->default(false);
            $table->timestamps(); // created_at ve updated_at sütunları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
