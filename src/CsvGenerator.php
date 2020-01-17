<?php

namespace Pasholvon;

class CsvGenerator {

  private $delimiter = ",";

  private $enclosure = '"';

  private $startColumn;

  private $startRow;

  private $csv;

  public function startGenerator($start_column = 0, $start_row = 0) {
    $this->startColumn = $start_column;
    $this->startRow = $start_row;
    $this->csv = '';
  }

  public function addRow(array $row) {
    if($this->enclosure !== '') {
      $row = $this->encloseRow($row);
    }
    if($this->csv !== NULL) {
      $this->csv .= implode($this->delimiter, $row) . PHP_EOL;
    }
  }

  public function encloseRow(array $row): array {
    foreach ($row as $value) {
      $enclosed_row[] = str_pad($value, strlen($value) + 2, $this->enclosure, STR_PAD_BOTH);
    }
    return $enclosed_row;
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
