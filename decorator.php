<?php

//interface Car {
//    public function cost();
//    public function description();
//}
//
//class Pride implements Car {
//
//    public function cost()
//    {
//        return 4000;
//    }
//
//    public function description()
//    {
//        return 'pride';
//    }
//}
//
//abstract class CarFeature implements Car {
//    protected $car;
//
//    public function __construct(Car $car)
//    {
//        $this->car = $car;
//    }
//
//    abstract public function cost();
//    abstract public function description();
//}
//
//class ZevarDar extends CarFeature {
//
//    public function cost()
//    {
//        return $this->car->cost() + 500;
//    }
//
//    public function description()
//    {
//        return $this->car->description() . ", ZevarDar";
//    }
//}
//
//class SunRoof extends CarFeature {
//
//    public function cost()
//    {
//        return $this->car->cost() + 2300;
//    }
//
//    public function description()
//    {
//        return $this->car->description() . ", SunRoof";
//    }
//}
//
//
//$pride = new Pride();
//$pride = new SunRoof($pride);
//
//$pride = new ZevarDar($pride);
//echo $pride->cost();
//echo '<br>';
//echo  $pride->description();

interface HtmlElement
{
    public function toHtml();
    public function getName();
}

class InputText implements HtmlElement
{

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function toHtml()
    {
        return "<input type='text' name=\"{$this->name}\" placeholder='فیلد مورد نظر را پر کنید' id=\"{$this->name}\">";
    }

    public function getName()
    {
        return $this->name;
    }
}

abstract class HtmlDecorator implements HtmlElement
{
    protected $element;
    public function __construct(HtmlElement $element)
    {
        $this->element = $element;
    }

    abstract public function toHtml();
    public function getName()
    {
        return $this->element->getName();
    }
}

class LabelDecorator extends HtmlDecorator
{
    protected $label;
    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function toHtml()
    {
        return "<label for=\"{$this->element->getName()}\" class=\"label-control\">{$this->label}</label>" . $this->element->toHtml();
    }
}
class ErrorDecorator extends HtmlDecorator
{
    protected $error;

    public function setError($message)
    {
        $this->error = $message;
    }

    public function toHtml()
    {
        return $this->element->toHtml() . "<span>{$this->error}</span>\n";
    }
}
$input = new InputText('firstName');
$labelled = new LabelDecorator($input);
$labelled->setLabel('firstName: ');
echo $labelled->toHtml();

echo '<br>';

$input2 = new InputText('lastName');
$labelled = new LabelDecorator($input2);
$labelled->setLabel('lastName: ');
$error = new ErrorDecorator($labelled);
$error->setError('You must enter a lastName');
echo $error->toHtml();
echo "ali";