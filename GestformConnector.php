<?php


class GestformConnector {

	private $backendUrl;

	/**
	 * GestformConnector constructor.
	 *
	 * @param String $backendUrl
	 */
	public function __construct(String $backendUrl)
	{
		$this->backendUrl = $backendUrl;
	}

	private function getTrainings() : Array
	{
		$rsc = curl_init();
		$opts = [
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_URL            => $this->backendUrl."/public/getTrainings",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_CONNECTTIMEOUT => 30
		];

		curl_setopt_array($rsc, $opts);
		$response = curl_exec($rsc);
		curl_close($rsc);
		$response = json_decode($response, true, 512, JSON_OBJECT_AS_ARRAY);

		return $response;
	}

	public function showTrainings()
	{
		$response = '';
		foreach ($this->getTrainings() as $training) {
			$response .= implode("<br>", $training);
			$response .= "<br>";
		}
		return $response;
	}
}