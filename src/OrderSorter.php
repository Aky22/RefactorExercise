<?php declare(strict_types=1);


namespace RefactorExercise;


class OrderSorter
{

    private $orders;

    public function __construct($orders) {
        $this->orders = $orders;
    }

    public function sortOrders(): bool {
        return usort($this->orders, function ($a, $b) {
            $pc = -1 * ($a['priority'] <=> $b['priority']);
            return $pc == 0 ? $a['created_at'] <=> $b['created_at'] : $pc;
        });
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

}