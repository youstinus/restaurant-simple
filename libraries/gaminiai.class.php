<?php
/**
 * Automobilių markių redagavimo klasė
 *
 * @author ISK
 */

class gaminiai {
	
	private $gaminiu_lentele = '';
	private $produktu_lentele = '';
	private $restoranu_lentele = '';
	private $gaminiu_tipu_lentele = '';
	private $ruosiamas_produktu_lentele = '';
	private $uzsakomu_patiekalu_lentele = '';
	
	public function __construct() {
		$this->gaminiu_lentele = config::DB_PREFIX . 'gaminys';
		$this->produktu_lentele = config::DB_PREFIX . 'produktas';
		$this->restoranu_lentele = config::DB_PREFIX . 'restoranas';
		$this->gaminiu_tipu_lentele = config::DB_PREFIX . 'gaminiu_tipai';
		$this->ruosiamas_produktu_lentele = config::DB_PREFIX . 'ruosiamas_produktu';
		$this->uzsakomu_patiekalu_lentele = config::DB_PREFIX . 'uzsakomi_patiekalai';
        }
	
	/**
	 * Markės išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getGaminys($id) {
		$query = "  SELECT *
					FROM {$this->gaminiu_lentele}
					WHERE `id_GAMINYS`='{$id}'";
		$data = mysql::select($query);
						
		$query2 = "  SELECT *
					FROM {$this->ruosiamas_produktu_lentele}
					WHERE `fk_GAMINYSid_GAMINYS`='{$id}'
					";
		$data2 = mysql::select($query2);
		$data[0]['produktai'] = array();
		foreach ($data2 as $value) {
			array_push($data[0]['produktai'], $value['fk_PRODUKTASid_PRODUKTAS']);
		}

		return $data[0];
	}
	
	/**
	 * Markių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getGaminiuList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT
		`{$this->gaminiu_lentele}`.`id_GAMINYS`,
		`{$this->gaminiu_lentele}`.`pavadinimas`,
		`{$this->gaminiu_lentele}`.`galiojimo_data`,
		`{$this->gaminiu_lentele}`.`pagaminimo_data`,
		`{$this->gaminiu_lentele}`.`kaina`,
		`{$this->gaminiu_lentele}`.`tipas`,
		`{$this->restoranu_lentele}`.`pavadinimas` AS `fk_restoranas_pavadinimas`
					FROM {$this->gaminiu_lentele}
					LEFT JOIN `{$this->restoranu_lentele}`
							ON `{$this->gaminiu_lentele}`.`fk_RESTORANASid_RESTORANAS`=`{$this->restoranu_lentele}`.`id_RESTORANAS`
							{$limitOffsetString}";
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Markių kiekio radimas
	 * @return type
	 */
	public function getGaminiuListCount() {
		$query = "  SELECT COUNT(`id_GAMINYS`) as `kiekis`
					FROM {$this->gaminiu_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Markės įrašymas
	 * @param type $data
	 */
	public function insertGaminys($data) {
		$query = "  INSERT INTO {$this->gaminiu_lentele}
								(
									`pavadinimas`,
                                    `galiojimo_data`,
                                    `pagaminimo_data`,
                                    `kaina`,
                                    `tipas`,
                                    `fk_RESTORANASid_RESTORANAS`
                                                                        
								)
								VALUES
								(
									'{$data['pavadinimas']}',
                                    '{$data['galiojimo_data']}',
                                    '{$data['pagaminimo_data']}',
                                    '{$data['kaina']}',
                                    '{$data['tipas']}',
                                    '{$data['fk_RESTORANASid_RESTORANAS']}'
								)";
		mysql::query($query);
	}

	/**
	 * Markės įrašymas
	 * @param type $data
	 */
	public function insertExtendedGaminys($data) {
		$query = "  INSERT INTO {$this->gaminiu_lentele}
								(
									`pavadinimas`,
                                    `galiojimo_data`,
                                    `pagaminimo_data`,
                                    `kaina`,
                                    `tipas`,
                                    `fk_RESTORANASid_RESTORANAS`
                                                                        
								)
								VALUES
								(
									'{$data['pavadinimas']}',
                                    '{$data['galiojimo_data']}',
                                    '{$data['pagaminimo_data']}',
                                    '{$data['kaina']}',
                                    '{$data['tipas']}',
                                    '{$data['fk_RESTORANASid_RESTORANAS']}'
								)";
		$result = mysql::query($query);
		$tableIndex = mysql::getLastInsertedId();

		if (isset($data['produktai'])) {

			$query = "INSERT INTO `{$this->ruosiamas_produktu_lentele}` (`fk_PRODUKTASid_PRODUKTAS`,`fk_GAMINYSid_GAMINYS`) VALUES";
			foreach ($data['produktai'] as $value) {
				$query = $query . "
					('{$value}','{$tableIndex}'),";
			}
			$query[strlen($query)-1] = ';';
			$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);
		};		
	}
	
	/**
	 * Markės atnaujinimas
	 * @param type $data
	 */
	public function updateGaminys($data) {
		$query = "  UPDATE {$this->gaminiu_lentele}
					SET    `pavadinimas`='{$data['pavadinimas']}',
                                               `galiojimo_data`='{$data['galiojimo_data']}',
                                               `pagaminimo_data`='{$data['pagaminimo_data']}',
                                               `kaina`='{$data['kaina']}',
                                               `tipas`='{$data['tipas']}',
                                               `fk_RESTORANASid_RESTORANAS`='{$data['fk_RESTORANASid_RESTORANAS']}'
					WHERE `id_GAMINYS`='{$data['id_GAMINYS']}'";
		mysql::query($query);

		$query2 = "DELETE FROM `{$this->ruosiamas_produktu_lentele}` WHERE `fk_GAMINYSid_GAMINYS`='{$data['id_GAMINYS']}'";
		mysql::query($query2);

		if (isset($data['produktai'])) {
			$query = "INSERT INTO `{$this->ruosiamas_produktu_lentele}` (`fk_PRODUKTASid_PRODUKTAS`,`fk_GAMINYSid_GAMINYS`) VALUES";
			foreach ($data['produktai'] as $value) {
				$query = $query . "
					('{$value}','{$data['id_GAMINYS']}'),";
			}
			$query[strlen($query)-1] = ';';
			$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);
		};		
	}
	
	/**
	 * Markės šalinimas
	 * @param type $id
	 */
	public function deleteGaminys($id) {
		$query = "  DELETE FROM {$this->gaminiu_lentele}
					WHERE `id_GAMINYS`='{$id}'";
		$result = mysql::query($query);
	}	
	
	/**
	 * Markės šalinimas
	 * @param type $id
	 */
	public function deleteProductLinks($id) {
		$query = "  DELETE FROM {$this->ruosiamas_produktu_lentele}
					WHERE `fk_GAMINYSid_GAMINYS`='{$id}'";
		$result = mysql::query($query);
	}

	/**
	 * Markės modelių kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getProduktuCountOfGaminys($id) {
		$query = "  SELECT COUNT({$this->uzsakomu_patiekalu_lentele}.`fk_UZSAKYMASid_UZSAKYMAS`) AS `kiekis`
					FROM {$this->uzsakomu_patiekalu_lentele}						
					WHERE {$this->uzsakomu_patiekalu_lentele}.`fk_GAMINYSid_GAMINYS`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	/**
	 * Gaminių tipų sąrašo išrinkimas
	 * @return type
	 */
	public function getGaminiuTipai() {
		$query = "  SELECT *
					FROM `{$this->gaminiu_tipu_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}


}