<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_title_is_not_empty()
   {
    $title = 'Tarta de queso';
    $this->assertNotEmpty($title);
   }
}
