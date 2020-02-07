<?php

namespace Pasholvon;

class CsvGenerator {

  private $delimiter = ',';

  private $enclosure = '"';

  private $csv = '';

  private $start_column = 1;

  private $start_row = 1;

  /**
   * Function prepends empty cells at the beginning  of the CSV.
   *
   * @param int $start_column
   * @param int $start_row
   */
  public function startGenerator(int $start_column = 1, int $start_row = 1): void {
    // Prepare empty cells for start column and row.
    if ($start_column > 1 || $start_row > 1) {
      $this->start_column = $start_column;
      $this->start_row = $start_row;
      $row = array_fill(0, $start_column -1 , "");
      if (empty($row)) {
        $row = ['',];
      }
      for ($i = 1; $i < $start_row; $i++) {
        $this->addRow($row);
      }
    }
  }

  /**
   *  Function resets class variables to default values.
   */
  public function endGenerator(): void {
    $this->delimiter = ',';
    $this->enclosure = '"';
    $this->csv = '';
  }

  /**
   * Function is responsible for adding row to the CSV.
   *
   * @param array $row
   */
  public function addRow(array $row): void {
    if($this->start_column > 1) {
      // Prepend empty column to the row.
      $start_column_array = array_fill(0, $this->start_column - 1, '');
      array_unshift($row, ...$start_column_array);
    }
    if($this->enclosure !== '') {
      $row = $this->encloseRow($row);
    }
    $this->csv .= implode($this->delimiter, $row) . PHP_EOL;
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
  public function setDelimiter(string $delimiter): void {
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
  public function setEnclosure(string $enclosure): void {
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

  /**
   * @return mixed
   */
  public function getCsv() {
    return $this->csv;
  }

}
