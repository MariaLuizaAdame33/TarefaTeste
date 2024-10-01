<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use Tests\TestCase;

class TarefaTest extends TestCase
{
   public function test_criar_tarefa_teste(){
    $tarefa = Tarefa::create([
        'titulo'=>'Tarefa de Teste',
        'descricao'=>'Criando uma tarefa teste',
        'concluida'=>false
    ]);

    $this->assertEquals('Tarefa de Teste',$tarefa->titulo);
    $this->assertEquals('Criando uma tarefa teste',$tarefa->descricao);
    $this->assertFalse($tarefa->concluida);
   }
}
