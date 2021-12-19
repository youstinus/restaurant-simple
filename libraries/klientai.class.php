<?php
/**
 * Klientų redagavimo klasė
 *
 * @author ISK
 */

class klientai {
	
	private $klientai_lentele = '';
	private $table_table = '';
	private $ivertinimu_lentele = '';

	public function __construct() {
		$this->klientai_lentele = config::DB_PREFIX . 'asmuo';
		$this->table_table = config::DB_PREFIX . 'staliukas';
		$this->ivertinimu_lentele = config::DB_PREFIX . 'ivertinimas';
	}
	
	/**
	 * Kliento išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getCustomer($id) {
		$query = "  SELECT *
					FROM `{$this->klientai_lentele}`
					WHERE `id_ASMUO`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Klientų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getCustomers($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `{$this->klientai_lentele}`
					LEFT JOIN `{$this->table_table}`
							ON `{$this->klientai_lentele}`.`fk_STALIUKASid_STALIUKAS`=`{$this->table_table}`.`id_STALIUKAS`
					" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Klientų kiekio radimas
	 * @return type
	 */
	public function getCustomersCount() {
		$query = "  SELECT COUNT(`id_ASMUO`) as `kiekis`
					FROM `{$this->klientai_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Kliento šalinimas
	 * @param type $id
	 */
	public function deleteCustomer($id) {
		$query = "  DELETE FROM `{$this->klientai_lentele}`
					WHERE `id_ASMUO`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Kliento įvertinimų šalinimas
	 * @param type $id
	 */
	public function deleteReviewsByCustomer($id) {
		$query = "  DELETE FROM `{$this->ivertinimu_lentele}`
					WHERE `fk_ASMUOid_ASMUO`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Kliento atnaujinimas
	 * @param type $data
	 */
	public function updateCustomer($data) {
		$query = "  UPDATE `{$this->klientai_lentele}`
					SET    `vardas`='{$data['vardas']}',
						   `pavarde`='{$data['pavarde']}',
						   `el_pastas`='{$data['el_pastas']}',
						   `telefonas`='{$data['telefonas']}',
						   `gimimo_data`='{$data['gimimo_data']}',
						   `asmens_kodas`='{$data['asmens_kodas']}'
					WHERE `id_ASMUO`='{$data['id_ASMUO']}'";
		$result = mysql::query($query);
	}
	
	/**
	 * Kliento įrašymas
	 * @param type $data
	 */
	public function insertCustomer($data) {
		$query = "  INSERT INTO `{$this->klientai_lentele}`
								(
									`vardas`,
									`pavarde`,
									`el_pastas`,
									`telefonas`,
									`gimimo_data`,
									`asmens_kodas`,
									`fk_STALIUKASid_STALIUKAS`
								) 
								VALUES
								(
									'{$data['vardas']}',
									'{$data['pavarde']}',
									'{$data['el_pastas']}',
									'{$data['telefonas']}',
									'{$data['gimimo_data']}',
									'{$data['asmens_kodas']}',
									'{$data['fk_STALIUKASid_STALIUKAS']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarčių, į kurias įtrauktas klientas, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getContractCountOfCustomer($id) {
		$query = "  SELECT COUNT(`{$this->table_table}`.`nr`) AS `kiekis`
					FROM `{$this->klientai_lentele}`
						LEFT JOIN `{$this->table_table}`
							ON `{$this->klientai_lentele}`.`id_ASMUO`=`{$this->table_table}`.`fk_klientas` ##pakeisti
					WHERE `{$this->klientai_lentele}`.`id_ASMUO`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
}