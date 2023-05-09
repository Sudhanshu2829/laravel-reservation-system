<?php

use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->unsignedInteger('price');
            $table->timestamps();
        });

        Schema::create('activity_user', function (Blueprint $table) {

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Activity::class);

            $table->unique(['user_id', 'activity_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
