# CoinMarketCap API for php

A PHP wrapper for [CoinMarketCap Professional API](https://pro.coinmarketcap.com/api/v1)

NOTES: only FREE APIs. Check features list [here](https://pro.coinmarketcap.com/features).

## Install

```
composer install
```

After add .env file and create API_KEY variable

```
API_KEY = 'put your api key here'
```

Well done!

Example of using code:
```php
$response = $cmc->cryptocurrency()->map(['limit' => 3]);
```

```json
{
  "status": {
    "timestamp": "2019-12-08T16:29:05.373Z",
    "error_code": 0,
    "error_message": null,
    "elapsed": 11,
    "credit_count": 1,
    "notice": null
  },
  "data": [
    {
      "id": 1,
      "name": "Bitcoin",
      "symbol": "BTC",
      "slug": "bitcoin",
      "is_active": 1,
      "rank": 1,
      "first_historical_data": "2013-04-28T18:47:21.000Z",
      "last_historical_data": "2019-12-08T16:24:00.000Z",
      "platform": null
    },
    {
      "id": 2,
      "name": "Litecoin",
      "symbol": "LTC",
      "slug": "litecoin",
      "is_active": 1,
      "rank": 6,
      "first_historical_data": "2013-04-28T18:47:22.000Z",
      "last_historical_data": "2019-12-08T16:24:00.000Z",
      "platform": null
    },
    {
      "id": 3,
      "name": "Namecoin",
      "symbol": "NMC",
      "slug": "namecoin",
      "is_active": 1,
      "rank": 384,
      "first_historical_data": "2013-04-28T18:47:22.000Z",
      "last_historical_data": "2019-12-08T16:24:00.000Z",
      "platform": null
    }
  ]
}
```
