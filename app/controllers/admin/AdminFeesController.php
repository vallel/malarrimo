<?php

use Malarrimo\Repositories\Fee;

class AdminFeesController extends BaseController
{

    private $feesRepository;

    public function __construct(Fee $feesRepository)
    {
        $this->setFeesRepository($feesRepository);
    }

    public function getList()
    {
        $fees = $this->getFeesRepository()->getAll();
        return View::make('admin/fees')->with('fees', $fees);
    }

    /**
     * @return Fee
     */
    private function getFeesRepository()
    {
        return $this->feesRepository;
    }

    /**
     * @param Fee $feesRepository
     * @return static
     */
    private function setFeesRepository(Fee $feesRepository)
    {
        $this->feesRepository = $feesRepository;
        return $this;
    }

}