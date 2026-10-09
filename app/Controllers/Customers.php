<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        return view('customers', [
            'customers' => $customerModel->findAll(),
            'customer'  => null,
            'mode'      => 'list',
            'errors'    => []
        ]);
    }

    public function new()
    {
        return view('customers', [
            'customers' => [],
            'customer'  => null,
            'mode'      => 'new',
            'errors'    => session()->getFlashdata('errors') ?? []
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (!$customer) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('customers', [
            'customers' => [],
            'customer'  => $customer,
            'mode'      => 'edit',
            'errors'    => session()->getFlashdata('errors') ?? []
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer updated successfully.');
    }
}