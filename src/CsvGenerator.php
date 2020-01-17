<?php

namespace Pasholvon;

class CsvGenerator {

  private $delimiter = ",";

  private $enclosure = '"';

  /**
   * @param mixed $delimiter
   */
  public function setDelimiter($delimiter) {
    $this->delimiter = $delimiter;
  }

  /**
   * @param mixed $delimiter
   */
  public function setDelimiter(string $delimiter) {
    if (strlen($delimiter) <= 1) {
      $this->delimiter = $delimiter;
    } else {
      trigger_error('Delimiter can be maximum one character.', E_USER_ERROR);
    }
  }

  /**
   * @return mixed
   */
  public function getDelimiter() {
    return $this->delimiter;
  }

  /**
   * @param mixed $enclosure
   */
  public function setEnclosure(string $enclosure) {
    if (strlen($enclosure) <= 1) {
      $this->enclosure = $enclosure;
    } else {
      throw new \Exception('Enclosure can be maximum one character.');
    }
  }

  /**
   * @return mixed
   */
  public function getEnclosure() {
    return $this->enclosure;
  }

}
