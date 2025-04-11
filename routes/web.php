<?php

use Illuminate\Support\Facades\Route;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Mail', function(){
    
    try{
        $dados = [
            'nome' => 'Maria',
            'mensagem' => 'Isso é um teste de envio de e-mail.'
        ];
        
        Mail::to('cornelio.mahumane@quidgest.co.mz')->send(new EmailSender($dados));
    }catch(Exception $e){
        Log::info('Requisição Recebida:', $e->getMessage()); 
        return response()->json(['error'=>$e->getMessage()]);
    }

});
