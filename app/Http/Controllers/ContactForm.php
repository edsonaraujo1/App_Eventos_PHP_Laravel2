<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Models\Contact;

class ContactForm extends Controller
{
    private $nome;
    private $email;
    private $assunto;
    private $mensagem;

    public function __construct(Request $request)
    {
        $this->nome = $request->nome;
        $this->email = $request->email;
        $this->assunto = $request->assunto;
        $this->mensagem = $request->mensagem;
    }

    public function sendMail(){

        $contat = new Contact;

        $contat->nome = $this->nome;
        $contat->email = $this->email;
        $contat->assunto = $this->assunto;
        $contat->mensagem = $this->mensagem;

        $contat->save();
        
        // provocar um erro  
        //$a = 10/0;
        $data = array(
            'nome' => $this->nome,
            'email' => $this->email,
            'assunto' => $this->assunto,
            'mensagem' => $this->mensagem,
        );


        \Mail::to( config('mail.from.address') )
             ->send( new SendMail($data) );
    }
    //
}
