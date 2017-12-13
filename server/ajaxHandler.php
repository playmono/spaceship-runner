<?php

$result = 'FALSE';

if ($_POST) {
	switch ($_POST['mode']) {
		case 'showRanking':
			$result = json_encode(showRanking());
		break;

		case 'insertRanking':
			$success = false;

			if ($_POST['secret'] == 'a' . ($_POST['score'] + 1)) {
				$success = insertRanking($_POST['name'], $_POST['score']);
			}

			if ($success) {
				$result = json_encode(showRanking());
			}
		break;
	}
}

echo $result;

function getDBInstance()
{
	return new Mysqli('localhost', 'root', 'root', 'spaceshiprunner');
}

function showRanking()
{
	$db = getDBInstance();

	$result = $db->query("SELECT * FROM ranking ORDER BY score DESC, name ASC, `datetime` DESC LIMIT 0,10");

	$db->close();

	$return = [];

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$return[] = [
			'name' => $row['name'],
			'score' => $row['score'],
			'datetime' => date( 'd-m-Y H:i:s', strtotime($row['datetime']))
		];
	}

	return $return;
}

function insertRanking($name, $score)
{
	$db = getDBInstance();

	$name = $db->real_escape_string($name);
	$score = $db->real_escape_string($score);

	$result = $db->query("INSERT INTO ranking (name, score) VALUES ('" . strtoupper($name) ."', " .$score . ")");

	$db->close();

	return $result;
}
