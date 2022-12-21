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
            $table->string('tf_heading1')->nullable();
            $table->string('tf_heading2')->nullable();
            $table->string('tf_heading3')->nullable();
            $table->text('tf_description1')->nullable();
            $table->text('tf_description2')->nullable();
            $table->text('tf_description3')->nullable();
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
            $table->dropColumn('tf_heading1');
            $table->dropColumn('tf_heading2');
            $table->dropColumn('tf_heading3');
            $table->dropColumn('tf_description1');
            $table->dropColumn('tf_description2');
            $table->dropColumn('tf_description3');
        });
    }
};
