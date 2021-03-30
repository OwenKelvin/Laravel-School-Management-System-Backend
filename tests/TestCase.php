<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
  use CreatesApplication;
//  use DatabaseSetup;

  protected function setUp(): void
  {
    parent::setUp();
//    $this->setupDatabase();
  }
}
