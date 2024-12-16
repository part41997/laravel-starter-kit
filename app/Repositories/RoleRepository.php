<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * RoleRepository constructor.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Get all defaultModels.
     *
     * @return Role $role
     */
    public function getAll($except)
    {
        return $this->role->whereNotIn('name', $except)->get();
    }

    /**
     * Get defaultModel by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->role->find($id);
    }

    /**
     * Save Role
     *
     * @param $data
     * @return Role
     */
    public function save($data)
    {
        $role = new $this->role();

        $role = $role->create([
            'name' => $data['name'],
            'guard_name' => $data['guardName'],
        ]);

        return $role->fresh();
    }

    /**
     * Update Role
     *
     * @param $data
     * @return Role
     */
    public function update($data, $id)
    {
        $role = $this->role->find($id);

        $role->update([
            'name' => $data['name'],
            'guard_name' => $data['guardName'],
        ]);

        return $role;
    }

    /**
     * Update Role
     *
     * @param $data
     * @return Role
     */
    public function delete($id)
    {
        $role = $this->role->find($id);
        $role->delete();

        return $role;
    }

    /**
     * Get all roles for select2
     *
     * @param $search
     * @param $except
     * @return mixed
     */
    public function select2($search, $except)
    {
        return $this->role->whereNotIn('name', $except)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->select('id', 'name as text')
            ->get();
    }
}
