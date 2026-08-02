<?php

class Bank
{
    private float $balance = 0;
    protected int $withdrawalsCount = 0;
    public string $bankName = 'Caixa Economica Federal';

    public function getBalance(): float
    {
        return $this->balance;
    }

}

class Withdrawal extends Bank
{

    public function getWithdrawalsCount(): int 
    {
        return $this->withdrawalsCount;
    }

    // public function getBalanceFromChildClass(): float
    // {
    //     return $this->balance;
    // }

}

$firstAccount = new Bank;
echo "Valor disponível: {$firstAccount->getBalance()}";
echo PHP_EOL;
$firstWithdrawal = new Withdrawal;
echo "Quantidade de saques: {$firstWithdrawal->getWithdrawalsCount()}";
echo PHP_EOL;
// echo $firstWithdrawal->getBalanceFromChildClass(); Impossivel!!!
echo "Nome do banco: {$firstAccount->bankName}";
