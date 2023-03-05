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
        Schema::create('pay_tenant', function (Blueprint $table) {
            $table->foreignId('pay_id');
            $table->foreignId('tenant_id');
            $table->timestamps();
            $table->primary(['pay_id', 'tenant_id']);
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_tenant');
    }
};
