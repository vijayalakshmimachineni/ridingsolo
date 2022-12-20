<?php
namespace App\Domain\BikeTrips;

use App\Domain\BikeTrips\BikeTripsRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;
 
/**
 * Service.
 */ 
final class BikeTrips
{ 
  /**
   * @var BikeTripsRepository
   */
  private $repository;
  /** 
   * The constructor.
   *
   * @param BikeTripsRepository $repository The repository
   */
  public function __construct(BikeTripsRepository $repository)
  {
    $this->repository = $repository;
  }
  public function getBikeTrips(): array
  {        
    $BikeTrips = $this->repository->getBikeTrips();
    return $BikeTrips;
  }
 public function addBikeTrip($data) {
    extract($data);
    if(empty($trip_title)){
       $status = array(
      'status' => "400",
      'message' => "Failure tripname is required"
      );
    }else{
      $tripExist = $this->repository->checkTripName($trip_title);
      if($tripExist == '0')
      {
        
        $trip_id = $this->repository->insertTrip($data);
        
          if($trip_id){         
            $status = array(
                        'status' => "200",
                        'message' => "BikeTrips Details Added Successfully",
                        'trip_id' => $trip_id
                        );
            } else {
              $status = array(
                        'status' => "304",
                        'message' => "BikeTrips Details Not Added Successfully");
            }
      
      }
      else{
        $status = array(
          'status' => "208",
          'message' => "Failure Trip name exist"
       );
      } 
    }
    return $status;
  }
  public function updateTrip($data) {
    //print_r($data);exit;
    extract($data);
    if(empty($trip_title))
    {
       $status = array(
      'status' => "400",
      'message' => "Failure tripname is required"
      );
    }
    else{
      $tripExist = $this->repository->checkTrip($trip_title,$biketrips_id);
    //print_r($tripExist);exit;
      if ($tripExist == '0')
      {
        $data['modifiedDate'] = date("Y-m-d H:i:s");        
        
        $res = $this->repository->updateTrip($data);    
        if($res == 'true'){
          $status = array(
            'status' => "200",
            'message' => "Successfully Updated");
        } else{
          $status = array(
          'status' => "304",
          'message' => "BikeTrips Details Not Updated Successfully");
          
        }
      }else{
        $status = array(
                  'status' => "208",
                  'message' => "Failure Trip name exist"
              );
      }
    }    
    return $status;
  }
  public function getBikeTrip($data) {
    $trip = $this->repository->getBikeTrip($data);
    return $trip;
  }
  public function deleteBikeTrip($data) {
    $trek = $this->repository->deleteBikeTrip($data);
    return $trek;
  }
  public function addBatch($data) {
    extract($data);
    $created_date = date("Y-m-d H:i:s");
    $count = 0;
    $batch = array();
    foreach($data as $value){
      $count = sizeof($value); 
    } 
    //echo $count;exit;
    for($x=0;$x<=$count;$x++){
      $data1['created_date'] = $created_date;
      $data1['tripId'] = $tripId;
      $data1['startDate'] = $startDate[$x];
      $data1['endDate'] = $endDate[$x];
      $data1['batchSize'] = $batchSize[$x];
      $data1['batchStatus'] = $batchStatus[$x];
      $data1['userBy'] = $userBy;
      $batch[$x] = $this->repository->addBatch($data1);
    }
    if(!empty($batch))
    {
      $status = array(
      'status' => "200",
      'message' => "biketrip batches Added Successfully",
      'tripbatch_id' => $batch);
       return $status;
    }
    else
    {
      $status = array(
        'status' => "400",
        'message' => "Failure Not Added Successfully");
      return $status;
    }
  }
  public function getBatch($data) {
    $batch = $this->repository->getBatch($data);
    return $batch;
  }
  public function updateBatch($data) {
    $batch = $this->repository->updateBatch($data);
    return $batch;
  }
  public function deleteBatch($data) {
    $batch = $this->repository->deleteBatch($data);
    return $batch;
  }
  public function getGallery($data) {
    $batch = $this->repository->getGallery($data);
    return $batch; 
  }
  /*public function addGallery($data) {
    // var_dump($data);die();
    extract($data);
    if(isset($tripgalImage['name'])&&!empty($tripgalImage['name'])){
      $filedir = UPLOADPATH."biketripsgallery/"; 
      $randName = rand(10101010, 9090909090);
      $newName = "trip_". $randName;
      $ext = substr($tripgalImage['name'], strrpos($tripgalImage['name'], '.') + 1);
      if(($ext == 'jpg')||($ext=='jpeg')||($ext=='png')||($ext=='gif')){
        list($width, $height) = getimagesize($tripgalImage['tmp_name']); 
        $ImageUpload = new ImageUpload;
        $ImageUpload->File = $tripgalImage;
        $ImageUpload->method = 1;
        $ImageUpload->SavePath = $filedir;
        $ImageUpload->NewWidth = $width;
        $ImageUpload->NewHeight = $height;
        $ImageUpload->NewName = $newName;
        $ImageUpload->OverWrite = true;
        $err = $ImageUpload->UploadFile();
        $tripgalImage = $newName.".".strtolower($ext);
      }else{
        $status = array(
          'status' => "400",
          'message' => "Failure Please upload jpg,png,gift,jpeg images only"
        );
        return $status;
      }
    }
    // $data['tripgalImage'] = $tripgalImage;
    $batch = $this->repository->addGallery($data);
    return $batch; 
  }*/
  public function addGallery($data) {
    $galleryImages = $this->repository->addGallery($data);
    return $galleryImages; 
  }
  public function deleteGallery($data) {
    $batch = $this->repository->deleteGallery($data);
    return $batch; 
  }
  public function getReviews() {
    $reviews = $this->repository->getReviews();
    return $reviews;
  }
  public function addReview($data) {
    $reviews = $this->repository->addReview($data);
    return $reviews;
  }
  public function getReview($data) {
    $reviews = $this->repository->getReview($data);
    return $reviews;
  }
  public function updateReview($data) {
    $reviews = $this->repository->updateReview($data);
    return $reviews; 
  }
  public function updateReviewStatus($data) {
    $reviews = $this->repository->updateReviewStatus($data);
    return $reviews; 
  }
  public function getBookings() {
    $bookings = $this->repository->getBookings();
    return $bookings; 
  }
  public function getBooking($data) {
    $bookings = $this->repository->getBooking($data);
    return $bookings; 
  }
  public function getBatchBooking($data) {
    $bookings = $this->repository->getBatchBooking($data);
    return $bookings; 
  }
  public function getParticipants($data) {
    $bookings = $this->repository->getParticipants($data);
    return $bookings; 
  }
  public function getTransactions() {
    $bookings = $this->repository->getTransactions();
    return $bookings; 
  }
  public function getTransaction($data) {
    $bookings = $this->repository->getTransaction($data);
    return $bookings; 
  }
  public function addBikeRentals($data) {
    $bookings = $this->repository->addBikeRentals($data);
    return $bookings; 
  }
  public function deleteIterinary($data) {
    $bookings = $this->repository->deleteIterinary($data);
    return $bookings; 
  }
  public function getTripFee($data) {
    $fee = $this->repository->getTripFee($data);
    return $fee; 
  }
  public function updateTripFee($data) {
    $fee = $this->repository->updateTripFee($data);
    return $fee; 
  }
  public function addOrganizer($data) {
    $trip = $this->repository->addOrganizer($data);
    return $trip;
  }
  public function getOrganizerDetails($data) {
    $trip = $this->repository->getOrganizerDetails($data);
    return $trip;
  }
  public function getOrganizerTrips($data) {
    $trip = $this->repository->getOrganizerTrips($data);
    return $trip;
  }
  public function deleteOrganizer($data) {
    $trip = $this->repository->deleteOrganizer($data);
    return $trip;
  }
  public function addTripCoupon($data) {
    $trip = $this->repository->addTripCoupon($data);
    return $trip;
  }
  public function getTripCoupons($data) {
    $trip = $this->repository->getTripCoupons($data);
    return $trip;
  }
  public function getCouponTrips($data) {
    $trip = $this->repository->getCouponTrips($data);
    return $trip;
  }
  public function deleteTripCoupon($data) {
    $trip = $this->repository->deleteTripCoupon($data);
    return $trip;
  }
  public function addTripRentals($data) {
    extract($data);
    if(empty($tripId)||empty($rentalItem)){
      $status = array(
      'status' => "206",
      'message' => "Failure Please enter proper data"
      );
    }
    else{
      $status = $this->repository->addTripRentals($data);
    }
    return $status;
  }
  public function getTripRentals($data) {
    $trip = $this->repository->getTripRentals($data);
    return $trip;
  }
  public function getRentalTrips($data) {
    $trip = $this->repository->getRentalTrips($data);
    return $trip;
  }
  public function getBatchRentals($data) {
    $trip = $this->repository->getBatchRentals($data);
    return $trip;
  }
  public function getTripBatchRental($data) {
    $trip = $this->repository->getTripBatchRental($data);
    return $trip;
  }
  public function deleteTripRental($data) {
    $trip = $this->repository->deleteTripRental($data);
    return $trip;
  }
  public function addTripFaq($data) {
    // var_dump($data);die();
    $trip = $this->repository->addTripFaq($data);
    return $trip;
  }
  public function getEditFaq($data){
    $faq = $this->repository->getEditFaq($data);
    return $faq;    
  }
  public function updateTripFaq($data) {
    // var_dump($data);die();
    $trip = $this->repository->updateTripFaq($data);
    return $trip;
  }
  public function getFaq($data) {
    $trip = $this->repository->getFaq($data);
    return $trip;
  }
  public function updateBikeTripStatus($data) {
    $trip = $this->repository->updateBikeTripStatus($data);
    return $trip;
  }
  public function updateTripImageStatus($data) {
    $trip = $this->repository->updateTripImageStatus($data);
    return $trip;
  }
  public function updateBatchStatus($data) {
    $trip = $this->repository->updateBatchStatus($data);
    return $trip;
  }
  public function updateOrganizerStatus($data) {
    $trip = $this->repository->updateOrganizerStatus($data);
    return $trip;
  }
  public function updateCouponStatus($data) {
    $trip = $this->repository->updateCouponStatus($data);
    return $trip;
  }
  public function updateTripRentalStatus($data) {
    $trip = $this->repository->updateTripRentalStatus($data);
    return $trip;
  }
  public function updateTripFaqStatus($data) {
    $trip = $this->repository->updateTripFaqStatus($data);
    return $trip;
  }

