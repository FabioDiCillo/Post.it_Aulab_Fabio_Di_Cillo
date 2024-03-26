<?php

use App\Models\User;
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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->default(false)->nullable();
            $table->boolean('is_revisor')->after('is_admin')->default(false)->nullable();
            $table->boolean('is_writer')->after('is_revisor')->default(false)->nullable();
        });
        $user=User::create([
            'name' => 'Admin',
            'email' => 'admin@theaulabpost.it',
            'password' => bcrypt('1234567890'),
            'is_admin' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'admin@theaulabpost.it')->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('is_revisor');
            $table->dropColumn('is_writer');
        });
    }
};
