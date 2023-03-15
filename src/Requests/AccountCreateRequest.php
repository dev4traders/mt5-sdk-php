<?php

namespace D4T\MT5Sdk\Requests;

class AccountCreateRequest {

    public function __construct(
        public string $name,
        public string $email,
        public string $group,
        public string $password,
        public string $city,
        public string $State,
        public string $leverage,
        public string $address,
        public string $phone,
    ) {

    }

}