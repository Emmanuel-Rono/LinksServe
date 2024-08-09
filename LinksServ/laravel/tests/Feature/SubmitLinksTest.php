<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitLinksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_submit_a_new_link()
    {
        $response = $this->post('/submit', [
            'title' => 'Example Title',
            'url' => 'http://example.com',
            'description' => 'Example description.',
        ]);
        dd($response);

        $this->assertDatabaseHas('links', [
            'title' => 'Example Title'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('Example Title');
    }

    /** @test */
    function link_is_not_created_if_validation_fails()
    {
        $response = $this->post('/submit');

        $response->assertSessionHasErrors(['title', 'url', 'description']);
    }

    /** @test */
    function link_is_not_created_with_an_invalid_url()
    {
        $cases = ['//invalid-url.com', '/invalid-url', 'foo.com'];

        foreach ($cases as $case) {
            $response = $this->post('/submit', [
                'title' => 'Example Title',
                'url' => $case,
                'description' => 'Example description.',
            ]);

            $response->assertSessionHasErrors(['url']);
        }
    }
}
