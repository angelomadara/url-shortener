<?php
namespace App\Services;

use App\Models\CollectedUrl;
use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Support\Facades\Log;

class CollectUrlService {

  protected $collectedUrlModel;
  public function __construct(CollectedUrl $collectedUrlModel)
  {
    $this->collectedUrlModel = $collectedUrlModel;
  }

  public function store($data)
  { 
    // Log::info('Data: ', [$data['url']]);
    $shortURLObject = app(Builder::class)->destinationUrl($data['url'])->make();
    // Log::info('Short URL Object: ', [$shortURLObject]);

    $response = $this->collectedUrlModel->create([
      'url' => $data['url'],
      'short_url' => $shortURLObject->default_short_url,
      'email' => $data['email']
    ]);

    \Mail::send('emails.shortURL', ['shortURL' => $shortURLObject->default_short_url], function ($message) use ($data) {
      $message->to($data['email'])->subject('Short URL');
    });

    if ($response) {
      return $shortURLObject;
    }

    throw new \Exception('Failed to store data');
    
  }
}