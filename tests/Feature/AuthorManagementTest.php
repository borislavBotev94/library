<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Author;

class AuthorManagementTest extends TestCase
{

    use RefreshDatabase;
    /** @test */

    public function an_author_can_be_created()
    {

        $this->post('/authors', $this->data());


        $author = Author::all();
        $this->assertCount(1,$author);
        $this->assertInstanceOf(Carbon::class,$author->first()->dob);
        $this->assertEquals('1988/15/05', $author->first()->dob->format('Y/d/m'));
    }




    /** @test */


    public function a_name_is_required()
    {
        $response = $this->post('/authors',array_merge($this->data(),['name'=>'']));

        $response->assertSessionHasErrors('name');
    }

    /** @test */


    public function a_dob_is_required()
    {
        $response = $this->post('/authors',array_merge($this->data(),['dob'=>'']));

        $response->assertSessionHasErrors('dob');
    }



    /**
     * @return array
     */
    private function data()
    {
        return [
            'name' => 'Author name',
            'dob' => '1988-05-15',
        ];
    }


}
