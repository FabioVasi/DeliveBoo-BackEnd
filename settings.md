modify .env with 
```
BRAINTREE_ENVIRONMENT=sandbox
BRAINTREE_MERCHANT_ID=qn37m4g29crgwwqb
BRAINTREE_PUBLIC_KEY=jxc2469xnjhgcn5w
BRAINTREE_PRIVATE_KEY=e875a3a46f322a071e49226c928378b0
```

```terminal
php artisan migrate
```

<!-- add to services 
```
'braintree' => [
        'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
        'merchant_id' => env('BRAINTREE_MERCHANT_ID', 'qn37m4g29crgwwqb'),
        'public_key' => env('BRAINTREE_PUBLIC_KEY', 'jxc2469xnjhgcn5w'),
        'private_key' => env('BRAINTREE_PRIVATE_KEY', 'e875a3a46f322a071e49226c928378b0'),
    ]
 ```

 in AppServiceProvider
```
 public function register(): void
    {
        $this->app->bind(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => env('BRAINTREE_ENVIRONMENT'),
                'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                'privateKey' => env('BRAINTREE_PRIVATE_KEY')
            ]);
        });
    }
``` -->