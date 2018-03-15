<?php

namespace Compie\Micropay\Traits;

trait ThirdPartyServices
{
    /**
     * For GET calls
     * @param $endpoint
     * @return array
     */
    protected function getRequest($endpoint): array
    {
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
		$curlStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close ($ch);

		return ['status' => $curlStatus, 'response' => $response];
    }

    /**
     * For POST calls
     * @param $endpoint
     * @param $params
     * @return array
     */
    protected function postRequest($endpoint, array $params = []): array
    {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $endpoint);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec ($ch);
		$curlStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close ($ch);

		return ['status' => $curlStatus, 'response' => $response];
    }
}