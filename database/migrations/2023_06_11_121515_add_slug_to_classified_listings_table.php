<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToClassifiedListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classified_listings', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('twitter_description');
            $table->string('slug', 255)->nullable()->index('slug')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classified_listings', function (Blueprint $table) {
            $table->dropIndex('slug');
            $table->dropColumn('status');
            $table->dropColumn('slug');
        });
    }
}
