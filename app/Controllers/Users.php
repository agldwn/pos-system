<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            [
                'username' => 'admin',
                'name' => 'Admin User',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'name' => 'Jonah Lakambini',
                'role' => 'Cashier'
            ],
            [
                'username' => 'staff01',
                'name' => 'Victor Magtanggol',
                'role' => 'Staff'
            ],
            [
                'username' => 'manager01',
                'name' => 'Hev Gabo',
                'role' => 'Manager'
            ],
            [
                'username' => 'cashier02',
                'name' => 'John Wick',
                'role' => 'Cashier'
            ]
        ];

        return view('users', $data);
    }
}