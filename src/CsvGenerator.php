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
   * @return mixed
   */
  public function getDelimiter() {
    return $this->delimiter;
  }

  /**
   * @param mixed $enclosure
   */
  public function setEnclosure($enclosure) {
    $this->enclosure = $enclosure;
  }

  /**
   * @return mixed
   */
  public function getEnclosure() {
    return $this->enclosure;
  }

}
