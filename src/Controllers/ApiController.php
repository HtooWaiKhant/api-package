<?php
/**
 * Created by hola.
 * User: hola
 * Date: 12/03/2019
 * Time: 09:48 PM
 */

namespace Hola\Api\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Return Response with json format
     * @param $message
     * @param array $data
     * @return array
     */
    public function responseWithSuccess($message, $data = [])
    {
        return [
            'status' => [
                "status" => $this->getStatusCode(),
                "success" => true,
                "message" => $message
            ],
            'data' => $data
        ];
    }
}