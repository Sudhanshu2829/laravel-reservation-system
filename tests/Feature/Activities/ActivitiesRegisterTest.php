<?php

it('can register new activities', function () {
    $response = $this->postJson('/api/create-activities', [
        'name' => 'Paquete turistico uno',
        'slug' => 'paquete-turistico-uno',
        'description' => 'Paquete turistico uno',
        'price' => 200,
    ])->assertStatus(201)->json();

    expect($response['data'])->toBeArray()
        ->and($response['data']['name'])->toBeString()
        ->and($response['data']['slug'])->toBeString()
        ->and($response['data']['description'])->toBeString()
        ->and($response['data']['price'])->toBeInt();
});

it('can show validation errors', function () {

    $response = $this->postJson('/api/create-activities', [
        'name' => 'Paquete turistico uno',
        'slug' => 'paquete-turistico-uno',
        'description' => 'Paquete turistico uno',
        'price' => 'abc',
    ])->assertStatus(422)->json();

    expect($response['message'])->toBeString()
        ->and($response['errors']['price'][0])->toBeString()
        ->and($response['errors']['price'][1])->toBeString();
});
