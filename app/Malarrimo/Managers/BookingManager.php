<?php

namespace Malarrimo\Managers;

class BookingManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|confirmed',
            'email_confirmation' => '',
            'phone' => 'required',
            'fax' => '',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'hotelCheckIn' => 'date_format:"d/m/Y"',
            'hotelCheckOut' => 'date_format:"d/m/Y"',
            'hotelSingleRooms' => 'integer',
            'hotelDoubleRooms' => 'integer',
            'hotelAdults' => 'integer',
            'hotelChildren' => 'integer',
            'whalesDate' => 'date_format:"d/m/Y"',
            'whalesTime' => '',
            'whalesAdults' => 'integer',
            'whalesChildren' => 'integer',
            'cavePaintingDate' => 'date_format:"d/m/Y"',
            'cavePaintingAdults' => 'integer',
            'cavePaintingChildren' => 'integer',
            'saltMineDate' => 'date_format:"d/m/Y"',
            'saltMineAdults' => 'integer',
            'saltMineChildren' => 'integer',
            'rvCheckIn' => 'date_format:"d/m/Y"',
            'rvCheckOut' => 'date_format:"d/m/Y"',
            'rvAdults' => 'integer',
            'rvChildren' => 'integer',
            'rvCamping' => '',
            'rvVan' => '',
            'rvCamper' => '',
            'rvFifthWheel' => '',
            'banquetDate' => 'date_format:"d/m/Y"',
            'banquetTime' => '',
            'banquetPersons' => 'integer',
        ];

        return $rules;
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->isValid())
        {
            return false;
        }

        $this->fillEntityData();
        $this->entity->save();

        return true;
    }

    protected function fillEntityData()
    {
        foreach ($this->getRules() as $field => $rule)
        {
            // we don't need to save the email confirmation field
            if ($field == 'email_confirmation' ||
                // time for whales tour is not needed if the date for whales tour is empty
                ($field == 'whalesTime' && empty($this->data['whalesDate'])))
            {
                continue;
            }

            if (array_key_exists($field, $this->data))
            {
                $this->entity->{$field} = $this->data[$field];
            }
        }
    }

}