<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "timeline".
 *
 * Auto generated 27-08-2019 08:55
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF["timeline"] = array (
  'title' => 'TimeLine',
  'description' => 'An extension to create TimeLines in the FE!',
  'category' => 'plugin',
  'author' => 'Dominic Joas',
  'author_company' => '',
  'author_email' => 'developing@domjos.de',
  'state' => 'beta',
  'clearCacheOnLoad' => true,
  'version' => '11.5.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '10.4.0-11.5.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'autoload' => 
  array (
    'psr-4' => 
    array (
      'DominicJoas\\Timeline\\' => 'Classes',
    ),
  ),
  'uploadfolder' => false,
  'createDirs' => NULL,
  'clearcacheonload' => true,
);

