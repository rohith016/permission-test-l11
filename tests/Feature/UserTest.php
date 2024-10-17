<?php
// import models
use App\Models\User;
use function Pest\Laravel\actingAs;


test('admin user can access users list page', function () {
    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->get(route('users.index'))
        ->assertStatus(200);
});

test('non-admin user cannot access users list page', function () {
    $user = User::factory()->user()->create();

    actingAs($user)
        ->get(route('users.index'))
        ->assertStatus(403);
});
