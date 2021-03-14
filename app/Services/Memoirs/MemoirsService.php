<?php
/**
 * Created by PhpStorm.
 * User: Betho
 * Date: 13/03/21
 * Time: 13:31
 */

namespace App\Services\Memoirs;

use App\Models\Memoirs\Memoirs;
use App\Repositories\Memoirs\MemoirsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MemoirsService
{
    private $repository;

    /**
     * MemoirsService constructor.
     * @param MemoirsRepository $memoirsRepository
     */
    public function __construct(MemoirsRepository $memoirsRepository)
    {
        $this->repository = $memoirsRepository;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $status
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllByStatus(int $status)
    {
        return $this->repository
            ->findAllByStatus($status);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $request
     * @return Memoirs
     * @throws \Exception
     */
    public function create(array $request)
    {
        try{
            $request['name'] = $request['name'].' '.$request['complement-name'];
            DB::beginTransaction();
            $memoirs = new Memoirs($request);
            $memoirs->save();
            $image = Storage::disk('memoirs')->putFile($memoirs->id, $request['image']);
            $memoirs->update(['image' => $image]);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $memoirs;
    }


    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function delete(int $id) :? Model
    {
        try{
            DB::beginTransaction();
            $result = $this->repository->find($id);
            $result->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $result;
    }

    /**
     * @param $id
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null]
     */
    public function update($id, array $params)
    {
        $result = $this->repository->find($id);

        if (!$result) {
            throw new Exception("Memória não encontrado");
        }

        $result->update($params);

        return $result;
    }


}
