<?php

return [

    /*
     | Where Ways to Support enquiries are emailed. Set SUPPORT_ENQUIRY_RECIPIENTS
     | in .env as a comma-separated list to override.
     */
    'enquiry_recipients' => array_filter(array_map(
        'trim',
        explode(',', (string) env(
            'SUPPORT_ENQUIRY_RECIPIENTS',
            'partnerships@thespecialfoundation.org,info@thespecialfoundation.org'
        ))
    )),

    /*
     | Fundraiser toolkit downloads. Left null until TSF supplies the files;
     | the buttons on /ways-to-support render disabled while these are empty.
     */
    'toolkit_pdf' => env('SUPPORT_TOOLKIT_PDF'),
    'social_templates' => env('SUPPORT_SOCIAL_TEMPLATES'),

    /*
     | TSF's GlobalGiving project page. Shown under the USD donate option and
     | used by the GlobalGiving badge in the footer. TSF has not supplied the
     | URL yet, so both fall back to plain text while this is empty.
     */
    'globalgiving_url' => env('SUPPORT_GLOBALGIVING_URL'),

];
