<?php
/**
 * Created by PhpStorm.
 * User: Betho
 * Date: 13/03/21
 * Time: 13:32
 */

namespace App\Models\Memoirs;


use Illuminate\Database\Eloquent\Model;

class Memoirs extends Model
{
    protected $fillable = ['image','name','birth_date','death_date','content','status'];
}
