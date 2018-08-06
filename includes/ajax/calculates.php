<?php
	require_once __DIR__ . '/../../vendor/autoload.php';
	use FormulaParser\FormulaParser;

	include '../basics.php';

	if(!empty($_POST)) {
		$funcao = $_POST['math_function'];
		$intervalo = $_POST['interval'];
		$intervalo = explode(",", $intervalo);
		$intervalo['a'] = (float)trim($intervalo[0]);
		$intervalo['b'] = (float)trim($intervalo[1]);
		unset($intervalo[0]);
		unset($intervalo[1]);
		$erro_absoluto = (float)$_POST['absolute_error'];
		$decimal_places = (int)$_POST['decimal_places'];
		
		// Cálculo do método
		$final_result = array(
			"n" => array(),
			"a" => array(),
			"b" => array(),
			"pm" => array(),
			"fx" => array(),
			"e" => array()
		);

		$n = 0;
		$mid = ($intervalo['a'] + $intervalo['b']) / 2.0;
		

		try {
	    	while(true) {
	    		$mid = ($intervalo['a'] + $intervalo['b']) / 2.0;

	    		$result_fxa = calculate_fx($funcao, $intervalo['a'], $decimal_places);
				$result_fxb = calculate_fx($funcao, $intervalo['b'], $decimal_places);
				$result_fxmid = calculate_fx($funcao, $mid, $decimal_places);

				$final_result["n"][] = $n;
			    $final_result["a"][] = (float)number_format($intervalo['a'], $decimal_places);
			    $final_result["b"][] = (float)number_format($intervalo['b'], $decimal_places);
			    $final_result["pm"][] = (float)number_format($mid, $decimal_places);
			    $final_result["fx"][] = $result_fxmid;
			    $final_result["e"][] = $n==0? "-": (float)number_format($intervalo['b'] - $mid, $decimal_places);

			    
			    if($intervalo['b'] - $mid <= $erro_absoluto) {
			    	break;
			    }


			    if($result_fxa * $result_fxmid < 0) {
					$intervalo['b'] = $mid;
				} else {
					$intervalo['a'] = $mid;
				}

				$n++;
	    	}

		    die(json_encode($final_result));
		} catch (\Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}	

?>