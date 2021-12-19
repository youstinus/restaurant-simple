<?php
/**
 * Padavėjų redagavimo klasė
 *
 * @author ISK
 */

class padavejai {
	
	private $waiters_table = '';
	private $orders_table = '';

	public function __construct() {
		$this->waiters_table = config::DB_PREFIX . 'padavejas';
		$this->orders_table = config::DB_PREFIX . 'uzsakymas';
	}
	
	/**
	 * Padavėjo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getWaiter($id) {
		$query = "  SELECT *
					FROM `{$this->waiters_table}`
					WHERE `id_PADAVEJAS`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Padavėjų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getWaiters($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `{$this->waiters_table}`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Padavėjų kiekio radimas
	 * @return type
	 */
	public function getWaitersCount() {
		$query = "  SELECT COUNT(`id_PADAVEJAS`) as `kiekis`
					FROM `{$this->waiters_table}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Padavėjo šalinimas
	 * @param type $id
	 */
	public function deleteWaiter($id) {
		$query = "  DELETE FROM `{$this->waiters_table}`
					WHERE `id_PADAVEJAS`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Padavėjo atnaujinimas
	 * @param type $data
	 */
	public function updateWaiter($data) {
		$query = "  UPDATE `{$this->waiters_table}`
					SET    `vardas`='{$data['vardas']}',
						   `pavarde`='{$data['pavarde']}'
					WHERE `id_PADAVEJAS`='{$data['id_PADAVEJAS']}'";
		mysql::query($query);
	}
	
	/**
	 * Padavėjo įrašymas
	 * @param type $data
	 */
	public function insertWaiter($data) {
		$query = "  INSERT INTO `{$this->waiters_table}`
								(
									`vardas`,
									`pavarde`
								) 
								VALUES
								(
									'{$data['vardas']}',
									'{$data['pavarde']}'
								)";
		mysql::query($query);
	}

	/**
	 * Padavėjų kiekio radimas
	 * @return type
	 */
	public function getOrdersCountByWaiter($id) {
		$query = "  SELECT COUNT(`fk_PADAVEJASid_PADAVEJAS`) as `kiekis`
					FROM `{$this->orders_table}`
					WHERE `{$this->orders_table}`.`fk_PADAVEJASid_PADAVEJAS`='$id'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}