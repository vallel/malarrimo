<?php
namespace Malarrimo\Marshallers;

interface Marshaller
{

	/**
	 * @param mixed $obj
	 * @return mixed
	 */
	public static function marshall($obj);
}