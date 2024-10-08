<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
   use RefreshDatabase;

   public function test_full_tarefa_crud(){
    //criar tarefa
    $tarefa = Tarefa::create([
        'titulo'=>'Nova tarefa',
        'descricao'=>'Tarefa de teste',
        'concluida'=>false
    ]);

    $this->assertDatabaseHas('tarefas',[
        'titulo'=>'Nova tarefa',

    ]);
    //assertDatabaseHas:Este metodo verifica se ha uma entrada especifica no bando de dados.

    //Read
    $tarefaRecuperada = Tarefa::find($tarefa->id);
    $this->assertEquals('Nova tarefa',$tarefaRecuperada->titulo);
    $this->assertEquals('Tarefa de teste',$tarefaRecuperada->descricao);

    //update
    $tarefaRecuperada->Update(['titulo'=>'Tarefa Atualizada']);
    $this->assertEquals('Tarefa Atualizada',$tarefaRecuperada->titulo);

    //delete
    $tarefaRecuperada->delete();
    $this->assertDatabaseMissing('tarefas',['id'=>$tarefaRecuperada->id]);
    //assertDatabaseMissing:verifica se nao mais um determinado registro no banco de dados
   }
}
