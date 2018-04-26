<?php

namespace Tests\Unit;

use App\Description;
use App\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DescriptionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        factory(Image::class,6)->create();
        factory(Description::class,2)->create();
        $importantTask = factory(Description::class)->create(['image_id'=>'6']);


        $task = Image::with(['description'])->where('id',6)->delete();


        $this->assertEquals($task->description,null);
    }
}
