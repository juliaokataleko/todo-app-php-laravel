<?php

function gender($gender) {
    if($gender == 'f') {
        echo "Feminino";
    } else {
        echo "Masculino";
    }
}

function dateFormat($dt) {
    echo date("d/m/Y", strtotime($dt));
}

function userLevel($role) {
    if($role == 1) 
        echo "Admnistrador";
    if($role == 2) 
        echo "Funcionário";
    if($role == 3) 
        echo "Utilizador";
}

function firstWord($sentece) {
    $arr = explode(' ',trim($sentece));
    echo $arr[0]; 
}

function firstLeterToUpper($sentece) {
    echo ucwords($sentece); 
}

function slug($string) {
    $string = preg_replace('/[\t\n]/', ' ', $string);
    $string = preg_replace('/\s{2,}/', ' ', $string);
    $list = array(
        'Š' => 'S',
        'š' => 's',
        'Đ' => 'Dj',
        'đ' => 'dj',
        'Ž' => 'Z',
        'ž' => 'z',
        'Č' => 'C',
        'č' => 'c',
        'Ć' => 'C',
        'ć' => 'c',
        'À' => 'A',
        'Á' => 'A',
        'Â' => 'A',
        'Ã' => 'A',
        'Ä' => 'A',
        'Å' => 'A',
        'Æ' => 'A',
        'Ç' => 'C',
        'È' => 'E',
        'É' => 'E',
        'Ê' => 'E',
        'Ë' => 'E',
        'Ì' => 'I',
        'Í' => 'I',
        'Î' => 'I',
        'Ï' => 'I',
        'Ñ' => 'N',
        'Ò' => 'O',
        'Ó' => 'O',
        'Ô' => 'O',
        'Õ' => 'O',
        'Ö' => 'O',
        'Ø' => 'O',
        'Ù' => 'U',
        'Ú' => 'U',
        'Û' => 'U',
        'Ü' => 'U',
        'Ý' => 'Y',
        'Þ' => 'B',
        'ß' => 'Ss',
        'à' => 'a',
        'á' => 'a',
        'â' => 'a',
        'ã' => 'a',
        'ä' => 'a',
        'å' => 'a',
        'æ' => 'a',
        'ç' => 'c',
        'è' => 'e',
        'é' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'ì' => 'i',
        'í' => 'i',
        'î' => 'i',
        'ï' => 'i',
        'ð' => 'o',
        'ñ' => 'n',
        'ò' => 'o',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ö' => 'o',
        'ø' => 'o',
        'ù' => 'u',
        'ú' => 'u',
        'û' => 'u',
        'ý' => 'y',
        'ý' => 'y',
        'þ' => 'b',
        'ÿ' => 'y',
        'Ŕ' => 'R',
        'ŕ' => 'r',
        '/' => '-',
        ' ' => '-',
        '.' => '-',
    );

    $string = strtr($string, $list);
    $string = preg_replace('/-{2,}/', '-', $string);
    $string = strtolower($string);

    return $string;
}

function currencyFormat($value) {
    return number_format($value, 2, ',','.')." Akz";
}

function fullNameToFirstName($fullName, $checkFirstNameLength=TRUE)
{
	// Split out name so we can quickly grab the first name part
	$nameParts = explode(' ', $fullName);
	$firstName = $nameParts[0];

	// If the first part of the name is a prefix, then find the name differently
	if(in_array(strtolower($firstName), array('mr', 'ms', 'mrs', 'miss', 'dr'))) {
		if($nameParts[2]!='') {
			// E.g. Mr James Smith -> James
			$firstName = $nameParts[1];
		} else {
			// e.g. Mr Smith (no first name given)
			$firstName = $fullName;
		}
	}

	// make sure the first name is not just "J", e.g. "J Smith" or "Mr J Smith" or even "Mr J. Smith"
	if($checkFirstNameLength && strlen($firstName)<3) {
		$firstName = $fullName;
	}
	return $firstName;
}