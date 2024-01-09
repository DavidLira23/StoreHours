<?php

class StoreHours {
  private $hours;
  private $exceptions;

  public function __construct($hours, $exceptions) {
      $this->hours = $hours;
      $this->exceptions = $exceptions;
  }

  public function hours() {
      $currentDayOfWeek = date('N');
      $currentDayKey = strtolower(date('D'));

      if (isset($this->hours[$currentDayKey])) {
          return $this->hours[$currentDayKey];
      } else {
          return [];
      }
  }

  public function exceptions() {
    date_default_timezone_set('Europe/Madrid');
    $currentDate = date('n/j');

    if (isset($this->exceptions[$currentDate])) {
        return $this->exceptions[$currentDate];
    } else {
        return [];
    }
}

  public function isOpen() {
    date_default_timezone_set('Europe/Madrid');

    $regularHours = $this->hours();
    $exceptions = $this->exceptions();

    if (!is_null($regularHours) && is_array($regularHours) && !empty($regularHours) && !empty($regularHours[0])) {
       $currentTime = date('H:i');
      
      if (!empty($exceptions)) {
          foreach ($exceptions as $exception) {
              list($start, $end) = explode('-', $exception);
              if ($this->isWithinTimeRange($currentTime, $start, $end)) {
                  return false;
              }
          }
      }

      foreach ($regularHours as $hours) {
          list($start, $end) = explode('-', $hours);
          if ($this->isWithinTimeRange($currentTime, $start, $end)) {
              return true;
          }
      } 
    }

    return false;   
  }

  private function isWithinTimeRange($time, $start, $end) {
    $currentTime = date('H:i', strtotime($time));
    $startTime = date('H:i', strtotime($start));
    $endTime = date('H:i', strtotime($end));

    return ($currentTime >= $startTime && $currentTime <= $endTime);
  }

  public function __toString() {
    return 'StoreHours Object';
  }
}
?>