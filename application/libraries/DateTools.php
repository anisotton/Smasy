<?php
class DateTools{

    const MONDAY = 'Mon';
    const TUESDAY = 'Tue';
    const WEDENSDAY = 'Wed';
    const THURSDAY = 'Thu';
    const FRIDAY = 'Fri';
    const SATURDAY = 'Sat';
    const SUNDAY = 'Sun';

    public function GetYeardays($dateStart, $dateend){
        $period = new \DatePeriod(
            new \DateTime($dateStart), new \DateInterval('P1D'), (new \DateTime($dateend))
        );
        $dates = iterator_to_array($period);

        $arrayreturn = array();
        foreach ($dates as $val) {
            $date = $val->format('Y-m-d'); //format date
            $get_name = date('l', strtotime($date)); //get week day
            $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
            switch ($day_name) {
                case self::MONDAY:
                    $MONDAY[] = $date;
                    $arrayreturn[1] = $MONDAY;
                    break;
                case self::TUESDAY:
                    $TUESDAY[] = $date;
                    $arrayreturn[2] = $TUESDAY;
                    break;
                case self::WEDENSDAY:
                    $WEDENSDAY[] = $date;
                    $arrayreturn[3] = $WEDENSDAY;
                    break;
                case self::THURSDAY:
                    $THURSDAY[] = $date;
                    $arrayreturn[4] = $THURSDAY;
                    break;
                case self::FRIDAY:
                    $FRIDAY[] = $date;
                    $arrayreturn[5] = $FRIDAY;
                    break;
                case self::SATURDAY:
                    $SATURDAY[] = $date;
                    $arrayreturn[6] = $SATURDAY;
                    break;
                case self::SUNDAY:
                    $SUNDAY[] = $date;
                    $arrayreturn[7] = $SUNDAY;
                    break;
            }
        }
        return $arrayreturn;
    }
} ?>