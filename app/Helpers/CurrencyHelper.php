<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class CurrencyHelper
{
  public static function convertToINR($priceInUSD)
  {
    // Optionally, get the conversion rate dynamically or set a fixed rate
    $client = new Client();
    $response = $client->request('GET', 'https://api.exchangerate-api.com/v4/latest/USD');
    $data = json_decode($response->getBody(), true);
    $conversionRate = $data['rates']['INR'] ?? 82; // Use 82 as a fallback if API fails

    return $priceInUSD * $conversionRate;
  }
}
