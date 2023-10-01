<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class UserController extends BaseController
{
  public function register()
  {
      helper(['form']);
      $data = [];
      echo view('Register', $data);
  }

  public function store()
   {
       helper(['form']);
       $rules = [
           'username' => 'required|min_length[4]|max_length[50]|is_unique[users.username]',
           'password' => 'required|min_length[4]|max_length[100]',
           'confirmpassword' => 'matches[password]'
       ];

       if ($this->validate($rules)) {
           $userModel = new UserModel();
           $data = [
               'username' => $this->request->getVar('username'),
               'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
           ];
           $userModel->save($data);
           return redirect()->to('/');
       } else {
           $data['validation'] = $this->validator;
           echo view('Register', $data);
       }
   }
}
