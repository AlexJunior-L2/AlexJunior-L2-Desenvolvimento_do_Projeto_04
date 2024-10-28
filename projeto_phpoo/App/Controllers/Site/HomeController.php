<?php
namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Repositories\Site\ProdutoRepository;

class HomeController extends BaseController
{
    public function index(){

        $produtoRepository = new ProdutoRepository;
        // dump($produtoRepository->listarProdutosOrdenadosComLimite(3));

        $dados = [
            'titulo' => 'Loja Virtual | PernocasCompany',
            'nome' => 'Alex'
        ];

        $template = $this->twig->loadTemplate('site_home.html');
        $template->display($dados);  
    }
}