<?php

use Malarrimo\Repositories\User;
use Malarrimo\Managers\UserManager;

class UserController extends BaseController {

    /**
     * @var User
     */
    protected $userRepo;

    public function __construct(User $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getList()
    {
        $users = $this->userRepo->getAll();
        return View::make('admin/users')->with('users', $users);
    }

    public function add()
    {
        return View::make('admin/user');
    }

    public function create()
    {
        $user = $this->userRepo->newUser();
        $manager = new UserManager($user, Input::all());

        if ($manager->save())
        {
            return Redirect::to('admin/usuarios')->with('msg', '<p class="alert alert-success">Usuario creado</p>');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function edit($id)
    {
        if (empty($id))
        {
            return Redirect::back();
        }

        $user = $this->userRepo->find($id);

        if (empty($user))
        {
            return Redirect::back()->with('msg', '<p class="alert alert-danger">No se encontró el usuario seleccionado</p>');
        }

        return View::make('admin/user')->with('user', $user);
    }

    public function delete($id)
    {
        if ($this->userRepo->delete($id))
        {
            return Redirect::back()->with('msg', '<p class="alert alert-success">El usuario seleccionado ha sido borrado</p>');
        }
        else
        {
            return Redirect::back()->with('msg', '<p class="alert alert-danger">No fué posible borrar el usuario seleccionado</p>');
        }
    }

} 