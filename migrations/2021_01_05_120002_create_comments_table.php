<?php

use Asseco\BlueprintAudit\App\MigrationMethodPicker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            if (config('asseco-comments.migrations.uuid')) {
                $table->uuid('id')->primary();
                $table->uuidMorphs('commentable');
            } else {
                $table->id();
                $table->morphs('commentable');
            }

            $table->longText('body');

            MigrationMethodPicker::pick($table, config('asseco-comments.migrations.timestamps'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
