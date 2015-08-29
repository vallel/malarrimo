<?php 
namespace Malarrimo\Marshallers;

use stdClass;

class MarshallPicturesToFrontEnd implements Marshaller
{

	/**
	 * @param mixed $pictures
	 * @return stdClass
	 */
	public function marshall($pictures)
	{
		$files = array();

		foreach ($pictures as $pic) 
		{
			$files[] = $this->marshallPicture($pic);
		}

		$response = new stdClass();
		$response->files = $files;

		return $response;
	}

	private function marshallPicture($picture)
	{
		$response = new stdClass();

		$response->deleteType = "DELETE";
		$response->deleteUrl = route('deletePic', ['id' => $picture->id]);
		$response->name = $picture->file_name;
		$response->size = 0;
		$response->thumbnailUrl = asset('uploads/galleries/' . $picture->Gallery->id . '/thumbnail/' . $picture->file_name);
		$response->type = '';
		$response->url = asset('uploads/galleries/' . $picture->Gallery->id . '/' . $picture->file_name);

		return $response;
	}

}