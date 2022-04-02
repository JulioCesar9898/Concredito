<?php
namespace App\Repositories\Prospecto;

interface ProspectoCacheInterface{  
  public function getFindOrFailCache($request);

  
}