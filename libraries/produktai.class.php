<?php
/**
 * Automobilių markių redagavimo klasė
 *
 * @author ISK
 */

class produktai
{
	private $products_table = '';
	private $measuring_units_table = '';
	private $allergen_table = '';

	public function __construct()
	{
		$this->products_table = config::DB_PREFIX . 'produktas';
		$this->measuring_units_table = config::DB_PREFIX . 'matavimo_vienetai';
		$this->allergen_table = config::DB_PREFIX . 'alergenai';
	}

	/**
	 * Produkto išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getProduct($id)
	{
		$query = "  SELECT *
					FROM {$this->products_table}
					WHERE `id_PRODUKTAS`='{$id}'";
		$data = mysql::select($query);

		return $data[0];
	}

	/**
	 * Produktų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getProducts($limit = null, $offset = null)
	{
		$limitOffsetString = "";
		if (isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";

			if (isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}
		}

		$query = "  SELECT
						`{$this->products_table}`.`id_PRODUKTAS`,
						`{$this->products_table}`.`pavadinimas`,
						`{$this->products_table}`.`kiekis`,
						`{$this->allergen_table}`.`name` AS `alergenas`,
						`{$this->measuring_units_table}`.`name` AS `matavimo_vienetas`,
						`{$this->products_table}`.`fk_SANDELYSid_SANDELYS`
					FROM {$this->products_table}

					LEFT JOIN `{$this->allergen_table}`
							ON `{$this->products_table}`.`alergenas`=`{$this->allergen_table}`.`id_alergenai`
					LEFT JOIN `{$this->measuring_units_table}`
							ON `{$this->products_table}`.`matavimo_vienetas`=`{$this->measuring_units_table}`.`id_matavimo_vienetai`
					
					{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Produktų kiekio radimas
	 * @return type
	 */
	public function getProductsCount()
	{
		$query = "  SELECT COUNT(`id_PRODUKTAS`) as `kiekis`
					FROM {$this->products_table}";
		$data = mysql::select($query);

		return $data[0]['kiekis'];
	}

	/**
	 * Produkto įrašymas
	 * @param type $data
	 */
	public function insertProduct($data)
	{
		$query = "  INSERT INTO {$this->products_table}
								(
									`pavadinimas`,
									`kiekis`,
									`alergenas`,
									`matavimo_vienetas`,
									`fk_SANDELYSid_SANDELYS`
								)
								VALUES
								(
									'{$data['pavadinimas']}',
									'{$data['kiekis']}',
									'{$data['alergenas']}',
									'{$data['matavimo_vienetas']}',
									'{$data['fk_SANDELYSid_SANDELYS']}'
								)";
		mysql::query($query);
	}

	/**
	 * Produkto atnaujinimas
	 * @param type $data
	 */
	public function updateProduct($data)
	{
		$query = "  UPDATE {$this->products_table}
					SET   
					`pavadinimas`='{$data['pavadinimas']}',
					`kiekis`='{$data['kiekis']}',
					`alergenas`='{$data['alergenas']}',
					`matavimo_vienetas`='{$data['matavimo_vienetas']}',
					`fk_SANDELYSid_SANDELYS`='{$data['fk_SANDELYSid_SANDELYS']}'
					WHERE `id_PRODUKTAS`='{$data['id_PRODUKTAS']}'";
		mysql::query($query);
	}

	/**
	 * Produkto šalinimas
	 * @param type $id
	 */
	public function deleteProduct($id)
	{
		$query = "  DELETE FROM {$this->products_table}
					WHERE `id_PRODUKTAS`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Matavimo vienetų sąrašo išrinkimas
	 * @return type
	 */
	public function getMatavimoVienetuList()
	{
		$query = "  SELECT *
					FROM `{$this->measuring_units_table}`";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Alergenų sąrašo išrinkimas
	 * @return type
	 */
	public function getAlergenuList()
	{
		$query = "  SELECT *
					FROM `{$this->allergen_table}`";
		$data = mysql::select($query);

		return $data;
	}
}
