<?php
namespace App\Services;

use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class TelegramService
{
	private $botToken;
	private $chatId;

	public function __construct(string $botToken, string $chatId)
	{
		$this->botToken = $botToken;
		$this->chatId = $chatId;
	}

	public function send(string $message)
	{
		try {
			$client = new Client();

			$client->request('POST', $this->keyword('sendMessage'), [
				'form_params' => [
					'chat_id' => $this->chatId,
					'text' => $message,
				]
			]);

			return true;
		} catch (Exception $ex) {
			return false;
		}
	}

	public function keyword(string $keyword)
	{
		return 'https://api.telegram.org/bot'.$this->botToken.'/'.$keyword;
	}
}
