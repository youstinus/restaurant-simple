<?php
/**
 * Restoranų redagavimo klasė
 *
 * @author ISK
 */

class restoranai {
	
	private $restaurants_table = '';
	
	public function __construct() {
		$this->restaurants_table = config::DB_PREFIX . 'restoranas';
	}
	
	/**
	 * Restorano išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getRestaurant($id) {
		$query = "  SELECT *
					FROM {$this->restaurants_table}
					WHERE `id_RESTORANAS`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Restoranų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getRestaurants($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT *
					FROM {$this->restaurants_table}{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Restoranų kiekio radimas
	 * @return type
	 */
	public function getRestaurantsCount() {
		$query = "  SELECT COUNT(`id_RESTORANAS`) as `kiekis`
					FROM {$this->restaurants_table}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Restorano įrašymas
	 * @param type $data
	 */
	public function insertRestaurant($data) {
		$query = "  INSERT INTO {$this->restaurants_table}
								(
									`pavadinimas`,
									`adresas`,
									`el_pastas`,
									`telefonas`,
									`imones_kodas`,
									`banko_saskaita`
								)
								VALUES
								(
									'{$data['pavadinimas']}',
									'{$data['adresas']}',
									'{$data['el_pastas']}',
									'{$data['telefonas']}',
									'{$data['imones_kodas']}',
									'{$data['banko_saskaita']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Restorano atnaujinimas
	 * @param type $data
	 */
	public function updateRestaurant($data) {
		$query = "  UPDATE {$this->restaurants_table}
					SET    	`pavadinimas`='{$data['pavadinimas']}',
							`adresas`='{$data['adresas']}',
							`el_pastas`='{$data['el_pastas']}',
							`telefonas`='{$data['telefonas']}',
							`imones_kodas`='{$data['imones_kodas']}',
							`banko_saskaita`='{$data['banko_saskaita']}'
					WHERE `id_RESTORANAS`='{$data['id_RESTORANAS']}'";
		mysql::query($query);
	}
	
	/**
	 * Restorano šalinimas
	 * @param type $id
	 */
	public function deleteRestaurant($id) {
		$query = "  DELETE FROM {$this->restaurants_table}
					WHERE `id_RESTORANAS`='{$id}'";
		mysql::query($query);
	}	
}