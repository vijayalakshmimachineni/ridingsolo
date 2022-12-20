<?php

namespace App\Action\Tickets;

use App\Domain\Tickets\Tickets;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetTicketDetailsByCode
{
  private $tickets;
  public function __construct(Tickets $tickets)
  {
    $this->tickets = $tickets;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response, $args
  ): ResponseInterface 
  {
    //$data = $request->getQueryParams();
    $tickets = $this->tickets->getTicketDetailsByCode($args);
    $response->getBody()->write((string)json_encode($tickets));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}