<?php

/**
 * اینترفیس Command که تمام دستورات باید آن را پیاده‌سازی کنند.
 * این اینترفیس شامل متد execute است که عملیات مورد نظر را اجرا می‌کند.
 */
interface Command {
    public function execute();
}

/**
 * کلاس Light که نمایانگر یک لامپ است.
 * این کلاس شامل متدهای روشن و خاموش کردن لامپ است.
 */
class Light {
    public function turnOn() {
        echo "لامپ روشن شد\n";
    }

    public function turnOff() {
        echo "لامپ خاموش شد\n";
    }
}

/**
 * کلاس Fan که نمایانگر یک فن است.
 * این کلاس شامل متدهای روشن و خاموش کردن فن است.
 */
class Fan {
    public function turnOn() {
        echo "فن روشن شد\n";
    }

    public function turnOff() {
        echo "فن خاموش شد\n";
    }
}

/**
 * کلاس LightOnCommand که دستور روشن کردن لامپ را پیاده‌سازی می‌کند.
 * این کلاس از اینترفیس Command ارث‌بری می‌کند و متد execute آن لامپ را روشن می‌کند.
 */
class LightOnCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOn();
    }
}

/**
 * کلاس LightOffCommand که دستور خاموش کردن لامپ را پیاده‌سازی می‌کند.
 * این کلاس از اینترفیس Command ارث‌بری می‌کند و متد execute آن لامپ را خاموش می‌کند.
 */
class LightOffCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOff();
    }
}

/**
 * کلاس FanOnCommand که دستور روشن کردن فن را پیاده‌سازی می‌کند.
 * این کلاس از اینترفیس Command ارث‌بری می‌کند و متد execute آن فن را روشن می‌کند.
 */
class FanOnCommand implements Command {
    private $fan;

    public function __construct(Fan $fan) {
        $this->fan = $fan;
    }

    public function execute() {
        $this->fan->turnOn();
    }
}

/**
 * کلاس FanOffCommand که دستور خاموش کردن فن را پیاده‌سازی می‌کند.
 * این کلاس از اینترفیس Command ارث‌بری می‌کند و متد execute آن فن را خاموش می‌کند.
 */
class FanOffCommand implements Command {
    private $fan;

    public function __construct(Fan $fan) {
        $this->fan = $fan;
    }

    public function execute() {
        $this->fan->turnOff();
    }
}

/**
 * کلاس RemoteControl که نقش کلاینت را ایفا می‌کند.
 * این کلاس می‌تواند دستورات مختلفی را دریافت و اجرا کند.
 */
class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}

// استفاده از پترن Command

// ایجاد اشیاء دستگاه‌ها
$light = new Light();
$fan = new Fan();

// ایجاد دستورات
$lightOn = new LightOnCommand($light);
$lightOff = new LightOffCommand($light);
$fanOn = new FanOnCommand($fan);
$fanOff = new FanOffCommand($fan);

// ایجاد کنترل از راه دور
$remote = new RemoteControl();

// تنظیم و اجرای دستورات
$remote->setCommand($lightOn);
$remote->pressButton(); // خروجی: لامپ روشن شد

$remote->setCommand($lightOff);
$remote->pressButton(); // خروجی: لامپ خاموش شد

$remote->setCommand($fanOn);
$remote->pressButton(); // خروجی: فن روشن شد

$remote->setCommand($fanOff);
$remote->pressButton(); // خروجی: فن خاموش شد

?>