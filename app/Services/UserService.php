<?php

namespace App\Services;

use App\Enums\UserStatus;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class UserService
{
    /**
     * @var $userRepository
     */
    protected UserRepository $userRepository;

    /**
     * RoofService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Delete default by id.
     *
     * @param $id
     * @return User
     */
    public function deleteById($id): User
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            logger($e);
            throw new InvalidArgumentException(__('messages.something_went_wrong'));
        }

        DB::commit();

        return $user;
    }

    /**
     * Get all defaults.
     *
     * @return Object
     */
    public function getAll(): object
    {
        return $this->userRepository->getAll();
    }

    /**
     * Get default by id.
     *
     * @param $id
     * @return User
     */
    public function getById($id): User
    {
        return $this->userRepository->getById($id);
    }

    /**
     * Update roof data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return User
     */
    public function update($data, $id): User
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            logger($e);
            throw new InvalidArgumentException(__('messages.something_went_wrong'));
        }

        DB::commit();
        return $user;
    }

    /**
     *
     * @param array $data
     * @return User
     */
    public function save($data): User
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            logger($e);
            throw new InvalidArgumentException(__('messages.something_went_wrong'));
        }

        DB::commit();
        return $user;
    }

    /**
     * Change password
     * Store to DB if there are no errors.
     * 
     * @param string $password
     * @param int $id
     * @return User
     */
    public function changePassword($password, $id): User
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->changePassword($password, $id);
        } catch (Exception $e) {
            DB::rollBack();
            logger($e);
            throw new InvalidArgumentException(__('messages.something_went_wrong'));
        }

        DB::commit();
        return $user;
    }

    /**
     * Get all status for select2
     * 
     * @param string $search
     * @return array
     */
    public function statusSelect2($search): array
    {
        $statuses = UserStatus::toSelect2($search);
        return $statuses;
    }
}
