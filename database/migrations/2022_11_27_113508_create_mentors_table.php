<?php
// 「user」を「administrator」に書き換えていきます。

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTable extends Migration // 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('userid')->unique();
            $table->timestamp('userid_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('image_path')->nullable();
            $table->string('age')->nullable();
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
        Schema::dropIfExists('mentors');
    }
}