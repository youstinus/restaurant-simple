<?php
/**
 * Staliukų redagavimo klasė
 *
 * @author ISK
 */

class staliukai {

	private $tables_table = '';
	private $waiters_table = '';
	private $bills_table = '';

	public function __construct() {
		$this->tables_table = config::DB_PREFIX . 'staliukas';
		$this->waiters_table = config::DB_PREFIX . 'padavejas';
		$this->bills_table = config::DB_PREFIX . 'saskaita';
	}
	
	/**
	 * Staliuko išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getTable($id) {
		$query = "  SELECT `{$this->tables_table}`.`id_STALIUKAS`,
						   `{$this->tables_table}`.`numeris`,
						   `{$this->tables_table}`.`vietu_skaicius`,
						   `{$this->waiters_table}`.`vardas` AS `fk_padavejas_vardas`,
						   `{$this->waiters_table}`.`pavarde` AS `fk_padavejas_pavarde`
					FROM `{$this->tables_table}`
					
					LEFT JOIN `{$this->waiters_table}`
						ON `{$this->tables_table}`.`fk_PADAVEJASid_PADAVEJAS`=`{$this->waiters_table}`.`id_PADAVEJAS`
					WHERE `{$this->tables_table}`.`id_STALIUKAS`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}

	/**
	 * Staliukų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getTables($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}

		$query = "SELECT 	`{$this->tables_table}`.`id_STALIUKAS`,
						   `{$this->tables_table}`.`numeris`,
						   `{$this->tables_table}`.`vietu_skaicius`,
						   `{$this->waiters_table}`.`vardas` AS `fk_padavejas_vardas`,
						   `{$this->waiters_table}`.`pavarde` AS `fk_padavejas_pavarde`
					FROM `{$this->tables_table}`
					LEFT JOIN `{$this->waiters_table}`
						ON `{$this->tables_table}`.`fk_PADAVEJASid_PADAVEJAS`=`{$this->waiters_table}`.`id_PADAVEJAS`
						-- ORDER BY `{$this->tables_table}`.`numeris` DESC
						{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Staliukų kiekio radimas
	 * @return type
	 */
	public function getTablesCount() {
		$query = "  SELECT COUNT(`{$this->tables_table}`.`id_STALIUKAS`) as `kiekis`
					FROM `{$this->tables_table}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	/**
	 * Staliuko įrašymas
	 * @param type $data
	 */
	public function insertTable($data) {
		$query = "  INSERT INTO `{$this->tables_table}` 
								(
									`numeris`,
									`vietu_skaicius`,
									`fk_PADAVEJASid_PADAVEJAS`
								) 
								VALUES
								(
									'{$data['numeris']}',
									'{$data['vietu_skaicius']}',
									'{$data['fk_PADAVEJASid_PADAVEJAS']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Staliuko atnaujinimas
	 * @param type $data
	 */
	public function updateTable($data) {
		$query = "  UPDATE `{$this->tables_table}`
					SET    `numeris`='{$data['numeris']}',
						   `vietu_skaicius`='{$data['vietu_skaicius']}',
						   `fk_PADAVEJASid_PADAVEJAS`='{$data['fk_PADAVEJASid_PADAVEJAS']}'
					WHERE  `id_STALIUKAS`='{$data['id_STALIUKAS']}'";
		mysql::query($query);
	}
	
	/**
	 * Staliuko šalinimas
	 * @param type $id
	 */
	public function deleteTable($id) {
		$query = "  DELETE FROM `{$this->tables_table}`
					WHERE `id_STALIUKAS`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Sąskaitų kiekio priklausančio staliukui radimas
	 * @return type
	 */
	public function getBillsCountOfTable($id) {
		$query = "  SELECT COUNT(`{$this->bills_table}`.`fk_STALIUKASid_STALIUKAS`) as `kiekis`
					FROM `{$this->bills_table}`
					WHERE `fk_STALIUKASid_STALIUKAS`=$id";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}