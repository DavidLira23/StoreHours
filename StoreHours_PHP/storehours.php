/**
 * Copyright 2024 David Lira
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

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
}
?>