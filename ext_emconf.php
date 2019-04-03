<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "timeline".
 *
 * Auto generated 04-10-2018 15:57
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'TimeLine',
  'description' => 'An extension to create TimeLines in the FE!',
  'category' => 'plugin',
  'author' => 'Dominic Joas',
  'author_company' => '',
  'author_email' => 'developing@domjos.de',
  'state' => 'beta',
  'clearCacheOnLoad' => true,
  'version' => '0.0.4',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-9.5.99',
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

