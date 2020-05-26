<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Recaptcha configuration settings
 *
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 *
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 *
 *
 */
$config['recaptcha_sitekey'] =  "6LcnrfUUAAAAAE9Cukg-vmbMj0Z3hOYPbrRYAOVf";

$config['recaptcha_secretkey'] = "6LcnrfUUAAAAANX06hm1zcCWOBfMpLOfBW7DzlCX";

$config['lang'] = "id";
