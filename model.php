<?php

use GuzzleHttp\Client;					// HTTP Client library with transparent cUrl support
use GuzzleHttp\RequestOptions;			// Constants to define HTTP client options
use function GuzzleHttp\json_decode;	// throws exception if input stream is not JSON

/*
 * The model class is responsible for handling GitHub API requests
 */

class Model {
	// REST API base url
	const URL = 'https://jobs.github.com/positions.json';

	// HTTP client (Guzzle) instance
	private $client;

	/**
	 * Queries Github API for available jobs
	 * @param String $description
	 * @param String $location
	 * @return Array
	 * @throws Exception if the HTTP query fails
	 * @see Client for details on possible exception types and their usage
	 */
	public function getList($description, $location, $fulltime)
	{
		$aOptions = [
			'base_uri' => static::URL
		];

		$this->client = new Client($aOptions);
		$response = $this->client->get(static::URL, [
			RequestOptions::QUERY => [
				'description'	=> $description,
				'location'		=> $location,
				'fulltime'		=> $fulltime
			]
		]);
		return json_decode($response->getBody());
	}
}
