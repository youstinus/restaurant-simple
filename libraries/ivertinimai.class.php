<?php
/**
 * Automobilių modelių redagavimo klasė
 *
 * @author ISK
 */

class ivertinimai {
	
	private $evaluations_table = '';
	private $products_table = '';
	private $clients_table = '';
	private $evaluation_types_table = '';
	
	public function __construct() {
		$this->evaluations_table = config::DB_PREFIX . 'ivertinimas';
		$this->products_table = config::DB_PREFIX . 'gaminys';
		$this->clients_table = config::DB_PREFIX . 'asmuo';
		$this->evaluation_types_table = config::DB_PREFIX . 'ivertinimu_tipai';
	}
	
	/**
	 * Ivertinimo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getEvaluation($id) {
		$query = "  SELECT *
					FROM `{$this->evaluations_table}`
					WHERE `id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Ivertinimo sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getEvaluations($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT 	`{$this->evaluations_table}`.`id_IVERTINIMAS`,
							`{$this->evaluation_types_table}`.`name` AS `ivertinimo_tipas`,
							`{$this->evaluations_table}`.`komentaras`,
							`{$this->clients_table}`.`vardas` AS `fk_asmuo_vardas`,
							`{$this->clients_table}`.`pavarde` AS `fk_asmuo_pavarde`,
							`{$this->products_table}`.`pavadinimas` AS `fk_gaminys_pavadinimas`
					FROM {$this->evaluations_table}
					LEFT JOIN `{$this->clients_table}`
							ON `{$this->evaluations_table}`.`fk_ASMUOid_ASMUO`=`{$this->clients_table}`.`id_ASMUO`
					LEFT JOIN `{$this->products_table}`
							ON `{$this->evaluations_table}`.`fk_GAMINYSid_GAMINYS`=`{$this->products_table}`.`id_GAMINYS`
					LEFT JOIN `{$this->evaluation_types_table}`
							ON `{$this->evaluations_table}`.`ivertinimas`=`{$this->evaluation_types_table}`.`id_ivertinimu_tipai`
					ORDER BY `id_IVERTINIMAS` DESC
					{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Ivertinimų kiekio radimas
	 * @return type
	 */
	public function getEvaluationsCount() {
		$query = "  SELECT COUNT(`{$this->evaluations_table}`.`id_IVERTINIMAS`) as `kiekis`
					FROM `{$this->evaluations_table}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Modelio atnaujinimas
	 * @param type $data
	 */
	public function updateEvaluation($data) {
		$query = "  UPDATE `{$this->evaluations_table}`
					SET   	`ivertinimas`='{$data['ivertinimas']}',
							`komentaras`='{$data['komentaras']}',
							`fk_ASMUOid_ASMUO`='{$data['fk_ASMUOid_ASMUO']}',
						  	`fk_GAMINYSid_GAMINYS`='{$data['fk_GAMINYSid_GAMINYS']}'
					WHERE `id_IVERTINIMAS`='{$data['id_IVERTINIMAS']}'";
		mysql::query($query);
	}
	
	/**
	 * Modelio įrašymas
	 * @param type $data
	 */
	public function insertEvaluation($data) {
		$query = "  INSERT INTO `{$this->evaluations_table}`
								(
									`ivertinimas`,
									`komentaras`,
									`fk_ASMUOid_ASMUO`,
									`fk_GAMINYSid_GAMINYS`
								)
								VALUES
								(
									'{$data['ivertinimas']}',
									'{$data['komentaras']}',
									'{$data['fk_ASMUOid_ASMUO']}',
									'{$data['fk_GAMINYSid_GAMINYS']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Įvertinimo šalinimas
	 * @param type $id
	 */
	public function deleteEvaluation($id) {
		$query = "  DELETE FROM `{$this->evaluations_table}`
					WHERE `id_IVERTINIMAS`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Įvertinimų tipų sąrašo išrinkimas
	 * @return type
	 */
	public function getEvaluationTypes()
	{
		$query = "  SELECT *
					FROM `{$this->evaluation_types_table}`";
		$data = mysql::select($query);

		return $data;
	}
}