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

import java.time.DayOfWeek;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Map;

public class StoreHours {
    private final Map<String, String[]> hours;
    private final Map<String, String[]> exceptions;

    public StoreHours(Map<String, String[]> hours, Map<String, String[]> exceptions) {
        this.hours = hours;
        this.exceptions = exceptions;
    }

    public String[] hours() {
        DayOfWeek currentDayOfWeek = DayOfWeek.from(java.time.LocalDate.now());
        String currentDayKey = currentDayOfWeek.toString().substring(0, 3).toLowerCase();

        if (hours.containsKey(currentDayKey)) {
            return hours.get(currentDayKey);
        } else {
            return new String[]{};
        }
    }

    public String[] exceptions() {
        java.time.ZoneId madridZone = java.time.ZoneId.of("Europe/Madrid");
        java.time.LocalDate currentDate = java.time.LocalDate.now(madridZone);
        String formattedDate = currentDate.format(DateTimeFormatter.ofPattern("M/d"));

        if (exceptions.containsKey(formattedDate)) {
            return exceptions.get(formattedDate);
        } else {
            return new String[]{};
        }
    }

    public boolean isOpen() {
        String[] regularHours = hours();
        String[] exceptions = exceptions();

        if (regularHours != null && regularHours.length > 0 && !regularHours[0].isEmpty()) {
            java.time.LocalTime currentTime = java.time.LocalTime.now();
            java.time.format.DateTimeFormatter timeFormatter = java.time.format.DateTimeFormatter.ofPattern("HH:mm");

            for (String exception : exceptions) {
                String[] times = exception.split("-");
                String start = times[0].trim();
                String end = times[1].trim();

                if (isWithinTimeRange(currentTime, LocalTime.parse(start, timeFormatter), LocalTime.parse(end, timeFormatter))) {
                    return false;
                }
            }

            for (String hours : regularHours) {
                String[] times = hours.split("-");
                String start = times[0].trim();
                String end = times[1].trim();

                if (isWithinTimeRange(currentTime, LocalTime.parse(start, timeFormatter), LocalTime.parse(end, timeFormatter))) {
                    return true;
                }
            }
        }

        return false;
    }

    private boolean isWithinTimeRange(LocalTime currentTime, LocalTime start, LocalTime end) {
        return !currentTime.isBefore(start) && !currentTime.isAfter(end);
    }
}

