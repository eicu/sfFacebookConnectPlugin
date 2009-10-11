<?php

/**
* @author fabriceb
* @since Sep 29, 2009
*/


/**
 * Add the facebook app url in front
 *
 * @param string $internal_uri
 * @return string
 * @author fabriceb
 * @since 2009-06-03
 */
function fb_url_for()
{
  $arguments = func_get_args();
    
  $host = '';
  if (sfFacebook::inCanvas())
  {
    $host = sfConfig::get('app_facebook_app_url'); 
  }

  return $host.call_user_func_array('url_for', $arguments);
}

/**
 * 
 * @param string $src
 * @param string $html_options
 * @param string $fb_options
 * @return void
 * @author fabriceb
 * @since Oct 11, 2009
 */
function fb_iframe($src, $html_options = '', $fb_options = '')
{
  if (!sfFacebook::inCanvas())
  {
    ?>
    <iframe src="<?php echo $src ?>" <?php echo $html_options ?>></iframe>
    <?php
  }
  else
  {
     ?>
    <fb:iframe src="<?php echo $src ?>" <?php echo $html_options ?> <?php echo $fb_options ?>></fb:iframe>
    <?php
  }
    
}