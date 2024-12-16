<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class RoleService
{
    /**
     * @var $roleRepository
     */
    protected $roleRepository;

    /**
     * RoofService constructor.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Delete default by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToDelete'));
        }

        DB::commit();

        return $role;
    }

    /**
     * Get all defaults.
     *
     * @return Object
     */
    public function getAll($except)
    {
        return $this->roleRepository->getAll($except);
    }

    /**
     * Get default by id.
     *
     * @param $id
     * @return Object
     */
    public function getById($id)
    {
        return $this->roleRepository->getById($id);
    }

    /**
     * Update roof data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update($data, $id)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToUpdate'));
        }

        DB::commit();

        return $role;
    }

    /**
     *
     * @param array $data
     * @return String
     */
    public function save($data)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException(__('messages.unableToSave'));
        }

        DB::commit();

        return $role;
    }

    /**
     * Get Roles for select2
     *
     * @param $search
     * @param $except
     * @return Object
     */
    public function select2($search, $except = [])
    {
        return $this->roleRepository->select2($search, $except);
    }
}
