<?php
/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class saskaitos {

	private $bills_table = '';
	private $tables_table = '';
	private $orders_table = '';
	private $restaurants_table = '';
	
	public function __construct() {
		$this->bills_table = config::DB_PREFIX . 'saskaita';
		$this->tables_table = config::DB_PREFIX . 'staliukas';
		$this->orders_table = config::DB_PREFIX . 'uzsakymas';
		$this->restaurants_table = config::DB_PREFIX . 'restoranas';
	}
	
	/**
	 * Sąskaitų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getBills($limit, $offset) {
		$query = "  SELECT 	`{$this->bills_table}`.`id_SASKAITA`,
							`{$this->bills_table}`.`data`,
							`{$this->bills_table}`.`numeris`,
							`{$this->bills_table}`.`bendra_suma`,
							(CASE WHEN `{$this->bills_table}`.`apmoketa` <> 0 THEN 'Apmokėta' ELSE 'Neapmokėta' END) AS `apmoketa`,
							`{$this->tables_table}`.`numeris` AS `fk_staliukas_numeris`,
							`{$this->orders_table}`.`uzsakymo_numeris` AS `fk_uzsakymas_numeris`,
							`{$this->restaurants_table}`.`pavadinimas` AS `fk_restoranas_pavadinimas`
					FROM `{$this->bills_table}`
					LEFT JOIN `{$this->tables_table}`
							ON `{$this->bills_table}`.`fk_STALIUKASid_STALIUKAS`=`{$this->tables_table}`.`id_STALIUKAS`
					LEFT JOIN `{$this->orders_table}`
							ON `{$this->bills_table}`.`fk_UZSAKYMASid_UZSAKYMAS`=`{$this->orders_table}`.`id_UZSAKYMAS`
					LEFT JOIN `{$this->restaurants_table}`
							ON `{$this->bills_table}`.`fk_RESTORANASid_RESTORANAS`=`{$this->restaurants_table}`.`id_RESTORANAS`
					
							ORDER BY `{$this->bills_table}`.`numeris` DESC
					LIMIT {$limit} OFFSET {$offset}";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Sąskaitų kiekio radimas
	 * @return type
	 */
	public function getBillsCount() {
		$query = "  SELECT COUNT(`{$this->bills_table}`.`id_SASKAITA`) AS `kiekis`
					FROM `{$this->bills_table}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Sutarties išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getBill($id) {
		$query = "  SELECT *
					FROM `{$this->bills_table}`						
					WHERE `{$this->bills_table}`.`id_SASKAITA`='{$id}'";
		$data = mysql::select($query);

		return $data[0];
	}

	/**
	 * Sąskaitos išrinkimas pagal sąskaitos_numerį
	 * @param type $id
	 * @return type
	 */
	public function getBillByNumber($number) {
		$query = "  SELECT *
					FROM `{$this->bills_table}`						
					WHERE `{$this->bills_table}`.`saskaitos_numeris`='{$number}'";
		$data = mysql::select($query);

		return $data[0];
	}	
	
	/**
	 * Sutarties atnaujinimas
	 * @param type $data
	 */
	public function updateBill($data) {
		$query = "  UPDATE `{$this->bills_table}`
					SET    `numeris`='{$data['numeris']}',
						   `data`='{$data['data']}',
						   `bendra_suma`='{$data['bendra_suma']}',
						   `apmoketa`='{$data['apmoketa']}',
						   `fk_STALIUKASid_STALIUKAS`='{$data['fk_STALIUKASid_STALIUKAS']}',
						   `fk_UZSAKYMASid_UZSAKYMAS`='{$data['fk_UZSAKYMASid_UZSAKYMAS']}',
						   `fk_RESTORANASid_RESTORANAS`='{$data['fk_RESTORANASid_RESTORANAS']}'
					WHERE `id_SASKAITA`='{$data['id_SASKAITA']}'";
		mysql::query($query);
	}
	
	/**
	 * Sutarties įrašymas
	 * @param type $data
	 */
	public function insertBill($data) {
		$query = "  INSERT INTO `{$this->bills_table}`
								(
									`numeris`,
									`data`,
									`bendra_suma`,
									`apmoketa`,
									`fk_STALIUKASid_STALIUKAS`,
									`fk_UZSAKYMASid_UZSAKYMAS`,
									`fk_RESTORANASid_RESTORANAS`
								)
								VALUES
								(
									'{$data['numeris']}',
									'{$data['data']}',
									'{$data['bendra_suma']}',
									'{$data['apmoketa']}',
									'{$data['fk_STALIUKASid_STALIUKAS']}',
									'{$data['fk_UZSAKYMASid_UZSAKYMAS']}',
									'{$data['fk_RESTORANASid_RESTORANAS']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarties šalinimas
	 * @param type $id
	 */
	public function deleteBill($id) {
		$query = "  DELETE FROM `{$this->bills_table}`
					WHERE `id_SASKAITA`='{$id}'";
		mysql::query($query);
	}
}