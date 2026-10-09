<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users', [
            'users'  => $userModel->findAll(),
            'user'   => null,
            'mode'   => 'list',
            'errors' => []
        ]);
    }

    public function new()
    {
        return view('users', [
            'users'  => [],
            'user'   => null,
            'mode'   => 'new',
            'errors' => session()->getFlashdata('errors') ?? []
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users', [
            'users'  => [],
            'user'   => $user,
            'mode'   => 'edit',
            'errors' => session()->getFlashdata('errors') ?? []
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]'
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $avatarName = $user['avatar'] ?? null;

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/avatars';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $avatarName = $avatar->getRandomName();
            $targetPath = $uploadPath . DIRECTORY_SEPARATOR . $avatarName;

            service('image')
                ->withFile($avatar)
                ->fit(300, 300)
                ->save($targetPath);
        }

        $userModel->update($id, [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName
        ]);

        return redirect()
            ->to('/users')
            ->with('success', 'User updated successfully.');
    }
}