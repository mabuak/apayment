<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleRepositoryContract.php
 * @LastModified 7/24/18 10:49 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories\Contract;

interface RoleContract
{
    public function getAll();

    public function datatable($select);

    public function create(array $data);

    public function get($id);

    public function update($id, array $data);
}