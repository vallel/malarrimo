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
            'title' => Lang::get('galleries.galleries') . ' | ',
            'headerClass' => 'gallery-header',
            'galleries' => $this->galleryRepo->getLastGalleriesPaginated(9),
        );

        return View::make('galleries/list', $data);
    }

    public function show($id, $title)
    {
        if (empty($id))
        {
            return Redirect::route('galleries');
        }

        $gallery = $this->galleryRepo->getById($id);

        if (empty($gallery))
        {
            return Redirect::route('galleries');
        }

        $data = array(
            'title' => Lang::get('galleries.galleries') . ' &raquo; ' . $gallery->title . ' | ',
            'headerClass' => 'gallery-header',
            'gallery' => $gallery,
        );

        return View::make('galleries/single', $data);
    }

}