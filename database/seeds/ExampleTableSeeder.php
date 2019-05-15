<?php

use Illuminate\Database\Seeder;
use App\Example;

class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 3; $i++){
            $example = new Example;
            $example->title = 'title '.$i;
            $example->content = 'content '.$i;
            $example->save();
        }
    }
}
