<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostManageInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_manage_info', function (Blueprint $table) {
            $table->id();
            $table->string('post_manage_id',36);
            $table->string('post_id',36);
            $table->string('post_user_id',36);
            $table->string('approval_status')->nullable();
            $table->string('approve_comment');
            $table->string('reject_comment');
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
        Schema::dropIfExists('post_manage_info');
    }
}
