<?php

namespace App\Services\Customer;

use App\Models\Customer;
use App\Services\BaseService;

class CustomerService extends BaseService
{

    /**
     * Create a new class instance.
     */
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }


}
