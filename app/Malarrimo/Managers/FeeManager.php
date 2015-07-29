<?php

namespace Malarrimo\Managers;


use Malarrimo\Entities\Fee;

class FeeManager extends ManagerBase
{

    public function __construct(Fee $entity)
    {
        $this->entity = $entity;
    }

    public function saveAll($data)
    {
        $updatedIds = [];

        foreach ($data as $key => $value)
        {
            if ($this->isValidField($key, $value))
            {
                $fieldParts = explode('-', $key);
                $id = $fieldParts[1];

                // check if this row has not been updated
                if (!in_array($id, $updatedIds))
                {
                    // update both fields of the record
                    $entity = $this->getEntity();
                    $fee = $entity::find($id);
                    $fee->pesos_fee = $data['pesos_fee-'.$id];
                    $fee->dollars_fee = $data['dollars_fee-'.$id];
                    $fee->save();

                    // save the id of the record in the updated ids array to avoid double update over the same record
                    $updatedIds[] = $id;
                }
            }
        }

    }

    /**
     * @param string $fieldName
     * @param mixed $value
     * @return bool
     */
    private function isValidField($fieldName, $value)
    {
        return (strpos($fieldName, 'pesos_fee') >= 0 || strpos($fieldName, 'dollars_fee') >= 0) && is_numeric($value);
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return array();
    }

}