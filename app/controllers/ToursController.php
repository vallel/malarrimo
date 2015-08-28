<?php

use Malarrimo\Entities\FeeConceptGroup;
use Malarrimo\Repositories\Fee;

class ToursController extends BaseController
{

    /**
     * @var Fee
     */
    private $feesRepository;

    /**
     * @param Fee $feesRepository
     */
    public function __construct(Fee $feesRepository)
    {
        parent::__construct();
        $this->setFeesRepository($feesRepository);
    }

    public function index()
    {
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.whales') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/tours', $data);
    }

    public function equipment()
    {
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.recommendedEquipment') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/equipment', $data);
    }

    public function fees()
    {
        $fees = $this->getFeesRepository()->getByGroup(FeeConceptGroup::WHALES);
        $season = date('Y', strtotime($fees[0]->updated_at));
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.fees') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
            'fees' => $fees,
            'feesSeason' => $season.' - '.($season+1),
        ];

        return View::make('tours/' . Lang::getLocale() . '/fees', $data);
    }

    public function whales()
    {
        $data = [
            'title' => Lang::get('tours.grayWhale') . ' | ',
            'headerClass' => 'tours-header',
            'sectionContentClass' => '',
            'toursBanner' => 'whales-info-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/whales', $data);
    }

    public function other()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'other-tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/other', $data);
    }

    public function otherFees()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'cave-paintings-banner',
            'fees' => $this->getFeesRepository()->getByGroup(FeeConceptGroup::CAVE_PAINTING),
        ];

        return View::make('tours/' . Lang::getLocale() . '/otherFees', $data);
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
