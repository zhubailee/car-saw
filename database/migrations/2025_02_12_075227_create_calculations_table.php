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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAlternative');
            $table->unsignedBigInteger('idCriteria');
            $table->char('value');
            $table->timestamps();

            $table->foreign('idAlternative')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('idCriteria')->references('id')->on('criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
