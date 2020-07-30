<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lender_id")->constrained("users", "id")->onDelete('restrict');
            $table->foreignId('borrower_id')->constrained("users", "id")->onDelete('restrict');
            $table->dateTime('borrowed_at');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->float('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
