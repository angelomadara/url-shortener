<?php
namespace App\Services;

use App\Models\CollectedUrl;

class CollectUrlService {

  protected $collectedUrlModel;
  public function __construct(CollectedUrl $collectedUrlModel)
  {
    $this->collectedUrlModel = $collectedUrlModel;
  }

  public function store($data)
  {
    
    $response = $this->collectedUrlModel->create($data);

    if ($response) {
      return $response;
    }

    throw new \Exception('Failed to store data');
    
  }
}