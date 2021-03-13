<?php
/**
 * Created by PhpStorm.
 * User: Betho
 * Date: 13/03/21
 * Time: 13:30
 */

namespace App\Http\Controllers\Memoirs;


use App\Http\Controllers\Controller;
use App\Http\Requests\Memoirs\CreateMemoirsRequest;
use App\Services\Memoirs\MemoirsService;
use Illuminate\Http\RedirectResponse;

class MemoirsController extends Controller
{
    private $service;

    /**
     * MemoirsController constructor.
     * @param MemoirsService $memoirsService
     */
    public function __construct(MemoirsService $memoirsService)
    {
        $this->service = $memoirsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $all = $this->service
            ->getAll();

        return view('memoirs.show')->with(
            [
                'memories' => $all
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('memoirs.create');
    }

    /**
     * @param CreateMemoirsRequest $request
     * @return RedirectResponse
     */
    public function insert(CreateMemoirsRequest $request) : RedirectResponse
    {
        try{
            $insert = $this
                ->service
                ->create($request->all());
        }catch (\Exception $exception){
            return redirect()->route('memoirs.index')
                ->with('error', 'Erro ao inserir memória'.$exception->getMessage());
        }
        return redirect()->route('memoirs.index')
            ->with('success', 'Memória inserida com sucesso');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try{
            $this
                ->service
                ->delete($id);
        }catch (\Exception $exception){
            return redirect()->route('memoirs.index')
                ->with('error', 'Erro ao excluir memória'.$exception->getMessage());
        }
        return redirect()->route('memoirs.index')
            ->with('success', 'Memória excluida com sucesso');
    }

}
