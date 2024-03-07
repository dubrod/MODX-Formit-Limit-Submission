<?php
/**
 * This FormIt custom snippet will give you a submission count you can use with output modifiers to limit 
 * submissions for things like RSVP with limited seating.
 * 
 * Written by Wayne Roddy (dubrodfc@gmail.com)
 * Written on 09/01/2022
 * 
 * [[!FormItSubmissionCount? &name=`RSVP`]]
 * 
 * [[!+fi.count:lt=`10`:then=`Show Form Here`]]
 * 
 * [[[[!+fi.count:lt=`76`:then=``:else=`-`]]$luncheon-form]]
 *
 * @package formit
*/

$FormIt = $modx->getService(
    'formit',
    'FormIt',
    $modx->getOption('formit.core_path', null, $modx->getOption('core_path').'components/formit/').'model/formit/',
    $scriptProperties
);
if (!($FormIt instanceof FormIt)) return 'No FormIt Service';

$output             = '';
$form_name          = $modx->getOption('name',$scriptProperties,null);

$c = $modx->newQuery('FormItForm');

if($form_name){
    $c->where(array(
        'form' => $form_name
    ));
}

$records = $modx->getCollection('FormItForm', $c);

$modx->setPlaceholder('fi.count',count($records));
