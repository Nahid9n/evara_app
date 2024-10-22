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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_type');
            $table->string('coupon_code')->unique();
            $table->double('discount',10,2);
            $table->boolean('discount_status');
            $table->string('date_range');
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('user_id');
            $table->integer('min_shopping')->nullable();
            $table->integer('max_discount_amount')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
