<?php

namespace App\Http\Controllers;

use App\Models\Carrinho\ItemModel;
use App\Models\PedidoModel;
use App\Services\EmailService;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedido = new PedidoModel();

        $item1 = new ItemModel();
        $item1->adicionarDescricao("Play Station 5");
        $item1->modificarValor(5000.00);

        $item2 = new ItemModel();
        $item2->adicionarDescricao("Xbox Series S");
        $item2->modificarValor(3000.00);

        $item3 = new ItemModel();
        $item3->adicionarDescricao("Xbox Series X");
        $item3->modificarValor(0);

        $pedido->recuperarCarrinho()->adicionarItem($item1);
        $pedido->recuperarCarrinho()->adicionarItem($item2);
        $pedido->recuperarCarrinho()->adicionarItem($item3);

        if($pedido->confirmar()) { 
            $this->emailService->dispararEmail();
        } else {
            dd("Erro ao confirmar");
        }

        dd("Confirmado");

        return $pedido;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
