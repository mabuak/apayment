<?php
/**
 * Created By DhanPris
 *
 * @Filename     BaseRepository.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Repositories;

use App\Repositories\Contract\BaseContract;

abstract Class BaseRepository implements BaseContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * @param $orderBy
     * @param $orderType
     *
     * @return mixed
     */
    public function allOrder($orderBy, $orderType)
    {
        return $this->model->orderBy($orderBy, $orderType)->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param       $column
     * @param       $value
     * @param array $with
     *
     * @return mixed
     */
    public function getOneWhere($column, $value, $with = [])
    {
        return $this->model->with($with)->where($column, $value)->first();
    }

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function getManyWhere($column, $value)
    {
        return $this->model->whereIn($column, (array)$value)->get();
    }

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function countWhere($column, $value)
    {
        return $this->model->where($column, '=', $value)->count();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->model->whereIn('id', (array)$id)->update($data);
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public function save($model)
    {
        $model->save();

        return $model;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function deleteWhere($column, $value)
    {
        return $this->model->where($column, $value)->delete();
    }

    /**
     * @param $select
     *
     * @return mixed
     * @internal param $input
     * @internal param $model
     */
    public function datatable($select)
    {
        return $this->model->select($select);
    }

    /**
     * Datatable get record with relation data
     *
     * @param       $select
     * @param array $with
     *
     * @return mixed
     * @internal param $input
     * @internal param array $relation
     * @internal param array $with
     */
    public function datatableWith($select, array $with)
    {
        return $this->datatable($select)->with($with);
    }
}
