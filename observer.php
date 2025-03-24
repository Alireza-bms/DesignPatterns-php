<?php
// Subject Interface
interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Concrete Subject
class NewsAgency implements Subject
{
    private $observers = [];
    private $news;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $this->observers = array_filter($this->observers, fn($obs) => $obs !== $observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->news);
        }
    }

    public function setNews($news)
    {
        $this->news = $news;
        $this->notify();
    }
}

// Observer Interface
interface Observer
{
    public function update($news);
}

// Concrete Observer
class User implements Observer
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update($news)
    {
        echo "{$this->name} received news: {$news}\n";
    }
}

// Example Usage
$agency = new NewsAgency();
$user1 = new User("Alireza");
$user2 = new User("Sara");

$agency->attach($user1);
$agency->attach($user2);
// $agency->detach($user1);
$agency->setNews("Breaking News: Observer Pattern Explained!");
