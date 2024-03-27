<?php

namespace App\Helper;

use App\Models\Customer;
use App\Models\Language;

/**
 * Class LanguageHelper
 *
 * This class provides helper functions related to languages.
 */
class LanguageHelper
{
    /**    
     * Retrieve an array of language IDs.
     *
     * @return array
     */
    public static function languageIdArray()
    {
        return Language::whereStatus(1)
                        ->pluck('id')
                        ->toarray();
    }
}
