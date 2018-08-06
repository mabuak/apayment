<?php
/**
 * Created By DhanPris
 *
 * @Filename     BaseRepositoryContract.php
 * @LastModified 7/24/18 10:23 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories\Contract;

interface BaseContract
{

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $orderBy
     * @param $orderType
     *
     * @return mixed
     */
    public function allOrder($orderBy, $orderType);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function get($id);

    /**
     * @param $column
     * @param $value
     * @param $with
     *
     * @return mixed
     */
    public function getOneWhere($column, $value, $with);

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function getManyWhere($column, $value);

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function countWhere($column, $value);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function deleteWhere($column, $value);

    /**
     * @param $select
     *
     * @return mixed
     */
    public function datatable($select);

    /**
     * @param       $select
     * @param array $with
     *
     * @return mixed
     */
    public function datatableWith($select, array $with);

}
