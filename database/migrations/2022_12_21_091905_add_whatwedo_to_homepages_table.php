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
        Schema::table('homepages', function (Blueprint $table) {
            $table->string('ww_main_heading')->nullable();
            $table->string('ww_main_subheading')->nullable();
            $table->text('ww_main_description')->nullable();
            $table->string('ww_heading1')->nullable();
            $table->string('ww_heading2')->nullable();
            $table->string('ww_heading3')->nullable();
            $table->string('ww_heading4')->nullable();
            $table->text('ww_description1')->nullable();
            $table->text('ww_description2')->nullable();
            $table->text('ww_description3')->nullable();
            $table->text('ww_description4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homepages', function (Blueprint $table) {
            $table->dropColumn('ww_main_heading');
            $table->dropColumn('ww_main_subheading');
            $table->dropColumn('ww_main_description');
            $table->dropColumn('ww_heading1');
            $table->dropColumn('ww_heading2');
            $table->dropColumn('ww_heading3');
            $table->dropColumn('ww_heading4');
            $table->dropColumn('ww_description1');
            $table->dropColumn('ww_description2');
            $table->dropColumn('ww_description3');
            $table->dropColumn('ww_description4');
        });
    }
};
