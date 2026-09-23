<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'name' => 'Angeldwin Gapay',
                'email' => 'adgapay@fit.edu.ph',
                'phone' => '09171234567'
            ],
            [
                'name' => 'Rozhene Mae',
                'email' => 'rozhemae@gmail.com',
                'phone' => '09181234567'
            ],
            [
                'name' => 'James Lebron',
                'email' => 'lebrondagoat@gmail.com',
                'phone' => '09191234567'
            ],
            [
                'name' => 'Austin Malone',
                'email' => 'ausmalone@gmail.com',
                'phone' => '09201234567'
            ],
            [
                'name' => 'Iza Lang',
                'email' => 'izalang67@gmail.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers', $data);
    }
}