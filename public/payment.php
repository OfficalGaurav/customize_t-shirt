<?php

require __DIR__ . '/vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51NV75bSJ9Lqe7xaYIc8afFYyqRq96rjRgTcS4WVARLgHnU74R8cNeibRwOC5Zo1a7mxa3IHWaaOv3yuSfqrsyTyK004dEwbV2o');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242'; // Ensure this is your correct domain

$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 2000, // Amount in cents
            'product_data' => [
                'name' => 'T-Shirt',
            ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/final_design.php', // URL for successful payments
]);

echo json_encode(['id' => $checkout_session->id]);
