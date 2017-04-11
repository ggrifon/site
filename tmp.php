<?php
class Car
{
    private $engineStatus;

    private $currentSpeed;

    /**
     * @return mixed
     * @throws Exception
     */
    public function getEngineStatus()
    {
        if (is_null($this->engineStatus)) throw new Exception('Статус двигателя не задан');
        return $this->engineStatus;
    }

    /**
     * @param mixed $engineStatus
     * @throws Exception
     */
    public function setEngineStatus($engineStatus)
    {
        if (! is_bool($engineStatus)) throw new Exception('Значение должно быть булевым');
        $this->engineStatus = $engineStatus;
    }

    /**
     * @return mixed
     */
    public function getCurrentSpeed()
    {
        return $this->currentSpeed;
    }

    /**
     * @param mixed $currentSpeed
     * @throws Exception
     */
    public function setCurrentSpeed($currentSpeed)
    {
        if (! is_integer($currentSpeed)) throw new Exception('Значение скорости должно быть целым числом');
        $this->currentSpeed = $currentSpeed;
    }
}

echo '<pre>';
$car = new Car();



$car->setEngineStatus(true);
$engineStatus = $car->getEngineStatus();
$car->setCurrentSpeed(10);
$currentSpeed = $car->getCurrentSpeed();

var_dump($engineStatus, $currentSpeed);