<?php
function bn_number($str) {
    $en=array(1,2,3,4,5,6,7,8,9,0);
    $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str=str_replace($en,$bn,$str);
    $en=array('January','February','March','April','May','Jun','July','August','September','October','November','December');
    $en_short=array('Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec');
    $bn=array('জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','অগাস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
    $bn_short=array('জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','অগাস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
    $str=str_replace($en,$bn,$str);
    $str=str_replace($en_short,$bn,$str);
    $en=array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short=array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short=array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $bn=array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str=str_replace($en,$bn,$str);$str=str_replace($en_short,$bn_short,$str);
    $en=array('am','pm');$bn=array('( সকাল )','( বিকাল )');
    $str=str_replace($en,$bn,$str);
    return $str;
}


class BanglaDate {
  private $timestamp;
  private $morning;
  private $engHour;
  private $engDate;
  private $engMonth;
  private $engYear;
  private $bangDate;
  private $bangMonth;
  private $bangYear;
  private $bn_months = array("পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র", "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ");
  private $bn_month_dates = array(30,30,30,30,31,31,31,31,31,30,30,30);

  private $bn_month_middate = array(13,12,14,13,14,14,15,15,15,15,14,14); 
  private $lipyearindex = 3;

  function __construct( $timestamp, $hour = 6 ) {
      $this->BanglaDate( $timestamp, $hour );
  }
  function BanglaDate( $timestamp, $hour = 6 ) {
      $this->engDate = date( 'd', $timestamp );
      $this->engMonth = date( 'm', $timestamp );
      $this->engYear = date( 'Y', $timestamp );
      $this->morning = $hour;
      $this->engHour = date( 'G', $timestamp );
      //calculate the bangla date
      $this->calculate_date();
      //now call calculate_year for setting the bangla year
      $this->calculate_year();
      //convert english numbers to Bangla
      $this->convert();
  }

  function set_time( $timestamp, $hour = 6 ) {
      $this->BanglaDate( $timestamp, $hour );
  }
  private function calculate_date() {
      $this->bangDate = $this->engDate - $this->bn_month_middate[$this->engMonth - 1];
      if ($this->engHour < $this->morning) 
      $this->bangDate -= 1;
      
      if (($this->engDate <= $this->bn_month_middate[$this->engMonth - 1]) || ($this->engDate == $this->bn_month_middate[$this->engMonth - 1] + 1 && $this->engHour < $this->morning) ) {
          $this->bangDate += $this->bn_month_dates[$this->engMonth - 1];
          if ($this->is_leapyear() && $this->lipyearindex == $this->engMonth) 
          $this->bangDate += 1;
          $this->bangMonth = $this->bn_months[$this->engMonth - 1];
      }else{
          $this->bangMonth = $this->bn_months[($this->engMonth)%12]; 
      }
  }

  function is_leapyear() {
      if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
      return true;
      else
      return false;
  }

  function calculate_year() {
      $this->bangYear = $this->engYear - 593;
      if (($this->engMonth < 4) || (($this->engMonth == 4) && (($this->engDate < 14) || ($this->engDate == 14 && $this->engHour < $this->morning))))
      $this->bangYear -= 1;
  }

  function bangla_number( $int ) {
      $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
      $bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
      $converted = str_replace( $engNumber, $bangNumber, $int );
      return $converted;
  }

  function convert() {
      $this->bangDate = $this->bangla_number( $this->bangDate );
      $this->bangYear = $this->bangla_number( $this->bangYear );
  }

  function get_date() {
      return array($this->bangDate, $this->bangMonth, $this->bangYear);
  }

}

function BDdate($time){
  $bn = new BanglaDate($time);
  $output = $bn->get_date();
  $ReadyDate = "$output[0] $output[1] $output[2]"." বঙ্গাব্দ";
  return $ReadyDate;
}