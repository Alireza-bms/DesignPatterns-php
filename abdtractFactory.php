<?php
//
//interface Transport {
//    public function deliver($place);
//}
//
//class TruckA implements Transport {
//
//    public function deliver($place)
//    {
//        return $place;
//    }
//
//    public function someMethodA1()
//    {
//        return 'someThing';
//    }
//
//    public function someMethodA2()
//    {
//        return 'someThing';
//    }
//}
//class TruckB implements Transport {
//
//    public function deliver($place)
//    {
//        return $place;
//    }
//
//    public function someMethodB1()
//    {
//        return 'someThing';
//    }
//
//    public function someMethodB2()
//    {
//        return 'someThing';
//    }
//}
//
//class ShipA implements Transport {
//    public function deliver($place)
//    {
//        return $place;
//    }
//}
//class ShipB implements Transport {
//    public function deliver($place)
//    {
//        return $place;
//    }
//}
//
//abstract class ATransportFactory {
//    abstract public function createRoadTransport();
//    abstract public function createSeeTransport();
//}
//
//class TransportFactoryA extends ATransportFactory {
//
//    public function createRoadTransport()
//    {
//        return new TruckA();
//    }
//
//    public function createSeeTransport()
//    {
//        return new ShipB();
//    }
//}
//class TransportFactoryB extends ATransportFactory {
//
//    public function createRoadTransport()
//    {
//        return new TruckB();
//    }
//
//    public function createSeeTransport()
//    {
//        return new ShipA();
//    }
//}
//
//$transport = new TransportFactoryA();
//$transportB = new TransportFactoryB();
//
//// transport 1
//$truck1 = $transport->createRoadTransport();
//$truck1 = $truck1->deliver('Tehran');
//
//// transport 2
//$truck2 = $transport->createRoadTransport();
//$truck2 = $truck2->deliver('Shiraz');
//
//// transport 4
//$ship = $transportB->createSeeTransport();
//$ship = $ship->deliver('America');


// 1. تعریف محصولات انتزاعی
interface Button
{
    public function render();
}

interface Checkbox
{
    public function render();
}

// 2. تعریف Abstract Factory (رابط کارخانه)
interface GUIFactory
{
    public function createButton(): Button;

    public function createCheckbox(): Checkbox;
}

// 3. کلاس‌های کنکریت محصولات برای ویندوز
class WindowsButton implements Button
{
    public function render()
    {
        echo "Rendering a Windows Button.";
    }
}

class WindowsCheckbox implements Checkbox
{
    public function render()
    {
        echo "Rendering a Windows Checkbox.";
    }
}

// 4. کلاس‌های کنکریت محصولات برای مک
class MacButton implements Button
{
    public function render()
    {
        echo "Rendering a Mac Button.";
    }
}

class MacCheckbox implements Checkbox
{
    public function render()
    {
        echo "Rendering a Mac Checkbox.";
    }
}

// 5. کارخانه‌های کنکریت
class WindowsFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new WindowsCheckbox();
    }
}

class MacFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new MacCheckbox();
    }
}

// 6. استفاده از کارخانه انتخاب‌شده در کد کلاینت
function clientCode(GUIFactory $factory)
{
    $button = $factory->createButton();
    $checkbox = $factory->createCheckbox();

    $button->render();
    echo "\n";
    $checkbox->render();
}

// انتخاب و استفاده از کارخانه مناسب
echo "Using Windows Factory:\n";
clientCode(new WindowsFactory());

echo "\n\nUsing Mac Factory:\n";
clientCode(new MacFactory());



