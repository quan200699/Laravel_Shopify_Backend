<?php


namespace App\Services\User;


use App\Repositories\User\UserRepository;

class UserServiceImpl implements UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function findById($id)
    {
        $user = $this->userRepository->findById($id);
        $statusCode = 200;
        if (!$user) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'users' => $user
        ];
        return $data;
    }

    public function create($request)
    {
        $result = $request->save();

        $statusCode = 201;
        if (!$result)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'users' => $request
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldUser = $this->userRepository->findById($id);
        if (!$oldUser) {
            $statusCode = 404;
            $newUser = null;
        } else {
            $newUser = $this->userRepository->update($request, $oldUser);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'users' => $newUser
        ];
        return $data;
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        $statusCode = 200;
        if (!$user) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->userRepository->destroy($user);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    function findByEmail($email)
    {
        $user = $this->userRepository->findByEmail($email);
        return $user;
    }
}
