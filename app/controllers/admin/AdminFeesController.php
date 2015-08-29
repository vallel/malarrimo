<?php

use Malarrimo\Managers\FeeManager;
use Malarrimo\Marshallers\MarshallFeesToDto;
use Malarrimo\Repositories\Fee;

class AdminFeesController extends BaseController
{

    /**
     * @var Fee
     */
    private $feesRepository;

    /**
     * @var FeeManager
     */
    private $manager;

    /**
     * @var MarshallFeesToDto
     */
    private $marshaller;

    public function __construct(Fee $feesRepository, FeeManager $manager, MarshallFeesToDto $marshaller)
    {
        $this->setFeesRepository($feesRepository);
        $this->setManager($manager);
        $this->marshaller = $marshaller;
    }

    public function getList()
    {
        $fees = $this->getFeesRepository()->getAll();
        $feeGroups = $this->marshaller->marshall($fees);
        return View::make('admin/fees')->with('fees', $feeGroups);
    }

    public function update()
    {
        $manager = $this->getManager();

        try
        {
            $manager->saveAll(Input::all());
            $msg = '<p class="alert alert-success" role="alert">Tarifas guardadas.</p>';
        }
        catch(Exception $ex)
        {
            $msg = 'No fué posible guardar las tarifas, favor de intentarlo más tarde (Error: '.$ex->getMessage().').';
            Log::error($ex->getMessage());
        }

        return Redirect::route('admin.fees')->with('msg', $msg);
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

    /**
     * @return FeeManager
     */
    private function getManager()
    {
        return $this->manager;
    }

    /**
     * @param FeeManager $manager
     * @return static
     */
    private function setManager(FeeManager $manager)
    {
        $this->manager = $manager;
        return $this;
    }

}