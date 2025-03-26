<?php


interface Transport
{
    public function deliver($place);
}

class Truck implements Transport
{

    public function deliver($place)
    {
        return $place;
    }

}

class Ship implements Transport
{

    public function deliver($place)
    {
        return $place;
    }

}


abstract class Logistic
{
    abstract public function createTransport();

    public function planDelivery($place)
    {
        $transport = $this->createTransport();
        $transport->deliver($place);
        return $transport;
    }
}

class RoadLogistic extends Logistic
{

    public function createTransport()
    {
        return new Truck();
    }
}

class SeaLogistic extends Logistic
{

    public function createTransport()
    {
        return new Ship();
    }
}

$road = new RoadLogistic();
$sea = new SeaLogistic();

// transport 1
$truck1 = $road->planDelivery('Tehran');

// transport 2
$truck2 = $road->planDelivery('Ardebil');

// transport 3
$truck3 = $road->createTransport();
$truck3->deliver('Manzandaran');

// transport 4
$ship4 = $sea->planDelivery('America');

// transport 5
$ship5 = $sea->planDelivery('China');

//-------------------------------------------------------------------------------------------------------------------------------------------------------


// کلاس انتزاعی: تعریف یک قرارداد برای دیالوگ
abstract class Dialog
{
    // متد انتزاعی که باید توسط کلاس‌های زیرمجموعه پیاده‌سازی شود.
    abstract public function createButton();

    public function render()
    {
        $button = $this->createButton();
        $button->render();
    }
}

// کلاس انتزاعی یا رابط محصول
interface Button
{
    public function render();
}

// کلاس کنکریت: پیاده‌سازی واقعی محصول برای ویندوز
class WindowsButton implements Button
{
    public function render()
    {
        echo "Rendering a button in Windows style.";
    }
}

// کلاس کنکریت: پیاده‌سازی واقعی محصول برای HTML
class HtmlButton implements Button
{
    public function render()
    {
        echo "Rendering a button in HTML style.";
    }
}

// کلاس کنکریت: پیاده‌سازی واقعی دیالوگ ویندوز
class WindowsDialog extends Dialog
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }
}

// کلاس کنکریت: پیاده‌سازی واقعی دیالوگ HTML
class HtmlDialog extends Dialog
{
    public function createButton(): Button
    {
        return new HtmlButton();
    }
}

// استفاده از کلاس‌های کنکریت برای نمونه‌سازی و رندر کردن دکمه‌ها
echo "Using Windows Dialog:\n";
$windowsDialog = new WindowsDialog();
$windowsDialog->render();

echo "\n\nUsing HTML Dialog:\n";
$htmlDialog = new HtmlDialog();
$htmlDialog->render();

