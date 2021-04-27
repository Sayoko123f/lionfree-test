<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;
use App\Models\News;

class NewsTest extends TestCase
{
    use CreatesApplication;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private const CORRECTADMIN = ['email' => 'collect123a@gmail.com', 'password' => '123123123'];

    public function test_index()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
    }

    public function test_store_fail()
    {
        $this->post(route('news.store'), [
            'ctx' => 'haha',
            'title' => '1017test'
        ])->assertRedirect('/login');

        /** Admin login */
        $this->post('/login', self::CORRECTADMIN);
        $response = $this->post(route('news.store'), [
            'ctx' => '',
            'title' => '1017test'
        ])->assertRedirect(route('index'));
    }

    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        $response = $this->post('/login', self::CORRECTADMIN);
        $response->assertRedirect('/home');

        $response = $this->get('/home');
        $response->assertSee('發文');
    }

    public function test_store()
    {
        $this->post('/login', self::CORRECTADMIN);
        $response = $this->post(route('news.store'), ['ctx' => 'haha', 'title' => '1017test']);
        $response->assertSuccessful();
        for ($i = 0; $i < 6; $i++) {
            $this->post(route('news.store'), ['ctx' => 'haha', 'title' => '1017test']);
        }
    }

    public function test_destory()
    {
        $data = News::select(['id', 'ctx', 'title'])->where('title', '1017test')->get();
        $this->assertTrue(count($data) > 0);
        $this->post('/login', self::CORRECTADMIN);
        $this->delete(route('news.destroy', ['id' => $data[0]->id]))->assertSuccessful();
    }

    public function test_show()
    {
        $data = News::select(['id', 'ctx', 'title'])->where('title', '1017test')->get();
        $this->assertTrue(count($data) > 0);
        $response = $this->get(route('news.show', ['id' => $data[0]->id]));
        $response->assertSeeText('haha');

    }
    public function test_update()
    {
        $data = News::select(['id', 'ctx', 'title'])->where('title', '1017test')->get();
        $this->assertTrue(count($data) > 0);

        /** not signed in */
        $this->put(route('news.update', ['id' => $data[0]->id]), ['ctx' => 'Update test', 'title' => '1017test'])->assertRedirect('/login');

        /** logged in */
        $this->post('/login', self::CORRECTADMIN);
        $this->put(route('news.update', ['id' => $data[0]->id]), ['ctx' => 'Update test', 'title' => '1017test'])->assertSuccessful();
    }
}
