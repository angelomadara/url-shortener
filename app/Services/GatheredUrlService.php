<?php
namespace App\Services;

use App\Models\CollectedUrl;

class CollectedUrlService
{
  protected $collected_url;
  public function __construct(CollectedUrl $collected_url)
  {
    $this->collected_url = $collected_url;
  }

  public function store($data)
  {
    return $this->collected_url->create($data);
  }
}
