<?php
class Person {
    public $vklad;
    public $procent;
    public $time;
    public $dopmoney;

    public function __construct($vklad, $procent, $time, $dopmoney = 0)
    {
        $this->vklad = $vklad;
        $this->procent = $procent / 100 / 12;
        $this->time = $time;
        $this->dopmoney = $dopmoney;
    }

    public function calculate()
    {
        $amount = $this->vklad;

        for ($i = 0; $i < $this->time; $i++) {
            $amount += $this->dopmoney;
            $amount *= (1 + $this->procent);
        }

        return $amount;
    }

    public function displayResult() {
        $futureValue = $this->calculate();
        echo "Через $this->time месяцев ваша сумма вклада составит: " . round($futureValue, 2) . " рублей.";
    }
}
// Ввод данных: (a: Сумма вклада, b: Процентная ставка, c: Срок в месяцах, d: Дополнительные пополнения)
$person = new Person(50000, 16, 6,1000);
$person->displayResult();