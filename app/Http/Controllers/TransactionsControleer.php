<?php

namespace App\Http\Controllers;
use App\BankAccoount;
use App\TransactionAccount;

use Illuminate\Http\Request;
class TransactionsControleer extends Controller
{
    public function getCotacaoMoeda($moeda) 
    {
        $url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda)?@moeda=$moeda";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        return json_decode(curl_exec($ch));
    }
 
    public function saque($number_account, $value, $currency) 
    {
        //Listando todas as contas de acordo com o parâmetro....
        $arrayContas = BankAccount::where('account',$number_account)->get();
        foreach ($arrayContas as $account) {
            if($account->moeda == $currency and $account->saldo >= $value){
                $account->balance -= $value;
                $c->save();

              $transaction = new TransactionAccount;
              $transaction->number_account = $number_account;
              $transaction->currency = $currency;
              $transaction->value = $value;
              $transaction->type_operation = 'saque';
              $transaction->save();
            }

        }
        
    }

    public function deposito($number_account, $value, $currency) 
    {
        //Listando todas as contas de acordo com o parâmetro....
        $arrayContas = BankAccount::where('account',$number_account)->get();
        foreach ($arrayContas as $account) {
            if($account->moeda == $currency and $account->saldo >= $value){
                $account->balance -= $value;
                $c->save();
            
              $transaction = new TransactionAccount;
              $transaction->number_account = $number_account;
              $transaction->currency = $currency;
              $transaction->value = $value;
              $transaction->type_operation = 'deposito';
              $transaction->save();
            }

        }
        
    }
}
