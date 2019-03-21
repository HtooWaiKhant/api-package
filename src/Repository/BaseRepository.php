<?php
/**
 * Created by hola.
 * User: hola
 * Date: 12/3/2019
 * Time: 09:45 PM
 */
namespace Hola\Api\Repository;

class BaseRepository
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function first()
    {
        return $this->model->first();
    }

    public function find($id)
    {

        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function createMany($data)
    {
        return $this->model->createMany($data);
    }

    public function get($data = null)
    {
        return $this->model->get($data);
    }

    public function update($data, $id)
    {
        return tap($this->model->find($id))->update($data);
    }

    public function where($name, $data = null, $third = null)
    {
        if ($data === null && is_array($name)) {
            return $this->model->where($name);
        } else if ($third != null) {
            return $this->model->where($name, $data, $third);
        }
        return $this->model->where($name, $data);
    }

    public function with($data)
    {
        return $this->model->with($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function whereIn($name, $data)
    {
        return $this->model->whereIn($name, $data);
    }

    public function delete($id) {
        return $this->model->find($id)->delete();
    }

    public function forceDelete($id) {
        return $this->model->find($id)->forceDelete();
    }

    public function updateOrCreate($finder, $data) {
        return $this->model->updateOrCreate($finder, $data);
    }

    public function firstOrCreate($data) {
        return $this->model->firstOrCreate($data);
    }

    public function orderBy($name, $ascending = 'ASC') {
        return $this->model->orderBy($name, $ascending);
    }

    public function pluck($property) {
        return $this->model->pluck($property);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function query()
    {
        return $this->model->query();
    }
}