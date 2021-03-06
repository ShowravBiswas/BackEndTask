<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance->value();
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        //implement this method
        $this->balance+=$amount->value();
        return $this;
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
        $this->withdraw($amount);
         $account->deposit($amount);
    }

    public function withdraw(Money $amount)
    {
        // TODO: Implement withdraw() method.

        if ($amount->value() > $this->balance){
            throw new Exception("Withdrawl amount larger than balance");

        }else {
            $this->balance-=$amount->value();
        }

    }
}