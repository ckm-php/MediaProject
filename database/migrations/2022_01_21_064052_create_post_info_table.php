<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_info', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',36);
            $table->string('post_id',36);
            $table->string('post_manage_id',36);
            $table->string('post_title');
            $table->string('post_description');
            $table->string('post_imge');            
            $table->string('post_status')->nullable();
            $table->string('post_date');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('post_info');
    }
}
