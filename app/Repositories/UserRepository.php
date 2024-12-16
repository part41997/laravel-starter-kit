<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Admin\UserCreated;
use App\Services\AttachmentService;

class UserRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all defaultModels.
     *
     * @return User $user
     */
    public function getAll()
    {
        return $this->user->get();
    }

    /**
     * Get defaultModel by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->user->find($id);
    }

    /**
     * Save User
     *
     * @param $data
     * @return User
     */
    public function save($data)
    {
        $user = new $this->user();

        if (!isset($data['password'])) {
            $data['password'] = Str::random(8);
        }

        $user = $user->create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? null,
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'contact_number' => $data['contact_number'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        if (!empty($user)) {
            $token = Password::createToken($user);
            Notification::send($user, new UserCreated($token, $data['password']));
        }

        if (isset($data['role']) && !empty($data['role'])) {
            $role = Role::find($data['role']);
            $user->assignRole($role);
        }

        return $user->fresh();
    }

    /**
     * Update User
     *
     * @param $data
     * @return User
     */
    public function update($data, $id)
    {
        $user = $this->user->find($id);

        $user->update([
            'first_name' => $data['first_name'] ?? $user->first_name,
            'middle_name' => $data['middle_name'] ?? $user->middle_name,
            'last_name' => $data['last_name'] ?? $user->last_name,
            'email' => $data['email'] ?? $user->email,
            'contact_number' => $data['contact_number'] ?? $user->contact_number,
        ]);

        if (isset($data['photo']) && is_file($data['photo'])) {
            $attchment = $user->profilePicture();
            if ($attchment) {
                AttachmentService::update($data['photo'],$attchment, 'users/profile-picture');
            } else {
                AttachmentService::save($data['photo'], 'photo', 'users/profile-picture', $user);
            }
        }

        if (isset($data['role']) && !empty($data['role'])) {
            $role = Role::find($data['role']);
            $user->syncRoles([$role]);
        }

        return $user->fresh();
    }

    /**
     * Update User
     *
     * @param $data
     * @return User
     */
    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return $user;
    }

    /**
     * Change password
     *
     * @param $password
     * @return User
     */
    public function changePassword($password, $id)
    {
        $user = $this->user->find($id);

        $user->update([
            'password' => Hash::make($password),
        ]);

        return $user;
    }

    
}
