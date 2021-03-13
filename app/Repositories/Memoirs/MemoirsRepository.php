<?php
/**
 * Created by PhpStorm.
 * User: alfa
 * Date: 13/03/21
 * Time: 13:31
 */

namespace App\Repositories\Memoirs;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Memoirs\Memoirs;

class MemoirsRepository extends AbstractRepository
{

    /**
     * MemoirsRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Memoirs::class);
    }

    /**
     * @param string $name
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByName(string $name)
    {
        return $this->getModel()
            ::where('name','like',$name.'/')
            ->orderByDesc('created_at')
            ->paginate(4);

    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll()
    {
        return $this->getModel()
            ::orderByDesc('created_at')
            ->paginate(4);

    }

    /**
     * @param int $status
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllByStatus(int $status)
    {
        return $this->getModel()
            ::where('status','=',$status)
            ->orderByDesc('created_at')
            ->paginate(4);

    }


}
