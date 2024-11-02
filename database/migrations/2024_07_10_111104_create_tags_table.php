<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\DocBlock\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // pivot table

        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
        Schema::dropIfExists('post_tag');
    }
};
