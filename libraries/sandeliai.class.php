<?php
/**
 * Automobilių redagavimo klasė
 *
 * @author ISK
 */

class sandeliai
{

	private $storages_table = '';
	private $restaurants_table = '';

	public function __construct()
	{
		$this->storages_table = config::DB_PREFIX . 'sandelys';
		$this->restaurants_table = config::DB_PREFIX . 'restoranas';
	}

	/**
	 * Sandėlio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getStorage($id)
	{
		$query = "  SELECT *
					FROM `{$this->storages_table}`
					WHERE `{$this->storages_table}`.`id_SANDELYS`='{$id}'";
		$data = mysql::select($query);

		return $data[0];
	}

	/**
	 * Automobilių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getStorages($limit = null, $offset = null)
	{
		$limitOffsetString = "";
		if (isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if (isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}

		$query = "  SELECT *, 
						`{$this->restaurants_table}`.`pavadinimas` AS `fk_restoranas_pavadinimas`
					FROM `{$this->storages_table}`
					LEFT JOIN `{$this->restaurants_table}`
							ON `{$this->storages_table}`.`fk_RESTORANASid_RESTORANAS`=`{$this->restaurants_table}`.`id_RESTORANAS`
					$limitOffsetString";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Automobilių kiekio radimas
	 * @return type
	 */
	public function getStoragesCount()
	{
		$query = "  SELECT COUNT(`{$this->storages_table}`.`id_SANDELYS`) AS `kiekis`
					FROM `{$this->storages_table}`";
		$data = mysql::select($query);

		return $data[0]['kiekis'];
	}

	/**
	 * Sandėlio atnaujinimas
	 * @param type $data
	 */
	public function updateStorage($data)
	{
		$query = "  UPDATE `{$this->storages_table}`
					SET    `temperatura`='{$data['temperatura']}',
						   `talpa`='{$data['talpa']}',
						   `paskutine_revizija`='{$data['paskutine_revizija']}',
						   `fk_RESTORANASid_RESTORANAS`='{$data['fk_RESTORANASid_RESTORANAS']}'						   
					WHERE `id_SANDELYS`='{$data['id_SANDELYS']}'";
		mysql::query($query);
	}

	/**
	 * Sandėlio įrašymas
	 * @param type $data
	 */
	public function insertStorage($data)
	{
		$query = "  INSERT INTO `{$this->storages_table}` 
								(
									`temperatura`,
						   			`talpa`,
						   			`paskutine_revizija`,
						   			`fk_RESTORANASid_RESTORANAS`
								) 
								VALUES
								(
									'{$data['temperatura']}',
									'{$data['talpa']}',
									'{$data['paskutine_revizija']}',
									'{$data['fk_RESTORANASid_RESTORANAS']}'
								)";
		mysql::query($query);
	}

	/**
	 * Sandėlio šalinimas
	 * @param type $id
	 */
	public function deleteStorage($id)
	{
		$query = "  DELETE FROM `{$this->storages_table}`
					WHERE `id_SANDELYS`='{$id}'";
		mysql::query($query);
	}
}