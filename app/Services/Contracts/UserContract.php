<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserServiceContract.php
 * @LastModified 7/24/18 10:47 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services\Contracts;

interface UserContract
{

    public function datatableWith($select, array $with);

    public function store($request);

    public function update($user, $request);

    public function delete($id);

}
