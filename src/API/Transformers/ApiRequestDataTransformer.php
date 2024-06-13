<?php

namespace App\API\Transformers;

use Symfony\Component\Form\DataTransformerInterface;

class ApiRequestDataTransformer implements DataTransformerInterface
{


    public function transform(mixed $value): mixed
    {

    }

    public function reverseTransform(mixed $value): mixed
    {
        // TODO: Implement reverseTransform() method.
    }
}