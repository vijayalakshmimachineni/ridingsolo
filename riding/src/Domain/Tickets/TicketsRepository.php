<?php
namespace App\Domain\Tickets;
use PDO;
use App\Utilities\ImageUpload;
use App\Utilities\smtpHelper;
use App\Utilities\smshelper;
use App\Utilities\Instamojo;
/**
* Repository.
*/
class TicketsRepository
{
  /**
   * @var PDO The database connection
   */
  private $connection;
  /**
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function getTicketCategories() {
    try {
      $query = "SELECT `item_id` AS id, `item_name` AS title FROM `sg_general_items` WHERE category = 'categories' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'categories' => $results);
      }else{
         $status = array(
        'status' => ERR_NO_DATA,
        'message' => "Failure");
      }
      return $status; 
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketPriority() {
    try {
      $query = "SELECT `item_id` AS id, `item_name` AS title FROM `sg_general_items` WHERE category = 'priorities' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'priorities' => $results);
      }else{
         $status = array(
        'status' => ERR_NO_DATA,
        'message' => "Failure");
      }
      return $status; 
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketClassification() {
    try {
      $query = "SELECT `item_id` AS id, `item_name` AS title FROM `sg_general_items` WHERE category = 'classifications' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'classifications' => $results);
      }else{
         $status = array(
        'status' => ERR_NO_DATA,
        'message' => "Failure");
      }
      return $status; 
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketStatus() {
    try {
      $query = "SELECT `item_id` AS id, `item_name` AS title FROM `sg_general_items` WHERE category = 'status' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'ticketstatus' => $results);
      }else{
         $status = array(
        'status' => ERR_NO_DATA,
        'message' => "Failure");
      }
      return $status; 
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getAllTickets() {
    try {
      $sql="SELECT *,
      DATE_FORMAT(t.created_date, '%d %b %Y %h:%i %p') as created_date,
      (SELECT item_name FROM sg_general_items WHERE category='priorities' AND item_id =t.priority_id) as priority_name,
      (SELECT item_name FROM sg_general_items WHERE category='categories' AND item_id =t.category_id) as category_name,
      (SELECT CONCAT(e.user_fname,' ',e.user_lname) FROM sg_users e WHERE  e.user_id=t.assigned_emp_id)  AS username,
      (SELECT item_name FROM sg_general_items WHERE category='status' AND item_id =t.ticket_status) as status_name,
      t.modified_date as last_updated       
    FROM ".DB_PREFIX."ticket AS t ORDER BY  t.ticket_id DESC";   
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(); 
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'alltickets' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => "204",
              'message' => "Failure No Tickets"
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getAllUserTickets($data) {
    try {
      extract($data);
      $sql="SELECT *,
      DATE_FORMAT(t.created_date, '%d %b %Y %h:%i %p') as created_date,
      (SELECT item_name FROM sg_general_items WHERE category='priorities' AND item_id =t.priority_id) as priority_name,
      (SELECT item_name FROM sg_general_items WHERE category='categories' AND item_id =t.category_id) as category_name,
      (SELECT CONCAT(e.first_name,' ',e.last_name) FROM sg_regestration e WHERE  e.registration_id=t.assigned_emp_id)  AS username,
      (SELECT item_name FROM sg_general_items WHERE category='status' AND item_id =t.ticket_status) as status_name,
      t.modified_date as last_updated       
      FROM  sg_ticket AS t WHERE t.created_by='$userId' ORDER BY  t.ticket_id DESC";   
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(); 
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'alltickets' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => "204",
              'message' => "No Tickets"
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addSupportTicket($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_ticket (t_code, category_id, priority_id, classification_id, subject, description, ticket_status, raised_by, created_by, created_date, sys_ip_address, status) 
          VALUES (SUBSTRING(UCASE(UUID( )), 1, 15) , :category_id, :priority_id, :classification_id, :ticket_subject, :ticket_message, :ticket_status, :raised_by, :created_by, :created_date, :sys_ip_address, :status)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":category_id", $category_id);   
      $stmt->bindParam(":priority_id", $priority_id);
      $stmt->bindParam(":classification_id", $classification_id);
      $stmt->bindParam(":ticket_subject", $ticket_subject);   
      $stmt->bindParam(":ticket_message", $ticket_message);       
      $stmt->bindParam(":ticket_status", $ticket_status); 
      $stmt->bindParam(":raised_by", $created_by); 
      $stmt->bindParam(":created_by", $created_by); 
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":sys_ip_address",$sys_ip_address);
      $stmt->bindParam(":status",$status);     
      $res = $stmt->execute(); 
      $id = $this->connection->lastInsertId();
      if($id){
        $sql = "select t.t_code
            , t.subject
            , t.description
            ,(select item_name from sg_general_items gi where gi.item_id = t.ticket_status) as ticket_status
            , date_format(created_date,'%d %b %Y') AS created_date
            ,(select item_name from sg_general_items pi where pi.item_id = t.priority_id) as priority
          from sg_ticket t where  t.ticket_id=:ticket_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":ticket_id", $id);
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        // $email = loadUtility('Email');        
        // $email->TemplateId = '7';
        // $email->To = 'solutions@tatvaglobalschool.com';
        // $email->From = 'admin@tatvaglobalschool.com';             
        // $email->Params = array('%ticket_id%'=>$data->t_code,'%parent_name%'=>$data->parent_name,'%createddate%'=>$data->created_date,'%description%'=>$data->description, '%ticket_subject%'=>$data->subject,'%ticket_status%'=> $data->ticket_status,'%ticket_priority%'=> $data->priority);
        // $email->commentMessage = $data->description;
        // $email->send(); 
        // exit();
      }
      if($attachments){
        foreach($attachments as $attachment){
          $sql2 = "INSERT INTO ".DB_PREFIX."attachments (attachment_name,attachment_file_name,filetype,ticket_id,message_id,created_date) 
                VALUES (:attachment_name,:attachment_file_name,:filetype,
                :ticket_id,:message_id,:created_date)";
          $stmt = $this->connection->prepare($sql2);  
          $stmt->bindParam(":attachment_name", $attachment->attachement_name);
          $stmt->bindParam(":attachment_file_name", $attachment->attachement_file_name);
          $stmt->bindParam(":filetype", $attachment->type);
          $stmt->bindParam(":ticket_id", $id);            
          $stmt->bindParam(":message_id", $attachment->message_id); 
          $stmt->bindParam(":created_date", $created_date);       
          $stmt->execute();
        }
      }
      $sql15= "SELECT CONCAT(first_name ,' ',last_name) as user_name FROM ".DB_PREFIX."regestration WHERE  registration_id =".$created_by;            
      $stmt15 = $this->connection->prepare($sql15);
      $stmt15->execute();
      $data15 = $stmt15->fetch(PDO::FETCH_OBJ);
      $user_name=$data15->user_name;

      if ($id) {
        $action = "created";  
        $history_text = $user_name." has created the ticket";
        $sql13 = "INSERT INTO ".DB_PREFIX."history(ticket_id,action,user_id,history,created_by,created_date) 
          VALUES (:ticket_id,:action,:user_id,:history,:created_by,:created_date)";
        $stmt13 = $this->connection->prepare($sql13);   
        $stmt13->bindParam(":action", $action);       
        $stmt13->bindParam(":user_id", $created_by); 
        $stmt13->bindParam(":history", $history_text);  
        $stmt13->bindParam(":created_by", $created_by);
        $stmt13->bindParam(":created_date", $created_date);
        $stmt13->bindParam(":ticket_id", $id);  
        $res2 = $stmt13->execute();
      }   
      if($id) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'ticketId' => $id
        );
        return $status;
      }else {
        $status = array(
              'status' => "304",
              'message' => "Ticket  Not Added "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function updateSupportTicket($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "UPDATE sg_ticket SET category_id = :category_id, priority_id =:priority_id, classification_id =:classification_id, subject =:ticket_subject, description=:ticket_message, ticket_status = :ticket_status, modified_by=:modified_by, modified_date=:modified_date, sys_ip_address=:sys_ip_address WHERE ticket_id=:ticket_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":category_id", $category_id);   
      $stmt->bindParam(":priority_id", $priority_id);
      $stmt->bindParam(":classification_id", $classification_id);
      $stmt->bindParam(":ticket_subject", $ticket_subject);   
      $stmt->bindParam(":ticket_message", $ticket_message);       
      $stmt->bindParam(":ticket_status", $ticket_status);       
      $stmt->bindParam(":modified_by", $created_by); 
      $stmt->bindParam(":modified_date", $created_date);
      $stmt->bindParam(":sys_ip_address",$sys_ip_address);
      $stmt->bindParam(":ticket_id",$ticket_id);     
      $res = $stmt->execute();       
      if($attachments){
        foreach($attachments as $attachment){
          $sql2 = "INSERT INTO ".DB_PREFIX."attachments (attachment_name,attachment_file_name,filetype,ticket_id,message_id,created_date) 
                VALUES (:attachment_name,:attachment_file_name,:filetype,
                :ticket_id,:message_id,:created_date)";
          $stmt = $this->connection->prepare($sql2);  
          $stmt->bindParam(":attachment_name", $attachment->attachement_name);
          $stmt->bindParam(":attachment_file_name", $attachment->attachement_file_name);
          $stmt->bindParam(":filetype", $attachment->type);
          $stmt->bindParam(":ticket_id", $ticket_id);            
          $stmt->bindParam(":message_id", $attachment->message_id); 
          $stmt->bindParam(":created_date", $created_date);       
          $stmt->execute();
        }
      }
      $sql15= "SELECT CONCAT(first_name ,' ',last_name) as user_name FROM ".DB_PREFIX."regestration WHERE  registration_id =".$created_by;            
      $stmt15 = $this->connection->prepare($sql15);
      $stmt15->execute();
      $data15 = $stmt15->fetch(PDO::FETCH_OBJ);
      $user_name=$data15->user_name;

      if ($ticket_id) {
        $action = "updated";  
        $history_text = $user_name." has updated the ticket";
        $sql13 = "INSERT INTO ".DB_PREFIX."history(ticket_id, action, user_id, history, created_by, created_date) 
          VALUES (:ticket_id,:action,:user_id,:history,:created_by,:created_date)";
        $stmt13 = $this->connection->prepare($sql13);   
        $stmt13->bindParam(":action", $action);       
        $stmt13->bindParam(":user_id", $created_by); 
        $stmt13->bindParam(":history", $history_text);  
        $stmt13->bindParam(":created_by", $created_by);
        $stmt13->bindParam(":created_date", $created_date);
        $stmt13->bindParam(":ticket_id", $ticket_id);  
        $res2 = $stmt13->execute();
      }   
      if($res == true) {
        $status = array(
            'status' => "200",
            'message' => "Success, ticket updated successfully"
        );
        return $status;
      }else {
        $status = array(
              'status' => "304",
              'message' => "Ticket  Not Updated "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function deleteSupportTicket($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "UPDATE sg_ticket SET status = '9' WHERE ticket_id=:ticket_id";
      $stmt = $this->connection->prepare($sql);   
      $stmt->bindParam(":ticket_id",$ticket_id);     
      $res = $stmt->execute(); 
      if($res == true) {
        $status = array(
            'status' => "200",
            'message' => "Success, ticket deleted successfully"
        );
        return $status;
      }else {
        $status = array(
              'status' => "304",
              'message' => "Ticket  Not Deleted "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getSupportTickets($data) {
    try {
      extract($data);
      $sql="SELECT *,
      DATE_FORMAT(t.created_date, '%d %b %Y %h:%i %p') as created_date,
      (SELECT item_name FROM sg_general_items WHERE category='priorities' AND item_id =t.priority) as priority_name,
      (SELECT item_name FROM sg_general_items WHERE category='categories' AND item_id =t.ticket_category) as category_name,
      (SELECT CONCAT(e.first_name,' ',e.last_name) FROM sg_regestration e WHERE  e.registration_id=t.created_by)  AS username,
      (SELECT item_name FROM sg_general_items WHERE category='status' AND item_id =t.ticket_status) as status_name       
      FROM sg_tickets AS t  WHERE t.created_by=:user_id ORDER BY t.ticket_id DESC"; 
      $stmt = $db->prepare($sql);       
      $stmt->bindParam(":user_id", $user_id);
      $stmt->execute(); 
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      $status = array(
            'status' => "200",
            'message' => "Success",
            'ticketId' => $data
      );
      return $status;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketDetails($data) {
    try {
      extract($data);
      $sql="SELECT t.`ticket_id`, t.`t_code`, t.`category_id`, t.`priority_id`, t.`department_id`, t.`ticket_status`, t.`created_by`, t.`description`,t.`subject`,t.`sys_ip_address`,t.`raised_by`, DATE_FORMAT(t.created_date, '%d %b %Y %h:%i %p') as created_date, DATE_FORMAT(t.modified_date, '%d %b %Y %h:%i %p') as modified_date,
       (SELECT item_name FROM sg_general_items  WHERE category='categories' AND item_id =t.category_id) as category_name,   
      (SELECT item_name FROM sg_general_items WHERE category='priorities' AND item_id =t.priority_id) as priority_name,
      (SELECT item_name FROM sg_general_items WHERE category='status' AND item_id =t.ticket_status) as status_name,       
       (SELECT group_concat(a.attachment_name) FROM sg_attachments a where a.ticket_id=t.`ticket_id`) as file_name    
      FROM sg_ticket AS t  WHERE t_code=:t_code";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(':t_code',$t_code);    
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'ticketdetails' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => "204",
              'message' => "Failure No Data "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketAttachments($data) {
    try {
      extract($data);
      $sql="SELECT attachment_id,attachment_name,attachment_file_name FROM ".DB_PREFIX."attachments WHERE ticket_id=:ticket_id AND message_id IS NULL";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(':ticket_id', $code);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'attachments' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Data "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketComments($data) {
    try {
      extract($data);
      $sql="SELECT c.ticket_id, c.ticket_owner, c.description, DATE_FORMAT(c.created_date, '%d %b %Y %h:%i %p') as created_date, c.assigned_emp_id, c.user_ip, c.comment_id,  c.user_id,
      (SELECT CONCAT(first_name ,' ',last_name) FROM sg_regestration WHERE registration_id =c.`created_by`) as customer_name,      
      (SELECT user_fname FROM sg_users WHERE user_id =c.`user_id`) as user_name,   
    (SELECT group_concat(a.attachment_name) FROM sg_attachments a where a.message_id=c.comment_id) as file_name 
    FROM sg_comments AS c WHERE c.ticket_id=:ticket_id ORDER BY c.comment_id ASC";

    $stmt = $this->connection->prepare($sql);  
    $stmt->bindParam(':ticket_id',$ticket_id);  
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($data) {
      $status = array(
          'status' => ERR_OK,
          'message' => "Success",
          'comments' => $data
      );
      return $status;
    }else {
      $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data "
        );
      return $status;
    }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addUserComment($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_comments (ticket_id, ticket_status, ticket_owner, assigned_emp_id, description, user_ip,  created_date, created_by) VALUES (:ticket_id, :ticket_status, :ticket_owner,:assigned_emp_id, :comment_description,:ip_address, :created_date,:created_by)";
      $assignedusr_id = '0';
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":ticket_id", $ticket_id);
      $stmt->bindParam(":ticket_owner", $created_by);
      $stmt->bindParam(":ticket_status", $ticket_status);
      $stmt->bindParam(":assigned_emp_id", $assignedusr_id);  
      $stmt->bindParam(":comment_description", $comment_description);
      $stmt->bindParam(":ip_address", $ip_address);  
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":created_by",$created_by);    
      $res=$stmt->execute();
      $id = $this->connection->lastInsertId();
      $update_id = $id; 
      if($attachments && $id){
        foreach($attachments as $attachment){
          $sql2 = "INSERT INTO sg_attachments (attachment_name, attachment_file_name, filetype, message_id, created_date) VALUES (:attachment_name, :attachment_file_name, :filetype, :message_id, :created_date)";
          $stmt = $this->connection->prepare($sql2);  
          $stmt->bindParam(":attachment_name", $attachment->attachement_name);
          $stmt->bindParam(":attachment_file_name", $attachment->attachement_file_name);
            $stmt->bindParam(":filetype", $attachment->type);
          $stmt->bindParam(":message_id",$update_id); 
          $stmt->bindParam(":created_date", $created_date);           
          $stmt->execute();
        }
      }
      if ($id) {
        $status=147;
        $sql_status = "UPDATE sg_ticket SET 
        ticket_status=:ticket_status,  modified_by=:modified_by, modified_date=:modified_date WHERE ticket_id=:ticket_id";
        $stmt_status = $this->connection->prepare($sql_status);
        $stmt_status->bindParam(":ticket_status", $status);   
        $stmt_status->bindParam(":modified_by",$created_by);
        $stmt_status->bindParam(":modified_date",$created_date);    
        $stmt_status->bindParam(":ticket_id", $ticket_id);
        $res_status = $stmt_status->execute();    
      }
      $sql16= "SELECT CONCAT(first_name ,' ',last_name) as username FROM sg_regestration WHERE  registration_id=".$created_by;
      $stmt16 = $this->connection->prepare($sql16);
      $stmt16->execute();
      $data16 = $stmt16->fetch(PDO::FETCH_OBJ);
      $username=$data16->username;

      if ($id) {
        $action="commented";
        $history_text = $username." (Customer) has posted a comment to this ticket";
        $sql13 = "INSERT INTO sg_history (ticket_id, action, history, created_by, created_date) 
          VALUES (:ticket_id, :action, :history, :created_by, :created_date)";
        $stmt13 = $this->connection->prepare($sql13);   
        $stmt13->bindParam(":ticket_id", $ticket_id); 
        $stmt13->bindParam(":action", $action);
        $stmt13->bindParam(":history", $history_text);  
        $stmt13->bindParam(":created_by", $created_by);
        $stmt13->bindParam(":created_date", $created_date);       
        $stmt13->execute();     
      } 
      if($id) {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'id' => $id
        );
        return $status;
      }else {
        $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Not added comment "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addAdminComment($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_comments (ticket_id, ticket_status, ticket_owner, assigned_emp_id, description, user_ip,  created_date, created_by) VALUES (:ticket_id, :ticket_status, :ticket_owner,:assigned_emp_id, :comment_description,:ip_address, :created_date,:created_by)";
      $assignedusr_id = '0';
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":ticket_id", $ticket_id);
      $stmt->bindParam(":ticket_owner", $ticket_owner);
      $stmt->bindParam(":ticket_status", $ticket_status);
      $stmt->bindParam(":assigned_emp_id", $assignedusr_id);  
      $stmt->bindParam(":comment_description", $comment_description);
      $stmt->bindParam(":ip_address", $ip_address);  
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":created_by",$created_by);    
      $res=$stmt->execute();
      $id = $this->connection->lastInsertId();
      $update_id = $id; 
      if($attachments && $id){
        foreach($attachments as $attachment){
          $sql2 = "INSERT INTO sg_attachments (attachment_name, attachment_file_name, filetype, message_id, created_date) VALUES (:attachment_name, :attachment_file_name, :filetype, :message_id, :created_date)";
          $stmt = $this->connection->prepare($sql2);  
          $stmt->bindParam(":attachment_name", $attachment->attachement_name);
          $stmt->bindParam(":attachment_file_name", $attachment->attachement_file_name);
            $stmt->bindParam(":filetype", $attachment->type);
          $stmt->bindParam(":message_id",$update_id); 
          $stmt->bindParam(":created_date", $created_date);           
          $stmt->execute();
        }
      }
      if ($id) {
        $status=147;
        $sql_status = "UPDATE sg_ticket SET 
        ticket_status=:ticket_status,  modified_by=:modified_by, modified_date=:modified_date WHERE ticket_id=:ticket_id";
        $stmt_status = $this->connection->prepare($sql_status);
        $stmt_status->bindParam(":ticket_status", $status);   
        $stmt_status->bindParam(":modified_by",$created_by);
        $stmt_status->bindParam(":modified_date",$created_date);    
        $stmt_status->bindParam(":ticket_id", $ticket_id);
        $res_status = $stmt_status->execute();    
      }
      $sql16= "SELECT CONCAT(user_fname ,' ',user_lname) as username FROM sg_users WHERE  user_id=".$created_by;
      $stmt16 = $this->connection->prepare($sql16);
      $stmt16->execute();
      $data16 = $stmt16->fetch(PDO::FETCH_OBJ);
      $username=$data16->username;

      if ($id) {
        $action="commented";
        $history_text = $username." (Admin)  has posted a comment to this ticket";
        $sql13 = "INSERT INTO sg_history (ticket_id, action, history, created_by, created_date) 
          VALUES (:ticket_id, :action, :history, :created_by, :created_date)";
        $stmt13 = $this->connection->prepare($sql13);   
        $stmt13->bindParam(":ticket_id", $ticket_id); 
        $stmt13->bindParam(":action", $action);
        $stmt13->bindParam(":history", $history_text);  
        $stmt13->bindParam(":created_by", $created_by);
        $stmt13->bindParam(":created_date", $created_date);       
        $stmt13->execute();     
      } 
      if($id) {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'id' => $id
        );
        return $status;
      }else {
        $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Not added comment "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketDetailsByCode($data) {
    try {
      extract($data);
      $sql="SELECT t.`ticket_id`, t.`t_code`, t.`category_id`, t.`priority_id`, t.`department_id`, t.`ticket_status`, t.`created_by`, t.`description`,t.`subject`,t.`sys_ip_address`, t.`raised_by`, DATE_FORMAT(t.created_date, '%d %b %Y %h:%i %p') as created_date, DATE_FORMAT(t.modified_date, '%d %b %Y %h:%i %p') as modified_date,
       (SELECT item_name FROM sg_general_items  WHERE category='categories' AND item_id =t.category_id) as category_name,   
      (SELECT item_name FROM sg_general_items WHERE category='priorities' AND item_id =t.priority_id) as priority_name,
      (SELECT item_name FROM sg_general_items WHERE category='status' AND item_id =t.ticket_status) as status_name,       
       (SELECT group_concat(a.attachment_name) FROM sg_attachments a where a.ticket_id=t.`ticket_id`) as file_name,
       (SELECT CONCAT(e.first_name,' ',e.last_name) FROM sg_regestration e WHERE  e.registration_id=t.raised_by)  AS username    
      FROM sg_ticket AS t  WHERE t_code=:t_code";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(':t_code',$t_code);    
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'ticketdetails' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => "204",
              'message' => "No Data "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTicketHistory($data) {
    try {
      extract($data);
      $sql="SELECT h.history, user_id, DATE_FORMAT(h.created_date, '%d %M %Y %h:%i %p') as created_date FROM sg_history AS h WHERE h.ticket_id=:ticket_id ORDER BY h.history_id DESC";  
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(':ticket_id',$ticket_id);  
      $stmt->execute();
      $data = $stmt->fetchall(PDO::FETCH_OBJ);
      if($data) {
        $status = array(
            'status' => "200",
            'message' => "Success",
            'history' => $data
        );
        return $status;
      }else {
        $status = array(
              'status' => "204",
              'message' => "No Data "
          );
        return $status;
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
}