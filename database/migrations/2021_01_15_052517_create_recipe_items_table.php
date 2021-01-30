<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id")->nullable;
            $table->unsignedBigInteger("recipe_id")->nullable;
            $table->unsignedBigInteger("vendor_id")->nullable;
            $table->unsignedBigInteger("vendor_item_id")->nullable;
            $table->unsignedBigInteger("measure_unit_id")->nullable;
            $table->string("recipe_item_vendor_name")->nullable;
            $table->string("recipe_item_name")->nullable;
            $table->string("recipe_item_code",100)->nullable;
            $table->float("recipe_item_portion",8,2)->nullable;
            $table->float("recipe_item_yield",8,2)->nullable;
            $table->float("recipe_item_cost",8,2)->nullable;
            $table->char("recipe_item_type",10)->nullable;
            $table->tinyInteger("is_deleted")->default(0);
            $table->tinyInteger("is_active")->default(0);
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
        Schema::dropIfExists('recipe_items');
    }
}
