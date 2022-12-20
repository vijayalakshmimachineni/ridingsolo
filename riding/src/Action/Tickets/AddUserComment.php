<?php

namespace App\Action\Tickets;

use App\Domain\Tickets\Tickets;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddUserComment
{
  private $tickets;
  public function __construct(Tickets $tickets)
  {
    $this->tickets = $tickets;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
  ): ResponseInterface 
  {
    //$data = $request->getQueryParams();
    $data = $request->getBody();
    $data =(array) json_decode($data);
    $tickets = $this->tickets->addUserComment($data);
    $response->getBody()->write((string)json_encode($tickets));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}