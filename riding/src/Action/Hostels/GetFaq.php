<?php

	namespace App\Action\Hostels;

	use App\Domain\Hostels\Hostels;
	use Psr\Http\Message\ResponseInterface;
	use Psr\Http\Message\ServerRequestInterface;

	final class GetFaq
	{
	  private $hostels;
	  public function __construct(Hostels $hostels)
	  {
	    $this->hostels = $hostels;
	  }
	  public function __invoke(
	      ServerRequestInterface $request, 
	      ResponseInterface $response, $args 
	  ): ResponseInterface
	  {
	    $hostels = $this->hostels->getFaq($args); 
	    $response->getBody()->write((string)json_encode($hostels));
	    return $response ->withHeader('Content-Type', 'application/json');
	  }
	}