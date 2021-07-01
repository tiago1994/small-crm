<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model;
    }

    public function save($request)
    {   
        if($request['password']){
            $this->model->updateOrCreate(
                ['id' => $request['id']],
                [
                    'name' => $request['name'], 
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                ]
            );
        }else{
            $this->model->updateOrCreate(
                ['id' => $request['id']],
                [
                    'name' => $request['name'], 
                    'email' => $request['email'],
                ]
            );
        }

        $this->model->syncRoles($request['role']);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
