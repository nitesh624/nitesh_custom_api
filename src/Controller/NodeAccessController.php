<?php

namespace Drupal\nitesh_custom_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Class NodeAccessController.
 */
class NodeAccessController extends ControllerBase {
  /**
   * Testapikey.
   *
   * @return string
   *   Return Hello string.
   */
  public function testapikey($apikey,$nid) {
    // return [
    //   '#type' => 'markup',
    //   '#markup' => $this->t('Implement method: testapikey')
    // ];

    $output = [
      'status' => false,
      'data' => '',
    ];

    $path = \Drupal::request()->getpathInfo();
    $arg  = explode('/',$path);
    $apikey = '';
    if(!empty( $arg[2] ) ) {
      
      $apikey = $arg[2];
      
      $siteapikey = \Drupal::config('nitesh_custom_api.settings')->get('siteapikey');
      
      if ( $apikey != $siteapikey ) {
        //access denied 
        $output['data'] = 'Access Denied';
        return new JsonResponse($output);
      }
    } 

    $nid = $arg[3];
    $node = \Drupal\node\Entity\Node::load($nid);
    if( empty( $node ) ) {

      $output['data'] = 'Please enter valid node id';
      $output['status'] = false;

    } 
    else {
      $serializer = \Drupal::service('serializer');
      //$node = Node::load(2);
      $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
      $output['data'] = $data;
      $output['status'] = true;
    }
    return new JsonResponse($output);
  }
}