<?php

interface Gateway
{
    public function setInfo($info);
    public function pay();
}

class Zarinpal implements Gateway
{
    protected $info;

    public function setInfo($info)
    {
        $this->info = $info;
    }
    public function pay()
    {
        return $this->info;
    }
}
class Mellat implements Gateway
{
    protected $info;

    public function setInfo($info)
    {
        $this->info = $info;
    }
    public function pay()
    {
        return $this->info;
    }
}
class Saderat implements Gateway
{
    protected $info;

    public function setInfo($info)
    {
        $this->info = $info;
    }
    public function pay()
    {
        return $this->info;
    }
}

class payment
{
    protected $gateway;
    public function setGateway(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }
}
$payment = new payment();
$payment->setGateway(new Saderat);