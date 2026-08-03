<?php 

abstract class BankAccount
{

    private float $balance = 1000;
    protected int $countPixWithdrawals = 0;
    protected int $countATMWithDrawals = 0;

    public function deposit(float $amount): void 
    {
        $this->balance = $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    abstract public function withdrawal(float $amount): void;
}

class PixWithdrawal extends BankAccount
{
    private int $limitPixWithdrawals = 5;

    private function countPixWithdrawals(): bool
    {
        return $this->countPixWithdrawals <= $this->limitPixWithdrawals;
    }

    public function withdrawal(float $amount): void
    {
        echo $this->countPixWithdrawals() && $amount < $this->getBalance() ?
        "Saque em PIX realizado com sucesso!" : 
        "Saldo insuficiente ou limite de saques por PIX excedido!";
    }
}

class Atmwithdrawal extends BankAccount
{
    
    public function withdrawal(float $amount): void
    {
        echo $amount < $this->getBalance() ? 
        "Saque via Caixa Eletronico realizado com sucesso!" :
        "Saldo insuficiente!";
    }
}

$pixWithdrawal = new PixWithdrawal;
$pixWithdrawal->withdrawal(520.35);
echo PHP_EOL;

$atmWithdrawal = new Atmwithdrawal;
$atmWithdrawal->withdrawal(250.0);

