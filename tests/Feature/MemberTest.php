<?php

namespace Tests\Feature;


use App\Member;
use App\Member_ministry;
use App\User;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function indexTestCase()
    {
        Session::start();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get('/member');

        $response->assertStatus(200);
    }

    /** @test */
    public function indexTestShow()
    {
        Session::start();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $member = factory(Member::class)->create();
        $response = $this->get('/member/'.$member->id);

        $response->assertStatus(200)->assertSeeText($user->first_name);
    }
}
