<?php

use Malarrimo\Managers\NewsManager;
use Malarrimo\Repositories\News;

class AdminNewsController extends BaseController
{

    /**
     * @var News
     */
    protected $repository;

    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $news = $this->repository->getAll();
        return View::make('admin/news')->with('news', $news);
    }

    public function add()
    {
        return View::make('admin/post');
    }

    public function create()
    {
        $post = $this->repository->newInstance();
        $data = Input::all();
        $data['user_id'] = Auth::user()->id;

        try
        {
            $manager = new NewsManager($post, $data);

            if ($manager->save())
            {
                return Redirect::to('admin/noticias')->with('msg', '<p class="alert alert-success">Noticia creada</p>');
            }
        }
        catch(Exception $ex)
        {
            Log::error($ex->getMessage());
            return Redirect::back()->withInput()->with('msg', '<p class="alert alert-danger">Error: '.$ex->getMessage().'</p>');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function edit($id)
    {
        $post = $this->repository->find($id);
        return View::make('admin/post')->with('post', $post);
    }

    public function update($id)
    {
        if (empty($id))
        {
            return Redirect::back();
        }

        $post = $this->repository->find($id);
        $data = Input::all();
        $data['user_id'] = Auth::user()->id;

        $manager = new NewsManager($post, $data);

        if ($manager->save())
        {
            return Redirect::back()->with('msg', '<p class="alert alert-success">Noticia actualizada</p>');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function delete($id)
    {
        if ($this->repository->delete($id))
        {
            return Redirect::back()->with('msg', '<p class="alert alert-success">La noticia seleccionada ha sido borrado</p>');
        }
        else
        {
            return Redirect::back()->with('msg', '<p class="alert alert-danger">No fué posible borrar la noticia seleccionada</p>');
        }
    }

    public function deletePostImage($id)
    {
        $post = $this->repository->find($id);

        if (!empty($post) && !empty($post->image))
        {
            $manager = new NewsManager($this->repository, $post->toArray());
            $manager->deletePostImages($post->image);

            $post->image = null;
            $post->save();
        }

        return Redirect::route('editNews', [$post->id])->with('msg', '<p class="alert alert-success">La noticia ha sido actualizada.</p>');
    }

} 