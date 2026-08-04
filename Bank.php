<?php 

abstract class BankAccount
{

    private float $balance = 1000;
    protected int $countATMWithDrawals = 0;

    public function deposit(float $amount): void 
    {
        $this->balance += $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function decreaseBalance(float $amount): void
    {
        $this->balance -= $amount;
    }

    abstract public function withdrawal(float $amount): void;
}

class PixWithdrawal extends BankAccount
{
    private int $limitPixWithdrawals = 5;
    private int $countPixWithdrawals = 0;

    private function countPixWithdrawals(): bool
    {
        return $this->countPixWithdrawals < $this->limitPixWithdrawals;
    }

    public function withdrawal(float $amount): void
    {
        if($this->countPixWithdrawals() && $amount < $this->getBalance())
        {
            $this->decreaseBalance($amount);
            $this->countPixWithdrawals += 1;
            echo "Saque em PIX realizado com sucesso!\nSaldo Atual: R$ {$this->getBalance()}\n";
        }
        else{
            echo "Saldo insuficiente ou limite de saques por PIX excedido!\nSaldo Atual: R$ {$this->getBalance()}\n";
        }
    }
}

class AtmWithdrawal extends BankAccount
{
    public function withdrawal(float $amount): void
    {
        if($amount < $this->getBalance())
        {
            $this->decreaseBalance($amount);
            echo "Saque via Caixa Eletronico realizado com sucesso!\nSaldo Atual: R$ {$this->getBalance()}";
        }else{
            echo "Saldo insuficiente!\nSaldo Atual: R$ {$this->getBalance()}";
        }
    }
}

$pixWithdrawal1 = new PixWithdrawal;


