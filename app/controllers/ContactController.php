<?php

class ContactController extends BaseController
{

	public function index()
	{
		$data = [
			'title' => Lang::get('contact.contact') . ' | ',
			'headerClass' => 'contact-header',
		];

		return View::make('contact', $data);
	}

	public function sendMessage()
	{
		$data = array(
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'messageBody' => Input::get('messageBody'),
		);

		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'messageBody' => 'required',
		);

		$validator = Validator::make($data, $rules);

		if ($validator->passes())
		{
			try
			{
				Mail::send('emails/contact', $data, function($message) use ($data)
				{
					$message->from($data['email'], $data['name']);
					$message->to(Config::get('mail.contactEmail'), 'Malarrimo')
						->subject('Contacto Malarrimo');
				});

				return Redirect::route('contact')->with('msg', '<p class="alert alert-success" role="alert">' . Lang::get('contact.success') . '</p>');
			}
			catch(Exception $ex)
			{
				Log::error($ex);
				return Redirect::route('contact')
					->with('msg', '<p class="alert alert-danger" role="alert">' . Lang::get('contact.error') . '</p>')
					->withInput();
			}
		}

		return Redirect::route('contact')->withErrors($validator)->withInput();
	}

}
