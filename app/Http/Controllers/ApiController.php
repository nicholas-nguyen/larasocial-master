<?php

namespace App\Http\Controllers;

abstract class ApiController extends Controller
{
    /**
     * Make standard successful response
     *
     * @param string $message Success message
     * @param object|array $data Data to be send as JSON
     * @param int $code HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccess($message = 'Susscess!', $data = null, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Make standard response with error
     *
     * @param string $message Error message
     * @param int $code HTTP response code, default to 500
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError($message = 'Server error', $code = 500)
    {
        return response()->json([
            'message' => $message
        ], $code);

    }

    /**
     * Make standard data response
     *
     * @param object|array $data Data to be send as JSON
     * @param int $code HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondData($data = null, $code = 200)
    {
        return response()->json([
            'data' => $data
        ], $code);
    }

    /**
     * Make standard response with some data
     *
     * @param object|array $data Data to be send as JSON
     * @param int $code HTTP response code, default to 200
     * @param array $headers http header data
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $code = 200, $headers = [])
    {
        return response()->json($data, $code, $headers);
    }


    /**
     * Get JSON data from request, and validate if it can be processed
     *
     * @throws \Exception if the provided argument is not of type json
     * @param bool $assoc should we return objects as arrays?
     * @return array|object
     */
    public function getJson($assoc = true)
    {
        $json = \Input::getContent();
        $data = json_decode($json, $assoc);
        if (is_null($data)) {
            throw new \Exception('No input data or malformed JSON received');
        }
        return $data;
    }
}
