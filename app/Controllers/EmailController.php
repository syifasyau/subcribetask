<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailModel;

class EmailController extends BaseController
{
    public function __construct()
    {
        $this->emailModel = new EmailModel();
    }

    public function index()
    {
        return view('email/input');
    }

    public function berhasil()
    {
        return view('email/berhasil');
    }

    public function gagal()
    {
        return view('email/gagal');
    }

    public function create()
    {
        try {
            $validation = $this->validate(
                [
                    'email' => 'is_unique[db_email.email]',
                ],
            );
            if (!$validation) {
                return view('/input/gagal');
            } else {

                $payload = [
                    "id" => uniqid(),
                    "email" => $this->request->getPost('email'),
                ];

                $this->emailModel->insert($payload);
                return view('/input/berhasil');
            }
        } catch (\Exception $e) {
            return redirect()->to(previous_url());
        }
    }
}
