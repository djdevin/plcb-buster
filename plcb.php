<?php

include_once "vendor/autoload.php";

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

// Chrome
$driver = RemoteWebDriver::create('localhost:4444', DesiredCapabilities::chrome());


while (true) {
  $driver->get('https://www.finewineandgoodspirits.com/webapp/wcs/stores/servlet/SpecialAccessLandingPageView?langId=-1&storeId=10051&catalogId=10051');
  $source = $driver->getPageSource();
  if (strpos($source, 'StoreClosed') === FALSE) {
    // We did it!!!
    break;
  }
  else {
    $driver->manage()->deleteAllCookies();
    // Random sleep, just in case there is a rate limit.
    sleep(random_int(1, 2));
  }
}
