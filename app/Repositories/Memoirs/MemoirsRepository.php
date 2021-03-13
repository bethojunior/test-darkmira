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

}
