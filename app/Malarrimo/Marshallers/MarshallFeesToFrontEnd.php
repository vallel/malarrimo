<?php

namespace Malarrimo\Marshallers;


use Malarrimo\Dto\Fee as FeeDto;
use Malarrimo\Dto\FeeGroup;
use Malarrimo\Entities\Fee;

class MarshallFeesToFrontEnd implements Marshaller
{

    /**
     * @param Fee[] $fees
     * @return FeeGroup[]
     */
    public static function marshall($fees)
    {
        $feeGroups = array();

        $groupIds = array();
        foreach ($fees as $fee)
        {
            $concept = $fee->feeConcept;
            $group = $concept->group;

            if (!in_array($group->id, $groupIds))
            {
                $feeGroup = new FeeGroup();
                $feeGroup->setId($group->id)
                    ->setName($group->name)
                    ->setShortName($group->short_name)
                    ->setHasHighSeasonFees($group->high_season_fees)
                    ->setHasByPersonNumberFees($group->by_person_number_fees);

                $feeGroups[] = $feeGroup;
                $groupIds[] = $group->id;
            }
            else
            {
                // if group is already in array we just take the last group
                $feeGroup = $feeGroups[count($feeGroups)-1];
            }

            $fullName = $concept->name;
            if ($feeGroup->isHasByPersonNumberFees())
            {
                $fullName .= " ({$fee->min_person_number} - {$fee->max_person_number} personas)";
            }

            $feeDto = new FeeDto();
            $feeDto->setId($fee->id)
                ->setConceptId($concept->id)
                ->setConceptName($concept->name)
                ->setName($fullName)
                ->setConceptShortName($concept->short_name)
                ->setMinPersonNumber($fee->min_person_number)
                ->setMaxPersonNumber($fee->max_person_number)
                ->setPesosFee($fee->pesos_fee)
                ->setDollarsFee($fee->dollars_fee)
                ->setPesosFeeHigh($fee->pesos_fee_high)
                ->setDollarsFeeHigh($fee->dollars_fee_high);

            $feeGroup->addFee($feeDto);
        }

        return $feeGroups;
    }

}