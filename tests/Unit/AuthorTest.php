<?php

namespace Tests\Unit;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function a_dob_is_nullable(){
        Author::firstOrCreate([
           'name' => 'John Doe',
        ]);

        $this->assertCount(1, Author::all());
    }

}
