<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('section_elements', function (Blueprint $table) {
            $table->string('extra_heading')->after('button_link')->nullable();
            $table->string('extra_button')->after('button_link')->nullable();
            $table->string('extra_link')->after('button_link')->nullable();
            $table->string('extra_image')->after('button_link')->nullable();
            $table->longText('extra_description')->after('button_link')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_elements', function (Blueprint $table) {
            $table->dropColumn('extra_heading');
            $table->dropColumn('extra_button');
            $table->dropColumn('extra_link');
            $table->dropColumn('extra_image');
            $table->dropColumn('extra_description');

        });
    }
};
