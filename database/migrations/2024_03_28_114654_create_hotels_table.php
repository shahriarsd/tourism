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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('address');
            $table->string('singlebedprice');
            $table->string('couplebedprice');
            $table->string('sharebedprice');
            $table->string('singlebedseat');
            $table->string('couplebedseat');
            $table->string('sharebedseat');
            $table->string('image')->nullable();
            $table->string('number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
