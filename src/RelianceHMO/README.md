# INNOVATION SANDBOX

## Installation

The preferred method of installation is via Composer. Run the following command to install the package and add it as a requirement to your project's composer.json:

```bash
$ composer require enyata/innovation-sandbox
```

## Common Credentials

Below is a list of required credentials.

### sandbox_key

This can be found in the innovation sandbox dashboard after signup. However`0ae0db703c04119b3db7a03d7f854c13` can be used for testing purposes.

### host

This argument is optional in all cases. Defaults to `https://sandboxapi.fsi.ng` if not found.

## Clients Signup([options])

You can signup company and enrollees.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### transfer_code

##### company_name

##### company_address

##### state_code

##### payment_frequency

##### company_admin

Company admin details as an array of key value;

##### enrollees

Enrollee details as array of array of key value

### InnovationSandbox\RelianceHMO\Clients\Signup(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Clients;
$instance1 = new Clients();

$this->instance1->Signup([
    'host' => 'Your host url',
    'sandbox_key' => 'your sandbox key',
    'payload'  => [
        'transfer_code' => '1234WXYZ',
        'company_name' => 'Justice League',
        'company_address' => '85, outer space',
        'state_code' => 'NG-LA',
        'payment_frequency' => 'monthly',
        'company_admin' => [
            'first_name' => 'Bruce',
            'last_name' => 'Wayne',
            'email_address' => 'bruce@wayne.corp',
            'phone_number' => '08011122234'
        ],
        'enrollees' => [
            [
                'plan_id' => 22,
                'first_name' => 'Bruce',
                'last_name' => 'Wayne',
                'email_address' => 'bruce@wayne.corp',
                'phone_number' => '08011122234'
            ],
            [
                'plan_id' => 14,
                'first_name' => 'Barry',
                'last_name' => 'Allen',
                'email_address' => 'barry@flash.org',
                'phone_number' => '08033344322'
            ]
        ]
    ]
]);
```

## Renew Client Subscription ([options])

You can renew signed up company and enrollees.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### transfer_code

##### add

Adds new enrollees to the current list of enrollees.

##### remove

Removes the indicated enrollees from the current list.

##### update

Changes company's plan to a different one.

### InnovationSandbox\RelianceHMO\Clients\Renew(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Clients;
$instance1 = new Clients();

$instance1->Renew([
    'host' => 'Your host url'
    'sandbox_key' => 'your sandbox key',
    'id' => 'code1',
    'payload'  => [
        'transfer_code' => '1234WXYZ',
        'add' => [
            [
                'plan_id' => 22,
                'firstname' => 'Princess',
                'lastname' => 'Diana',
                'email' => 'diana@amazon.com',
                'phone_number' => '08041122234'
            ]
        ],
        'remove' => ['K2JhMYr5wDGMxZWdh', 'z44JhMYyDGMxZ362hwe'],
        'update' => [
            [
                'plan_id' => 24,
                'user_token' => 'Y2JhMWJhNDc4YWJkMGMxZWdh'
            ]
        ]
    ]
]);
```

## Consultations Request([options])

Request consultation for enrollee.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### patient_id

##### reason

### InnovationSandbox\RelianceHMO\Consultations\Request(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Consultations;
$instance1 = new Consultations();

$instance1->Request([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'patient_id' => 232,
        'reason' => 'reason for consultation'
    ]
]);
```

## Register Enrollees([options])

Signup individuals or buy multiple for families. Also supports bulk processing.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### enrollees

### InnovationSandbox\RelianceHMO\Enrollees\Register(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;
$instance1 = new Enrollees();

$instance1->Register([
    'host' => 'Your host url',
    'sandbox_key' => 'your sandbox key',
    'payload'  => [
        'enrollees' =>  [
            [
                'payment_frequency' =>  'monthly',
                'first_name' =>  'John',
                'last_name' =>  'Doe',
                'email_address' =>  'dewo.1@kang.pe',
                'phone_number' =>  '08132846940',
                'plan_id' =>  22,
                'can_complete_profile' =>  'true',
                'profile' =>  [
                    'sex' =>  'm',
                    'date_of_birth' =>  '1991-03-03',
                    'first_name' =>  'Doey',
                    'last_name' =>  'Doe',
                    'primary_phone_number' =>  '08159049122',
                    'home_address' =>  'Somewhere Awesome',
                    'has_smartphone' =>  'true',
                    'profile_picture_filename' =>  'ttffddzp.jpg',
                    'enrollee_type' =>  1,
                    'hmo_id' =>  ''
                ],
                'dependants' =>  [
                    [
                        'first_name' =>  'Janet',
                        'last_name' =>  'Dependant',
                        'email_address' =>  'wu1uo389@gmail.com',
                        'phone_number' =>  '08132046940',
                        'plan_id' =>  22
                    ]
                ]
            ]
        ]
    ]
]);
```

## Get Active Enrollees([options])

To query all active enrollees.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### page

##### limit

### InnovationSandbox\RelianceHMO\Enrollees\GetEnrollees(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;
$instance1 = new Enrollees();

$instance1->GetEnrollees([
    'host' => 'Your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'page' => 1,
        'limit' => 10
    ]
]);
```

## Get Single Enrollee([options])

To query a single enrollee by id.

### options

The module accepts options as array of key-value.

#### payload

Route Param

##### id

### InnovationSandbox\RelianceHMO\Enrollees\GetEnrollee(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;
$instance1 = new Enrollee();

$instance1->GetEnrollee([
    'host' => 'Your host url',
    'sandbox_key' => 'your sandbox key',
    'id' => 'enrollee44'
]);
```

## Complete Enrollee Profile([options])

