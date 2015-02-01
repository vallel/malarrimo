<?php

use Malarrimo\Libraries\UploadHandler;
use Malarrimo\Managers\GalleryManager;
use Malarrimo\Managers\PictureManager;
use Malarrimo\Marshallers\MarshallPicturesToFrontEnd;
use Malarrimo\Repositories\Gallery as GalleryRepo;
use Malarrimo\Repositories\Picture as PictureRepo;

class AdminGalleriesController extends BaseController
{

    /**
     * @var GalleryRepo
     */
    protected $repository;

    /**
     * @var PictureRepo
     */
    protected $pictureRepo;

    /**
     * @param GalleryRepo $repository
     * @param PictureRepo $pictureRepo
     */
    public function __construct(GalleryRepo $repository, PictureRepo $pictureRepo)
    {
        $this->repository = $repository;
        $this->pictureRepo = $pictureRepo;
    }

    public function getList()
    {
        $galleries = $this->repository->getAll();
        return View::make('admin/galleries')->with('galleries', $galleries);
    }

    public function add()
    {
        return View::make('admin/gallery');
    }

    public function create()
    {
        $gallery = $this->repository->newInstance();
        $manager = new GalleryManager($gallery, Input::all());

        if ($manager->save())
        {
            return Redirect::route('editGallery', ['id' => $manager->getId()])
                ->with('msg', '<p class="alert alert-success">Gallería guardada</p>');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($manager->getErrors());
        }

    }

    public function edit($id)
    {
        $gallery = $this->checkGalleryExists($id);
        return View::make('admin/gallery', ['gallery' => $gallery]);
    }

    public function update($id)
    {
        $gallery = $this->checkGalleryExists($id);

        $manager = new GalleryManager($gallery, Input::all());

        if ($manager->save())
        {
            return Redirect::back()->with('msg', '<p class="alert alert-success">Galería actualizada</p>');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function delete($id)
    {
        if ($this->repository->delete($id))
        {
            $pictures = $this->pictureRepo->getGalleryPictures($id);
            if ($pictures->count() > 0)
            {
                $handlerOptions = $this->getHandlerOptions($id);
                $handler = new UploadHandler($handlerOptions, false);

                $fileNames = array();
                foreach ($pictures as $picture)
                {
                    $fileNames[] = $picture->file_name;
                    $this->pictureRepo->delete($picture->id);
                }

                $handler->delete(false, $fileNames);
                rmdir($handlerOptions['upload_dir'] . '/thumbnail');
                rmdir($handlerOptions['upload_dir']);
            }

            return Redirect::route('galleryList')->with('msg', '<p class="alert alert-success">La galería seleccionada ha sido borrado</p>');
        }
        else
        {
            return Redirect::route('galleryList')->with('msg', '<p class="alert alert-danger">No fué posible borrar la galería</p>');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Support\Collection|static
     */
    private function checkGalleryExists($id)
    {
        if (empty($id))
        {
            return Redirect::back();
        }

        $gallery = $this->repository->find($id);

        if (empty($gallery))
        {
            return Redirect::back()->with('msg', '<p class="alert alert-danger">No se encontró la galería seleccionada</p>');
        }

        return $gallery;
    }

    public  function getPictures($id)
    {
        $pictures = $this->pictureRepo->getGalleryPictures($id);
        $response = MarshallPicturesToFrontEnd::marshall($pictures);

        return Response::json($response);
    }

    public function uploadGallery($id)
    {
        $error = '';

        if (!$id)
        {
            $error = 'Parameter id is missing';
        }

        $gallery = $this->repository->find($id);

        if (empty($gallery))
        {
            $error = "Gallery $id not found";
        }

        if (!empty($error))
        {
            $response = array(
                'success' => false,
                'error' => $error,
            );
        }
        else
        {
            $handlerOptions = $this->getHandlerOptions($id);
            $handler = new UploadHandler($handlerOptions, false);
            $response = $handler->post(false);

            //TODO: move this logic to a PictureManager or other pictures related class
            foreach ($response['files'] as $index => $file)
            {
                if (!isset($file->error))
                {
                    $picture = $this->pictureRepo->newInstance();
                    $pictureData = ['file_name' => $file->name, 'gallery_id' => $gallery->id];
                    $manager = new PictureManager($picture, $pictureData);
                    $manager->save();

                    $response['files'][$index]->deleteUrl = route('deletePic', ['id' => $manager->getId()]);
                }
            }
        }

        return Response::json($response);
    }

    public function deletePicture($id)
    {
        if (!$id)
        {
            $error = 'Parameter id is missing';
        }

        $picture = $this->pictureRepo->find($id);

        if (empty($picture))
        {
            $error = "Picture $id not found";
        }

        $handlerOptions = $this->getHandlerOptions($picture->gallery->id);
        $handler = new UploadHandler($handlerOptions, false);
        $response = $handler->delete(false, $picture->file_name);

        if (isset($response[$picture->file_name]) && $response[$picture->file_name])
        {
            $this->pictureRepo->delete($picture->id);
        }

        return Response::json($response);
    }

    protected function get_server_var($id)
    {
        return isset($_SERVER[$id]) ? $_SERVER[$id] : '';
    }

    protected function getHandlerOptions($id)
    {
        // TODO: Move these variables to constants or somewhere else
        $picturesDirPath = dirname($this->get_server_var('SCRIPT_FILENAME')).'/uploads/galleries';
        $picturesDirUrl = asset('uploads/galleries');

        $handlerOptions = array(
            'upload_dir' => $picturesDirPath . '/' . $id . '/',
            'upload_url' => $picturesDirUrl . '/' . $id . '/',
        );

        return $handlerOptions;
    }

} 