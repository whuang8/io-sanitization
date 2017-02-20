<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_username('username')
  function has_valid_username($value) {
    return preg_match('/^[A-Za-z0-9_]+$/', $value);
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Custom validation that ensures correct email formatting in addition to whitelisting characters
    return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $value);
  }

  // has_valid_phone_number_format('(972)321-4823')
  function has_valid_phone_number_format($value) {
    // custom validation to check length of phone number
    return preg_match('/^[0-9-+()\s]+$/', $value) && has_length($value, array('min' => 4, 'max' => 20));
  }

  // has_valid_state_code('NJ')
  function has_valid_state_code($value) {
    // custom validations to ensure a state code of length 2 and only composed of letters
    return has_length($value, array('exact' => 2)) && preg_match('/^[A-Za-z]+$/', $value);
  }

  // has_valid_territory_position('21')
  function has_valid_territory_position($value) {
    // custom validation that ensures territory positions are numeric
    return preg_match('/^[0-9]+$/', $value);
  }

?>
