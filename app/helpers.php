<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('history')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function history()
    {
        return new App\Modules\History\Repositories\HistoryRepository;
    }
}

if (! function_exists('date_converter')) {
    function date_converter()
    {
        return new App\Modules\Admin\Entities\DateConverter;
    }
}

if (! function_exists('priceFormat')) {
    /**
     * Helper to get price format
     *
     * @return mixed
     */
    function priceFormat($price)
    {
        return number_format($price, 2, '.', ',').'/-';
    }

}
if (! function_exists('hr_randomcolor')) {
    /**
     * Helper to get price format
     *
     * @return mixed
     */
    function hr_randomcolor()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

    }
}
