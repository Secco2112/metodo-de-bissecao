<?php
	require_once __DIR__ . '/../vendor/autoload.php';
	use FormulaParser\FormulaParser;


	function calculate_fx($formula, $x, $decimal_plates=4) {
		try {
		    $parser = new FormulaParser($formula, $decimal_plates);
		    $parser->setVariables(['x' => $x]);
		    $result = $parser->getResult();
		    if($result[0] == "done") {
		    	return $result[1];
		    }
		} catch (\Exception $e) {
		    echo $e->getMessage() . "\n";
		}
	}

?>