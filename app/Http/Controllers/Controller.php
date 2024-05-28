<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param mixed $data
     * @return array
     */
    public function item($data)
    {
        return ['data' => $data];
    }

    /**
     * @param mixed $data
     * @return array
     */
    public function collection($data)
    {
        return ['data' => $data];
    }
}
