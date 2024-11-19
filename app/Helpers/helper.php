<?php

function response_data($data, $status, $message,  $code=false)
{
    return response()->json([
        'data'      => $data,
        'message'   => $message,
        'code'     => $code,
    ], $status);
}
