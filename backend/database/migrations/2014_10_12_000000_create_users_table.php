<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("email", 100)->unique();
            $table->string("document", 20)->unique();
            $table->text("address");
            $table->string("phone", 20);
            $table->integer("status")->default(1);
            $table->string("password", 100);
            $table->integer("type")->default(0);
            $table->date('created_at')->default(now());
            $table->date('updated_at')->default(now());
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