Complete Enrollee’s profile.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### sex

##### date_of_birth

##### home_address

##### has_smartphone

##### profile_picture_filename

##### hash

### InnovationSandbox\RelianceHMO\Enrollees\Profile(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;
$instance1 = new Enrollees();

$instance1->Profile([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'sex' => 'f',
        'date_of_birth' => '1991-03-03',
        'home_address' => '85, outer space',
        'has_smartphone' => 'true',
        'profile_picture_filename' => 'ttffddzp.png',
        'hash' => 'ZDZhMTlYxRkQ0ODRDNisrMzQ'
    ]
]);
```

## Enrollees Validation([options])

Retrieve enrollee details.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### hmo_id

### InnovationSandbox\RelianceHMO\Enrollees\Validate(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;

$instance1 = new Enrollees();
$instance1->Validate([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'hmo_id' => 'TXT/10002/A'
    ]
]);
```

## Enrollee ID Card([options])

Retrieve enrollee id card image.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### hmo_id

### InnovationSandbox\RelianceHMO\Enrollees\Card(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Enrollees;

$instance1 = new Enrollees();

$instance1->Card([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'hmo_id' => 'TXT/10002/A'
    ]
]);
```

## Get Plans([options])

Get available plans

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### type

##### package

### InnovationSandbox\RelianceHMO\Plans\AvailablePlans(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Plans;
$instance1 = new Plans();

$instance1->AvailablePlans([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'type' => 'family',
        'package' => 'retail'
    ]
]);
```

## Individual Signup([options])

Signup individuals or buy multiple for families. Also supports bulk processing.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### Referral_code

##### enrollees

### InnovationSandbox\RelianceHMO\Retails\Signup(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Retails;
$instance1 = new Retails();

$instance1->Signup([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'payload'  => [
        'Referral_code' => '1122345',
        'enrollees' => [
            [
                'payment_frequency' => 'monthly',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email_address' => 'testuser1@kang.pe',
                'phone_number' => '08132646940',
                'plan_id' => 22,
                'can_complete_profile' => true,
                'dependants' => [
                    [
                        'first_name' => 'Janet',
                        'last_name' => 'Dependant',
                        'email_address' => 'testuser2@kang.pe',
                        'phone_number' => '08132646940',
                        'plan_id' => 22
                    ],
                    [
                        'first_name' => 'Fred',
                        'last_name' => 'Dependant',
                        'email_address' => 'testuser3@kang.pe',
                        'phone_number' => '08132646940',
                        'plan_id' => 24
                    ]
                ]
                    ],
            [
                'payment_frequency' => 'q',
                'first_name' => 'Ben',
                'last_name' => 'Stiller',
                'email_address' => 'snr22325@awsoo.com',
                'phone_number' => '08132646940',
                'plan_id' => 24,
                'can_complete_profile' => false,
                'dependants' => []
            ]
        ]
    ]
]);
```

## Renew Individual Subscription([options])

Renew subscription for a single enrollee.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### enrollees

### InnovationSandbox\RelianceHMO\Retails\Renew(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Retails;
$instance1 = new Retails();

$instance1->Renew([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'payload'  => [
        'enrollees' => [
            [
                'user_id' => 345,
                'remove' => [347]
            ]
        ]
    ]
]);
```

## Get Healthcare Providers([options])

Get Provider details. This can be used to provide more details of accessible hospitals for plans.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### state

##### plan_id

##### tiers

##### page

##### limit

### InnovationSandbox\RelianceHMO\Utilities\Providers(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->Providers([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'state' =>  'NG-LA',
        'plan_id' =>  '25',
        'tiers' =>  '1,2',
        'page' =>  1,
        'limit' =>  50
    ]
]);
```

## Get States Available for Healthcare([options])

Get states. This can be used to provide the state_id for client signup.

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Utilities\States(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->States([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## Benefit List([options])

Retrieve Benefits list for Retail Plans.

### options

The module accepts options as array of key-value.

#### payload

Request Params

##### plan

### InnovationSandbox\RelianceHMO\Utilities\Benefits(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->Benefits([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'params'  => [
        'plan' =>  25
    ]
]);
```

## Get Titles([options])

Get Titles for enrollee profile.

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Utilities\Titles(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->Titles([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## Get Occupations([options])

Get Occupation(s) for enrollee profile.

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Utilities\Occupations(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->Occupations([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## Get Marital Status(es)([options])

Get Marital Status(es) for enrollee profile.

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Utilities\Statuses(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Utilities;
$instance1 = new Utilities();

$instance1->Statuses([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## Wallet Balance([options])

Get wallet balance - useful when you want to use the walleting system to pay (Company payment not supported with this method).

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Wallet\Balance(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Wallet;
$instance1 = new Wallet();

$instance1->Balance([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## Fund Wallet([options])

Fund Wallet.

### options

The module accepts options as array of key-value.

#### payload

Request Body

##### amount

### InnovationSandbox\RelianceHMO\Wallet\Fund(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Wallet;
$instance1 = new Wallet();

$instance1->Fund([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key',
    'payload'  => [
        'amount' =>  '250000'
    ]
]);
```

## Wallet Transactions([options])

Retrieve Wallet Transactions for client.

### options

The module accepts options as array of key-value.

### InnovationSandbox\RelianceHMO\Wallet\Transactions(credentials)

Below is a sample with test data;

```php
<?php
use InnovationSandbox\RelianceHMO\Wallet;
$instance1 = new Wallet();

$instance1->Transactions([
    'host' => 'your host url',
    'sandbox_key' => 'your sandbox key'
]);
```

## RUNNING TEST

After installing dependencies, run the command

```bash
$ vendor/bin/phpunit tests
```
