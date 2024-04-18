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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->integer('customer_id')->nullable();
            $table->float('sub_total');
            // $table->float('coupon')->nullable();
            $table->float('total_amount');
            $table->integer('quantity');
            $table->enum('payment_method',['cod','paypal'])->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('status',['new','process','cancel'])->default('new');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
