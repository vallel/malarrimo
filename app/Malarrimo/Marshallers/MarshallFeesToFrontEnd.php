<?php

namespace Malarrimo\Marshallers;

use stdClass;

class MarshallFeesToFrontEnd implements Marshaller
{

    /**
     * @param Fee[] $fees
     * @return stdClass[]
     */
    public function marshall($fees)
    {
        $feeGroups = array();

        $groupIds = array();
        foreach ($fees as $fee)
        {
            $concept = $fee->feeConcept;
            $group = $concept->group;

            if (!in_array($group->id, $groupIds))
            {
                $feeGroup = new stdClass();
                $feeGroup->id = $group->id;
                $feeGroup->name = $group->name;
                $feeGroup->short_name = $group->short_name;
                $feeGroup->high_season_fees = $group->high_season_fees;
                $feeGroup->by_person_number_fees = $group->by_person_number_fees;
                $feeGroup->fees = array();

                $feeGroups[] = $feeGroup;
                $groupIds[] = $group->id;
            }
            else
            {
                // if group is already in array we just take the last group
                $feeGroup = $feeGroups[count($feeGroups)-1];
            }

            $fullName = $concept->name;
            if ($feeGroup->by_person_number_fees)
            {
                $fullName .= " ({$fee->min_person_number} - {$fee->max_person_number} personas)";
            }

            $feeObj = new stdClass();
            $feeObj->id = $fee->id;
            $feeObj->concept_id = $concept->id;
            $feeObj->concept_name = $concept->name;
            $feeObj->name = $fullName;
            $feeObj->concept_short_name = $concept->short_name;
            $feeObj->min_person_number = $fee->min_person_number;
            $feeObj->max_person_number = $fee->max_person_number;
            $feeObj->pesos_fee = $fee->pesos_fee;
            $feeObj->dollars_fee = $fee->dollars_fee;
            $feeObj->pesos_fee_high = $fee->pesos_fee_high;
            $feeObj->dollars_fee_high = $fee->dollars_fee_high;

            $feeGroup->fees[$fee->id] = $feeObj;
        }

        return $feeGroups;
    }
}