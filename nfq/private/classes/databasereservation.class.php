<?php

class DatabaseReservation {

  static protected $database;
  static protected $table_name = "reservation";


  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $connection = new mysqli("localhost", "id8781240_taudau1", "test123", "id8781240_taudau1");
    $result = $connection->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all($per_page, $offset) {
    $date = date('Y-m-d');
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE YEAR(date) >= '" . $date . "' ";
    $sql .= "LIMIT " . $per_page . " ";
    $sql .= "OFFSET " . $offset;
    return static::find_by_sql($sql);
  }
  static public function find_all_ord($order, $per_page, $offset) {
    if($order == 0)
    {
      $sort = "ASC";
    }
    else
    {
      $sort = "DESC";
    }
    $date = date('Y-m-d');
    $sql = "SELECT * FROM client, " . static::$table_name . " ";
    $sql .= "WHERE YEAR(date) >= '" . $date . "' ";
    $sql .= "AND reservation.client = client.id ";
    $sql .= "ORDER BY client.visit_count " . $sort . " ";
    $sql .= "LIMIT " . $per_page . " ";
    $sql .= "OFFSET " . $offset;
    return static::find_by_sql($sql);
  }

  static public function find_all_by_criteria($date, $name, $order, $per_page, $offset) {
    if($order == 0)
    {
      $sort = "ASC";
    }
    else
    {
      $sort = "DESC";
    }
    $sql = "SELECT * FROM client, " . static::$table_name . " ";
    $sql .= "WHERE date='" . $date . "' ";
    $sql .= "AND reservation.client = client.id ";
    $sql .= "AND client.name LIKE '%" . $name . "%' ";
    $sql .= "ORDER BY client.visit_count " . $sort . " ";
    $sql .= "LIMIT " . $per_page . " ";
    $sql .= "OFFSET " . $offset;
    echo $sql;
    
    return static::find_by_sql($sql);
  }

  static public function count_all() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  static public function find_by_date_and_barber($date, $barber) {
    $sql = "SELECT * FROM " . static::$table_name . ", client, barber ";
    $sql .= "WHERE date='" . self::$database->escape_string($date) . "' ";
    $sql .= "AND reservation.client = client.id ";
    $sql .= "AND client.barberid ='" . $barber . "'";
    return static::find_by_sql($sql);

  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function find_by_clientid($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE client='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new static;
    // Could manually assign values to properties
    // but automatically assignment is easier and re-usable
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

  public function create($date, $hour, $minute, $id) {
    //$this->validate();
    //if(!empty($this->errors)) { return false; }

    //$attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= "date, hour, minute, client";
    $sql .= ") VALUES ('";
    $sql .= $date . "', '";
    $sql .= $hour . "', '";
    $sql .= $minute . "', '";
    $sql .= $id;
    $sql .= "')";
    echo $sql;
    $result = self::$database->query($sql);
    if($result) {
      $id = self::$database->insert_id;
    }
    return $result;
  }

  protected function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // Properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

    // After deleting, the instance of the object will still
    // exist, even though the database record does not.
    // This can be useful, as in:
    //   echo $user->first_name . " was deleted.";
    // but, for example, we can't call $user->update() after
    // calling $user->delete().
  }

}

?>
