<?php

class Reservation extends DatabaseReservation {

  public $id;
  public $date;
  public $hour;
  public $minute;
  public $client;
  public const hours = ['10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];
  public const minutes = ['00', '15', '30', '45'];

  public function __construct($args=[]) {
    $this->date = $args['date'] ?? '';
    $this->hour = $args['hour'] ?? '';
    $this->minute = $args['minute'] ?? '';
    $this->client = $args['client'] ?? '';

  }

  /*public function name() {
    return "{$this->brand} {$this->model} {$this->year}";
  }
  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->brand)) {
      $this->errors[] = "Brand cannot be blank.";
    }
    if(is_blank($this->model)) {
      $this->errors[] = "Model cannot be blank.";
    }
    return $this->errors;
  }*/


}

?>
