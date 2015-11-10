<?php

use Malarrimo\Entities\FeeConceptGroup;
use Malarrimo\Repositories\Fee;

class FacilitiesController extends BaseController
{

    /** @var  Fee */
    private $feesRepository;

    public function __construct(Fee $feesRepository) {
        parent::__construct();
        $this->setFeesRepository($feesRepository);
    }

    public function malarrimo()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-malarrimo-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/malarrimo', $data);
    }

    public function tours()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; Eco-Tours | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-tours-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/tours', $data);
    }

    public function restaurant()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; Restaurante | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'restaurant-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/restaurant', $data);
    }

    public function motel()
    {
        $fees = $this->getFeesRepository()->getByGroup(FeeConceptGroup::HOTEL);
        $season = date('Y', strtotime($fees[0]->updated_at));
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; Motel | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'motel-banner',
            'feesSeason' => $season.' - '.($season+1),
            'fees' => $fees,
        ];

        return View::make('facilities/' . Lang::getLocale() . '/motel', $data);
    }

    public function rvparking()
    {
        $fees = $this->getFeesRepository()->getByGroup(FeeConceptGroup::RV);
        $season = date('Y', strtotime($fees[0]->updated_at));
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; RV Parking | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'rvparking-banner',
            'feesSeason' => $season.' - '.($season+1),
            'fees' => $fees,
        ];

        return View::make('facilities/' . Lang::getLocale() . '/rvparking', $data);
    }

    public function casaelviejocactus()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; Casa El Viejo Cactus | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'cevc-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/casaelviejocactus', $data);
    }

    public function deli()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' &raquo; Malarrimo Deli | ',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'deli-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/deli', $data);
    }

    /**
     * @return Fee
     */
    public function getFeesRepository()
    {
        return $this->feesRepository;
    }

    /**
     * @param Fee $feesRepository
     * @return static
     */
    public function setFeesRepository($feesRepository)
    {
        $this->feesRepository = $feesRepository;
        return $this;
    }

}
