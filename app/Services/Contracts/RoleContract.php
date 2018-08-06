<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleServiceContract.php
 * @LastModified 7/24/18 10:54 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface RoleContract
{
    public function getAll();

    public function datatable($select);

    public function store($request);

    public function update($id, $request);

    public function delete($id);

    public function get($id);
}