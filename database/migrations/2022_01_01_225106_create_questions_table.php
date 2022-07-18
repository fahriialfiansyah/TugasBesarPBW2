<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('questions')){
            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->char('questioncategory', 5);
                $table->longText('question');
                $table->longText('answera');
                $table->longText('answerb');
                $table->longText('answerc');
                $table->longText('answerd');
                $table->char('correct', 3);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
