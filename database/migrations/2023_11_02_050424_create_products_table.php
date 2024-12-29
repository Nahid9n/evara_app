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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('vendor_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->text('image')->nullable();
            $table->text('back_image')->nullable();
            $table->double('regular_price',11,2);
            $table->double('selling_price',11,2);
            $table->double('app_selling_price',11,2)->nullable();
            $table->integer('stock_amount')->default(0);
            $table->integer('alert_qty')->nullable()->default(0);
            $table->integer('max_order_qty')->nullable()->default(0);
            $table->double('weight')->nullable()->default(0);
            $table->double('mrp',11,2)->nullable()->default(0);
            $table->integer('vat')->nullable()->default(0);
            $table->integer('free_delivery')->nullable()->default(0);
            $table->integer('vat_applicable')->nullable()->default(0);
            $table->integer('stock_visibility')->nullable()->default(0);
            $table->integer('discount_type')->nullable()->default(0);
            $table->double('discount_value',11,2)->nullable()->default(0);
            $table->string('discount_banner')->nullable()->default(0);
            $table->text('video_link')->nullable()->default(0);
            $table->integer('hit_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->text('tags')->nullable();
            $table->tinyInteger('refund')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_author')->nullable();
            $table->text('alt_text')->nullable();
            $table->text('schema_text')->nullable();
            $table->tinyInteger('featured_status')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
