<?php

$upload_dir = wp_upload_dir();

$apresentacao_dir = $upload_dir['basedir'] . '/lineadbfiles/apresentacao/';
$foto_dir = $upload_dir['basedir'] . '/lineadbfiles/foto/';

$apresentacao_url = $upload_dir['baseurl'] . '/lineadbfiles/apresentacao/';
$foto_url = $upload_dir['baseurl'] . '/lineadbfiles/foto/';

$timezone = "America/Sao_Paulo"; 
if(function_exists('date_default_timezone_set')){
  date_default_timezone_set($timezone); 
}

define (APRESENTACAO_DIR, $apresentacao_dir);
define (FOTO_DIR, $foto_dir);
define (FOTO_URL, $foto_url);
define (APRESENTACAO_URL, $apresentacao_url);
define (WEBINAR_DEFAULT_TITLE, 'Title: to be Announced');
define (FOTO_DEFAULT, 'male-avatar.jpg');
define (MAILCHIMP_SUBS, 'http://eepurl.com/O_UR1');
define (WEBINAR_GTM_LINK, 'https://global.gotomeeting.com/join/986493925');

?>