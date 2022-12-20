<?php
namespace App\Domain\Tickets;

use App\Domain\Tickets\TicketsRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/**
 * Service.
 */
final class Tickets
{
  /**
   * @var TicketsRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param TicketsRepository $repository The repository
   */
  public function __construct(TicketsRepository $repository)
  {
    $this->repository = $repository;
  }
  public function getAllTickets() {
    $ticket = $this->repository->getAllTickets();
    return $ticket;
  }
  public function getAllUserTickets($data) {
    $ticket = $this->repository->getAllUserTickets($data);
    return $ticket;
  }
  public function getTicketCategories() {
    $ticket = $this->repository->getTicketCategories();
    return $ticket;
  }
  public function getTicketPriority() {
    $ticket = $this->repository->getTicketPriority();
    return $ticket;
  }
  public function getTicketClassification() {
    $ticket = $this->repository->getTicketClassification();
    return $ticket;
  }
  public function getTicketStatus() {
    $ticket = $this->repository->getTicketStatus();
    return $ticket;
  }
  public function addSupportTicket($data) {
    $ticket = $this->repository->addSupportTicket($data);
    return $ticket;
  }
  public function updateSupportTicket($data) {
    $ticket = $this->repository->updateSupportTicket($data);
    return $ticket;
  }
  public function deleteSupportTicket($data) {
    $ticket = $this->repository->deleteSupportTicket($data);
    return $ticket;
  }
  public function getSupportTicket($data) {
    $ticket = $this->repository->getSupportTicket($data);
    return $ticket;
  }
  public function getTicketDetails($data) {
    $ticket = $this->repository->getTicketDetails($data);
    return $ticket;
  }
  public function getTicketAttachments($data) {
    $ticket = $this->repository->getTicketAttachments($data);
    return $ticket;
  }
  public function getTicketComments($data) {
    $ticket = $this->repository->getTicketComments($data);
    return $ticket;
  }
  public function addUserComment($data) {
    $ticket = $this->repository->addUserComment($data);
    return $ticket;
  }
  public function addAdminComment($data) {
    $ticket = $this->repository->addAdminComment($data);
    return $ticket;
  }
  public function getTicketDetailsByCode($data) {
    $ticket = $this->repository->getTicketDetailsByCode($data);
    return $ticket;
  }
  public function getTicketHistory($data) {
    $ticket = $this->repository->getTicketHistory($data);
    return $ticket;
  }
}