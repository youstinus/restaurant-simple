<?php
/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class uzsakymai
{

	private $orders_table = '';
	private $waiters_table = '';
	private $tables_table = '';
	private $restaurants_table = '';
	private $order_states_table = '';
	private $bills_table = '';
	private $clients_table = '';
	private $uzsakomu_patiekalu_table = '';
	private $gaminiai_table = '';

	public function __construct()
	{
		$this->orders_table = config::DB_PREFIX . 'uzsakymas';
		$this->waiters_table = config::DB_PREFIX . 'padavejas';
		$this->tables_table = config::DB_PREFIX . 'staliukas';
		$this->restaurants_table = config::DB_PREFIX . 'restoranas';
		$this->order_states_table = config::DB_PREFIX . 'uzsakymo_busenos';
		$this->uzsakomu_patiekalu_table = config::DB_PREFIX . 'uzsakomi_patiekalai';
		$this->bills_table = config::DB_PREFIX . 'saskaita';
		$this->clients_table = config::DB_PREFIX . 'asmuo';
		$this->gaminiai_table = config::DB_PREFIX . 'gaminys';
	}

	/**
	 * Sutarčių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getOrders($limit = null, $offset = null)
	{
		$limitOffsetString = "";
		if (isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if (isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}

		$query = "  SELECT `{$this->orders_table}`.`id_UZSAKYMAS`,
						   `{$this->orders_table}`.`uzsakymo_numeris`,
						   `{$this->orders_table}`.`suma`,
						   `{$this->orders_table}`.`data`,
						   `{$this->order_states_table}`.`name` AS `busena`,
						   `{$this->waiters_table}`.`vardas` AS `fk_padavejas_vardas`,
						   `{$this->waiters_table}`.`pavarde` AS `fk_padavejas_pavarde`,
						   `{$this->tables_table}`.`numeris` AS `fk_staliukas_numeris`,
						   `{$this->restaurants_table}`.`pavadinimas` AS `fk_restoranas_pavadinimas`
					FROM `{$this->orders_table}`
						LEFT JOIN `{$this->order_states_table}`
							ON `{$this->orders_table}`.`busena`=`{$this->order_states_table}`.`id_uzsakymo_busenos`
						LEFT JOIN `{$this->waiters_table}`
							ON `{$this->orders_table}`.`fk_PADAVEJASid_PADAVEJAS`=`{$this->waiters_table}`.`id_PADAVEJAS`
						LEFT JOIN `{$this->tables_table}`
							ON `{$this->orders_table}`.`fk_STALIUKASid_STALIUKAS`=`{$this->tables_table}`.`id_STALIUKAS`
						LEFT JOIN `{$this->restaurants_table}`
							ON `{$this->orders_table}`.`fk_RESTORANASid_RESTORANAS`=`{$this->restaurants_table}`.`id_RESTORANAS`
							ORDER BY `{$this->orders_table}`.`uzsakymo_numeris` DESC
						{$limitOffsetString}";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Sutarčių kiekio radimas
	 * @return type
	 */
	public function getOrdersCount()
	{
		$query = "  SELECT COUNT(`{$this->orders_table}`.`id_UZSAKYMAS`) AS `kiekis`
					FROM `{$this->orders_table}`";
		$data = mysql::select($query);

		return $data[0]['kiekis'];
	}

	/**
	 * Sutarties išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getOrder($id)
	{
		$query = "  SELECT `{$this->orders_table}`.`id_UZSAKYMAS`,
		`{$this->orders_table}`.`uzsakymo_numeris`,
		`{$this->orders_table}`.`suma`,
		`{$this->orders_table}`.`data`,
		`{$this->order_states_table}`.`name` AS `busena_name`,
		`{$this->waiters_table}`.`vardas` AS `fk_padavejas_vardas`,
		`{$this->waiters_table}`.`pavarde` AS `fk_padavejas_pavarde`,
		`{$this->tables_table}`.`numeris`,
		`{$this->tables_table}`.`vietu_skaicius`,
		`{$this->tables_table}`.`fk_PADAVEJASid_PADAVEJAS`,
		`{$this->orders_table}`.`fk_STALIUKASid_STALIUKAS`,		
		`{$this->restaurants_table}`.`pavadinimas` AS `fk_restoranas_pavadinimas`,
		`{$this->orders_table}`.`fk_RESTORANASid_RESTORANAS`,
		`{$this->orders_table}`.`busena`		
 FROM `{$this->orders_table}`
	 LEFT JOIN `{$this->order_states_table}`
		 ON `{$this->orders_table}`.`busena`=`{$this->order_states_table}`.`id_uzsakymo_busenos`
	 LEFT JOIN `{$this->waiters_table}`
		 ON `{$this->orders_table}`.`fk_PADAVEJASid_PADAVEJAS`=`{$this->waiters_table}`.`id_PADAVEJAS`
	 LEFT JOIN `{$this->tables_table}`
		 ON `{$this->orders_table}`.`fk_STALIUKASid_STALIUKAS`=`{$this->tables_table}`.`id_STALIUKAS`
	 LEFT JOIN `{$this->restaurants_table}`
		 ON `{$this->orders_table}`.`fk_RESTORANASid_RESTORANAS`=`{$this->restaurants_table}`.`id_RESTORANAS`
	WHERE `{$this->orders_table}`.`id_UZSAKYMAS`='{$id}'";
		$data = mysql::select($query);


		$query2 = "  SELECT *
					FROM `{$this->gaminiai_table}`
					LEFT JOIN `{$this->uzsakomu_patiekalu_table}`
						ON `{$this->gaminiai_table}`.`id_GAMINYS`=`{$this->uzsakomu_patiekalu_table}`.`fk_GAMINYSid_GAMINYS`
					WHERE `fk_UZSAKYMASid_UZSAKYMAS`='{$data[0]['id_UZSAKYMAS']}'
					";
		$data2 = mysql::select($query2);
		$data[0]['gaminiai'] = array();
		foreach ($data2 as $value) {
			array_push($data[0]['gaminiai'], $value['id_GAMINYS']);
		}


		return $data[0];
	}

	/**
	 * Užsakytų papildomų paslaugų sąrašo išrinkimas
	 * @param type $orderId
	 * @return type
	 */
	public function getOrderedServices($orderId)
	{
		$query = "  SELECT *
					FROM `{$this->order_states_table}`
					WHERE `fk_sutartis`='{$orderId}'";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Sutarties atnaujinimas
	 * @param type $data
	 */
	public function updateOrder($data)
	{
		$query = "  UPDATE `{$this->orders_table}`
					SET    `uzsakymo_numeris`='{$data['uzsakymo_numeris']}',
						   `suma`='{$data['suma']}',
						   `data`='{$data['data']}',
						   `busena`='{$data['busena']}',
						   `fk_PADAVEJASid_PADAVEJAS`='{$data['fk_PADAVEJASid_PADAVEJAS']}',
						   `fk_RESTORANASid_RESTORANAS`='{$data['fk_RESTORANASid_RESTORANAS']}',
						   `fk_STALIUKASid_STALIUKAS`='{$data['fk_STALIUKASid_STALIUKAS']}'
					WHERE `id_UZSAKYMAS`='{$data['id_UZSAKYMAS']}'";
		mysql::query($query);
	}

	/**
	 * Sutarties įrašymas
	 * @param type $data
	 */
	public function insertOrder($data)
	{
		$query = "  INSERT INTO `{$this->orders_table}`
								(
									`uzsakymo_numeris`,
									`suma`,
									`data`,
									`busena`,
									`fk_PADAVEJASid_PADAVEJAS`,
									`fk_RESTORANASid_RESTORANAS`,
									`fk_STALIUKASid_STALIUKAS`
								)
								VALUES
								(
									'{$data['uzsakymo_numeris']}',
									'{$data['suma']}',
									'{$data['data']}',
									'{$data['busena']}',
									'{$data['fk_PADAVEJASid_PADAVEJAS']}',
									'{$data['fk_RESTORANASid_RESTORANAS']}',
									'{$data['fk_STALIUKASid_STALIUKAS']}'
								)";
		mysql::query($query);
	}

	/**
	 * Sutarties įrašymas
	 * @param type $data
	 */
	public function insertExtendedOrder($data)
	{
		$query = "	INSERT INTO `{$this->tables_table}`
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

		$result = mysql::query($query);
		$tableIndex = mysql::getLastInsertedId();
		if ($result && $tableIndex != null && $tableIndex > 0) {
			$query = "INSERT INTO `{$this->orders_table}`
						(
							`uzsakymo_numeris`,
							`suma`,
							`data`,
							`busena`,
							`fk_PADAVEJASid_PADAVEJAS`,
							`fk_RESTORANASid_RESTORANAS`,
							`fk_STALIUKASid_STALIUKAS`
						)
						VALUES
						(
							'{$data['uzsakymo_numeris']}',
							'{$data['suma']}',
							'{$data['data']}',
							'{$data['busena']}',
							'{$data['fk_PADAVEJASid_PADAVEJAS']}',
							'{$data['fk_RESTORANASid_RESTORANAS']}',
							'{$tableIndex}'
							)";
			$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);


			if (isset($data['gaminiai'])) {

				$query = "";
				$query = $query . "INSERT INTO `{$this->uzsakomu_patiekalu_table}` (`fk_GAMINYSid_GAMINYS`, `fk_UZSAKYMASid_UZSAKYMAS`) VALUES ";
				foreach ($data['gaminiai'] as $value) {
					$query = $query . "({$value}, {$data['id_UZSAKYMAS']}),";
				}
				$query[strlen($query) - 1] = ';';
			};
			$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);
		}
	}

	/**
	 * Sutarties įrašymas
	 * @param type $data
	 */
	public function updateExtendedOrder($data)
	{
		$query = "	UPDATE `{$this->tables_table}` SET									
										`numeris`='{$data['numeris']}',
										`vietu_skaicius`='{$data['vietu_skaicius']}',
										`fk_PADAVEJASid_PADAVEJAS`='{$data['fk_PADAVEJASid_PADAVEJAS']}'
										WHERE `id_STALIUKAS`={$data['fk_STALIUKASid_STALIUKAS']}";

		$result = mysql::query($query);

		$query = "UPDATE `{$this->orders_table}` SET
							`uzsakymo_numeris`='{$data['uzsakymo_numeris']}',
							`suma`='{$data['suma']}',
							`data`='{$data['data']}',
							`busena`='{$data['busena']}',
							`fk_PADAVEJASid_PADAVEJAS`='{$data['fk_PADAVEJASid_PADAVEJAS']}',
							`fk_RESTORANASid_RESTORANAS`='{$data['fk_RESTORANASid_RESTORANAS']}'
							WHERE `id_UZSAKYMAS`={$data['id_UZSAKYMAS']}";

		$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);

		$query2 = "DELETE FROM `{$this->uzsakomu_patiekalu_table}` WHERE `fk_UZSAKYMASid_UZSAKYMAS`='{$data['id_UZSAKYMAS']}'";
		mysql::query($query2);

		if (isset($data['gaminiai'])) {

			$query = "";
			$query = $query . "INSERT INTO `{$this->uzsakomu_patiekalu_table}` (`fk_GAMINYSid_GAMINYS`, `fk_UZSAKYMASid_UZSAKYMAS`) VALUES ";
			foreach ($data['gaminiai'] as $value) {
				$query = $query . "({$value}, {$data['id_UZSAKYMAS']}),";
			}
			$query[strlen($query) - 1] = ';';
		};
		$result =  mysql::query($query) or trigger_error(mysql::error() . " " . $query);
	}

	/**
	 * Sąskaitų, kurios priklauso užsakymui šalinimas
	 * @param type $contractId
	 */
	public function deleteBillsByOrderId($id)
	{
		$query = "  DELETE FROM `{$this->bills_table}`
					WHERE `fk_UZSAKYMASid_UZSAKYMAS`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Sutarties šalinimas
	 * @param type $id
	 */
	public function deleteOrder($id)
	{
		$query = "  DELETE FROM `{$this->orders_table}`
					WHERE `id_UZSAKYMAS`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Gaminių tipų sąrašo išrinkimas
	 * @return type
	 */
	public function getOrderStates()
	{
		$query = "  SELECT *
					FROM `{$this->order_states_table}`";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Sutarčių kiekio radimas
	 * @return type
	 */
	public function getOrdersCountByNumber($orderNumber)
	{
		$query = "  SELECT COUNT(`{$this->orders_table}`.`id_UZSAKYMAS`) AS `kiekis`
					FROM `{$this->orders_table}`
					WHERE `uzsakymo_numeris`=$orderNumber";
		$data = mysql::select($query);

		return $data[0]['kiekis'];
	}




	/**
	 * Užsakytų papildomų paslaugų atnaujinimas
	 * @param type $data
	 */
	public function updateOrderedServices($data)
	{
		$this->deleteOrderedServices($data['nr']);

		if (isset($data['paslaugos']) && sizeof($data['paslaugos']) > 0) {
			foreach ($data['paslaugos'] as $key => $val) {
				$tmp = explode(":", $val);
				$serviceId = $tmp[0];
				$price = $tmp[1];
				$date_from = $tmp[2];
				$query = "  INSERT INTO `{$this->order_states_table}`
										(
											`fk_sutartis`,
											`fk_kaina_galioja_nuo`,
											`fk_paslauga`,
											`kiekis`,
											`kaina`
										)
										VALUES
										(
											'{$data['nr']}',
											'{$date_from}',
											'{$serviceId}',
											'{$data['kiekiai'][$key]}',
											'{$price}'
										)";
				mysql::query($query);
			}
		}
	}

	/**
	 * Sutarties būsenų sąrašo išrinkimas
	 * @return type
	 */
	public function getContractStates()
	{
		$query = "  SELECT *
					FROM `{$this->restaurants_table}`";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Aikštelių sąrašo išrinkimas
	 * @return type
	 */
	public function getParkingLots()
	{
		$query = "  SELECT *
					FROM `{$this->aiksteles_lentele}`";
		$data = mysql::select($query);

		return $data;
	}

	/**
	 * Paslaugos kainų įtraukimo į užsakymus kiekio radimas
	 * @param type $serviceId
	 * @param type $validFrom
	 * @return type
	 */
	public function getPricesCountOfOrderedServices($serviceId, $validFrom)
	{
		$query = "  SELECT COUNT(`{$this->order_states_table}`.`fk_paslauga`) AS `kiekis`
					FROM `{$this->paslaugu_kainos_lentele}`
						INNER JOIN `{$this->order_states_table}`
							ON `{$this->paslaugu_kainos_lentele}`.`fk_paslauga`=`{$this->order_states_table}`.`fk_paslauga` AND `{$this->paslaugu_kainos_lentele}`.`galioja_nuo`=`{$this->order_states_table}`.`fk_kaina_galioja_nuo`
					WHERE `{$this->paslaugu_kainos_lentele}`.`fk_paslauga`='{$serviceId}' AND `{$this->paslaugu_kainos_lentele}`.`galioja_nuo`='{$validFrom}'";
		$data = mysql::select($query);

		return $data[0]['kiekis'];
	}

	public function getCustomerContracts($dateFrom, $dateTo)
	{
		$whereClauseString = "";
		if (!empty($dateFrom)) {
			$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`>='{$dateFrom}'";
			if (!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if (!empty($dateTo)) {
				$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		}

		$query = "  SELECT  `{$this->orders_table}`.`nr`,
							`{$this->orders_table}`.`sutarties_data`,
							`{$this->tables_table}`.`asmens_kodas`,
							`{$this->tables_table}`.`vardas`,
						    `{$this->tables_table}`.`pavarde`,
						    `{$this->orders_table}`.`kaina` as `sutarties_kaina`,
						    IFNULL(sum(`{$this->order_states_table}`.`kiekis` * `{$this->order_states_table}`.`kaina`), 0) as `sutarties_paslaugu_kaina`,
						    `t`.`bendra_kliento_sutarciu_kaina`,
						    `s`.`bendra_kliento_paslaugu_kaina`
					FROM `{$this->orders_table}`
						INNER JOIN `{$this->tables_table}`
							ON `{$this->orders_table}`.`fk_klientas`=`{$this->tables_table}`.`asmens_kodas`
						LEFT JOIN `{$this->order_states_table}`
							ON `{$this->orders_table}`.`nr`=`{$this->order_states_table}`.`fk_sutartis`
						LEFT JOIN (
							SELECT `asmens_kodas`,
									sum(`{$this->orders_table}`.`kaina`) AS `bendra_kliento_sutarciu_kaina`
							FROM `{$this->orders_table}`
								INNER JOIN `{$this->tables_table}`
									ON `{$this->orders_table}`.`fk_klientas`=`{$this->tables_table}`.`asmens_kodas`
							{$whereClauseString}
							GROUP BY `asmens_kodas`
						) `t` ON `t`.`asmens_kodas`=`{$this->tables_table}`.`asmens_kodas`
						LEFT JOIN (
							SELECT `asmens_kodas`,
									IFNULL(sum(`{$this->order_states_table}`.`kiekis` * `{$this->order_states_table}`.`kaina`), 0) as `bendra_kliento_paslaugu_kaina`
							FROM `{$this->orders_table}`
								INNER JOIN `{$this->tables_table}`
									ON `{$this->orders_table}`.`fk_klientas`=`{$this->tables_table}`.`asmens_kodas`
								LEFT JOIN `{$this->order_states_table}`
									ON `{$this->orders_table}`.`nr`=`{$this->order_states_table}`.`fk_sutartis`
								{$whereClauseString}							
								GROUP BY `asmens_kodas`
						) `s` ON `s`.`asmens_kodas`=`{$this->tables_table}`.`asmens_kodas`
					{$whereClauseString}
					GROUP BY `{$this->orders_table}`.`nr` ORDER BY `{$this->tables_table}`.`pavarde` ASC";
		$data = mysql::select($query);

		return $data;
	}

	public function getSumPriceOfContracts($dateFrom, $dateTo)
	{
		$whereClauseString = "";
		if (!empty($dateFrom)) {
			$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`>='{$dateFrom}'";
			if (!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if (!empty($dateTo)) {
				$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		}

		$query = "  SELECT sum(`{$this->orders_table}`.`kaina`) AS `nuomos_suma`
					FROM `{$this->orders_table}`
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}

	public function getSumPriceOfOrderedServices($dateFrom, $dateTo)
	{
		$whereClauseString = "";
		if (!empty($dateFrom)) {
			$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`>='{$dateFrom}'";
			if (!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if (!empty($dateTo)) {
				$whereClauseString .= " WHERE `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		}

		$query = "  SELECT sum(`{$this->order_states_table}`.`kiekis` * `{$this->order_states_table}`.`kaina`) AS `paslaugu_suma`
					FROM `{$this->orders_table}`
						INNER JOIN `{$this->order_states_table}`
							ON `{$this->orders_table}`.`nr`=`{$this->order_states_table}`.`fk_sutartis`
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}

	public function getDelayedCars($dateFrom, $dateTo)
	{
		$whereClauseString = "";
		if (!empty($dateFrom)) {
			$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`>='{$dateFrom}'";
			if (!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if (!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->orders_table}`.`sutarties_data`<='{$dateTo}'";
			}
		}

		$query = "  SELECT `nr`,
						   `sutarties_data`,
						   `planuojama_grazinimo_data_laikas`,
						   IF(`faktine_grazinimo_data_laikas`='0000-00-00 00:00:00', 'negrąžinta', `faktine_grazinimo_data_laikas`) AS `grazinta`,
						   `{$this->tables_table}`.`vardas`,
						   `{$this->tables_table}`.`pavarde`
					FROM `{$this->orders_table}`
						INNER JOIN `{$this->tables_table}`
							ON `{$this->orders_table}`.`fk_klientas`=`{$this->tables_table}`.`asmens_kodas`
					WHERE (DATEDIFF(`faktine_grazinimo_data_laikas`, `planuojama_grazinimo_data_laikas`) >= 1 OR
						(`faktine_grazinimo_data_laikas` = '0000-00-00 00:00:00' AND DATEDIFF(NOW(), `planuojama_grazinimo_data_laikas`) >= 1))
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}
}
