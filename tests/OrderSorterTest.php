<?php declare(strict_types=1);
namespace RefactorExercise\Tests;

use PHPUnit\Framework\TestCase;
use RefactorExercise\OrderSorter;


class OrderSorterTest extends TestCase
{
    public function testSortOrders() {
        $orderSorterer = new OrderSorter([0 => ['product_id' => '2',
            'quantity' => '1',
            'priority' => '2',
            'created_at' => '2021-03-21 14:00:26'], 1 => ['product_id' => '1',
            'quantity' => '2',
            'priority' => '3',
            'created_at' => '2021-03-25 14:51:47']]);
        $this->assertTrue($orderSorterer->sortOrders());
        $this->assertEquals([0 => ['product_id' => '1',
            'quantity' => '2',
            'priority' => '3',
            'created_at' => '2021-03-25 14:51:47'], 1 => ['product_id' => '2',
            'quantity' => '1',
            'priority' => '2',
            'created_at' => '2021-03-21 14:00:26']],$orderSorterer->getOrders());
    }
}