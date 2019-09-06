<?php

namespace App\Service\Management;

use Exception;
use Illuminate\Support\Facades\Validator;

class SpecialtyService implements ServiceInterface
{
    const MESSAGE_TEMPLATE = '%s - %s is %s';

    public function create($data)
    {
        return sprintf(self::MESSAGE_TEMPLATE, $data['service'], $data['id'], $data['rule']);
    }

    public function update($data)
    {
        return sprintf(self::MESSAGE_TEMPLATE, $data['service'], $data['id'], $data['rule']);
    }

    public function delete($data)
    {
        return sprintf(self::MESSAGE_TEMPLATE, $data['service'], $data['id'], $data['rule']);
    }

    public function process($content)
    {
        $content = $this->validate($content);
        $method = $content['rule'];

        return $this->$method($content);
    }

    public function validate($content)
    {
        $rules = [
            'id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'specialtyCode' => ['required', 'integer'],
        ];

        $validator = Validator::make($content['body'], $rules);
        if ($validator->passes()) {
            return $content;
        } else {
            throw new Exception('Data is not valid');
        }


    }

}