  public function getItineraryBikeTrip($data) { 
    $trip = $this->repository->getItineraryBikeTrip($data);
    return $trip;
  }
  public function addBikeTripIterinary($data) {
    //print_r($data);exit;
    extract($data);   
    $trip_id = $this->repository->addTripIterinaryDetails($data);        
    if($trip_id){         
      $status = array(
                  'status' => "200",
                  'message' => "BikeTrips Iternary Details Added Successfully",
                  'trip_id' => $trip_id
                  );
      } 
      else {
        $status = array(
                  'status' => "304",
                  'message' => "Details Not Added Successfully");
      }
    return $status;
  }
  public function editBikeTripIterinary($data) {
    extract($data);
    if(empty($iterinary_title))
    {
       $status = array(
      'status' => "400",
      'message' => "Failure title is required"
      );
    }
    else{
     // $tripExist = $this->repository->checkTrip($iterinary_title,$biketrips_id);
     // if ($tripExist == '0')
      if (1)
      {
        $data['modifiedDate'] = date("Y-m-d H:i:s");        
        
        $res = $this->repository->updateTripIterinaryDetails($data);    
        if($res == 'true'){
          $status = array(
            'status' => "200",
            'message' => "Successfully Updated");
        } else{
          $status = array(
          'status' => "304",
          'message' => "BikeTrips Details Not Updated Successfully");
          
        }
      }else{
        $status = array(
                  'status' => "208",
                  'message' => "Failure Trip name exist"
              );
      }
    }    
    return $status;
  }
}