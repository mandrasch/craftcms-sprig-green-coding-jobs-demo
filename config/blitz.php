<?php
/**
 * Enable Blitz Cache only for production sites, see for all options:
 * https://github.com/putyourlightson/craft-blitz/blob/develop/src/config.php
 */
return [
    '*' => [
        'cachingEnabled' => false,

        // Determines when and how the cache should be refreshed.
        // `\putyourlightson\blitz\models\SettingsModel::REFRESH_MODE_CLEAR_AND_GENERATE`: Clear the cache and regenerate in a queue job
        // `\putyourlightson\blitz\models\SettingsModel::REFRESH_MODE_EXPIRE_AND_GENERATE`: Expire the cache and regenerate in a queue job
        // `\putyourlightson\blitz\models\SettingsModel::REFRESH_MODE_CLEAR`: Clear the cache, regenerate manually or organically
        // `\putyourlightson\blitz\models\SettingsModel::REFRESH_MODE_EXPIRE`: Expire the cache, regenerate manually or organically*
        //'refreshMode' => \putyourlightson\blitz\models\SettingsModel::REFRESH_MODE_CLEAR_AND_GENERATE,

        // TODO: Should we use it?
        // Whether URLs with query strings should be cached and how.
        // - `0`: Do not cache URLs with query strings
        // - `1`: Cache URLs with query strings as unique pages
        // - `2`: Cache URLs with query strings as the same page
        //'queryStringCaching' => 0,

        // The URI patterns to include in caching. Set `siteId` to a blank string to indicate all sites.
        'includedUriPatterns' => [
           [
               'siteId' => '',
               'uriPattern' => '.*',
           ]
        ],

        // The URI patterns to exclude from caching (overrides any matching patterns to include). Set `siteId` to a blank string to indicate all sites.
        //'excludedUriPatterns' => [
        //    [
        //        'siteId' => 1,
        //        'uriPattern' => 'pages/contact',
        //    ],
        //],
    ],
    'production' => [
        'cachingEnabled' => true,
    ]
];