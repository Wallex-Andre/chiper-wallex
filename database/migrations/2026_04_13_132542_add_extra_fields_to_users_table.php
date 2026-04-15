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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('phonenumber', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('street')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->char('state', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'cpf',
                'phonenumber',
                'birth_date',
                'country',
                'zip_code',
                'street',
                'number',
                'complement',
                'neighborhood',
                'city',
                'state',
            ]);
        });
    }
};