<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProvider()
    {

        //test case to return all users from all providers
        $this->json('GET', 'api/v1/users', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200.5,
                                "Currency"=> "USD",
                                "parentEmail"=> "parent2@parent.eu",
                                "statusCode"=> 2,
                                "registerationDate"=> "2018-01-01",
                                "parentIdentification"=> "e3rffr-1d25-dddw-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 500,
                                "Currency"=> "EGP",
                                "parentEmail"=> "parent3@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-02-27",
                                "parentIdentification"=> "4erert4e-2www-wddc-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 400,
                                "Currency"=> "AED",
                                "parentEmail"=> "parent4@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2019-09-07",
                                "parentIdentification"=> "d3dwwd70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                            [
                                "balance"=> 354.5,
                                "currency"=> "AED",
                                "email"=> "parent100@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "3fc2-a8d1"
                            ],
                            [
                                "balance"=> 1000,
                                "currency"=> "USD",
                                "email"=> "parent200@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=> 560,
                                "currency"=> "AED",
                                "email"=> "parent300@parent.eu",
                                "status"=> 200,
                                "created_at"=> "22/12/2018",
                                "id"=> "rrc2-a8d1"
                            ],
                            [
                                "balance"=> 222,
                                "currency"=> "USD",
                                "email"=> "parent400@parent.eu",
                                "status"=> 300,
                                "created_at"=> "11/11/2018",
                                "id"=> "sfc2-e8d1"
                            ],
                            [
                                "balance"=> 130,
                                "currency"=> "EUR",
                                "email"=> "parent500@parent.eu",
                                "status"=> 200,
                                "created_at"=> "02/08/2019",
                                "id"=> "4fc3-a8d2"
                            ]
                        ]
                    ]
        ]);
 
        //test case to return users from DataProviderX
        $this->json('GET', 'api/v1/users?provider=DataProviderX', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200.5,
                                "Currency"=> "USD",
                                "parentEmail"=> "parent2@parent.eu",
                                "statusCode"=> 2,
                                "registerationDate"=> "2018-01-01",
                                "parentIdentification"=> "e3rffr-1d25-dddw-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 500,
                                "Currency"=> "EGP",
                                "parentEmail"=> "parent3@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-02-27",
                                "parentIdentification"=> "4erert4e-2www-wddc-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 400,
                                "Currency"=> "AED",
                                "parentEmail"=> "parent4@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2019-09-07",
                                "parentIdentification"=> "d3dwwd70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                            
                        ]
                    ]
        ]);

        //test case to return users from DataProviderY
        $this->json('GET', 'api/v1/users?provider=DataProviderY', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                        
                            [
                                "balance"=> 354.5,
                                "currency"=> "AED",
                                "email"=> "parent100@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "3fc2-a8d1"
                            ],
                            [
                                "balance"=> 1000,
                                "currency"=> "USD",
                                "email"=> "parent200@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=> 560,
                                "currency"=> "AED",
                                "email"=> "parent300@parent.eu",
                                "status"=> 200,
                                "created_at"=> "22/12/2018",
                                "id"=> "rrc2-a8d1"
                            ],
                            [
                                "balance"=> 222,
                                "currency"=> "USD",
                                "email"=> "parent400@parent.eu",
                                "status"=> 300,
                                "created_at"=> "11/11/2018",
                                "id"=> "sfc2-e8d1"
                            ],
                            [
                                "balance"=> 130,
                                "currency"=> "EUR",
                                "email"=> "parent500@parent.eu",
                                "status"=> 200,
                                "created_at"=> "02/08/2019",
                                "id"=> "4fc3-a8d2"
                            ]
                        ]
                    ]
        ]);

        //test case to return users who authorised from all providers
        $this->json('GET', 'api/v1/users?statusCode=authorised', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            
                            [
                                "parentAmount"=> 500,
                                "Currency"=> "EGP",
                                "parentEmail"=> "parent3@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-02-27",
                                "parentIdentification"=> "4erert4e-2www-wddc-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 400,
                                "Currency"=> "AED",
                                "parentEmail"=> "parent4@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2019-09-07",
                                "parentIdentification"=> "d3dwwd70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                            [
                                "balance"=> 354.5,
                                "currency"=> "AED",
                                "email"=> "parent100@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "3fc2-a8d1"
                            ],
                            [
                                "balance"=> 1000,
                                "currency"=> "USD",
                                "email"=> "parent200@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                           
                        ]
                    ]
        ]);

        //test case to return users has balance between 200 and 300 from all providers
        $this->json('GET', 'api/v1/users?balanceMin=200&balanceMax=300', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200.5,
                                "Currency"=> "USD",
                                "parentEmail"=> "parent2@parent.eu",
                                "statusCode"=> 2,
                                "registerationDate"=> "2018-01-01",
                                "parentIdentification"=> "e3rffr-1d25-dddw-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                          
                            [
                                "balance"=> 222,
                                "currency"=> "USD",
                                "email"=> "parent400@parent.eu",
                                "status"=> 300,
                                "created_at"=> "11/11/2018",
                                "id"=> "sfc2-e8d1"
                            ],
                            
                        ]
                    ]
        ]);

        //test case to return all users has currency USD
        $this->json('GET', 'api/v1/users?currency=USD', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            
                            [
                                "parentAmount"=> 200.5,
                                "Currency"=> "USD",
                                "parentEmail"=> "parent2@parent.eu",
                                "statusCode"=> 2,
                                "registerationDate"=> "2018-01-01",
                                "parentIdentification"=> "e3rffr-1d25-dddw-8591-034165a3a613"
                            ],
                            
                            [
                                "balance"=> 1000,
                                "currency"=> "USD",
                                "email"=> "parent200@parent.eu",
                                "status"=> 100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            
                            [
                                "balance"=> 222,
                                "currency"=> "USD",
                                "email"=> "parent400@parent.eu",
                                "status"=> 300,
                                "created_at"=> "11/11/2018",
                                "id"=> "sfc2-e8d1"
                            ],
                            
                        ]
                    ]
        ]);

        //test case to return users from DataProviderX and authorised
        $this->json('GET', 'api/v1/users?provider=DataProviderX&statusCode=authorised', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 500,
                                "Currency"=> "EGP",
                                "parentEmail"=> "parent3@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-02-27",
                                "parentIdentification"=> "4erert4e-2www-wddc-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 400,
                                "Currency"=> "AED",
                                "parentEmail"=> "parent4@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2019-09-07",
                                "parentIdentification"=> "d3dwwd70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                            
                        ]
                    ]
        ]);

        //test case to return users from DataProviderY and balance between 200 and 300
        $this->json('GET', 'api/v1/users?provider=DataProviderY&balanceMin=200&balanceMax=300', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "balance"=> 222,
                                "currency"=> "USD",
                                "email"=> "parent400@parent.eu",
                                "status"=> 300,
                                "created_at"=> "11/11/2018",
                                "id"=> "sfc2-e8d1"
                            ]
                        ]
                    ]
        ]);

        //test case to return users from DataProviderY , balance between 200 and 300 , and currcy is EG
        $this->json('GET', 'api/v1/users?provider=DataProviderY&balanceMin=200&balanceMax=300&currency=EG', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            
                        ]
                    ]
        ]);

         //test case to return users from DataProviderX , balance between 100 and 300 ,  currcy is EUR, and authorised
        $this->json('GET', 'api/v1/users?provider=DataProviderX&balanceMin=100&balanceMax=300&currency=EUR&statusCode=authorised', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["users"=>
                        [ 
                            [
                                "parentAmount"=> 280,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent1@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            
                            [
                                "parentAmount"=> 200,
                                "Currency"=> "EUR",
                                "parentEmail"=> "parent5@parent.eu",
                                "statusCode"=> 1,
                                "registerationDate"=> "2018-10-30",
                                "parentIdentification"=> "d3d29d40-1d25-11e3-8591-034165a3a6133"
                            ],
                            
                        ]
                    ]
        ]);

        //test case for provider doesn't exists
        $this->json('GET', 'api/v1/users?provider=DataProviderZZ', ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "status"=> false,
                "msg"=>"this Provider Not Found",
              
        ]);
    }
}
