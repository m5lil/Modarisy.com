<?php

return array(
    /** set your paypal credential **/
    'client_id' => 'AeVWn6DEO5fZ2jUZ-wjfsONKV-dABuVSjzFHOHd1HsP1Dhux1tx1DOY6Hp1UW3PRJuDItWsWr5_Ucr8k',
    'secret' => 'EESNFS_5sc295cF6k9qKzeGGT5rbnOOac_LesjH9An0r1RltOUz_AuwdcDh4LWjEy9oVqv0H_QFWZE5B',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
