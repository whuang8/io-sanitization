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
    return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $value);
  }

  // has_valid_phone_number_format('(972)321-4823')
  function has_valid_phone_number_format($value) {
    return preg_match('/^[0-9-+()\s]+$/', $value);
  }

?>
