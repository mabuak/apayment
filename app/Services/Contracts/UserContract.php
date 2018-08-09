<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserContract.php
 * @LastModified 8/7/18 4:09 PM.
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

    public function getOneByToken($token);

}
