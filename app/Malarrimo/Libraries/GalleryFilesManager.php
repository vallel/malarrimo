<?php 

namespace Malarrimo\Libraries;

class GalleryFilesManager 
{
	private static $instance = null;

	private function __construct() { }

	/**
	 * @return GalleryFilesManager
	 */
	public static function getInstance()
	{
		$class = __CLASS__;
		if (!static::$instance instanceof $class)
		{
			static::$instance = new $class();
		}

		return static::$instance;
	}

	public function deleteOriginalUplodedImagesFromResponse($response, $path)
	{
		foreach ($response['files'] as $image)
		{
			$file = $path . $image->name;
			$this->deleteFile($file);
		}
	}

	protected function deleteFile($file)
	{
		if (file_exists($file))
		{
			unlink($file);
		}
	}

}