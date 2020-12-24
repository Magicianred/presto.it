<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_it');
            $table->string('name_en');
            $table->timestamps();
        });
        $categories = [
            ['elettronica', 'electronics'],
            ['auto e motori', 'cars and engines'],
            ['sport', 'sport'],
            ['immobili', 'properties'],
            ['bellezza e salute', 'beauty and health'],
            ['abbigliamento', 'clothing'],
            ['nautica e imbarcazioni', 'boating and boats'],
            ['libri', 'book'],
            ['strumenti musicali', 'musical instruments'],
            ['arte', 'art']
        ];

        foreach ($categories as $category) {
            $c = new Category();
            $c->name_it = $category[0];
            $c->name_en = $category[1];
            $c->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
