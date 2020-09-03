# Parent ApS - Senior Back end developer - Assessment


## Installation

1- git clone https://github.com/ahmedsafroot/Parenthq
2- composer install

### Requirements

- PHP >= 7.2.0
- Composer  https://getcomposer.org/

### test

 - to run test cases use this command: ./vendor/bin/phpunit

### to add anothors providers 

 1- add provider json file in this paths  /storage/app/jsons/provider.json
 2- add his data in providers array in App/Http/Controllers/Controller/ParenthqController for example
      array(
                   "name"=>"DataProviderZ",
                   "status_column"=>'code',
                   'balance_column'=>'price',
                   'currency_column'=>'curr',
                   "StautsCode"=>array("authorised"=>5,"decline"=>6,"refunded"=>7),
                   "data"=>''
        ),

