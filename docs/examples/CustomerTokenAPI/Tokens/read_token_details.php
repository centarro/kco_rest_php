<?php
/**
 * Copyright 2019 Klarna AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Read customer tokens details
 */

require_once dirname(__DIR__) . '/../../../vendor/autoload.php';

/**
 * Follow the link to get your credentials: https://github.com/klarna/kco_rest_php/#api-credentials
 *
 * Make sure that your credentials belong to the right endpoint. If you have credentials for the US Playground,
 * such credentials will not work for the EU Playground and you will get 401 Unauthorized exception.
 */
$merchantId = getenv('USERNAME') ?: 'K123456_abcd12345';
$sharedSecret = getenv('PASSWORD') ?: 'sharedSecret';
$customerToken = getenv('TOKEN') ?: 'customerToken';

/*
BASE_URL = 'https://api.kustom.co'
TEST_BASE_URL = 'https://api.playground.kustom.co'
*/
$apiEndpoint = Klarna\Rest\Transport\ConnectorInterface::TEST_BASE_URL;

$connector = Klarna\Rest\Transport\GuzzleConnector::create(
    $merchantId,
    $sharedSecret,
    $apiEndpoint
);

try {
    $token = new Klarna\Rest\CustomerToken\Tokens($connector, $customerToken);
    $token->fetch();

    print_r($token->getArrayCopy());
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
