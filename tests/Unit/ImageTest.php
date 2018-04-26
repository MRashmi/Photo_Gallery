<?php
/**
 * Created by PhpStorm.
 * User: Rashmi Gamage
 * Date: 4/26/2018
 * Time: 1:04 AM
 */
namespace Tests\Unit;
use App\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ImageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_image_function()
    {
        //assumption
        $importantTask = factory(Image::class)->create();

        //call actual method
        $task = Image::select('*')->get();

        //test using assertions
        $this->assertEquals($importantTask->image_url,$task->image_url );
    }
}
