<?php

use Malarrimo\Repositories\Gallery as GalleryRepo;

class GalleryController extends BaseController
{

    /** @var GalleryRepo  */
    protected $galleryRepo;

    /**
     * @param GalleryRepo $galleryRepo
     */
    public function __construct(GalleryRepo $galleryRepo)
    {
        parent::__construct();
        $this->galleryRepo = $galleryRepo;
    }

    public function index()
    {
        $data = array(
            'title' => 'Galerías | ',
            'headerClass' => 'gallery-header',
            'galleries' => $this->galleryRepo->getLastGalleries(9),
        );

        return View::make('galleries/list', $data);
    }

}