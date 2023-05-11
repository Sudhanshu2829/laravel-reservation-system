<?php

use App\Models\User;

it('can register new clients', function () {
    $response = $this->postJson('/api/create-clients', [
        'email' => 'john.doe@domain.tld',
        'name' => 'John Doe',
    ])->assertStatus(201)->json();

    expect($response['data'])->toBeArray()
        ->and($response['data']['name'])->toBeString()
        ->and($response['data']['email'])->toBeString()
    ;
});

it('can show validation errors', function () {
    $user = User::factory()->create();

    $response = $this->postJson('/api/create-clients', [
        'email' => $user->email,
        'name' => $user->name,
    ])->assertStatus(422)->json();

    expect($response['message'])->toBeString()
        ->and($response['errors']['email'][0])->toBeString();
});
