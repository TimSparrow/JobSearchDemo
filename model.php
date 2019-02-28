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

	// Query parameters
	protected $description;
	protected $location;
	protected $fulltime;

	// default page size
	protected $pageSize = 50;
	protected $page = 0; // default page

	// array to hold fetched data;
	protected $aPositionList;

	public function setPageSize(int $size)
	{
		$this->pageSize = $size;
		return $this;
	}

	public function setPage($page)
	{
		$this->page = $page;
		return $this;
	}

	public function setDescription(String $description)
	{
		$this->description = $description;
		return $this;
	}

	public function setLocation(String $location)
	{
		$this->location = $location;
		return $this;
	}

	public function setFulltime($fulltime)
	{
		$this->fulltime = $fulltime;
		return $this;
	}



	/**
	 * Queries Github API for available jobs
	 * @return Array
	 * @throws Exception if the HTTP query fails
	 * @see Client for details on possible exception types and their usage
	 */
	public function fetch()
	{
		$aOptions = [
			'base_uri' => static::URL
		];

		$this->client = new Client($aOptions);
		$response = $this->client->get(static::URL, [
			RequestOptions::QUERY => [
				'description'	=> $this->description,
				'location'		=> $this->location,
				'fulltime'		=> $this->fulltime,
				'page'			=> $this->page
			]
		]);
		$this->aPositionList = json_decode($response->getBody());
		return $this;
	}

	public function getList()
	{
		return $this->aPositionList;
	}
}
