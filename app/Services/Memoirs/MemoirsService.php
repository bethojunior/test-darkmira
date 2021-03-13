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
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->repository->all()
            ->sortDesc();
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

}
