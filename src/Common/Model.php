<?php
namespace InternalApi\Common;

abstract class Model
{
    public function fill(array $data)
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . studly_case($key);

            if (method_exists($this, $setter)){
                $this->$setter($value);
            }
        }
        return $this;
    }
}