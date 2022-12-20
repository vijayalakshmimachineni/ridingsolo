<?php
namespace App\Domain\Ridingsolo;
use PDO;
use App\Utilities\ImageUpload;
use App\Utilities\smtpHelper;
use App\Utilities\smshelper;
use App\Utilities\Instamojo;
use App\Utilities\Ezee;
/**
* Repository.
*/
class RidingsoloRepository
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
  public function getOffers() {
    try {
      $query = "SELECT coupon_id AS couponId, coupon_code as couponCode, coupon_name as couponName, coupon_description AS description, valid_from as validFrom, valid_till as validTill, discount_amount AS discount, status, all_treks AS allTreks, coupon_type AS couponType, commision_status AS commisionStatus, commision_date AS commisionDate, commision_remarks AS commisionRemarks, coupon_limit AS couponLimit, coupon_value_limit AS couponValueLimit, coupon_value_decrease AS couponValueDecrease, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, CONCAT('".SITEURL."uploads/coupons/', coupon_image) AS image FROM sg_trekcoupons WHERE coupon_id IN (SELECT coupon_id FROM sg_trekcouponsmap WHERE status = '0') AND status = '0' ORDER BY created_date DESC LIMIT 0,3";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'offers' => $results);
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
  public function getDifficulties() {
    try {
      $query = "SELECT `dificulty_id` AS dificultyId, `difficulty_name` AS difficultyName FROM `sg_difficulties`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'difficulties' => $results);
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
  public function getBikeDifficulties() {
    try {
      $query = "SELECT `dificulty_id` AS dificultyId, `difficulty_name` AS difficultyName FROM `sg_bikedifficulties`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'difficulties' => $results);
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
  public function getBikeTerrains() {
    try {
      $query = "SELECT `terrain_id`, `terrain_name` AS difficultyName FROM `sg_biketerrains`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'terrains' => $results);
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
  public function getLpTerrains() {
    try {
      $query = "SELECT `terrain_id`, `terrain_name` AS difficultyName FROM `sg_lpterrains`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'terrains' => $results);
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
  public function getHostelTerrains() {
    try {
      $query = "SELECT `terrain_id`, `terrain_name` AS difficultyName FROM `sg_hostelterrains`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'terrains' => $results);
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
  public function getHowDidYouFindUs() {
    try {
      $query = "SELECT `item_id` AS slabId, `item_name` AS slabName FROM `sg_general_items` WHERE category = 'How did you find about us?' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'howdidyoufindus' => $results);
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
  public function getHaveYouTrekkedWithUs() {
    try {
      $query = "SELECT `item_id` AS slabId, `item_name` AS slabName FROM `sg_general_items` WHERE category = 'Have you trekked with us?' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'haveyoutrekkedwithus' => $results);
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
  public function getMonths() {
    try {
      $query = "SELECT `month_id` AS monthId, `month_name` AS monthName FROM `sg_months`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'months' => $results);
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
  public function getSlabs() {
    try {
      $query = "SELECT `item_id` AS slabId, `item_name` AS slabName FROM `sg_general_items` WHERE category = 'slab' AND status = '0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'slabs' => $results);
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
  public function getAltitudes() {
    try {
      $query = "SELECT `altitude_id` AS altitudeId, `altitude_range` AS altitudeRange FROM `sg_altitudes`";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'altitudes' => $results);
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
  public function getRegions() {
    try {
      $query = "SELECT `region_id` AS regionId, `region_name` AS regionName FROM `sg_regiondetails` WHERE status = '0' ORDER BY region_name ASC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'regions' => $results);
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
  public function getStates() {
    try {
      $query = "SELECT `state_id` AS stateId, `state_name` AS stateName, state_code AS stateCode FROM `sg_statedetails` WHERE status = '0' ORDER BY state_name ASC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'states' => $results);
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
  public function getCountries() {
    try {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: Qmh1UElMV1BrQUNRc0NUMDlIeGloUTFYVWFZSGhSbUFmTndQWlFiQQ=='
        ),
      ));
      $response = curl_exec($curl);
      $response = json_decode($response);
      curl_close($curl);
      
      if($response!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'countries' => $response);
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
  public function getCountryStates($data) {
    try {
      extract($data);
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/'.$country_code.'/states',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: Qmh1UElMV1BrQUNRc0NUMDlIeGloUTFYVWFZSGhSbUFmTndQWlFiQQ=='
        ),
      ));

      $response = curl_exec($curl);
      $response = json_decode($response);
      curl_close($curl);
      
      if($response!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'states' => $response);
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
  public function getStateCities($data) {
    try {
      extract($data);
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/'.$country_code.'/states/'.$state_code.'/cities',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: Qmh1UElMV1BrQUNRc0NUMDlIeGloUTFYVWFZSGhSbUFmTndQWlFiQQ=='
        ),
      ));

      $response = curl_exec($curl);
      $response = json_decode($response);
      curl_close($curl);
      if($response!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'cities' => $response);
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
  public function getUpcomingTreks($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`trek_id` AS trekId, t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee,t.`trek_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) AS trekImage,  t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`region`, t.`status`, t.`season`,concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popularTrek, d.`difficulty_name` AS difficultyName, COALESCE(gettrekrating(t.`trek_id`),0)+0.0 as rating, '' as reviews,(get_trek_ratings_count(t.`trek_id`)) as tripReviews, 'trek' AS trip_type FROM sg_difficulties d,sg_trekreviews r,sg_trekingdetails t,sg_regiondetails rg, sg_inserttrekbatches tb WHERE t.trek_id = tb.trek_id AND tb.trekstart_date >=now() AND t.`trek_id` = r.`trek_id` AND t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id group by t.trek_id LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($upcomingtreks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No UpcomingTreks Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'upcomingtreks' => $upcomingtreks
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
  public function getUpcomingTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`biketrips_id` AS tripId, t.`trip_title` AS tripTitle, t.`trip_fee` AS tripFee,t.`trip_discount` AS discountFee, t.`visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) AS tripImage,  t.`trip_days` AS tripDays, t.`trip_nights` AS tripNights, t.`region`, t.`status`, t.`season`, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`temparature`, t.`popular_trips` AS popularTrip, d.`difficulty_name` AS difficultyName, COALESCE(gettriprating(t.`biketrips_id`),0)+0.0 as rating, '' as reviews,(get_trip_ratings_count(t.`biketrips_id`)) as tripReviews, 'trip' AS trip_type, tr.terrain_name AS terrain FROM sg_bikedifficulties d,sg_tripreviews r,sg_biketrips t, sg_regiondetails rg, sg_biketerrains tr WHERE  t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id AND t.terrain_id = tr.terrain_id group by t.biketrips_id LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($upcomingtreks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Upcoming Trips Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'upcomingtrips' => $upcomingtreks
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
  public function getUpcomingExpeditions($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`expedition_id` AS expeditionId, t.`expedition_title` AS expeditionTitle, t.`expedition_fee` AS expeditionFee, t.`expedition_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) AS expeditionImage,  t.`expedition_days` AS expeditionDays, t.`expedition_nights` AS expeditionNights, t.`region`, t.`status`, t.`season`,concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_expedition` AS popularexpedition, d.`difficulty_name` AS difficultyName, COALESCE(getexpeditionrating(t.`expedition_id`),0)+0.0 as rating, '' as reviews,(get_expedition_ratings_count(t.`expedition_id`)) as tripReviews, 'expedition' AS trip_type FROM sg_difficulties d,sg_expeditionreviews r,sg_expeditions t,sg_regiondetails rg WHERE t.`expedition_id` = r.`expedition_id` AND t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id group by t.expedition_id LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingexpeditions = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($upcomingexpeditions))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Upcomingexpeditions Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'upcomingexpeditions' => $upcomingexpeditions
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
  public function getUpcomingLeisureTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT `leisure_id` AS leisureId, `pkg_name` AS pkgName, `pkg_days` AS pkgDays, `pkg_nights` AS pkgNights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, 'leisure' AS trip_type, (SELECT tr.terrain_name FROM sg_lpterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain FROM `sg_leisurepackages`  LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingexpeditions = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($upcomingexpeditions))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Upcoming Leisure packages Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'upcomingleisuretrips' => $upcomingexpeditions
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
  public function getPopularTreks($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`trek_id` AS trekId, t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee, t.`trek_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) AS trekImage,  t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`region`, t.`status`, t.`season`, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popularTrek, d.`difficulty_name` AS difficultyName, COALESCE(gettrekrating(t.`trek_id`),0)+0.0 as rating, '' as reviews,(get_trek_ratings_count(t.`trek_id`)) as tripReviews FROM sg_difficulties d,sg_trekreviews r,sg_trekingdetails t,sg_regiondetails rg WHERE t.`trek_id` = r.`trek_id` AND t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id AND t.`popular_trek` = '1' group by t.trek_id LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($upcomingtreks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No UpcomingTreks Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'populartreks' => $upcomingtreks
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
  public function getPopularTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`biketrips_id` AS tripId, t.`trip_title` AS tripTitle, t.`trip_fee` AS tripFee, t.`trip_discount` AS discountFee, t.`visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) AS tripImage,  t.`trip_days` AS tripDays, t.`trip_nights` AS tripNights, t.`region`, t.`status`, t.`season`, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`temparature`, t.`popular_trips` AS popularTrip, d.`difficulty_name` AS difficultyName, COALESCE(gettrekrating(t.`biketrips_id`),0)+0.0 as rating, '' as reviews,(get_trek_ratings_count(t.`biketrips_id`)) as tripReviews, tr.terrain_name AS terrain FROM sg_difficulties d,sg_tripreviews r,sg_biketrips t, sg_regiondetails rg, sg_biketerrains tr WHERE t.`biketrips_id` = r.`biketrip_id` AND t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id AND t.popular_trips = '1' AND tr.terrain_id = t.terrain_id group by t.biketrips_id LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $populartrips = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($populartrips))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No popular trips Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'populartrips' => $populartrips
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
  public function getPopularExpeditions($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT t.`expedition_id` AS expeditionId, t.`expedition_title` AS expeditionTitle, t.`expedition_fee` AS expeditionFee, t.`expedition_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) AS expeditionImage,  t.`expedition_days` AS expeditionDays, t.`expedition_nights` AS expeditionNights, t.`region`, t.`status`, t.`season`,concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_expedition` AS popularexpedition, d.`difficulty_name` AS difficultyName, COALESCE(getexpeditionrating(t.`expedition_id`),0)+0.0 as rating, '' as reviews,(get_expedition_ratings_count(t.`expedition_id`)) as tripReviews FROM sg_difficulties d,sg_expeditionreviews r,sg_expeditions t,sg_regiondetails rg WHERE t.`expedition_id` = r.`expedition_id` AND t.status = '0' AND t.`visit_time` = d.`dificulty_id` AND t.region=rg.region_id AND t.popular_expedition = '1' group by t.expedition_id ORDER BY t.`expedition_id` DESC LIMIT  ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $popularexpedition = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($popularexpedition))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Popuar expeditions Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'popularexpedition' => $popularexpedition
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
  public function getPopularLeisureTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT `leisure_id` AS leisureId, `pkg_name` AS pkgName, `pkg_days` AS pkgDays, `pkg_nights` AS pkgNights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, (SELECT tr.terrain_name FROM sg_lpterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain FROM `sg_leisurepackages` WHERE popular_pkg='1' ORDER BY leisure_id DESC LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $popularleisuretrips = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($popularleisuretrips))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Upcoming Leisure packages Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'popularleisuretrips' => $popularleisuretrips
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
  public function gettrekbatchdetails($id) {
    try {
      $sql="SELECT getmonthname(month(`trekstart_date`)) AS monthName, batch_id AS batchId, trekbatch_size-(getbatchcount(batch_id)) AS seatsInfo, getbatchstatusname(trekbatch_size-(getbatchcount(batch_id)),`trekbatch_status`) AS batchStatus, trekstart_date AS startDate, trekend_date AS endDate, trekbatch_status AS seatStatus, CONCAT(DATE_FORMAT(`trekstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(`trekend_date`,'%M %d')) AS display, '' AS bookings FROM sg_inserttrekbatches WHERE `trek_id`=$id AND `trekstart_date` >= now() ORDER BY trekstart_date ASC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $dates = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      if(!empty($dates)) {
        foreach ($dates as $key => $value) {
          //bookings
          $sql = "SELECT p.name, p.age, p.gender, b.city FROM sg_participantdetails p, sg_bookingdetails b where p.booking_id = b.booking_id AND b.batch = '".$value->batchId."' ORDER BY p.booking_id DESC LIMIT 5";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $limit = 5 - count($bookings);
          $sql = "SELECT name, age, gender, city FROM sg_dummy_bookings ORDER BY RAND() LIMIT ".$limit;
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings1 = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $value->bookings = array_merge($bookings, $bookings1);
          $d[$value->monthName][] = $value;
        }
      }
      $trekbyid['dates'] = $d;
      return $trekbyid['dates'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getiterinarydetails($id) {
    try {
      $sql = "SELECT iterinary_title AS iterinaryTitle,iterinary_details AS iterinaryDetails FROM sg_trekiterinarydetails where trek_id =$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['getiterinarydetails'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['getiterinarydetails'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function gettrekfoodmenu($id) {
    try {
      $sql = "SELECT foodmenu_id AS foodmenuId, trek_id AS trekIid, pumpup_calories AS pumpupCalories, concat('".SITEURL."uploads/treksgallery/', pumpup_image) AS pumpupImage, pumpupmenu_desc AS pumpupMenuDesc, bf_calories AS bfCalories, concat('".SITEURL."uploads/treksgallery/', bf_image) AS bfImage, bfmenu_desc AS bfMenuDesc, lunch_calories AS lunchCalories, lunchmenu_desc AS lunchMenuDesc, concat('".SITEURL."uploads/treksgallery/', lunch_image) AS lunchImage, evng_calories AS evngCalories, concat('".SITEURL."uploads/treksgallery/', evng_image) AS evngImage, evngmenu_desc AS evngMenuDesc, dinner_calories AS dinnerCalories, concat('".SITEURL."uploads/treksgallery/', dinner_image) AS dinnerImage, dinnermenu_desc AS dinnerMenuDesc, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, recordstatus AS status FROM " . DBPREFIX . "_trekfoodmenu where `trek_id`= $id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['gettrekfoodmenu'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($trekbyid['gettrekfoodmenu'] == false)
      {
        return null;
      }
      return $trekbyid['gettrekfoodmenu'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function gettreckimages($id) {
    try {
      $sql = "SELECT concat('".SITEURL."uploads/treksgallery/', image_name) as imageName FROM " . DBPREFIX . "_trek_gallery WHERE `trek_id`= $id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['treksimages'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['treksimages'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getreviews($id) {
    try {
      $sql = "SELECT review, name, rating+0.0 as rating, mobile_no AS mobile, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, user_id AS userId FROM " . DBPREFIX . "_trekreviews WHERE `trek_id`= '$id' and `status`='1' order by review_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['reviews'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['reviews'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTravelExperts($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $query = "SELECT `expert_id` AS expertId, `person_name` AS personName, `person_designation` AS personDesignation, `contact_no` AS description, CONCAT('".SITEURL."uploads/travelexperts/', `expert_image`) AS expertImage, `expert_status` AS expertStatus, `created_date` AS createdDate, `modified_date` AS modifiedDate FROM sg_expertdetails WHERE expert_status = '0' LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $expertdetails  = $stmt->fetchAll(PDO::FETCH_OBJ);
      if($expertdetails!=''){
        $status = array(
          'status' => '200',
          'message' => 'Success',
          'expertdetails' => $expertdetails);
      }else {
        $status = array(
          "status" => "204",
         "message" => "No Data Found");
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
  public function getTrekReviews($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $query ="SELECT `review_id` AS reviewId, `name`, `mobile_no` AS mobile, `rating`, `review`, gettrekname(`trek_id`) AS trekTitle, recordstatus AS status FROM sg_trekreviews WHERE rating!='0' AND status = '1' order by review_id desc LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($results)){
        $status = array(
          'status' => ERR_OK,
          'message' => "Success",
          'trek_reviews' => $results
        );
      }else{
        $status = array(
          "status" => "204",
          "message" => "No Data Found");
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
  public function getfaq($trek_id) {
    try {
      $query ="SELECT `faq_id`, `trek_id`, `cat_id`, `question`, `answer`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, (SELECT category_title FROM sg_faq_categories WHERE faq_cat_id = cat_id) AS category_title FROM `sg_trek_faq` WHERE trek_id='$trek_id' AND status='0'  order by faq_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      foreach ($results as $key => $value) {
        $d[$value->category_title][] = $value;
      }
      return $d;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTrekAddons($trek_id) {
    try {
      $query ="SELECT * FROM `sg_trek_add_ons` WHERE trek_id = '$trek_id' AND status='0'  order by add_on_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTrekRentalItems($trek_id) {
    try {
      $query ="SELECT tr.trekrentalitem_id, tr.rentalitem, tr.item_cost, r.item_name, r.item_code, r.image_1, r.rental_category, r.non_returnable, r.item_description, '' AS sizes FROM `sg_trekrentalitems` tr, sg_rental_items r WHERE tr.trek_id = '$trek_id' AND r.item_id=tr.rentalitem AND tr.status='0'  order by trekrentalitem_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($results as $key => $value) {
        $sizes = array('1'=>'S','2'=>'M','3'=> 'L','4'=> 'XL','5'=> 'XXL');
        $results[$key]->sizes = $sizes;
      }
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getBlogArticles($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT blog_id AS blogId, blog_title AS blogTitle, CONCAT('".SITEURL."uploads/blog/', blog_image) AS blogImage, blog_url AS blogUrl, posting_date AS postingDate, created_date AS createdDate, get_user_name(created_by) AS userName FROM sg_blog ORDER BY posting_date DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);

      //total
      $sql = "SELECT COUNT(blog_id) AS ttl_cnt FROM sg_blog";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);

      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'total_cnt' => $blogcnt->ttl_cnt,
         'blog' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204", 
         'message'=>"No Data Found");
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
  public function getSearchAllTreks($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      if(isset($search_keyword)&&$search_keyword!='')
      {
        $condition .= " and t.`trek_title` LIKE '%".$search_keyword."%' ";
      }
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`visit_time` ='".$difficulty."' ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`trekstart_date`) = '".$month."' and b.`trekstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`trek_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`trek_fee` >= 10000 and t.`trek_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`trek_fee` > 20000 ";
      }
      $sql = "SELECT DISTINCT(t.`trek_id`) AS trekId,t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee, gettrekdifficulty(t.`visit_time`) as difficultyName,t. `time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) as trekImage, t.`trek_overview` AS trekOverview, t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popularTrek,COALESCE(gettrekrating(t.`trek_id`),0)+0.0 as rating, '' as trekDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as trekImages,'' as reviews,0 as tripReviews   FROM " . DBPREFIX . "_trekingdetails t inner join ".DBPREFIX."_inserttrekbatches b   on b.`trek_id` = t.`trek_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $treks = $stmt->fetchAll(PDO::FETCH_OBJ);

        //total
        $sql = "SELECT COUNT(t.`trek_id`) AS ttl_cnt FROM " . DBPREFIX . "_trekingdetails t inner join ".DBPREFIX."_inserttrekbatches b   on b.`trek_id` = t.`trek_id`  WHERE t.`status` = 0 " .$condition;
        $stmt = $this->connection->prepare($sql);  
        $stmt->execute();
        $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);


        if (empty($treks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Treks Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'total_cnt' =>  $blogcnt->ttl_cnt,
              'treks' => $treks
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
  public function getFilterAllTreks($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`visit_time` ='".$difficulty."' ";
      }
      if(isset($season)&&$season!='')
      {
        $condition .= " and FIND_IN_SET('".$season."', t.`season`) ";
      }
      if(isset($region)&&$region!='')
      {
        $condition .= " and t.`region` ='".$region."' ";
      }
      if(isset($day_night) && $day_night!='')
      {
        $condition .= " and (t.`trek_nights` ='".$day_night."' OR t.`trek_days` ='".$day_night."') ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`trekstart_date`) = '".$month."' and b.`trekstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`trek_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`trek_fee` >= 10000 and t.`trek_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`trek_fee` > 20000 ";
      }
      $sql = "SELECT DISTINCT(t.`trek_id`) AS trekId,t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee, gettrekdifficulty(t.`visit_time`) as difficultyName,t. `time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) as trekImage, t.`trek_overview` AS trekOverview, t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popularTrek,COALESCE(gettrekrating(t.`trek_id`),0)+0.0 as rating, '' as trekDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as trekImages,'' as reviews,0 as tripReviews   FROM " . DBPREFIX . "_trekingdetails t inner join ".DBPREFIX."_inserttrekbatches b   on b.`trek_id` = t.`trek_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $treks = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($treks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Treks Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'treks' => $treks
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
  public function getTrekDetails($data) {
    try {
      extract($data);
      $id = $trekId;
      $sql = "SELECT t.`trek_id` AS trekId, t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee, t.`trek_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) AS trekImage, t.`trek_overview` AS trekOverview, t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`region`, t.`trekvideo_title` AS trekVideoTitle, t.`trekvideo_url` AS trekVideoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`terms`, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popularTrek, d.`difficulty_name` AS difficultyName, COALESCE(gettrekrating(t.`trek_id`),0)+0.0 as rating, '' as trekDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as trekImages,'' as reviews,0 as tripReviews,'' AS faq, t.reporting_place AS reportingPlace, t.pickup_drop AS pickupDrop, '' AS rentalItems, t.includes AS includes, t.excludes AS excludes, CONCAT('".SITEURL."uploads/treks/',t.pdf_url) AS pdfUrl FROM " . DBPREFIX . "_difficulties d ," . DBPREFIX . "_regiondetails rg," . DBPREFIX . "_trekingdetails t left join " . DBPREFIX . "_trekreviews r on t.`trek_id` = r.`trek_id` WHERE  t.`region`=rg.`region_id` AND t.`visit_time` = d.`dificulty_id` AND t.`trek_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['details'] = $stmt->fetch(PDO::FETCH_OBJ);
      $trekbyid['details']->thingstoCarry = $trekbyid['details']->thingsCarry;
      $trekbyid['details']->thingsCarryUrl = SITEURL."trekthings/details/".$id;
      $trekbyid['details']->termsConditions = $trekbyid['details']->terms;
      $trekbyid['details']->howtoReach = $trekbyid['details']->mapImage;
      $trekbyid['details']->trekDates = $this->gettrekbatchdetails($id);
      $trekbyid['details']->detailItinerary = $this->getiterinarydetails($id);
      $trekbyid['details']->foodMisc = $this->gettrekfoodmenu($id);
      $trekbyid['details']->trekImages = $this->gettreckimages($id);
      $trekbyid['details']->reviews = $this->getreviews($id);
      $trekbyid['details']->faq = $this->getfaq($id);
      $trekbyid['details']->tripReviews = count($trekbyid['details']->reviews);
      $trekbyid['details']->rentalItems = $this->getTrekRentalItems($id);
      if ((empty($trekbyid)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Results Found "
          );
      }else {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success.",
            'TrekDetails' => $trekbyid['details']
        );
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
  public function addTrekReview($data) {
    try {
      extract($data);
      if($userId == '' || $trekId == '') {
        $status = array('status'=>ERR_PARTIAL_CONT,
          'message'=> "Please check your details!");
        return $status;
      }else {
        $user = $this->getLoginUserDetails($userId);
        if(empty($user)) {
           $status = array('status'=>ERR_NO_DATA,
          'message'=> "No User!");
           return $status;
        }
        $sql = "INSERT INTO ".DBPREFIX."_trekreviews (name, mobile_no, rating, review, trek_id, status, created_date, created_by, user_id) VALUES(:name, :mobile_no, :rating, :review, :trek_id, :status, :created_date, :created_by, :user_id)";
        $stmt = $this->connection->prepare($sql);
        $status = '9';
        $name = $user->firstName. ' '. $user->lastName;
        $mobile = $user->mobile;
        $created_date=date("Y-m-d H:i:s");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":mobile_no", $mobile);
        $stmt->bindParam(":rating", $rating);
        $stmt->bindParam(":review", $review);
        $stmt->bindParam(":trek_id", $trekId);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":created_date", $created_date);
        $stmt->bindParam(":created_by", $userId);
        $stmt->bindParam(":user_id", $userId);
        $res = $stmt->execute();
        if ($res=='true'){
          $status = array('status'=>ERR_OK,
          'message'=>"Success");
        }
        else{
          $status = array('status'=>ERR_NOT_MODIFIED,
          'message'=> "Sorry, Not Added!");
        }
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
  public function getSearchAllTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      if(isset($search_keyword)&&$search_keyword!='')
      {
        $condition .= " and t.`trip_title` LIKE '%".$search_keyword."%' ";
      }
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`difficulty` ='".$difficulty."' ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`tripstart_date`) = '".$month."' and b.`tripstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`trip_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`trip_fee` >= 10000 and t.`trip_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`trip_fee` > 20000 ";
      }
      if(isset($terrain) && $terrain != '')
      {
        $condition .= " and t.`terrain_id` ='".$terrain."' ";
      }
      $sql = "SELECT DISTINCT(t.`biketrips_id`) AS tripId,t.`trip_title` AS tripTitle, `trip_fee` AS tripFee, t.`trip_discount` AS discountFee, (SELECT bd.difficulty_name FROM sg_bikedifficulties bd WHERE bd.dificulty_id=t.`difficulty` LIMIT 0,1) as difficultyName, `visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) as tripImage, t.`trip_overview` AS tripOverview, t.`trip_days` AS tripDays, t.`trip_nights` AS tripNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`temparature`, t.`popular_trips` AS popularTrip,COALESCE(gettriprating(t.`biketrips_id`),0)+0.0 as rating, '' as tripDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as tripImages,'' as reviews,0 as tripReviews, (SELECT tr.terrain_name FROM sg_biketerrains tr WHERE tr.terrain_id=t.terrain_id LIMIT 0,1) AS terrain   FROM " . DBPREFIX . "_biketrips t LEFT join ".DBPREFIX."_tripbatches b   on b.`trip_id` = t.`biketrips_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $treks = $stmt->fetchAll(PDO::FETCH_OBJ);

        //total
        $sql = "SELECT COUNT(t.`biketrips_id`) AS ttl_cnt FROM " . DBPREFIX . "_biketrips t LEFT join ".DBPREFIX."_tripbatches b   on b.`trip_id` = t.`biketrips_id`  WHERE t.`status` = 0 " .$condition;
        $stmt = $this->connection->prepare($sql);  
        $stmt->execute();
        $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);

        if (empty($treks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Trips Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'total_cnt' => $blogcnt->ttl_cnt,
              'BikeTrips' => $treks
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
  public function getFilterAllTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`difficulty` ='".$difficulty."' ";
      }
      if(isset($season)&&$season!='')
      {
        $condition .= " and FIND_IN_SET('".$season."', t.`season`) ";
      }
      if(isset($region)&&$region!='')
      {
        $condition .= " and t.`region` ='".$region."' ";
      }
      if(isset($day_night) && $day_night!='')
      {
        $condition .= " and (t.`trip_nights` ='".$day_night."' OR t.`trip_days` ='".$day_night."') ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`tripstart_date`) = '".$month."' and b.`tripstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`trip_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`trip_fee` >= 10000 and t.`trip_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`trip_fee` > 20000 ";
      }
      if(isset($terrain) && $terrain != '')
      {
        $condition .= " and t.`terrain_id` ='".$terrain."' ";
      }
       $sql = "SELECT DISTINCT(t.`biketrips_id`) AS tripId,t.`trip_title` AS tripTitle, `trip_fee` AS tripFee, t.`trip_discount` AS discountFee, gettrekdifficulty(t.`difficulty`) as difficultyName, `visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) as tripImage, t.`trip_overview` AS tripOverview, t.`trip_days` AS tripDays, t.`trip_nights` AS tripNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`temparature`, t.`popular_trips` AS popularTrip,COALESCE(gettriprating(t.`biketrips_id`),0)+0.0 as rating, '' as tripDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as tripImages,'' as reviews,0 as tripReviews, (SELECT tr.terrain_name FROM sg_biketerrains tr WHERE tr.terrain_id=t.terrain_id LIMIT 0,1) AS terrain   FROM " . DBPREFIX . "_biketrips t LEFT join ".DBPREFIX."_tripbatches b   on b.`trip_id` = t.`biketrips_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $treks = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($treks))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Trips Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'BikeTrips' => $treks
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
  public function getTripDetails($data) {
    try {
      extract($data);
      $id = $tripId;
      $sql = "SELECT t.`biketrips_id` AS tripId,t.`trip_title` AS tripTitle, `trip_fee` AS tripFee, t.`trip_discount` AS discountFee, gettrekdifficulty(t.`difficulty`) as difficultyName, `visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) as tripImage, t.`trip_overview` AS tripOverview, t.`trip_days` AS tripDays, t.`trip_nights` AS tripNights, t.`region`, t.`tripvideo_title` AS tripVideoTitle, t.`tripvideo_url` AS tripVideoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`temparature`, t.`popular_trips` AS popularTrip,COALESCE(gettriprating(t.`biketrips_id`),0)+0.0 as rating, '' as trekDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as tripImages,'' as reviews,0 as tripReviews ,'' AS faq, '' AS rentalItems, (SELECT tr.terrain_name FROM sg_biketerrains tr WHERE tr.terrain_id=t.terrain_id LIMIT 0,1) AS terrain, CONCAT('".SITEURL."uploads/biketrips/',t.pdf_url) AS pdfUrl FROM " . DBPREFIX . "_biketrips t left join " . DBPREFIX . "_tripreviews r on t.`biketrips_id` = r.`biketrip_id`  WHERE t.`status` = 0   AND t.`biketrips_id`=$id ";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['details'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ((empty($trekbyid['details'])))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Results Found "
          );
          return $status;
      }
      $trekbyid['details']->thingstoCarry = $trekbyid['details']->things_carry;
      $trekbyid['details']->thingsCarryUrl = SITEURL."tripthings/details/".$id;
      $trekbyid['details']->termsConditions = $trekbyid['details']->terms;
      $trekbyid['details']->howtoReach = $trekbyid['details']->map_image;
      $trekbyid['details']->trekDates = $this->getTripBatchDetails($id);
      $trekbyid['details']->detailItinerary = $this->getTripIterinaryDetails($id);
      $trekbyid['details']->Foodmisc = $this->getTripFoodMenu($id);
      $trekbyid['details']->tripImages = $this->getTripImages($id);
      $trekbyid['details']->reviews = $this->getTripReviews($id);
      $trekbyid['details']->faq = $this->getTripFaq($id);
      $trekbyid['details']->rentalItems = $this->getTripRentalItems($id);
      $trekbyid['details']->tripReviews = count($trekbyid['details']->reviews);
      if ((empty($trekbyid)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Results Found "
          );
      }else {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success.",
            'TripDetails' => $trekbyid['details']
        );
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
  public function addTripReview($data) {
    try {
      extract($data);
      if($userId == '' || $tripId == '') {
        $status = array('status'=>ERR_PARTIAL_CONT,
          'message'=> "Please check your details!");
        return $status;
      }
      $user = $this->getLoginUserDetails($userId);
      if(empty($user)) {
         $status = array('status'=>ERR_NO_DATA,
        'message'=> "No User!");
         return $status;
      }
      $sql = "INSERT INTO ".DBPREFIX."_tripreviews (name, mobile_no, rating, review, biketrip_id, status, created_date, created_by, user_id) VALUES(:name, :mobile_no, :rating, :review, :biketrip_id, :status, :created_date, :created_by, :user_id)";
      $stmt = $this->connection->prepare($sql);
      $status = '9';
      $name = $user->firstName. ' '. $user->lastName;
      $mobile = $user->mobile;
      $created_date=date("Y-m-d H:i:s");
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":mobile_no", $mobile);
      $stmt->bindParam(":rating", $rating);
      $stmt->bindParam(":review", $review);
      $stmt->bindParam(":biketrip_id", $tripId);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":created_by", $userId);
      $stmt->bindParam(":user_id", $userId);
      $res = $stmt->execute();
      if ($res=='true'){
        $status = array('status'=>"200",
        'message'=>"Success");
      }
      else{
        $status = array('status'=>ERR_NOT_MODIFIED,
        'message'=> "Sorry, Please try once again!");
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
  public function getTripBatchDetails($tripId) {
    try {
      $sql="SELECT getmonthname(month(`tripstart_date`)) AS monthName, tripbatch_id AS batchId, tripbatch_size-(gettripbatchcount(tripbatch_id)) AS seatsInfo, gettripbatchstatusname(tripbatch_size-(gettripbatchcount(tripbatch_id)),`tripbatch_status`) AS batchStatus, tripstart_date AS startDate, tripend_date AS endDate, tripbatch_status AS seatStatus, CONCAT(DATE_FORMAT(`tripstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(`tripend_date`,'%M %d')) AS display, '' AS bookings FROM sg_tripbatches WHERE `trip_id`=$tripId AND `tripstart_date` >= now() ORDER BY tripstart_date ASC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $dates = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      if(!empty($dates)) {
        foreach ($dates as $key => $value) {
          //bookings
          $sql = "SELECT p.name, p.age, p.gender, b.city FROM sg_tripparticipantdetails p, sg_tripbookingdetails b where p.tripbooking_id = b.tripbooking_id AND b.batch = '".$value->batchId."' ORDER BY p.tripbooking_id DESC LIMIT 5";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings = $stmt->fetchAll(PDO::FETCH_OBJ);

          $limit = 5 - count($bookings);
          $sql = "SELECT name, age, gender, city FROM sg_dummy_bookings ORDER BY RAND() LIMIT ".$limit;
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings1 = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $value->bookings = array_merge($bookings, $bookings1);
          $d[$value->monthName][] = $value;
        }
      }
      $trekbyid['dates'] = $d;
      return $trekbyid['dates'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripIterinaryDetails($tripId) {
    try {
      $sql = "SELECT title AS iterinaryTitle, description AS iterinaryDetails FROM sg_tripitinerary where trip_id =$tripId";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['getiterinarydetails'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['getiterinarydetails'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripFoodMenu($tripId) {
    try {
      $sql = "SELECT tripfood_id AS foodmenuId, trip_id AS tripIid, pumpup_calories AS pumpupCalories, pumpup_image AS pumpupImage, pumpupmenu_desc AS pumpupMenuDesc,bf_calories AS bfCalories, bf_image AS bfImage, bfmenu_desc AS bfMenuDesc, lunch_calories AS lunchCalories, lunch_desc AS lunchDesc, lunch_image AS lunchImage, evng_calories AS evngCalories, evng_image AS evngImage, evng_desc AS evngMenuDesc, dinner_calories AS dinnerCalories,dinner_image AS dinnerImage, dinner_desc AS dinnerMenuDesc, created_date AS createdDate, modified_date AS modifiedDate FROM sg_tripfoodmenu where `trip_id`= $tripId";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $tripbyid['gettripfoodmenu'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($tripbyid['gettripfoodmenu'] == false)
      {
        return null;
      }
      return $tripbyid['gettripfoodmenu'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripImages($tripId) {
    try {
      $sql = "SELECT concat('".SITEURL."uploads/tripsgallery/', image_name) as imageName FROM sg_trip_gallery WHERE `trip_id`= $tripId";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $tripbyid['tripsimages'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $tripbyid['tripsimages'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripReviews($tripId) {
    try {
      $sql = "SELECT review, name, rating+0.0 AS rating, mobile_no AS mobile, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, user_id AS userId FROM sg_tripreviews WHERE `biketrip_id`= $tripId and `status`='1' order by tripreview_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $tripbyid['reviews'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $tripbyid['reviews'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripFaq($tripId) {
    try {
      $query ="SELECT `faq_id`, `trip_id`, `cat_id`, `question`, `answer`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, (SELECT category_title FROM sg_faq_categories WHERE faq_cat_id = cat_id) AS category_title FROM `sg_trip_faq` WHERE status='0'  order by faq_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      foreach ($results as $key => $value) {
        $d[$value->category_title][] = $value;
      }
      return $d;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripAddons($tripId) {
    try {
      $query ="SELECT * FROM `sg_trip_add_ons` WHERE trip_id = '$tripId' AND status='0'  order by add_on_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripRentalItems($tripId) {
    try {
      $query ="SELECT tr.triprentalitem_id, tr.rentalitem, tr.item_cost, r.item_name, r.item_code, r.image_1, r.rental_category, r.non_returnable, r.item_description,'' AS sizes FROM `sg_triprentalitems` tr, sg_rental_items r WHERE tr.trip_id = '$tripId' AND r.item_id=tr.rentalitem AND tr.status='0'  order by triprentalitem_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($results as $key => $value) {
        $sizes = array('1'=>'S','2'=>'M','3'=> 'L','4'=> 'XL','5'=> 'XXL');
        $results[$key]->sizes = $sizes;
      }
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getSearchAllExpeditions($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      if(isset($search_keyword)&&$search_keyword!='')
      {
        $condition .= " and t.`expedition_title` LIKE '%".$search_keyword."%' ";
      }
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`visit_time` ='".$difficulty."' ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`expeditionstart_date`) = '".$month."' and b.`expeditionstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`expedition_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`expedition_fee` >= 10000 and t.`expedition_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`expedition_fee` > 20000 ";
      }
      $sql = "SELECT DISTINCT(t.`expedition_id`) AS expeditionId,t.`expedition_title` AS expeditionTitle, t.`expedition_fee` AS expeditionFee, t.`expedition_discount` AS discountFee, gettrekdifficulty(t.`visit_time`) as difficultyName,t. `time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) as expeditionImage, t.`expedition_overview` AS expeditionOverview, t.`expedition_days` AS expeditionDays, t.`expedition_nights` AS expeditionNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_expedition` AS popularexpedition,COALESCE(getexpeditionrating(t.`expedition_id`),0)+0.0 as rating, '' as expeditionDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as expeditionImages,'' as reviews,0 as tripReviews, b.`expeditionstart_date` AS startDate, b.`expeditionend_date` AS endDate  FROM sg_expeditions t inner join sg_expeditionbatches b   on b.`expedition_id` = t.`expedition_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $expeditions = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($expeditions))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No expeditions Found "
          );
          return $status;
        }
        else
        {
          //total
          $sql = "SELECT COUNT(t.`expedition_id`) AS ttl_cnt FROM sg_expeditions t inner join sg_expeditionbatches b   on b.`expedition_id` = t.`expedition_id`  WHERE t.`status` = 0 " .$condition;
          $stmt = $this->connection->prepare($sql);  
          $stmt->execute();
          $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);

          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'total_cnt' => $blogcnt->ttl_cnt,
              'expeditions' => $expeditions
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
  public function getFilterAllExpeditions($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      
      if(isset($difficulty)&&$difficulty!='')
      {
        $condition .= " and t.`visit_time` ='".$difficulty."' ";
      }
      if(isset($season)&&$season!='')
      {
        $condition .= " and FIND_IN_SET('".$season."', t.`season`) ";
      }
      if(isset($region)&&$region!='')
      {
        $condition .= " and t.`region` ='".$region."' ";
      }
      if(isset($day_night) && $day_night!='')
      {
        $condition .= " and (t.`expedition_nights` ='".$day_night."' OR t.`expedition_days` ='".$day_night."') ";
      }
      if(isset($month)&&$month!='')
      {
        $condition .= " and month(b.`expeditionstart_date`) = '".$month."' and b.`expeditionstart_date`>=now() ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  t.`expedition_fee` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and t.`expedition_fee` >= 10000 and t.`expedition_fee` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and t.`expedition_fee` > 20000 ";
      }
      $sql = "SELECT DISTINCT(t.`expedition_id`) AS expeditionId,t.`expedition_title` AS expeditionTitle, t.`expedition_fee` AS expeditionFee, t.`expedition_discount` AS discountFee, gettrekdifficulty(t.`visit_time`) as difficultyName,t. `time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) as expeditionImage, t.`expedition_overview` AS expeditionOverview, t.`expedition_days` AS expeditionDays, t.`expedition_nights` AS expeditionNights, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_expedition` AS popularexpedition,COALESCE(getexpeditionrating(t.`expedition_id`),0)+0.0 as rating, '' as expeditionDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as expeditionImages,'' as reviews,0 as tripReviews, b.`expeditionstart_date` AS startDate, b.`expeditionend_date` AS endDate  FROM sg_expeditions t inner join sg_expeditionbatches b   on b.`expedition_id` = t.`expedition_id`  WHERE t.`status` = 0 " .$condition. " LIMIT ".$offsetid.",".$record_count;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $expeditions = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($expeditions))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No expeditions Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'expeditions' => $expeditions
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
  public function getExpeditionDetails($data) {
    try {
      extract($data);
      $id = $expeditionId;
      $sql = "SELECT t.`expedition_id` AS expeditionId, t.`expedition_title` AS expeditionTitle, t.`expedition_fee` AS expeditionFee,t.`expedition_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) AS expeditionImage, t.`expedition_overview` AS expeditionOverview, t.`expedition_days` AS expeditionDays, t.`expedition_nights` AS expeditionNights, t.`region`, t.`expeditionvideo_title` AS expeditionVideoTitle, t.`expeditionvideo_url` AS expeditionVideoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`terms`, t.`altitude`, t.`created_date` AS createdDate, rg.`region_name` AS regionName, rg.`region_id`, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_expedition` AS popularexpedition, d.`difficulty_name` AS difficultyName, COALESCE(getexpeditionrating(t.`expedition_id`),0)+0.0 as rating, '' as trekDates , '' as detailItinerary ,'' as foodMisc,'' as thingstoCarry,'' as thingsCarryUrl,'' as termsConditions,'' as howtoReach, '' as expeditionImages,'' as reviews,0 as tripReviews,'' AS faq, t.reporting_place AS reportingPlace, t.pickup_drop AS pickupDrop, '' AS rentalItems, CONCAT('".SITEURL."uploads/expeditions/',t.pdf_url) AS pdfUrl FROM " . DBPREFIX . "_difficulties d ," . DBPREFIX . "_regiondetails rg, sg_expeditions t left join " . DBPREFIX . "_expeditionreviews r on t.`expedition_id` = r.`expedition_id` WHERE  t.`region`=rg.`region_id` AND t.`visit_time` = d.`dificulty_id` AND t.`expedition_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $expeditionbyid['details'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ((empty($expeditionbyid['details'])))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Results Found "
          );
          return $status;
      }
      $expeditionbyid['details']->thingstoCarry = $expeditionbyid['details']->thingsCarry;
      $expeditionbyid['details']->thingsCarryUrl = SITEURL."expeditionthings/details/".$id;
      $expeditionbyid['details']->termsConditions = $expeditionbyid['details']->terms;
      $expeditionbyid['details']->howtoReach = $expeditionbyid['details']->mapImage;
      $expeditionbyid['details']->trekDates = $this->getExpeditionBatchDetails($id);
      $expeditionbyid['details']->detailItinerary = $this->getExpeditionIterinaryDetails($id);
      $expeditionbyid['details']->Foodmisc = $this->getExpeditionFoodMenu($id);
      $expeditionbyid['details']->expeditionImages = $this->getExpeditionImages($id);
      $expeditionbyid['details']->reviews = $this->getExpeditionReviews($id);
      $expeditionbyid['details']->faq = $this->getExpeditionFaq($id);
      $expeditionbyid['details']->rentalItems = $this->getExpeditionRentalItems($id);
      $expeditionbyid['details']->tripReviews = count($expeditionbyid['details']->reviews);
      if ((empty($expeditionbyid)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Results Found "
          );
      }else {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success.",
            'expeditionDetails' => $expeditionbyid['details']
        );
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
  public function addExpeditionReview($data) {
    try {
      extract($data);
      if($userId == '' || $expeditionId == '') {
        $status = array('status'=>ERR_PARTIAL_CONT,
          'message'=> "Please check your details!");
        return $status;
      }
      $user = $this->getLoginUserDetails($userId);
      if(empty($user)) {
         $status = array('status'=>ERR_NO_DATA,
        'message'=> "No User!");
         return $status;
      }
      $sql = "INSERT INTO sg_expeditionreviews (name, mobile_no, rating, review, expedition_id, status, created_date, created_by, user_id) VALUES(:name, :mobile_no, :rating, :review, :expedition_id, :status, :created_date, :created_by, :user_id)";
      $stmt = $this->connection->prepare($sql);
      $status = '9';
      $created_date=date("Y-m-d H:i:s");
      $name = $user->firstName. ' '. $user->lastName;
      $mobile = $user->mobile;
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":mobile_no", $mobile);
      $stmt->bindParam(":rating", $rating);
      $stmt->bindParam(":review", $review);
      $stmt->bindParam(":expedition_id", $expeditionId);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":created_by", $userId);
      $stmt->bindParam(":user_id", $userId);
      $res = $stmt->execute();
      if ($res=='true'){
        $status = array('status'=>"200",
        'message'=>"Success");
      }
      else{
        $status = array('status'=>ERR_NOT_MODIFIED,
        'message'=> "Sorry, Please try once again!");
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
  public function getExpeditionBatchDetails($id) {
    try {
      $sql="SELECT getmonthname(month(`expeditionstart_date`)) AS monthName, batch_id AS batchId, expeditionbatch_size-(getexpeditionbatchcount(batch_id)) AS seatsInfo, getbatchstatusname(expeditionbatch_size-(getexpeditionbatchcount(batch_id)),`expeditionbatch_status`) AS batchStatus, expeditionstart_date AS startDate, expeditionend_date AS endDate, expeditionbatch_status AS seatStatus, CONCAT(DATE_FORMAT(`expeditionstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(`expeditionend_date`,'%M %d')) AS display, '' AS bookings FROM sg_expeditionbatches WHERE `expedition_id`=$id AND `expeditionstart_date` >= now() AND expeditionbatch_status='0' ORDER BY expeditionstart_date ASC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $dates = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      if(!empty($dates)) {
        foreach ($dates as $key => $value) {
          //bookings
          $sql = "SELECT p.name, p.age, p.gender, b.city FROM sg_expeditionparticipants p, sg_expeditionbookings b where p.booking_id = b.booking_id AND b.batch = '".$value->batchId."' ORDER BY p.booking_id DESC LIMIT 5";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings = $stmt->fetchAll(PDO::FETCH_OBJ);

          $limit = 5 - count($bookings);
          $sql = "SELECT name, age, gender, city FROM sg_dummy_bookings ORDER BY RAND() LIMIT ".$limit;
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings1 = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $value->bookings = array_merge($bookings, $bookings1);

          $d[$value->monthName][] = $value;
        }
      }
      $trekbyid['dates'] = $d;
      return $trekbyid['dates'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionIterinaryDetails($id) {
    try {
      $sql = "SELECT iterinary_title AS iterinaryTitle, iterinary_details AS iterinaryDetails FROM sg_expeditioniterinarydetails where expedition_id =$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['getiterinarydetails'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['getiterinarydetails'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionFoodMenu($id) {
    try {
      $sql = "SELECT foodmenu_id AS foodmenuId, expedition_id AS expeditionId, pumpup_calories AS pumpupCalories, pumpup_image AS pumpupImage, pumpupmenu_desc AS pumpupMenuDesc,bf_calories AS bfCalories, bf_image AS bfImage, bfmenu_desc AS bfMenuDesc, lunch_calories AS lunchCalories, lunchmenu_desc AS lunchMenuDesc, lunch_image AS lunchImage, evng_calories AS evngCalories, evng_image AS evngImage, evngmenu_desc AS evngMenuDesc, dinner_calories AS dinnerCalories,dinner_image AS dinnerImage, dinnermenu_desc AS dinnerMenuDesc, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, recordstatus AS status FROM sg_expeditionfoodmenu where `expedition_id`= $id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['gettrekfoodmenu'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($trekbyid['gettrekfoodmenu'] == false)
      {
        return null;
      }
      return $trekbyid['gettrekfoodmenu'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionImages($id) {
    try {
      $sql = "SELECT concat('".SITEURL."uploads/expeditionsgallery/', image_name) as imageName FROM sg_expedition_gallery WHERE `expedition_id`= $id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionReviews($id) {
    try {
      $sql = "SELECT review, name, rating+0.0 as rating, mobile_no AS mobile, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, user_id AS userId FROM sg_expeditionreviews WHERE `expedition_id`= $id and `status`='1' order by review_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['reviews'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['reviews'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionFaq($id) {
    try {
      $query ="SELECT `faq_id`, `expedition_id`, `cat_id`, `question`, `answer`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, (SELECT category_title FROM sg_faq_categories WHERE faq_cat_id = cat_id) AS category_title FROM `sg_expedition_faq` WHERE status='0' AND expedition_id=$id order by faq_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      foreach ($results as $key => $value) {
        $d[$value->category_title][] = $value;
      }
      return $d;

    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionAddons($ex_id) {
    try {
      $query ="SELECT * FROM `sg_expedition_add_ons` WHERE expedition_id = '$ex_id' AND status='0'  order by add_on_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpeditionRentalItems($ex_id) {
    try {
      $query ="SELECT tr.rentalitem_id, tr.rentalitem, tr.item_cost, r.item_name, r.item_code, r.image_1, r.rental_category, r.non_returnable, r.item_description, '' AS sizes FROM `sg_expeditionrentalitems` tr, sg_rental_items r WHERE tr.expedition_id = '$ex_id' AND r.item_id=tr.rentalitem AND tr.status='0'  order by rentalitem_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($results as $key => $value) {
        $sizes = array('1'=>'S','2'=>'M','3'=> 'L','4'=> 'XL','5'=> 'XXL');
        $results[$key]->sizes = $sizes;
      }
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLoginOtp($data) {
    try {
      extract($data);
      if (is_numeric($mobile))
      {
        $userexist = $this->checkUserDetails($mobile);
        if ($userexist == '0') {
          $url = SITEURL."login/userprofile";
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Sorry provided number not exist in system.Please register."
          );
          return $status;
        }
        else {
          $userdetails = $this->getUserDetails($mobile);            
          $otp = rand(111111,999999);
          $otpdetails = array();
          $otpdetails['mobile'] = $mobile;
          $otpdetails['otp'] = $otp;
          $otp_id = $this->insertOtpDetails($otpdetails);
          $emaildetails = $this->getRegisteredEmail($mobile);
          if (@$emaildetails->email != '')
          {
            $email = $emaildetails->email;
            $subject = "Login Otp for ridingsolo";
            $message = "<p>Dear User,<br/></p>";
            $message .= "<p>One Time Password(OTP) to complete login.OTP NO : " . $otp . "</p>";
            $message .= "<p><u>Thanks & Regards</u><br>Ridingsolo Team</p>";
            $smtpemail = new smtpHelper();
            $smtpemail->email = $email;
            $smtpemail->subject = $subject;
            $smtpemail->message = $message;
            //$response = $smtpemail->SendEmail();
          }
          if ($otp_id)
          {
            $message  ='Use OTP '.$otp.' to verify login to your RS Account to uncover your adventure.
RidingSolo does not call to verify your OTP.';
            //$message = "Dear User,One Time Password(OTP) to complete login.OTP NO : " . $otp;
            $smshelper = new smshelper;
            $smshelper->SendSms($message, $mobile);
            $optmobile = substr($mobile, -4);
            $mess = array(
              'message' => "Enter the otp sent to your mobile ******" . $optmobile
            );
            $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'otp_id' => $otp_id,
              'userdetails' => $userdetails
            );
            return $status;
          }      
        }
      }
      else
      {
        $status = array(
            'status' => "500",
            'message' => "Please enter 10 digits moblie number"
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
  public function checkUserDetails($mobile) {
    try {
      $sql = "SELECT count(`registration_id`) as cnt FROM " . DBPREFIX . "_regestration where `mobile`= '$mobile'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getUserProfileDetails($data) {
    try {
      extract($data);
      $sql = "SELECT `registration_id` AS registrationId, `social_id` AS socialId, `first_name` AS firstName, `last_name` AS lastName, `email`, `mobile`, `age`, `height`, `weight`, `gender`, `address`, `created_date` AS createdDate, `modified_date` AS modifiedDate FROM sg_regestration WHERE `mobile`='".$mobile."' OR email = '".$email."'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
      $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'userdetails' => $userdetails
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
  public function getUserDetails($mobile) {
    try {
      $sql = "SELECT * FROM " . DBPREFIX . "_regestration WHERE `mobile`=$mobile";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $userdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function insertOtpDetails($data) {
    try {
      extract($data);
      $otp = $data['otp'];
      $mobile = $data['mobile'];
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO " . DBPREFIX . "_loginotpdetails (mobile_no,otp,created_date) VALUES(:mobile, :otp, :created_date)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":mobile", $mobile);
      $stmt->bindParam(":otp", $otp);
      $stmt->bindParam(":created_date", $created_date);
      $res = $stmt->execute();
      return $this->connection->lastInsertId();
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getRegisteredEmail($mobile) {
    try {
      $sql = "SELECT `email` FROM " . DBPREFIX . "_regestration WHERE `mobile`=$mobile";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      return $reg;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getVerifyOtp($data) {
    try {
      extract($data);
      $sql = "SELECT count(`loginotp_id`) as cnt,mobile_no FROM " . DBPREFIX . "_loginotpdetails where `otp`= '$otp' and `loginotp_id`= '$otp_id' group by mobile_no";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      if ($count == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure please enter correct otp"
        );
        return $status;
      }
      else
      {
          $mobile = $count->mobile_no;
          $userdetails = $this->getUserDetails($mobile);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success Otp Verified Successfully",
              'userdetails' => $userdetails
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
  public function getDashboard($data) {
    try {
      extract($data);
      $date = date('Y-m-d');
      $sql = "SELECT badge_name AS badgeName, CONCAT('".SITEURL."uploads/badges/',badge_image) AS badgeImage FROM sg_badges WHERE badge_id = (SELECT user_badge FROM sg_regestration WHERE registration_id='$userId')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $badgedetails = $stmt->fetch(PDO::FETCH_OBJ);
      if($type == '1') { 
        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as completedtrek FROM sg_inserttrekbatches ib inner join sg_bookingdetails b on b.`batch` = ib.`batch_id` inner join sg_paymentdetails pm on pm.`booking_id`=b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` where (ib.`trekend_date`< '".$date."') and getpayment_type(b.`booking_id`) != 2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $completedtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql2 = "SELECT COUNT(DISTINCT(b.`booking_id`)) as ongoingtreks FROM sg_inserttrekbatches ib inner join sg_bookingdetails b on b.`batch` = ib.`batch_id` inner join sg_paymentdetails pm on pm.`booking_id`=b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` where (ib.`trekstart_date`>= '".$date."' AND ib.trekend_date <= '".$date."') and getpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt2 = $this->connection->prepare($sql2);
        $stmt2->execute();
        $ongoingtreks = $stmt2->fetch(PDO::FETCH_OBJ);
      
        $sql = "SELECT DISTINCT(b.`booking_id`), b.`trek_id` AS id, gettrekname(b.`trek_id`) AS title, ib.`trekstart_date` AS startDate, ib.`trekend_date` AS endDate, b.user_id, DATEDIFF(ib.`trekstart_date`, '".$date."') AS daysToGo FROM sg_inserttrekbatches ib INNER JOIN sg_bookingdetails b ON b.`batch` = ib.`batch_id` INNER JOIN sg_paymentdetails pm on pm.`booking_id`=b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` where ib.`trekstart_date`>= '".$date."' and getpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchALL(PDO::FETCH_OBJ);

        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as bookingcnt FROM " . DBPREFIX . "_bookingdetails b inner join " . DBPREFIX . "_paymentdetails pm on pm.`booking_id` = b.`booking_id` inner join " . DBPREFIX . "_beforebookingdetails bb on bb.booking_id = pm.`booking_id` WHERE getpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $totaltreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(pm.payment_id) AS payment_id, bb.amount AS advancePayment, b.`trek_id` AS id, gettrekname(b.`trek_id`) as title, ib.`trekstart_date` AS startDate, ib.`trekend_date` AS endDate, bb.original_amount, b.user_id, b.`booking_id` FROM sg_inserttrekbatches ib inner join sg_bookingdetails b on b.`batch` = ib.`batch_id` inner join sg_paymentdetails pm on pm.`booking_id`=b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` where b.user_id='$userId' AND getpayment_type(b.`booking_id`)=2";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $advancePayment = $stmt->fetchAll(PDO::FETCH_OBJ);

        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            "Upcoming" => count($upcomingtreks),
            "OnGoing"=>$ongoingtreks->ongoingtreks,
            "Completed"=>$completedtreks->completedtrek,
            "Total"=>$totaltreks->bookingcnt,
            "UpComingDetails"=>$upcomingtreks,
            "AdvancedPaymentsDetails"=>$advancePayment,
            "badgedetails"=>$badgedetails
        );
        return $status; 
      }else if($type == '2') {
        $sql = "SELECT count(DISTINCT(b.`tripbooking_id`)) as completedtrek FROM sg_tripbatches ib inner join sg_tripbookingdetails b on b.`batch` = ib.`tripbatch_id` inner join sg_trippaymentdetails pm on pm.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where (ib.`tripend_date`< '".$date."') and gettrippayment_type(b.`tripbooking_id`) != 2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $completedtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`tripbooking_id`) as ongoingtreks, gettripname(b.`trip_id`) AS title FROM sg_tripbatches ib inner join sg_tripbookingdetails b on b.`batch` = ib.`tripbatch_id` inner join sg_trippaymentdetails pm on pm.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where (ib.`tripstart_date`>= '".$date."' AND ib.tripend_date <= '".$date."') and gettrippayment_type(b.`tripbooking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $ongoingtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`tripbooking_id`), b.`trip_id` AS id, gettripname(b.`trip_id`) AS title, ib.`tripstart_date` AS startDate, ib.`tripend_date` AS endDate,  b.user_id, DATEDIFF(ib.`tripstart_date`, '".$date."') AS daysToGo FROM sg_tripbatches ib INNER JOIN sg_tripbookingdetails b ON b.`batch` = ib.`tripbatch_id` INNER JOIN sg_trippaymentdetails pm on pm.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where ib.`tripstart_date`>= '".$date."' and gettrippayment_type(b.`tripbooking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchALL(PDO::FETCH_OBJ);

        $sql = "SELECT count(DISTINCT(b.`tripbooking_id`)) as bookingcnt FROM sg_tripbookingdetails b inner join sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.tripbooking_id = pm.`tripbooking_id` WHERE gettrippayment_type(b.`tripbooking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $totaltreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(pm.trippayment_id) AS payment_id, bb.amount AS advancePayment, b.`trip_id` AS id, gettripname(b.`trip_id`) as title, ib.`tripstart_date` AS startDate, ib.`tripend_date` AS endDate, bb.original_amount, b.user_id, b.`tripbooking_id` AS booking_id FROM sg_tripbatches ib inner join sg_tripbookingdetails b on b.`batch` = ib.`tripbatch_id` inner join sg_trippaymentdetails pm on pm.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where b.user_id='$userId' AND gettrippayment_type(b.`tripbooking_id`)=2";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $advancePayment = $stmt->fetchAll(PDO::FETCH_OBJ);

        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            "Upcoming" => count($upcomingtreks),
            "OnGoing"=>$ongoingtreks,
            "Completed"=>$completedtreks->completedtrek,
            "Total"=>$totaltreks->bookingcnt,
            "UpComingDetails"=>$upcomingtreks,
            "AdvancedPaymentsDetails"=>$advancePayment,
            "badgedetails"=>$badgedetails
        );
        return $status; 
      }else if($type == '3') {
        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as completedtrek FROM sg_expeditionbatches ib inner join sg_expeditionbookings b on b.`batch` = ib.`batch_id` inner join sg_expeditionpayments pm on pm.`booking_id`=b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` where (ib.`expeditionend_date`< '".$date."') and getexpeditionpayment_type(b.`booking_id`) != 2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $completedtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`booking_id`) as ongoingtreks, getexpeditionname(b.`expedition_id`) AS title FROM sg_expeditionbatches ib inner join sg_expeditionbookings b on b.`batch` = ib.`batch_id` inner join sg_expeditionpayments pm on pm.`booking_id`=b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` where (ib.`expeditionstart_date`>= '".$date."' AND ib.expeditionend_date <= '".$date."') and getexpeditionpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $ongoingtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`booking_id`), b.`expedition_id` AS id, getexpeditionname(b.`expedition_id`) AS title, ib.`expeditionstart_date` AS startDate, ib.`expeditionend_date` AS endDate, b.user_id, DATEDIFF(ib.`expeditionstart_date`, '".$date."') AS daysToGo FROM sg_expeditionbatches ib INNER JOIN sg_expeditionbookings b ON b.`batch` = ib.`batch_id` INNER JOIN sg_expeditionpayments pm on pm.`booking_id`=b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` where ib.`expeditionstart_date`>= '".$date."' and getexpeditionpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchALL(PDO::FETCH_OBJ);

        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as bookingcnt FROM sg_expeditionbookings b inner join sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.booking_id = pm.`booking_id` WHERE getexpeditionpayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $totaltreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(pm.payment_id) AS payment_id, bb.amount AS advancePayment, b.`expedition_id` AS id, getexpeditionname(b.`expedition_id`) as title, ib.`expeditionstart_date` AS startDate, ib.`expeditionend_date` AS endDate, bb.original_amount, b.user_id, b.`booking_id` AS booking_id FROM sg_expeditionbatches ib inner join sg_expeditionbookings b on b.`batch` = ib.`batch_id` inner join sg_expeditionpayments pm on pm.`booking_id`=b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` where b.user_id='$userId' AND getexpeditionpayment_type(b.`booking_id`)=2";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $advancePayment = $stmt->fetchAll(PDO::FETCH_OBJ);

        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            "Upcoming" => count($upcomingtreks),
            "OnGoing"=>$ongoingtreks,
            "Completed"=>$completedtreks->completedtrek,
            "Total"=>$totaltreks->bookingcnt,
            "UpComingDetails"=>$upcomingtreks,
            "AdvancedPaymentsDetails"=>$advancePayment,
            "badgedetails"=>$badgedetails
        );
        return $status; 
      }else if($type == '4') {
        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as completedtrek FROM `sg_lpbatches` ib inner join `sg_lpbookingdetails` b on b.`batch` = ib.`lpbatch_id` inner join `sg_lppaymentdetails` pm on pm.`lpbooking_id`=b.`booking_id` inner join `sg_lpbeforebookingdetails` bb on bb.`lpbooking_id`=b.`booking_id` where (ib.`lpend_date`< '".$date."') and getlppayment_type(b.`booking_id`) != 2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $completedtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`booking_id`) as ongoingtreks, getlpname(b.`lp_id`) AS title FROM sg_lpbatches ib inner join sg_lpbookingdetails b on b.`batch` = ib.`lpbatch_id` inner join sg_lppaymentdetails pm on pm.`lpbooking_id`=b.`booking_id` inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id`=b.`booking_id` where (ib.`lpstart_date`>= '".$date."' AND ib.lpend_date <= '".$date."') and getlppayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $ongoingtreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(b.`booking_id`), b.`lp_id` AS id, getlpname(b.`lp_id`) AS title, ib.`lpstart_date` AS startDate, ib.`lpend_date` AS endDate, b.user_id, DATEDIFF(ib.`lpstart_date`, '".$date."') AS daysToGo FROM sg_lpbatches ib INNER JOIN sg_lpbookingdetails b ON b.`batch` = ib.`lpbatch_id`  INNER JOIN sg_lppaymentdetails pm on pm.`lpbooking_id`=b.`booking_id`  inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id`=b.`booking_id` where ib.`lpstart_date`>= '".$date."' and getlppayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $upcomingtreks = $stmt->fetchALL(PDO::FETCH_OBJ);

        $sql = "SELECT count(DISTINCT(b.`booking_id`)) as bookingcnt FROM sg_lpbookingdetails b inner join sg_lppaymentdetails pm on pm.`lpbooking_id` = b.`booking_id` inner join sg_lpbeforebookingdetails bb on bb.lpbooking_id = pm.`lpbooking_id` WHERE getlppayment_type(b.`booking_id`)!=2 and b.user_id='$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $totaltreks = $stmt->fetch(PDO::FETCH_OBJ);

        $sql = "SELECT DISTINCT(pm.lppayment_id) AS payment_id, bb.amount AS advancePayment, b.`lp_id` AS id, getlpname(b.`lp_id`) as title, ib.`lpstart_date` AS startDate, ib.`lpend_date` AS endDate, bb.original_amount, b.user_id, b.`booking_id` AS booking_id FROM sg_lpbatches ib inner join sg_lpbookingdetails b on b.`batch` = ib.`lpbatch_id` inner join sg_lppaymentdetails pm on pm.`lpbooking_id`=b.`booking_id` inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id`=b.`booking_id` where b.user_id='$userId' AND getlppayment_type(b.`booking_id`)=2";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $advancePayment = $stmt->fetchAll(PDO::FETCH_OBJ);

        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            "Upcoming" => count($upcomingtreks),
            "OnGoing"=>$ongoingtreks,
            "Completed"=>$completedtreks->completedtrek,
            "Total"=>$totaltreks->bookingcnt,
            "UpComingDetails"=>$upcomingtreks,
            "AdvancedPaymentsDetails"=>$advancePayment,
            "badgedetails"=>$badgedetails
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
  public function resendOtp($data) {
    try {
      extract($data);
      $otp_id = $otp_id;
      $otpdetails = $this->getOtp($otp_id);
      if(empty($otpdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "No Data"
        );
        return $status;   
      }
      $mobile = $otpdetails->mobile_no;
      $otp = $otpdetails->otp;
      $message  ='Use OTP '.$otp.' to verify login to your RS Account to uncover your adventure.
RidingSolo does not call to verify your OTP.';
      $smshelper = new smshelper;
      $smshelper->SendSms($message, $mobile);
      $emaildetails = $this->getRegisteredEmail($mobile);
      if (@$emaildetails->email != '')
      {
          $email = $emaildetails->email;
          $subject = "Login Otp for ridingsolo";
          $message = "<p>Dear User,<br/></p>";
          $message .= "<p>One Time Password(OTP) to complete login.OTP NO : " . $otp . "</p>";
          $message .= "<p><u>Thanks & Regards</u><br>Ridingsolo Team</p>";
          $smtpemail = new smtpHelper;
          $smtpemail->email = $email;
          $smtpemail->subject = $subject;
          $smtpemail->message = $message;
          //$response = $smtpemail->SendEmail();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success OTP sent to your mobile"
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
  public function getOtp($otp_id) {
    try {
      $sql = "SELECT `otp`,`mobile_no` FROM  " . DBPREFIX . "_loginotpdetails WHERE `loginotp_id`= $otp_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $otpdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $otpdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addUserParticipants($data) {
    try {
      extract($data);
      $mob = $mobile;
      $email = $email;
      $reg_id = $registeration_id;
      $userexist = $this->checkUserParticipantDetails($mob, $reg_id);
      $emailexist = $this->userEmailVerification($email, $reg_id);
      if ($userexist !== '0')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure mobile number already exist"
        );
        return $status;    
      }
      else if ($emailexist !== '0')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure email already exist"
        );
        return $status;    
      }
      else
      {
        if($weight == '') $weight='0';
        $sql = "INSERT INTO " . DBPREFIX . "_userparticipantdetails (name, email, mobile, age, height, weight, gender, address, reguser_id, created_date) VALUES(:name, :email, :mobile, :age, :height, :weight, :gender,:address, :reguser_id, :created_date)";
        $stmt = $this->connection->prepare($sql);
        $created_date = date("Y-m-d H:i:s");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile", $mobile);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":reguser_id", $registeration_id);
        $stmt->bindParam(":created_date", $created_date);
        $res = $stmt->execute();
        if ($res == 'true')
        {
          $id = $this->connection->lastInsertId();
          $status = array(
              'status' => ERR_OK,
              'message' => "Success!! participant added successfully",
              "participant_id" => $id
          );
          return $status;    
        }
        else
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure"
          );
          return $status;    
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function checkUserParticipantDetails($mobile, $reg_id)
  {
      $sql = "SELECT count(`participant_id`) as cnt FROM " . DBPREFIX . "_userparticipantdetails where `mobile`= '$mobile' and `reguser_id`='$reg_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
  }
  public function userEmailVerification($email, $reg_id)
  {
      $sql = "SELECT count(`participant_id`) as cnt FROM " . DBPREFIX . "_userparticipantdetails where `email`='$email' and `reguser_id`= '$reg_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
  }
  public function addUserDetails($data) {
    try {
      extract($data);
      $userexist = $this->checkUserDetails($mobile);
      $emailexist = $this->checkUserEmail($email);
      if ($userexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure mobile number already exist"
        );
        return $status;
      }
      else if ($emailexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure email already exist"
        );
        return $status;
      }
      else
      {
        if($weight == '') $weight = 0;
        if($gender == '') $gender = "Female";
        $sql = "INSERT INTO " . DBPREFIX . "_regestration (first_name, last_name, email, mobile, age, height, weight, gender, address, created_date, address2, country, state, city, dob) VALUES(:first_name, :last_name, :email, :mobile, :age, :height, :weight, :gender,:address, :created_date, :address2, :country, :state, :city, :dob)";
        $stmt = $this->connection->prepare($sql);
        $created_date = date("Y-m-d H:i:s");
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile", $mobile);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":created_date", $created_date);

        //newly added
        $stmt->bindParam(":address2", $address2);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":state", $state);
        $stmt->bindParam(":city", $city);
        $stmt->bindParam(":dob", $dob);

        $res = $stmt->execute();
        $id = $this->connection->lastInsertId();
        $data['userId'] = $id;
        if ($res == 'true')
        {
          $sql = "INSERT INTO " . DBPREFIX . "_userparticipantdetails (name, email, mobile, age, height, weight, gender, address, reguser_id, created_date) VALUES(:name, :email, :mobile, :age, :height, :weight, :gender,:address, :reguser_id, :created_date)";
          $stmt = $this->connection->prepare($sql);
          $created_date = date("Y-m-d H:i:s");
          $name = $firstName . " " . $lastName;
          $stmt->bindParam(":name", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":mobile", $mobile);
          $stmt->bindParam(":age", $age);
          $stmt->bindParam(":height", $height);
          $stmt->bindParam(":weight", $weight);
          $stmt->bindParam(":gender", $gender);
          $stmt->bindParam(":address", $address);
          $stmt->bindParam(":reguser_id", $id);
          $stmt->bindParam(":created_date", $created_date);
          $stmt->execute();
          $status = array(
              'status' => ERR_OK,
              'message' => "Registeration Done Successfully",
              'reguser_id' => $id,
              'registration_id' => $id,
              'userdetails' => $data
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Registeration Not Done "
          );
          return $status;
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function updateUserDetails($data) {
    try {
      extract($data);
      $mobile  = $mobile;
      $email   =  $email;
      $id      =  $userId;
      $userexist = $this->checkEditUserDetails($mobile,$id);
      $emailexist = $this->checkEditUserEmail($email,$id);
      if ($userexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure mobile number already exist"
        );
        return $status;
      }
      else if ($emailexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure email already exist"
        );
        return $status;
      }
      else
      {
        $sql = "UPDATE " . DBPREFIX . "_regestration set `first_name`= :first_name , `last_name`= :last_name, `email`= :email, `mobile`=:mobile,`age`=:age, `height`=:height, `weight`=:weight, `gender`=:gender, `address`=:address, `modified_date`=:modified_date where `registration_id`=:registration_id";
        
        $stmt = $this->connection->prepare($sql);
        $modified_date = date("Y-m-d H:i:s");
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile", $mobile);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":registration_id", $userId);
        $stmt->bindParam(":modified_date", $modified_date);
        $res = $stmt->execute();
        if ($res == 'true')
        {
          $status = array(
                'status' => ERR_OK,
                'message' => "Registeration Details Updated Successfully"
            );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Registeration Details Not Updated "
          );
          return $status;
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function checkEditUserEmail($email,$id)
  {
    $sql = "SELECT count(`registration_id`) as cnt FROM " . DBPREFIX . "_regestration where `email`='$email' and `registration_id`!='$id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_OBJ);
    $cnt = $count->cnt;
    return $cnt;
  }
  public function checkEditUserDetails($mobile,$id)
  {
    $sql = "SELECT count(`registration_id`) as cnt FROM " . DBPREFIX . "_regestration WHERE `mobile`='$mobile'  and `registration_id`!='$id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_OBJ);
    $cnt = $count->cnt;
    return $cnt;
  }
  public function checkUserEmail($email)
  {
    try {
      $sql = "SELECT count(`registration_id`) as cnt FROM " . DBPREFIX . "_regestration where `email`='$email'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function bookingProcess($data) {
    try {
      extract($data);
      $userid = $userId;
      //$mobile = $mobileNumber;
      $trek_fee = $trekFee;
      $trek_id = $id;
      if($userId == '' || $trek_id == '') {
        $status = array(
              'status' => ERR_PARTIAL_CONT,
              'message' => "Please check your details!"
        );
      }else {
        $userdetails['details'] = $this->getSelectedTrekDetails($trek_id);
        $userdetails['batchdates'] = $this->getTrekBatchDates($trek_id);
        $userdetails['rentalitems'] = $this->getTrekRentalItems($id);
        $userdetails['addons'] = $this->getTrekAddons($id);
        $userdetails['termsdetails'] = $this->getTermDetails();
        $userdetails['userdetails'] = $this->getLoginUserDetails($userid);
        $userid = $userdetails['userdetails']->id;
        $userdetails['userparticipants'] = $this->getUserParticipants($userid);
        $userdetails['otherdetails'] = $this->getOtherDetails();

        if ((empty($userdetails)))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Data"
          );
        }else {
          if ((empty($userdetails['details'])) || (empty($userdetails['userdetails']))) {
            $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Data"
            );
          }else {
            $status = array(
                'status' => ERR_OK,
                'message' => "Success.",
                'details' => $userdetails
            );
          }
        }
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
  public function getSelectedTrekDetails($trek_id)
  {
    try {
      $sql = "SELECT t.`trek_id` AS id, t.`trek_title` AS title, t.`trek_fee` AS fee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) as image, t.`trek_overview` AS overview, t.`trek_days` AS days, t.`trek_nights` AS nights, t.`region`, t.`trekvideo_title` AS videoTitle, t.`trekvideo_url` AS videoUrl, t.`status`, t.`season`, t.`things_carry` AS thingstoCarry, concat('".SITEURL."trekthings/details/', t.`trek_id`) as thingsCarryUrl, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`terms`, t.`altitude`, t.`created_date` AS createdDate, t.`gst`, t.`numberofdays`, t.`temperature`, t.`popular_trek` AS popular FROM " . DBPREFIX . "_trekingdetails t  WHERE t.`trek_id` =$trek_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTrekBatchDates($id)
  {
    try{
      $sql="SELECT `batch_id` AS batchId, DATE_FORMAT(`trekstart_date`, '%M %d %Y') as startDate, DATE_FORMAT(`trekend_date`, '%M %d %Y') as endDate, trekbatch_size AS batchSize, trekbatch_status AS batchStatus, trek_id AS id FROM sg_inserttrekbatches where `trek_id`= $id and `trekstart_date`>=CURDATE()";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $batchdates = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $batchdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTermDetails()
  {
    try{
      $sql = "SELECT `terms_title` AS termsTitle, `terms_id` AS termsId, `terms_description` AS termsDescription FROM " . DBPREFIX . "_terms";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $termsdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $termsdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getLoginUserDetails($userId)
  {
    try {
      $sql = "SELECT `registration_id` AS id, `social_id` AS socialId, `first_name` AS firstName, `last_name` AS lastName, `email`, `mobile`, `age`, `height`, `weight`, `gender`, `address`, `created_date` AS createdDate, `modified_date` AS modifiedDate, address2, country, state, city, dob FROM " . DBPREFIX . "_regestration WHERE `registration_id`=$userId";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $userdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getUserParticipants($userid)
  {
    try {
      $sql = "SELECT  `participant_id` AS id, `name`, `email`, `mobile`, `age`, `gender`, `height`, `weight`, `address`, `reguser_id` AS userId, `created_date` AS createdDate, `modified_date` AS modifiedDate FROM " . DBPREFIX . "_userparticipantdetails WHERE `reguser_id`=$userid";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $userparticipants = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $userparticipants;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getOtherDetails()
  {
    try {
      $sql = "SELECT item_name as options FROM " . DBPREFIX . "_general_items WHERE `category` ='How did you find about us?' and status='0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $otherdetails['howdidyoufindus'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      $sql = "SELECT item_name as options FROM " . DBPREFIX . "_general_items WHERE `category` ='Have you trekked with us?' and status='0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $otherdetails['haveyoutravelledwithus'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $otherdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addBookingDetails($data) {
    try {
      extract($data);
      $trekId = $id;
      if($id == '' || $batch == '' || $participantId == '' || $userId == '') {
        $status = array(
          'status' => ERR_PARTIAL_CONT,
          'message' => "Failure! Please check details."
        );
        return $status;
      }
      $trekdetails = $this->getSelectedTrekDetails($id);
      if(empty($trekdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! Trek ID is not valid."
        );
        return $status;
      }
      $userdetails = $this->getLoginUserDetails($userId);
      if(empty($userdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! User ID is not valid."
        );
        return $status;
      }
      $sql = "INSERT INTO " . DBPREFIX . "_bookingdetails (trek_id, batch, trek_fee, created_date, how_did_you_find_us, have_you_trekked_with_us, user_id, accepted_terms, accepted_medical_terms, accepted_liability_terms, secured_my_trip) VALUES(:trek_id, :batch, :trek_fee, :created_date, :how_did_you_find_us, :have_you_trekked_with_us, :user_id, :accepted_terms, :accepted_medical_terms, :accepted_liability_terms, :secured_my_trip)";
      $stmt = $this->connection->prepare($sql);
      $created_date = date("Y-m-d H:i:s");
      $participant_id = $participantId;
      $stmt->bindParam(":trek_id", $id);
      $stmt->bindParam(":batch", $batch);
      $stmt->bindParam(":trek_fee", $fee);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":how_did_you_find_us", $howdidyoufindus);
      $stmt->bindParam(":have_you_trekked_with_us", $haveyoutravelledwithus);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":accepted_terms", $acceptedTerms);
      $stmt->bindParam(":accepted_medical_terms", $acceptedMedicalTerms);
      $stmt->bindParam(":accepted_liability_terms", $acceptedLiabilityTerms);
      $stmt->bindParam(":secured_my_trip", $securedMyTrip);
      $res = $stmt->execute();
      $booking_id = $this->connection->lastInsertId();
      if(isset($booking_id) && $booking_id != '0'){
        $status = $this->insertParticipentsDetails($booking_id, $participant_id);
              
        if(isset($rentalItems) && !empty($rentalItems)) {
          $res = $this->insertBookingRentals($booking_id, $rentalItems);
        }
        if(isset($addons) && !empty($addons)) {
          $res = $this->insertBookingAddons($booking_id, $addons);
        }
      }else {
        $status = array(
          'status' => ERR_NOT_MODIFIED,
          'message' => "Failure! Booking is not added."
        );
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
  public function insertParticipentsDetails($booking_id, $participants)
  {
    try {     
      $participentsid = $participants;
      $s = explode(',', $participentsid);
      $created_date = date("Y-m-d H:i:s");
      foreach ($s as $key => $value)
      {
        $sql = "INSERT INTO sg_participantdetails (name, email, mobile, age, gender, height, weight, booking_id, created_date, part_id)
        SELECT name, email, mobile, age, gender, height, weight, '$booking_id', '$created_date', participant_id
        FROM   sg_userparticipantdetails
        WHERE  participant_id =".$value;
        $stmt = $this->connection->prepare($sql);
        $res = $stmt->execute();
      }
      if ($res == 'true') {
        $query = "UPDATE sg_bookingdetails SET address = (select address from sg_userparticipantdetails where participant_id = '".$participants[0]->participant."') where booking_id = :booking_id"; 
        $stmt2 = $this->connection->prepare($query);
        $stmt2->bindParam(":booking_id", $booking_id);
        $stmt2->execute();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Booking & participents added ",
            'booking_id' => $booking_id
        );
      }else {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Participents are not added "
        );
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
  public function insertBookingRentals($booking_id, $rentalItems) {
    try {     
      extract($rentalItems);
      $created_date = date('Y-m-d H:i:s');
      foreach ($rentalItems as $key => $value)
      {
        $sql = "INSERT INTO `sg_trek_rental_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`, `size`) VALUES ('$booking_id', '".$value->itemId."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0', '".$value->size."')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success rental items added ",
          'booking_id' => $booking_id
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
  public function insertBookingAddons($booking_id, $addons) {
    try {     
      extract($addons);
      $created_date = date('Y-m-d H:i:s');
      foreach ($addons as $key => $value)
      {
        $sql = "INSERT INTO `sg_trek_addon_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`) VALUES ('$booking_id', '".$value->add_on_id."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success Add ons added ",
          'booking_id' => $booking_id
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
  public function paymentPage($data)
  {
    try {
      extract($data);
      $bookingid = $bookingId;
      $payment_type = $paymentType;
      $originalamount = $originalAmount;
      $voucher = $voucher;
      $trek_id = $id;
      $noparticipants = $noparticipants;
      if($bookingid == '' || $paymentType == '' || $originalAmount == '' || $trek_id == '' || $noparticipants == '') {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure, Please Check your data"
        );
        return $status;
      }
      if ($voucher !='')
      {
        $sql = "SELECT * FROM sg_trekcoupons WHERE UPPER(`coupon_code`) = UPPER(trim('$voucher'))  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and (all_treks='1')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($coupondetails)) {
          $discountamount = $noparticipants * $coupondetails->discount_amount;
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2) - $discountamount;
          $status = array(
              'status' => ERR_OK,
              'message' => "Promocodes applied",
              'Amount' => $originalamount,
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'DiscountAmount' => $discountamount,
              'TotalAmount' => $total_amount
            );
          return $status;
        }
        else if($payment_type == 1) {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2);
          $status = array(
            'status' => ERR_NO_DATA,
            'message' => "invalid promocode",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
          );
          return $status;
        }
        else {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $trek_total = (Float)$originalamount + (Float)$gstamount;
          //check rentals
          $sql = "SELECT rental_id FROM sg_trek_rental_bookings WHERE booking_id='".$bookingid."'";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $rentals = $stmt->fetch(PDO::FETCH_OBJ);
          if(empty($rentals)) {
            $advance_amount = (float)($trek_total * (10 / 100));
          }else {
            $advance_amount = (float)($trek_total * (20 / 100));
          }          
          $total_amount = number_format($advance_amount, 2, '.', '');
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "invalid promocode",
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'TotalAmount' => $trek_total,
              'Amount' => $total_amount
          );
          return $status;
        }
      }
      else if ($payment_type == 1)
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $totalamount = (Float)$originalamount + (float)$gstamount;
        $total_amount1 = (Float)(round($totalamount * 100) / 100);
        $total_amount = round($total_amount1, 2);
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
        );
        return $status;
      }
      else
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $trek_total = (Float)$originalamount + (Float)$gstamount;
        //check rentals
        $sql = "SELECT rental_id FROM sg_trek_rental_bookings WHERE booking_id='".$bookingid."'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $rentals = $stmt->fetch(PDO::FETCH_OBJ);
        if(empty($rentals)) {
          $advance_amount = (float)($trek_total * (10 / 100));
        }else {
          $advance_amount = (float)($trek_total * (20 / 100));
        }   
        $total_amount = number_format($advance_amount, 2, '.', '');
        $status = array(
                    'status' => ERR_OK,
                    'message' => "Success",
                    'GST%' => '5%',
                    'GSTAmount' => $gstamount,
                    'TotalAmount' => $trek_total,
                    'Amount' => $total_amount
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
  public function gmailLogin($data) {
    try {
      extract($data);
      $count = $this->checkUserEmail($email);
      if ($count == 0)
      {
        $status = array(
            'status' => "404",
            'message' => "First time login, Please update the profile details"
        );
        return $status;
      }
      else
      {
        $sql = "SELECT * FROM " . DBPREFIX . "_regestration WHERE email='$email'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'userdetails' => $userdetails
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
  public function addUserDetailsGmail($data) {
    try {
      extract($data);
      $userexist = $this->checkUserDetails($mobile);
      $emailexist = $this->checkUserEmail($email);
      if ($userexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure!, Mobile number already exist"
        );
        return $status;   
      }
      else if ($emailexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure!, Email already exist"
        );
        return $status;   
      }
      else
      {
        $sql = "INSERT INTO " . DBPREFIX . "_regestration (first_name, last_name, email, mobile, age, height, weight, gender, address, created_date) VALUES(:first_name, :last_name, :email, :mobile, :age, :height, :weight, :gender,:address, :created_date)";
        $stmt = $this->connection->prepare($sql);
        $created_date = date("Y-m-d H:i:s");
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":last_name", $lastName);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile", $mobile);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":created_date", $created_date);
        $res = $stmt->execute();
        $id = $this->connection->lastInsertId();
        if ($res == 'true')
        {
          $sql = "INSERT INTO " . DBPREFIX . "_userparticipantdetails (name, email, mobile, age, height, weight, gender, address, reguser_id, created_date) VALUES(:name, :email, :mobile, :age, :height, :weight, :gender,:address, :reguser_id, :created_date)";
          $stmt = $this->connection->prepare($sql);
          $created_date = date("Y-m-d H:i:s");
          $name = $firstName . " " . $lastName;
          $stmt->bindParam(":name", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":mobile", $mobile);
          $stmt->bindParam(":age", $age);
          $stmt->bindParam(":height", $height);
          $stmt->bindParam(":weight", $weight);
          $stmt->bindParam(":gender", $gender);
          $stmt->bindParam(":address", $address);
          $stmt->bindParam(":reguser_id", $id);
          $stmt->bindParam(":created_date", $created_date);
          $stmt->execute();
          $status = array(
              'status' => ERR_OK,
              'message' => "Registeration Done Successfully",
              'reguser_id' => $id,
              'registration_id' => $id,
              'userdetails' => $update
          );
          return $status;   
        }
        else
        {
          $status = array(
              'status' => "500",
              'message' => "Failure,Sorry try again"
          );
          return $status;   
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function aboutUsPage() {
    try {
      $sql = "SELECT `page_id` AS pageId, `page_title` AS pageTitle, `page_description` AS pageDescription, `page_status` AS status, `page_image` AS pageImage, `image_type` AS imageType, `created_date` AS createdDate, `modified_date` AS modifiedDate, `createdby` AS createdBy, `modifiedby` AS modifiedBy FROM " . DBPREFIX . "_pages WHERE page_id=1 AND page_status = '0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus['pages'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus['pages'] == '')
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No page is Found "
          );
          return $status; 
      }
      $sql = "SELECT concat('".SITEURL."uploads/pagebanners/', banner_image) as bannerImage, page_title AS pageTitle FROM " . DBPREFIX . "_pagebanner where pagebanner_id ='1'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus['banners'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus['banners'] == '')
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Banner is Found "
          );
          return $status; 
      }
      $sql = "SELECT t.`trek_id` AS trekId, t.`trek_title` AS trekTitle, t.`trek_fee` AS trekFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', t.`trek_image`) as trekImage, t.`trek_overview` AS trekOverview, t.`trek_days` AS trekDays, t.`trek_nights` AS trekNights, t.`region`, t.`trekvideo_title` AS trekVideoTitle, t.`trekvideo_url` AS trekVideoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/treks/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`terms`, t.`altitude`, t.`created_date` AS createdDate, ti.`batch_id` AS batchId FROM " . DBPREFIX . "_trekingdetails t," . DBPREFIX . "_inserttrekbatches ti WHERE t.`trek_id`=ti.`trek_id` and t.`status`='0' and ti.`trekend_date`< now()  order by ti.`trekend_date` desc Limit 6";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus['recenttreks'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ($aboutus['recenttreks'] == '')
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Recent Treks is Found "
          );
          return $status; 
      }
      //print_r($aboutus['pages']);exit;
      $status = array(
          'status' => ERR_OK,
          'message' => "Success ",
          'aboutus' => $aboutus
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
  public function contactUsPage() {
    try {
      $sql = "SELECT concat('".SITEURL."uploads/pagebanners/', banner_image) as bannerImage, page_title AS pageTitle FROM " . DBPREFIX . "_pagebanner WHERE pagebanner_id ='2'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus['banners'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus['banners'] == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Banner is Found "
        );
        return $status;  
      }
      $sql = "SELECT  `contactus_id` AS id, `first_address` AS firstAddress, `second_address` AS secondAddress, `first_contact` AS firstContact, `second_contact` AS secondContact, `website`, `map`, `modified_date` AS modifiedDate, `modified_by` AS modifiedBy FROM " . DBPREFIX . "_contactus";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus['details'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus['details'] == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Details Found "
        );
        return $status;  
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success ",
          'contactus' => $aboutus
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
  public function submitContactUs($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      if($mobile == '' || $email == '') {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure Contact Us Form Not Submitted "
        );
        return $status;   
      }
      $sql = "INSERT INTO " . DBPREFIX . "_getincontacts (name, mobile, email,  subject, message,  created_date) VALUES('$name', '$mobile', '$email', '$subject', '$message', '$created_date')";
      $stmt = $this->connection->prepare($sql);
      $res = $stmt->execute();
      if ($res == 1)
      {
        $email1 = ADMIN_EMAIL;
        $subject1 = "Enquiry From Contact us Form";
        $message1 = '<p style="color:black;"><strong>User enquired with below details</strong></p>';
        $message1 .= "<html>
          <head>
              <title>'User enquired with below details'</title>
          </head>
          <body>
              <table>
                  <tr>
                        <td width='100'>Name</td>
                        <td width='10'> : </td>
                        <td width='350'>" . $name . "</td>
                  </tr>
                  <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>" . $email . "</td>
                  </tr>
                  <tr>
                        <td>Mobile</td>
                        <td> : </td>
                        <td>" . $mobile . "</td>
                    </tr>
                  <tr>
                        <td>Subject</td>
                        <td> : </td>
                        <td>" . $subject . "</td>
                  </tr>
                  <tr>
                        <td>Message</td>
                        <td> : </td>
                        <td>" . $message . "</td>
                  </tr>
                  
              </table>
          </body>
        </html>";
        $smtpemail = new smtpHelper;
        $smtpemail->email = $email1;
        $smtpemail->subject = $subject1;
        $smtpemail->message = $message1;
        //$smtp = $smtpemail->SendEmail();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Contact Us Form Submitted Successfully."
        );
        return $status;    
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Contact Us Form Not Submitted "
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
  public function termsPrivacyPage() {
    try {
      $sql = "SELECT `terms_id` AS id, `terms_description` AS description, `created_date` AS createdDate, `modified_date` AS modifiedDate, `terms_title` As title FROM " . DBPREFIX . "_terms";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $termsprivacy['termscondition'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($termsprivacy['termscondition'] == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No terms&condition is Found "
        );
        return $status;
      }
      $sql = "SELECT `privacy_id` AS id, `privacy_description` AS description, `created_date` AS createdDate, `modified_date` AS modifiedDate, `privacy_title` As title  FROM " . DBPREFIX . "_privacypolicy";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $termsprivacy['privacypolicy'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ($termsprivacy['privacypolicy'] == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No privacypolicy is Found "
        );
        return $status;
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success.",
          'termsprivacy' => $termsprivacy
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
  public function medicalPage() {
    try {
      $sql = "SELECT `page_id` AS pageId, `page_title` AS pageTitle, `page_description` AS pageDescription, `page_status` AS status, `page_image` AS pageImage, `image_type` AS imageType, `created_date` AS createdDate, `modified_date` AS modifiedDate, `createdby` AS createdBy, `modifiedby` AS modifiedBy FROM " . DBPREFIX . "_pages WHERE page_id=2 AND page_status = '0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus == '')
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No page is Found "
          );
          return $status; 
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success.",
          'medical' => $aboutus
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
  public function liabilitiesPage() {
    try {
      $sql = "SELECT `page_id` AS pageId, `page_title` AS pageTitle, `page_description` AS pageDescription, `page_status` AS status, `page_image` AS pageImage, `image_type` AS imageType, `created_date` AS createdDate, `modified_date` AS modifiedDate, `createdby` AS createdBy, `modifiedby` AS modifiedBy FROM " . DBPREFIX . "_pages WHERE page_id=3 AND page_status = '0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $aboutus = $stmt->fetch(PDO::FETCH_OBJ);
      if ($aboutus == '')
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No page is Found "
          );
          return $status; 
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success.",
          'liabilities' => $aboutus
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
  public function testimonialsPage() {
    try {
      $sql = "SELECT * FROM sg_testimonials WHERE status='0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $testimonials = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ($testimonials == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No testimonials is Found "
        );
        return $status;
      }      
      $status = array(
          'status' => ERR_OK,
          'message' => "Success.",
          'testimonials' => $testimonials
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
  public function tripBookingProcess($data) {
    try {
      extract($data);
      $userid = $userId;
      //$mobile = $mobileNumber;
      $trip_fee = $tripFee;
      $trip_id = $id;
      if($userId == '' || $trip_id == '') {
        $status = array(
              'status' => ERR_PARTIAL_CONT,
              'message' => "Please check your details!"
        );
        return $status;
      }
      $userdetails['details'] = $this->getSelectedTripDetails($trip_id);
      $userdetails['batchdates'] = $this->getTripBatchDates($trip_id);
      $userdetails['rentalitems']  = $this->getTripRentalItems($id);
      $userdetails['addons']  = $this->getTripAddons($id);
      $userdetails['termsdetails'] = $this->getTermDetails();
      $userdetails['userdetails'] = $this->getLoginUserDetails($userId);
      $userid = $userdetails['userdetails']->id;
      $userdetails['userparticipants'] = $this->getUserParticipants($userid);
      $userdetails['otherdetails'] = $this->getOtherDetails();

      if ((empty($userdetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Booking Process Failed "
        );
        return $status;   
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success.",
          'userdetails' => $userdetails
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
  public function getSelectedTripDetails($trip_id)
  {
    try {
      $sql = "SELECT t.`biketrips_id` AS id,t.`trip_title` AS title, `trip_fee` AS fee, t.`trip_discount` AS discountFee, gettrekdifficulty(t.`difficulty`) as difficultyName, `visit_time` AS visitTime, concat('".SITEURL."uploads/biketrips/', t.`trip_image`) as image, t.`trip_overview` AS overview, t.`trip_days` AS days, t.`trip_nights` AS nights, t.`region`, t.`tripvideo_title` AS videoTitle, t.`tripvideo_url` AS videoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, t.`altitude`, t.`created_date` AS createdDate,gettrekregion(t.`region`) as regionName, t.`gst`, t.`temparature`, t.`popular_trips` AS popular, (SELECT tr.terrain_name FROM sg_biketerrains tr WHERE tr.terrain_id=t.terrain_id LIMIT 0,1)  AS terrain FROM sg_biketrips t  WHERE t.`biketrips_id` =$trip_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTripBatchDates($id)
  {
    try{
      $sql="SELECT `tripbatch_id` AS batchId, DATE_FORMAT(`tripstart_date`, '%M %d %Y') as startDate, DATE_FORMAT(`tripend_date`, '%M %d %Y') as endDate, tripbatch_size AS batchSize, tripbatch_status AS batchStatus, trip_id AS id FROM sg_tripbatches where `trip_id`= $id and `tripstart_date`>=CURDATE()";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $batchdates = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $batchdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addTripBookingDetails($data) {
    try {
      extract($data);
      $tripId = $id;
      if($id == '' || $batch == '' || $participantId == '' || $userId == '') {
        $status = array(
          'status' => ERR_PARTIAL_CONT,
          'message' => "Failure! Please check details."
        );
        return $status;
      }
      $trekdetails = $this->getSelectedTripDetails($id);
      if(empty($trekdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! Trip ID is not valid."
        );
        return $status;
      }
      $userdetails = $this->getLoginUserDetails($userId);
      if(empty($userdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! User ID is not valid."
        );
        return $status;
      }
      $sql = "INSERT INTO sg_tripbookingdetails (trip_id, batch, trip_fee, created_date, how_did_you_find_us, have_you_trekked_with_us, user_id, accepted_terms, accepted_medical_terms, accepted_liability_terms, secured_my_trip) VALUES(:trip_id, :batch, :trip_fee, :created_date, :how_did_you_find_us, :have_you_trekked_with_us, :user_id, :accepted_terms, :accepted_medical_terms, :accepted_liability_terms, :secured_my_trip)";
      $stmt = $this->connection->prepare($sql);
      $created_date = date("Y-m-d H:i:s");
      $participant_id = $participantId;
      $acceptedTerms = '1';
      $acceptedMedicalTerms = '1';
      $acceptedLiabilityTerms = '1';
      $securedMyTrip = '1';
      $stmt->bindParam(":trip_id", $tripId);
      $stmt->bindParam(":batch", $batch);
      $stmt->bindParam(":trip_fee", $fee);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":how_did_you_find_us", $howdidyoufindus);
      $stmt->bindParam(":have_you_trekked_with_us", $haveyoutravelledwithus);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":accepted_terms", $acceptedTerms);
      $stmt->bindParam(":accepted_medical_terms", $acceptedMedicalTerms);
      $stmt->bindParam(":accepted_liability_terms", $acceptedLiabilityTerms);
      $stmt->bindParam(":secured_my_trip", $securedMyTrip);
      $res = $stmt->execute();
      $booking_id = $this->connection->lastInsertId();
      if(isset($booking_id) && $booking_id != '0'){
        $status = $this->insertTripParticipentsDetails($booking_id, $participant_id);
              
        if(isset($rentalItems) && !empty($rentalItems)) {
          $res = $this->insertTripBookingRentals($booking_id, $rentalItems);
        }
        if(isset($addons) && !empty($addons)) {
          $res = $this->insertTripBookingAddons($booking_id, $addons);
        }
      }else {
        $status = array(
          'status' => ERR_NOT_MODIFIED,
          'message' => "Failure! Booking is not added."
        );
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
  public function insertTripBookingRentals($booking_id, $rentalItems) {
    try {     
      extract($rentalItems);
      $created_date = date('Y-m-d H:i:s');
      foreach ($rentalItems as $key => $value)
      {
        $sql = "INSERT INTO `sg_trip_rental_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`, `size`) VALUES ('$booking_id', '".$value->itemId."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0', '".$value->size."')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success rental items added ",
          'booking_id' => $booking_id
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
  public function insertTripBookingAddons($booking_id, $addons) {
    try {     
      extract($addons);
      $created_date = date('Y-m-d H:i:s');
      foreach ($addons as $key => $value)
      {
        $sql = "INSERT INTO `sg_trip_addon_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`) VALUES ('$booking_id', '".$value->add_on_id."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success Add-ons added ",
          'booking_id' => $booking_id
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
  public function insertTripParticipentsDetails($booking_id, $participants)
  {
    try {     
      $participentsid = $participants;
      $s = explode(',', $participentsid);
      foreach ($s as $key => $value)
      {
        $sql = "INSERT INTO sg_tripparticipantdetails (name, email, mobile, age, gender, height, weight, tripbooking_id, created_date) SELECT name, email, mobile, age, gender, height, weight,$booking_id,created_date        FROM   sg_userparticipantdetails        WHERE  participant_id =".$value;
        $stmt = $this->connection->prepare($sql);
        $res = $stmt->execute();
      }
      if ($res == 'true') {
        $query = "UPDATE sg_tripbookingdetails SET address = (select address from sg_userparticipantdetails where participant_id = '".$participants[0]->participant."') where tripbooking_id = :booking_id"; 
        $stmt2 = $this->connection->prepare($query);
        $stmt2->bindParam(":booking_id", $booking_id);
        $stmt2->execute();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Booking & participents added ",
            'booking_id' => $booking_id
        );
      }else {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Participents are not added "
        );
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
  public function tripPaymentPage($data)
  {
    try {
      extract($data);
      $bookingid = $bookingId;
      $payment_type = $paymentType;
      $originalamount = $originalAmount;
      $voucher = $voucher;
      $trip_id = $id;
      $noparticipants = $noparticipants;
      if($bookingid == '' || $paymentType == '' || $originalAmount == '' || $trip_id == '' || $noparticipants == '') {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure, Please Check your data"
        );
        return $status;
      }
      if ($voucher !='')
      {
        $sql = "SELECT * FROM sg_tripcoupons WHERE UPPER(`coupon_code`) = UPPER(trim('$voucher'))  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and `trip_id`=$trip_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($coupondetails)) {
          $discountamount = $noparticipants * $coupondetails->discount_amount;
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2) - $discountamount;
          $status = array(
              'status' => ERR_OK,
              'message' => "Promocodes applied",
              'Amount' => $originalamount,
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'Discountamount' => $discountamount,
              'TotalAmount' => $total_amount
            );
          return $status;
        }
        else if($payment_type == 1) {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2);
          $status = array(
            'status' => ERR_NO_DATA,
            'message' => "invalid promocode",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
          );
          return $status;
        }
        else {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $trek_total = (Float)$originalamount + (Float)$gstamount;
          //check rentals
          $sql = "SELECT rental_id FROM sg_trip_rental_bookings WHERE booking_id='".$bookingid."'";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $rentals = $stmt->fetch(PDO::FETCH_OBJ);
          if(empty($rentals)) {
            $advance_amount = (float)($trek_total * (10 / 100));
          }else {
            $advance_amount = (float)($trek_total * (20 / 100));
          }   
          $total_amount = number_format($advance_amount, 2, '.', '');
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "invalid promocode",
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'TotalAmount' => $trek_total,
              'Amount' => $total_amount
          );
          return $status;
        }
      }
      else if ($payment_type == 1)
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $totalamount = (Float)$originalamount + (float)$gstamount;
        $total_amount1 = (Float)(round($totalamount * 100) / 100);
        $total_amount = round($total_amount1, 2);
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
        );
        return $status;
      }
      else
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $trek_total = (Float)$originalamount + (Float)$gstamount;
        //check rentals
          $sql = "SELECT rental_id FROM sg_trip_rental_bookings WHERE booking_id='".$bookingid."'";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $rentals = $stmt->fetch(PDO::FETCH_OBJ);
          if(empty($rentals)) {
            $advance_amount = (float)($trek_total * (10 / 100));
          }else {
            $advance_amount = (float)($trek_total * (20 / 100));
          }   
        $total_amount = number_format($advance_amount, 2, '.', '');
        $status = array(
                    'status' => ERR_OK,
                    'message' => "Success",
                    'GST%' => '5%',
                    'GSTAmount' => $gstamount,
                    'TotalAmount' => $trek_total,
                    'Amount' => $total_amount
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
  /*
  Expeditions
  */
  public function expeditionBookingProcess($data) {
    try {
      extract($data);
      $userid = $userId;
      //$mobile = $mobileNumber;
      $expedition_fee = $expeditionFee;
      $expedition_id = $id;
      if($userId == '' || $expedition_id == '') {
        $status = array(
              'status' => ERR_PARTIAL_CONT,
              'message' => "Please check your details!"
        );
        return $status;
      }
      $userdetails['details'] = $this->getSelectedExpeditionDetails($expedition_id);
      $userdetails['batchdates'] = $this->getExpeditionBatchDates($expedition_id);
      $userdetails['addons']  = $this->getExpeditionAddons($id);
      $userdetails['rentalitems']  = $this->getExpeditionRentalItems($id);
      $userdetails['termsdetails'] = $this->getTermDetails();
      $userdetails['userdetails'] = $this->getLoginUserDetails($userId);
      $userid = $userdetails['userdetails']->id;
      $userdetails['userparticipants'] = $this->getUserParticipants($userid);
      $userdetails['otherdetails'] = $this->getOtherDetails();

      if ((empty($userdetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;   
      }else {
        if ((empty($userdetails['details'])) || (empty($userdetails['userdetails']))) {
          $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
          );
        }else {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'details' => $userdetails
          );
        }
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
  public function getSelectedExpeditionDetails($expedition_id)
  {
    try {
      $sql = "SELECT t.`expedition_id` AS id, t.`expedition_title` AS title, t.`expedition_fee` AS fee, t.`expedition_discount` AS discountFee, t.`visit_time` AS visitTime, t.`time_visit` AS timeVisit, concat('".SITEURL."uploads/expeditions/', t.`expedition_image`) AS image, t.`expedition_overview` AS overview, t.`expedition_days` AS days, t.`expedition_nights` AS nights, t.`region`, t.`expeditionvideo_title` AS videoTitle, t.`expeditionvideo_url` AS videoUrl, t.`status`, t.`season`, t.`things_carry` AS thingsCarry, concat('".SITEURL."uploads/expeditions/overview/', t.`overview_image`) as bannerImage, t.`map_image` AS mapImage, t.`terms`, t.`altitude`, t.`created_date` AS createdDate FROM sg_expeditions t  WHERE t.`expedition_id` =$expedition_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdetails;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getExpeditionBatchDates($id)
  {
    try{
      $sql="SELECT `batch_id` AS batchId, DATE_FORMAT(`expeditionstart_date`, '%M %d %Y') as startDate, DATE_FORMAT(`expeditionend_date`, '%M %d %Y') as endDate, expeditionbatch_size AS batchSize, expeditionbatch_status AS batchStatus, expedition_id AS id FROM sg_expeditionbatches where `expedition_id`= $id and `expeditionstart_date`>=CURDATE()";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $batchdates = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $batchdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function addExpeditionBookingDetails($data) {
    try {
      extract($data);
      $tripId = $id;
      if($id == '' || $batch == '' || $participantId == '' || $userId == '') {
        $status = array(
          'status' => ERR_PARTIAL_CONT,
          'message' => "Please check details."
        );
        return $status;
      }
      $trekdetails = $this->getSelectedExpeditionDetails($id);
      if(empty($trekdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "ID is not valid."
        );
        return $status;
      }
      $userdetails = $this->getLoginUserDetails($userId);
      if(empty($userdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "User ID is not valid."
        );
        return $status;
      }
      $sql = "INSERT INTO sg_expeditionbookings (expedition_id, batch, expedition_fee, created_date, how_did_you_find_us, have_you_trekked_with_us, user_id, accepted_terms, accepted_medical_terms, accepted_liability_terms, secured_my_trip) VALUES(:expedition_id, :batch, :expedition_fee, :created_date, :how_did_you_find_us, :have_you_trekked_with_us, :user_id, :accepted_terms, :accepted_medical_terms, :accepted_liability_terms, :secured_my_trip)";
      $stmt = $this->connection->prepare($sql);
      $created_date = date("Y-m-d H:i:s");
      $participant_id = $participantId;
      $stmt->bindParam(":expedition_id", $id);
      $stmt->bindParam(":batch", $batch);
      $stmt->bindParam(":expedition_fee", $fee);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":how_did_you_find_us", $aboutUs);
      $stmt->bindParam(":have_you_trekked_with_us", $trekkedWithUs);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":accepted_terms", $acceptedTerms);
      $stmt->bindParam(":accepted_medical_terms", $acceptedMedicalTerms);
      $stmt->bindParam(":accepted_liability_terms", $acceptedLiabilityTerms);
      $stmt->bindParam(":secured_my_trip", $securedMyTrip);
      $res = $stmt->execute();
      $booking_id = $this->connection->lastInsertId();
      if(isset($booking_id) && $booking_id != '0'){
        $status = $this->insertExpeditionParticipentsDetails($booking_id, $participant_id);
              
        if(isset($rentalItems) && !empty($rentalItems)) {
          $res = $this->insertExpBookingRentals($booking_id, $rentalItems);
        }
        if(isset($addons) && !empty($addons)) {
          $res = $this->insertExpBookingAddons($booking_id, $addons);
        }
      }else {
        $status = array(
          'status' => ERR_NOT_MODIFIED,
          'message' => "Failure! Booking is not added."
        );
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
  public function insertExpBookingRentals($booking_id, $rentalItems) {
    try {     
      extract($rentalItems);
      $created_date = date('Y-m-d H:i:s');
      foreach ($rentalItems as $key => $value)
      {
        $sql = "INSERT INTO `sg_exp_rental_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`, `size`) VALUES ('$booking_id', '".$value->itemId."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0', '".$value->size."')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success rental items added ",
          'booking_id' => $booking_id
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
  public function insertExpBookingAddons($booking_id, $addons) {
    try {     
      extract($addons);
      $created_date = date('Y-m-d H:i:s');
      foreach ($addons as $key => $value)
      {
        $sql = "INSERT INTO `sg_exp_addon_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`) VALUES ('$booking_id', '".$value->add_on_id."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success add-ons added ",
          'booking_id' => $booking_id
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
  public function insertExpeditionParticipentsDetails($booking_id, $participants)
  {
    try {     
      $participentsid = $participants;
      $s = explode(',', $participentsid);
      foreach ($s as $key => $value)
      {
        $sql = "INSERT INTO sg_expeditionparticipants (name, email, mobile, age, gender, height, weight, booking_id, created_date)
        SELECT name, email, mobile, age, gender, height, weight,$booking_id,created_date
        FROM   sg_userparticipantdetails
        WHERE  participant_id =".$value;
        $stmt = $this->connection->prepare($sql);
        $res = $stmt->execute();
      }
      if($res == 'true') {
        $query = "UPDATE sg_expeditionbookings SET address = (select address from sg_userparticipantdetails where participant_id = '".$participants[0]->participant."') where booking_id = :booking_id"; 
        $stmt2 = $this->connection->prepare($query);
        $stmt2->bindParam(":booking_id", $booking_id);
        $stmt2->execute();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success participents  added ",
            'booking_id' => $booking_id
        );
      }else {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Participents are not added "
        );
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
  public function expeditionPaymentPage($data)
  {
    try {
      extract($data);
      $bookingid = $bookingId;
      $payment_type = $paymentType;
      $originalamount = $originalAmount;
      $voucher = $voucher;
      $expedition_id = $id;
      $noparticipants = $noparticipants;
      if ($voucher !='')
      {
        $sql = "SELECT * FROM sg_expeditioncoupons WHERE UPPER(`coupon_code`) = UPPER(trim('$voucher'))  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and `expedition_id`=$expedition_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($coupondetails)) {
          $discountamount = $noparticipants * $coupondetails->discount_amount;
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2) - $discountamount;
          $status = array(
              'status' => ERR_OK,
              'message' => "Promocodes applied",
              'Amount' => $originalamount,
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'Discountamount' => $discountamount,
              'TotalAmount' => $total_amount
            );
          return $status;
        }
        else if($payment_type == 1) {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2);
          $status = array(
            'status' => ERR_NO_DATA,
            'message' => "invalid promocode",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
          );
          return $status;
        }
        else {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $trek_total = (Float)$originalamount + (Float)$gstamount;
          //check rentals
          $sql = "SELECT rental_id FROM sg_exp_rental_bookings WHERE booking_id='".$bookingid."'";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $rentals = $stmt->fetch(PDO::FETCH_OBJ);
          if(empty($rentals)) {
            $advance_amount = (float)($trek_total * (10 / 100));
          }else {
            $advance_amount = (float)($trek_total * (20 / 100));
          }   
          $total_amount = number_format($advance_amount, 2, '.', '');
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "invalid promocode",
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'TotalAmount' => $trek_total,
              'Amount' => $total_amount
          );
          return $status;
        }
      }
      else if ($payment_type == 1)
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $totalamount = (Float)$originalamount + (float)$gstamount;
        $total_amount1 = (Float)(round($totalamount * 100) / 100);
        $total_amount = round($total_amount1, 2);
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
        );
        return $status;
      }
      else
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $trek_total = (Float)$originalamount + (Float)$gstamount;
        //check rentals
        $sql = "SELECT rental_id FROM sg_exp_rental_bookings WHERE booking_id='".$bookingid."'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $rentals = $stmt->fetch(PDO::FETCH_OBJ);
        if(empty($rentals)) {
          $advance_amount = (float)($trek_total * (10 / 100));
        }else {
          $advance_amount = (float)($trek_total * (20 / 100));
        }  
        $total_amount = number_format($advance_amount, 2, '.', '');
        $status = array(
                    'status' => ERR_OK,
                    'message' => "Success",
                    'GST%' => '5%',
                    'GSTAmount' => $gstamount,
                    'TotalAmount' => $trek_total,
                    'Amount' => $total_amount
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
  public function getTransactionDetails($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;

      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
          $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
          $condition .= " or ";
      }
      if(isset($email) && $email!=''){
          $condition .= "bb.`email`= '$email'";
      }
      $condition = '';
      if(isset($userId) && $userId!=''){
          $condition .= "b.`user_id`= '$userId'";
      }
      $sql = "select *
from (SELECT DISTINCT(pm.`txn_id`) As txnId, b.`trek_id` AS id, pm.`payment_id` AS paymentId, concat('RS ',pm.`amount`) as amountPaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txnDate, gettrekname(b.`trek_id`) as title, pm.email, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, 'Trek' AS type, pm.`created_date` AS createdDate FROM sg_paymentdetails pm inner join sg_bookingdetails b on pm.`booking_id` = b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id` = b.`booking_id` WHERE $condition 
      UNION ALL
      SELECT DISTINCT(pm.`txn_id`) As txnId, b.`trip_id`AS id, pm.`trippayment_id` AS paymentId, concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txnDate, gettripname(b.`trip_id`) as title,  pm.email, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, 'Bike Trip' AS type, pm.`created_date` AS createdDate  FROM sg_trippaymentdetails pm inner join sg_tripbookingdetails b on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id` = b.`tripbooking_id` WHERE $condition  
      UNION ALL
      SELECT DISTINCT(pm.`txn_id`) As txnId,b.`expedition_id` AS id,pm.`payment_id` AS paymentId, concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txnDate, getexpeditionname(b.`expedition_id`) as title, pm.email, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, 'Expedition' AS type, pm.`created_date` AS createdDate FROM sg_expeditionpayments pm inner join sg_expeditionbookings b on pm.`booking_id` = b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id` = b.`booking_id` WHERE $condition  
      UNION ALL
      SELECT DISTINCT(pm.`txn_id`)As txnId, b.`lp_id` AS id, pm.`lppayment_id` AS paymentId,  concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txnDate, getlpname(b.`lp_id`) as title, pm.email, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, 'Leisure Package' AS type, pm.`created_date` AS createdDate FROM sg_lppaymentdetails pm inner join sg_lpbookingdetails b on pm.`lpbooking_id` = b.`booking_id` inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id` = b.`booking_id` WHERE $condition) a ORDER BY createdDate DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status; 
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function viewInvoice($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,getparticipantscount(b.`booking_id`) as personcnt,COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount,COALESCE(pm.`payment_type`,0) as payment_type,gettrekname(b.`trek_id`) as trek_title,get_trekfee(b.`booking_id`) as trek_fee,ib.`trekstart_date`,ib.`trekend_date`,pm.`txn_id`,pm.`created_date` as txn_date,p.`name`,p.`email`,p.`mobile`,'' as trekamount,'' as bookingamount,'' as gstamount,'' as totalamount,'' as pending_amount,'' as discount FROM " . DBPREFIX . "_bookingdetails b inner join " . DBPREFIX . "_paymentdetails pm on pm.`booking_id` = b.`booking_id` inner join " . DBPREFIX . "_inserttrekbatches ib on b.`batch` = ib.`batch_id` inner join " . DBPREFIX . "_participantdetails p on p.`booking_id`=b.`booking_id` WHERE pm.`payment_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      $trekamount = $transactiondetails['invoicedetails']->trek_fee;
      $transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pd($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = round($pending_amount, 2);
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function pd($id)
  {
      $sql = "SELECT p.`name`,p.`mobile`,p.`email`, p.age, p.gender FROM sg_participantdetails p,sg_bookingdetails b,sg_paymentdetails pm where p.`booking_id`=b.`booking_id` and b.`booking_id`=pm.`booking_id` and pm.`payment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pd = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $pd;
  }
  public function pdTrip($id)
  {
      $sql = "SELECT p.`name`,p.`mobile`,p.`email` FROM sg_tripparticipantdetails p,sg_tripbookingdetails b,sg_trippaymentdetails pm where p.`tripbooking_id`=b.`tripbooking_id` and b.`tripbooking_id`=pm.`tripbooking_id` and pm.`trippayment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pd = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $pd;
  }
  public function pdExp($id)
  {
      $sql = "SELECT p.`name`,p.`mobile`,p.`email` FROM sg_expeditionparticipants p,sg_expeditionbookings b,sg_expeditionpayments pm where p.`booking_id`=b.`booking_id` and b.`booking_id`=pm.`booking_id` and pm.`payment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pd = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $pd;
  }
  public function pdLp($id)
  {
      $sql = "SELECT p.`name`,p.`mobile`,p.`email`, p.age, p.gender FROM sg_lpparticipantdetails p,sg_lpbookingdetails b,sg_lppaymentdetails pm where p.`booking_id`=b.`booking_id` and b.`booking_id`=pm.`lpbooking_id` and pm.`lppayment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pd = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $pd;
  }
  public function getBookingDetails($id)
  {
      $sql = "SELECT b.`trek_id`,b.`booking_id`,b.`batch`,t.`trek_fee` as amount,t.`trek_title`,p.`name` as firstname ,getparticipantscount(b.`booking_id`) as personscount ,p.`email`,p.`mobile` as phone ,p.`participant_id` FROM " . DBPREFIX . "_bookingdetails b inner join " . DBPREFIX . "_trekingdetails t on b.`trek_id`=t.`trek_id` inner join " . DBPREFIX . "_participantdetails p on p.`booking_id`=b.`booking_id` where b.`booking_id`=$id order by p.`participant_id` ";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $bookingdetails;
  }
  public function getBDetails($data) {
    try {
      extract($data);
      $condition = '';
      // if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
      //   $condition .= "bb.`phone`  like '%$mobile%'";
      // }
      // if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
      //   $condition .= " or ";
      // }
      // if(isset($email) && $email!=''){
      //   $condition .= "bb.`email`= '$email'";
      // }
      if(isset($userId) && $userId!=''){
        $condition .= "b.`user_id`= '$userId'";
      }
      $sql = "SELECT DISTINCT(b.`booking_id`) AS bookingId, pm.`amount`, pm. `payment_id` AS paymentId, COALESCE(pm.`original_amount`,pm.`amount`,0) as originalAmount, getparticipantscount(b.`booking_id`) as personCnt, t.`trek_id` AS id, t.`trek_title` AS title, t.`trek_fee` AS fee, b.`booking_id` AS bookingId, ib.`batch_id` AS batchId, DATE_FORMAT(ib.`trekstart_date`,'%d %M,%Y') as `startDate`, DATE_FORMAT(ib.`trekend_date`,'%d %M,%Y') as `endDate`, pm.`amount`, getcurrentstatus(b.`booking_id`) as paymentType, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, t.gst, 'Trek' AS type, b.created_date AS booking_date  FROM sg_trekingdetails t inner join sg_bookingdetails b on b.`trek_id` = t.`trek_id` INNER JOIN sg_inserttrekbatches ib on b.`batch` = ib.`batch_id`  INNER JOIN sg_paymentdetails pm on pm.`booking_id` = b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` where $condition   
        UNION ALL
        SELECT DISTINCT(b.`tripbooking_id`) AS bookingId, pm.`amount`, pm. `trippayment_id` AS paymentId, COALESCE(pm.`original_amount`,pm.`amount`,0) as originalAmount, getparticipantscount(b.`tripbooking_id`) as personCnt, t.`biketrips_id` AS id, t.`trip_title` AS title, t.`trip_fee` AS fee, b.`tripbooking_id` AS bookingId, ib.`tripbatch_id` AS batchId, DATE_FORMAT(ib.`tripstart_date`,'%d %M,%Y') as `startDate`,  DATE_FORMAT(ib.`tripend_date`,'%d %M,%Y') as `endDate`, pm.`amount`, getcurrentstatus(b.`tripbooking_id`) as  paymentType, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, t.gst, 'Bike Trip' AS type, b.created_date AS booking_date  FROM sg_biketrips t inner join sg_tripbookingdetails b on b.`trip_id` = t.`biketrips_id` INNER JOIN  sg_tripbatches ib on b.`batch` = ib.`tripbatch_id`  INNER JOIN sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id`  inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id`  where $condition
        UNION ALL
        SELECT DISTINCT(b.`booking_id`) AS bookingId, pm.`amount`, pm. `payment_id` AS paymentId, COALESCE(pm.`original_amount`,pm.`amount`,0) as originalAmount, getparticipantscount(b.`booking_id`) as personCnt, t.`expedition_id` AS id, t.`expedition_title` AS title, t.`expedition_fee` AS fee, b.`booking_id` AS bookingId, ib.`batch_id` AS batchId, DATE_FORMAT(ib.`expeditionstart_date`,'%d %M,%Y') as `startDate`, DATE_FORMAT(ib.`expeditionend_date`,'%d %M,%Y') as `endDate`, pm.`amount`, getcurrentstatus(b.`booking_id`) as paymentType, if(pm.`payment_type`='2','Advance Payment','Full Payment') as paymentMode, t.gst, 'Expedition' AS type, b.created_date AS booking_date  FROM sg_expeditions t inner join sg_expeditionbookings b on b.`expedition_id` = t.`expedition_id` INNER JOIN  sg_expeditionbatches ib on b.`batch` = ib.`batch_id`  INNER JOIN sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id`  inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id`  where $condition ";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($bookingdetails as $key => $value) {
        $payment_id = $value->paymentId;
        $bookingdetails[$key]->invoiceUrl = SITEURL."ridingsolo/downloadinvoice/".$this->base64_url_encode($payment_id)."?type=".$value->type;   
      }
      if ((empty($bookingdetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;     
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'bookingdetails' => $bookingdetails
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
  public function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
  }
  public function viewInvoiceBD($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.payment_id AS invoice_no, pm.`amount`,getparticipantscount(b.`booking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, gettrekname(b.`trek_id`) as trek_title, get_trekfee(b.`booking_id`) as trek_fee, ib.`trekstart_date`, ib.`trekend_date`, pm.`txn_id`, pm.`created_date` as txn_date, b.address, b.city, b.state, b.pincode, '' AS rentalItems, '' AS addons, b.`booking_id` FROM " . DBPREFIX . "_bookingdetails b inner join " . DBPREFIX . "_paymentdetails pm on pm.`booking_id` = b.`booking_id` inner join " . DBPREFIX . "_inserttrekbatches ib on b.`batch` = ib.`batch_id`  WHERE pm.`payment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      $booking_id = $transactiondetails['invoicedetails']->booking_id;
      //print_r($transactiondetails['invoicedetails']);exit;
      $trekamount = $transactiondetails['invoicedetails']->trek_fee;
      $transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pd($id);
      $transactiondetails['rentalItems'] = $this->getrentalbookings($booking_id);
      $transactiondetails['addons'] = $this->getaddonsbookings($booking_id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = round($pending_amount, 2);
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure"
          );
          return $status;
      }
      else
      {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'bookingdetails' => $transactiondetails
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
  public function getAllUserParticipantDetails($data) {
    try {
      extract($data);
      $reg_id = $registeration_id;   
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;

      $sql = "SELECT `participant_id` AS participantId,`name`,`email`,`mobile`,`age`,`gender`,`height`,`weight`,`address`, created_date As createdDate FROM " . DBPREFIX . "_userparticipantdetails  WHERE reguser_id = '$reg_id' AND (status IS NULL OR status != '9') LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $editdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      if (empty($editdetails))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'participants' => $editdetails
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
  public function checkEditUserParticipantDetails($mobile, $reg_id,$participant_id)
  {
    try {
      $sql = "SELECT count(`participant_id`) as cnt FROM " . DBPREFIX . "_userparticipantdetails where `mobile`= '$mobile' and `reguser_id`= '$reg_id' and participant_id != '$participant_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function userEditEmailVerification($email, $reg_id, $participant_id)
  {
    try {
      $sql = "SELECT count(`participant_id`) as cnt FROM " . DBPREFIX . "_userparticipantdetails where `email`='$email' and `reguser_id`= '$reg_id' and participant_id != '$participant_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_OBJ);
      $cnt = $count->cnt;
      return $cnt;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getEditTrekkerDetails($data) {
    try {
      extract($data);
      $participant_id = $participant_id;
      $sql = "SELECT `participant_id`,`name`,`email`,`mobile`,`age`,`gender`,`height`,`weight`,`address` FROM " . DBPREFIX . "_userparticipantdetails WHERE `participant_id`=$participant_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $editdetails = $stmt->fetch(PDO::FETCH_OBJ);
      if (empty($editdetails))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'editdetails' => $editdetails
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
  public function updateUserParticipantDetails($data) {
    try {
      extract($data);
      $name = $name;
      $email = $email;
      $mobile = $mobile;
      $age = $age;
      $gender = $gender;
      $height = $height;
      $weight = $weight;
      $address = $address;
      $participant_id = $participant_id;
      $reg_id = $registeration_id;
      $userexist = $this->checkEditUserParticipantDetails($mobile, $reg_id, $participant_id);
      $emailexist = $this->userEditEmailVerification($email, $reg_id, $participant_id);
      if ($userexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure mobile number already exist"
        );
        return $status;  
      }
      else if ($emailexist !== '0')
      {
        $status = array(
            'status' => ERR_EXISTS,
            'message' => "Failure email already exist"
        );
        return $status;  
      }
      else
      {
        if(isset($participant_id)) {
          $sql = "Update  " . DBPREFIX . "_userparticipantdetails SET name=:name, email=:email, mobile=:mobile, age=:age, height=:height, weight=:weight, gender=:gender, address=:address, modified_date=:created_date, status=:status WHERE participant_id = :participant_id ";
          $stmt = $this->connection->prepare($sql);
          $created_date = date("Y-m-d H:i:s");
          $status = '0';
          $stmt->bindParam(":name", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":mobile", $mobile);
          $stmt->bindParam(":age", $age);
          $stmt->bindParam(":height", $height);
          $stmt->bindParam(":weight", $weight);
          $stmt->bindParam(":gender", $gender);
          $stmt->bindParam(":address", $address);
          $stmt->bindParam(":participant_id", $participant_id);
          $stmt->bindParam(":created_date", $created_date);
          $stmt->bindParam(":status", $status);
          $res = $stmt->execute();
          if ($res == 'true')
          {
            $status = array(
                'status' => ERR_OK,
                'message' => "Success!! participant details updated"
            );
            return $status;  
          }
          else
          {
            $status = array(
                'status' => ERR_NOT_MODIFIED,
                'message' => "Failure"
            );
            return $status;  
          }
        }else {
          $status = array(
                'status' => ERR_NOT_MODIFIED,
                'message' => "Failure"
            );
          return $status;  
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function deleteUserParticipant($data) {
    try {
      extract($data);
      $sql = "Update  " . DBPREFIX . "_userparticipantdetails SET status =:status, modified_date=:created_date WHERE participant_id = :participant_id ";
        $stmt = $this->connection->prepare($sql);
        $created_date = date("Y-m-d H:i:s");
        $status = '9';
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":participant_id", $partcipantId);
        $stmt->bindParam(":created_date", $created_date);
        $res = $stmt->execute();
        if ($res == 'true')
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success!! participant details deleted"
          );
          return $status;  
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure"
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
  public function getPaymentType() {
    try {
      $sql = "SELECT type_id,type_name   FROM " . DBPREFIX . "_paymenttype WHERE status='0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $payment = $stmt->fetchALL(PDO::FETCH_OBJ);
      $status = array(
          'status' => ERR_OK,
          'message' => 'success',
          'Paymentypes' => $payment
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
  public function validatePromoCode($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $voucher = $voucher;
      $trek_id = $trek_id;
      $noparticipants = $noparticipants;
      $sql = "SELECT * FROM sg_trekcoupons WHERE `coupon_code` ='$voucher'  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
      if (empty($coupondetails))
      {
        $status = array(
            'status' => '204',
            'message' => 'Invalid coupon'
        );
        return $status;
      }
      $discountamount = $noparticipants * $coupondetails->discount_amount;
      $gst = ($originalamount) * (5 / 100);
      $gstamount = (float)$gst;
      $totalamount = (Float)$originalamount + (float)$gstamount;
      $total_amount1 = (Float)(round($totalamount * 100) / 100);
      $total_amount = round($total_amount1, 2) - $discountamount;
      $status = array(
          'status' => '200',
          'discount' => round($discountamount,2),
          'totalamount' => round($total_amount,2)
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
  public function proceedtoPay($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $total_amount = $total_amount;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      if ($bookingid == '')
      {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure"
        );
        return $status;
      }
      $bookingdetails = $this->getBookingDetails($bookingid);
      if ($bookingdetails == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      $trekdates = $this->getTrekBookingDates($bookingdetails[0]->batch);
      $purpose = 'Trek Booking '.$bookingdetails[0]->trek_title;
      $amount = $total_amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $trek_fee = $bookingdetails[0]->amount;
      $item_name = $bookingid;
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
       $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key, $private_auth_token, $api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => false,
          "send_sms" => false,
          "email" => $email,
          'allow_repeated_payments' => false,
		      "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
         // "redirect_url" => SITEURL."ridingsolo/bookingsuccess",  //success page where gateway should redirect after payment,should always be an absolute url
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetails" 
          
      ));
      $response['booking_id'] = $item_name;
      $response['payment_type'] = $payment_type;
      $response['original_amount'] = $originalamount;
      $response['trek_fee'] = $trek_fee;
      if ($response != '')
      {
        $beforepaymentdetails = $this->insertBeforeBookingDetails($response);
        $requestid = $this->getPaymentRequestId($beforepaymentdetails);
        $this->set_logs($purpose,'treks','bookingpayment',$purpose. ' - '. $amount . ' - '. $response['id'] ,'BeforePayment');

        $status = array(
            'status' => ERR_OK,
            'message' => "Success please complete Trek Booking payment process",
            'requestid' => $requestid,
            'URL' => 'https://test.instamojo.com/@rakhi_m305/' . $requestid,
            'TotalAmount' => $total_amount
        );
        return $status;  
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Trek Booking  Not Added "
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
  public function getTrekBookingDates($id)
  {
    try {
      $sql = "SELECT `trekstart_date`,`trekend_date` FROM " . DBPREFIX . "_inserttrekbatches where `batch_id`= '$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdates = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function insertBeforeBookingDetails($data)
  {
    try
    {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO " . DBPREFIX . "_beforebookingdetails (booking_id, purpose, request_id, amount,trek_fee, buyer_name, email, phone, payment_type, original_amount, created_date) VALUES( '$booking_id', '$purpose', '$id', '$amount','$trek_fee','$buyer_name', '$email', '$phone', '$payment_type', '$original_amount', '$created_date')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $id = $this->connection->lastInsertId();
      return $id;
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }
  public function getPaymentRequestId($id)
  {
      $sql = "SELECT request_id From " . DBPREFIX . "_beforebookingdetails where `bookingprocess_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $r = $stmt->fetch(PDO::FETCH_OBJ);
      $requestid = $r->request_id;
      return $requestid;
  }
  public function bookingSuccess($data) {
    try {
      extract($data);
      //print_r($data);exit; //Array ( [payment_id] => MOJO0927G05A43697517 [payment_status] => Credit [payment_request_id] => 2210bb1b67d846efbe58bde9de10ae1c )
      
      $paymentid = $payment_id;      
      $paymentstatus = $payment_status;
      $payment_request_id = $payment_request_id;
      if(isset($payment_id) && $payment_id != ''){
        if(isset($payment_status) && $payment_status == 'Credit') {
          $logs_info = $this->getLogDetails($payment_request_id);
          $this->insertPaymentDetails($payment_id, $payment_request_id);
          $this->set_logs("ridingsolo",'treks', "getSuccessBookingdetails",implode('~',$_POST),'AfterPayment');
        }else {
          $this->set_logs("ridingsolo",'treks', "getSuccessBookingdetails", implode('~',$_POST),'AfterPayment');
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLogDetails($payment_request_id){
      $query = "SELECT buyer_name,amount,purpose FROM sg_beforebookingdetails WHERE `request_id`=:request_id";      
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":request_id", $payment_request_id);
      $stmt->execute();
      $log_details = $stmt->fetch(PDO::FETCH_OBJ);
      return $log_details;
  }
  public function insertPaymentDetails($payment_id, $payment_request_id)
  {
    try
    {
      $sql = "SELECT `purpose`,`booking_id`,`amount`,`buyer_name`,`email`,`phone`,`payment_type`,`original_amount`  FROM " . DBPREFIX . "_beforebookingdetails WHERE `request_id`= '$payment_request_id'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $created_date = date("Y-m-d H:i:s");
      $amount = $bookingdetail->amount;
      $email = $bookingdetail->email;
      $booking_id = $bookingdetail->booking_id;
      $payment_type = $bookingdetail->payment_type;
      $original_amount = $bookingdetail->original_amount;
      $sql2 = "INSERT INTO sg_paymentdetails (txn_id,amount,email,booking_id,payment_request_id,payment_type,original_amount,created_date) VALUES(:txn_id,:amount,:email,:booking_id,:payment_request_id, :payment_type,:original_amount,:created_date)";
      $stmt2 = $this->connection->prepare($sql2);
      $stmt2->bindParam(":txn_id", $payment_id);
      $stmt2->bindParam(":amount", $amount);
      $stmt2->bindParam(":email", $email);
      $stmt2->bindParam(":booking_id", $booking_id);
      $stmt2->bindParam(":payment_request_id", $payment_request_id);
      $stmt2->bindParam(":payment_type", $payment_type);
      $stmt2->bindParam(":original_amount", $original_amount);
      $stmt2->bindParam(":created_date", $created_date);
      $res = $stmt2->execute();
      $paymentinsert_id = $this->connection->lastInsertId();
      if ($paymentinsert_id != '0')
      {
        $adminemail = $this->getParticipantDetails($booking_id);
        $email2 = $adminemail[0]->email;
        $subject2 = "Invoice For Trek booking in Ridingsolo";
        $personscount = count($adminemail);
        $bookingamount = $adminemail[0]->trek_fee * $personscount;
        $gstamount = $bookingamount * 5 / 100;
        $totalamount = $bookingamount + $gstamount;
        $discount = $totalamount - $amount;
        $payment_type = $payment_type;
        $pending_amount = $totalamount - $amount;
        $message2 = '<div style="background:#f3f5f8; padding:20px;">
                <div style="font-family:Arial; font-size:13px; line-height:20px; color:#101010; max-width:520px; padding:30px; padding-top:20px; margin:0 auto; border:0px solid #DDDDDD; background:#FFFFFF;-moz-box-shadow: 0 0 8px 3px rgb(221,221,221); -o-box-shadow: 0 0 8px 3px rgb(221,221,221); -ms-box-shadow: 0 0 8px 3px rgb(221,221,221); -webkit-box-shadow: 0 0 8px 3px rgb(221,221,221); box-shadow: 0 0 8px 3px rgb(221,221,221);">
            <div class="header">
              <table cellspacing="0" cellpadding="0" rules="" style="border-color:#333; border-width:0; border-style:solid; width:100%; border-collapse:collapse;">
                <tr>
                <td><a href="'.SITEURL.'" target="_blank" style="border:0; text-decoration:none">
                <img src="'.SITEURL.'public/templates/images/index.png" alt="Riding Solo" style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;" /></a></td>
              </tr>
              <tr>
                <td style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;"><span style="color:#e8593f;">GSTIN</span> : 03AAICR9803R1ZR </td>
              </tr>
            </table>';
          $message2 .= '<div style="height:10px; border-bottom:1px solid #ddd; margin-bottom:10px;"></div>
          </div>
          <div class="content" style="min-height:400px; padding:8px 0;">
            <h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Payment</span> Details</h2>
            <table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
              <tbody style="text-align:left;">
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold; width:40%;">Transaction Id</td>
                  <td style="width:60%;">' . $payment_id . '</td>
                </tr>
                <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Name</td>
                  <td>' . $adminemail[0]->trek_title . '</td>
                </tr>
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Batch</td>
                  <td>' . date("M d", strtotime($adminemail[0]->trekstart_date)) . ' ' . "TO" . ' ' . date("M d,Y", strtotime($adminemail[0]->trekend_date)) . '</td>
          </tr>';

          $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Trek Fee (per person)</td>
              <td>&#8377; ' . number_format((float)$adminemail[0]->trek_fee, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">GST</td>
              <td>&#8377; ' . number_format((float)$gstamount, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Total Amount</td>
              <td>&#8377;' . number_format((float)$totalamount, 2, '.', ',') . '</td>
            </tr>';

          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Amount Paid</td>
              <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1 && $discount > 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Discount</td>
              <td>&#8377; ' . number_format((float)$discount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">No. of Participants</td>
              <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 2)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Amount Paid</td>
                    <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
                  </tr>
                  <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Pending amount</td>
                    <td><strong style="color:#009649;">&#8377;' . number_format($pending_amount, 2, '.', ',') . '</strong></td>
                  </tr>
                  <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">No. of Participants</td>
                    <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 3)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Paid Amount(Advance Payment)</td>
                <td>&#8377; ' . number_format($pending_amount, 2, '.', ',') . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Balance Amount To Be Paid</td>
                <td><strong>&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Amount Paid</td>
                <td><strong style="color:#009649;">&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">No. of Participants</td>
                <td>' . count($adminemail) . '</td>
              </tr>
              </tbody>
            </table>';
          }
        $message2 .= '<h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Customer</span> Details</h2>';
        foreach ($adminemail as $values)
        {
          //print_r($values);exit;
          $message2 .= '<table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
            <tbody style="text-align:left;">
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold; width:40%;">Particiapant name</td>
                <td style="width:60%;">' . $values->name . '</td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Email</td>
                <td>' . $values->email . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Phone Number</td>
                <td>' . $values->mobile . '</td>
              </tr>
            </tbody>
          </table>';
        }
        $message2 .= '</div>
          <div class="footer">
            <div style="height:1px; border-bottom:1px solid #ddd; margin-bottom:15px;"></div>
            <p style="font-size:12px; line-height:20px; margin:0; padding:0; text-align:center;">If you have any questions about this invoice, simply email to  '.ADMIN_EMAIL.' <br/>OR<br/> call '.ADMIN_PHONE.'</p>
          </div>
          </div>
          </div>';
          echo $message2;exit;
          $smtpemail = new smtpHelper;
          $smtpemail->email = $email2;
          $smtpemail->subject = $subject2;
          $smtpemail->message = $message2;
          $smtpemail->SendEmail();
        }
      $logs_info = $this->getTransLogDetails($payment_request_id);          
      if ($logs_info == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $logs_info,
            'paymentid' => $id
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
  public function gettranslogdetails($payment_request_id)
  {
      $sql = "SELECT buyer_name,amount,purpose FROM sg_beforebookingdetails WHERE `request_id`='$payment_request_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $translogdetails = $stmt->fetch(PDO::FETCH_OBJ);
      return $translogdetails;
  }
  public function getParticipantDetails($id)
  {
    $sql = "SELECT p.*,ib.`trekstart_date`,ib.`trekend_date`,t.`trek_title`,t.`trek_fee`,b.`address`,b.`created_date` as 'booking date' FROM " . DBPREFIX . "_trekingdetails t," . DBPREFIX . "_inserttrekbatches ib," . DBPREFIX . "_bookingdetails b," . DBPREFIX . "_participantdetails p  WHERE p.`booking_id`=b.`booking_id` and t.`trek_id`=b.`trek_id` and b.`batch`=ib.`batch_id` and b.`booking_id`=$id";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $participantdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $participantdetails;
  }
  public function sendSuccessRequestId($data) {
    try {
      extract($data);
      $request_id = $request_id;
      $sql = "SELECT `purpose`,`booking_id`,`buyer_name`,`email`,`phone`,'' as paymentdetails  FROM " . DBPREFIX . "_beforebookingdetails WHERE `request_id`= '$request_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $pd = $this->getPayDetails($request_id);
      $bookingdetail->paymentdetails = $pd;
      $no = $stmt->rowCount();
      if ($no != 0)
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'details' => $bookingdetail
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
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
  public function getPayDetails($request_id)
  {
    $sql = "SELECT payment_id,txn_id as transactionid, amount,payment_request_id,original_amount,DATE_FORMAT(`created_date`,'%M %d,%Y %h:%i:%s')  as transactiondate   FROM sg_paymentdetails WHERE `payment_request_id`='$request_id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $translogdetails = $stmt->fetch(PDO::FETCH_OBJ);
    return $translogdetails;
  }
  public function payBalanceAmount($data) {
    try {
      extract($data);
      $sql = "SELECT b.`booking_id`,gettrekname(b.`trek_id`) as trek_title,tb.`trekstart_date`,tb.`trekend_date`,gettrekname(b.`trek_id`),pm.`amount`,pm.`original_amount`,pm.`payment_id`,bb.`email`,bb.`phone`,bb.`buyer_name` as name,b.`trek_fee`  FROM ".DBPREFIX."_paymentdetails pm inner join ".DBPREFIX."_bookingdetails b on pm.`booking_id`=b.`booking_id` inner join ".DBPREFIX."_beforebookingdetails bb on bb.`booking_id`=b.`booking_id` inner join sg_inserttrekbatches tb on tb.`batch_id` = b.`batch` WHERE pm.`booking_id`=:booking_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":booking_id", $booking_id);
      $res = $stmt->execute();
      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      if(empty($reg)) {
        $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure No Data "
          );
          return $status;
      }
      $bookingdetails = $this->getBookingDetails($reg->booking_id);
      if(empty($bookingdetails)) {
        $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure No Data "
          );
          return $status;
      }

      $purpose = $bookingdetails[0]->trek_title;
      $trek_fee = $bookingdetails[0]->amount;
      $gst = ($reg->original_amount*5/100);
      $tot_amount = $reg->original_amount+$gst;
      $pending_amount = $tot_amount - $reg->amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $item_name = $booking_id;
      $pending_amount = round($pending_amount, 2);
      if($pending_amount <= 0) {
        $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure No Data "
          );
          return $status;
      }
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
      $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key,$private_auth_token,$api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $pending_amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => true,
          "send_sms" => true,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccess",  
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetails"            
        ));
        $response['booking_id'] = $item_name;
        $response['payment_type'] = '3';
        $response['original_amount'] = $tot_amount;
        $response['trek_fee'] = $trek_fee;
        if ($response != '')
        {
          $beforepaymentdetails = $this->insertBeforeBookingDetails($response);
          $requestid = $this->getPaymentRequestId($beforepaymentdetails);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success please complete Trek Booking payment process",
              'requestid' => $requestid,
              'URL' => 'https://test.instamojo.com/@rakhi_m305/'. $requestid,
              'TotalAmount' => $pending_amount
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Trek Booking  Not Added "
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
  public function getSuccessBookingDetails($data) {
    try {
      extract($data);
      extract($_POST);
      //amount, buyer, buyer_name, buyer_phone, currency, fees, longurl, mac, payment_id, payment_request_id, purpose, shorturl, status
      if(isset($_POST['payment_id'])&&$_POST['payment_id']!=''){
        if(isset($_POST['status']) && $_POST['status'] == 'Credit'){
          $logs_info = $this->getLogDetails($_POST['payment_request_id']);
          $this->insertPaymentDetails($_POST['payment_id'], $_POST['payment_request_id']);
          $this->set_logs("ridingsolo",'treks',"getSuccessBookingdetails",implode('~',$_POST),'AfterPayment');
        }else {
          $this->set_logs("ridingsolo",'treks',"getSuccessBookingdetails",implode('~',$_POST),'AfterPayment');
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getTripTransactionDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
          $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
          $condition .= " or ";
      }
      if(isset($email) && $email!=''){
          $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(pm.`txn_id`),b.`trip_id`,pm.`trippayment_id`,pm.`txn_id`, concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txn_date, gettripname(b.`trip_id`) as tripname FROM sg_trippaymentdetails pm inner join sg_tripbookingdetails b on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id` = b.`tripbooking_id` WHERE $condition  order by pm.`trippayment_id` desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status; 
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function viewTripInvoice($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,gettripparticipantscount(b.`tripbooking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, gettripname(b.`trip_id`) as trip_title, get_tripfee(b.`tripbooking_id`) as trip_fee,ib.`tripstart_date`,ib.`tripend_date`, pm.`txn_id`,pm.`created_date` as txn_date,p.`name`,p.`email`,p.`mobile`,'' as trekamount,'' as bookingamount,'' as gstamount,'' as totalamount,'' as pending_amount,'' as discount FROM sg_tripbookingdetails b inner join sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbatches ib on b.`batch` = ib.`tripbatch_id` inner join sg_tripparticipantdetails p on p.`tripbooking_id`=b.`tripbooking_id` WHERE pm.`trippayment_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      if ((empty($transactiondetails['invoicedetails'])))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;   
      }
      $trekamount = $transactiondetails['invoicedetails']->trip_fee;
      $transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pdTrip($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = round(($bookingamount * 5 / 100), 2);
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = round($pending_amount,2);
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No data"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function getTripBDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
        $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
        $condition .= " or ";
      }
      if(isset($email) && $email!=''){
        $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(b.`tripbooking_id`), pm.`amount`, pm. `trippayment_id`, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, gettripparticipantscount(b.`tripbooking_id`) as personcnt, t.`biketrips_id`, t.`trip_title`,t.`trip_fee`, b.`tripbooking_id`, ib.`tripbatch_id`, DATE_FORMAT(ib.`tripstart_date`,'%d %M,%Y') as `tripstart_date`, DATE_FORMAT(ib.`tripstart_date`,'%d %M,%Y') as `tripend_date`, pm.`trippayment_id`, pm.`amount`, getcurrentstatus(b.`tripbooking_id`) as payment_type, if(pm.`payment_type`='2','Advance Payment','Full Payment') as payment_mode  FROM sg_biketrips t inner join sg_tripbookingdetails b on b.`trip_id` = t.`biketrips_id` INNER JOIN sg_tripbatches ib on b.`batch` = ib.`tripbatch_id`  INNER JOIN sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where $condition   order by pm.`trippayment_id` DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($bookingdetails as $key => $value) {
        $trippayment_id = $value->trippayment_id;
        $bookingdetails[$key]->invoiceurl = SITEURL."invoice/viewinvoice/".$this->base64_url_encode($trippayment_id);   
      }
      if ((empty($bookingdetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;     
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'bookingdetails' => $bookingdetails
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
  public function ViewTripInvoiceBD($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,gettripparticipantscount(b.`tripbooking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, gettripname(b.`trip_id`) as trip_title, get_tripfee(b.`tripbooking_id`) as trip_fee, ib.`tripstart_date`, ib.`tripend_date`, pm.`txn_id`,pm.`created_date` as txn_date FROM sg_tripbookingdetails b inner join sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbatches ib on b.`batch` = ib.`tripbatch_id`  WHERE pm.`trippayment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      //print_r($transactiondetails['invoicedetails']);exit;
      $trekamount = $transactiondetails['invoicedetails']->trip_fee;
      $transactiondetails['invoicedetails']->tripamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pdTrip($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = round(($bookingamount * 5 / 100), 2);
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = round($pending_amount, 2);
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure"
          );
          return $status;
      }
      else
      {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'bookingdetails' => $transactiondetails
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
  public function validateTripPromoCode($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $voucher = $voucher;
      $trip_id = $trip_id;
      $noparticipants = $noparticipants;
      $sql = "SELECT * FROM sg_tripcoupons WHERE `coupon_code` ='$voucher'  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and `trip_id`=$trip_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
      if (empty($coupondetails))
      {
        $status = array(
            'status' => '204',
            'message' => 'Invalid coupon'
        );
        return $status;
      }
      $discountamount = $noparticipants * $coupondetails->discount_amount;
      $gst = ($originalamount) * (5 / 100);
      $gstamount = (float)$gst;
      $totalamount = (Float)$originalamount + (float)$gstamount;
      $total_amount1 = (Float)(round($totalamount * 100) / 100);
      $total_amount = round($total_amount1, 2) - $discountamount;
      $status = array(
          'status' => '200',
          'discount' => round($discountamount,2),
          'totalamount' => round($total_amount,2)
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
  public function proceedtoPayTrip($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $total_amount = $total_amount;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $bookingdetails = $this->getTripBookingDetails($bookingid);
      if ($bookingdetails == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      $trekdates = $this->getTripBookingDates($bookingdetails[0]->batch);
      $purpose = 'Trip Booking '. $bookingdetails[0]->trip_title;
      $amount = $total_amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $trip_fee = $bookingdetails[0]->amount;
      $item_name = $bookingid;
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
       $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key, $private_auth_token, $api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => false,
          "send_sms" => false,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
         // "redirect_url" => SITEURL."ridingsolo/bookingsuccesstrip",  //success page where gateway should redirect after payment,should always be an absolute url
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailstrip" 
          
      ));
      $response['booking_id'] = $item_name;
      $response['payment_type'] = $payment_type;
      $response['original_amount'] = $originalamount;
      $response['trip_fee'] = $trip_fee;
      if ($response != '')
      {
        $beforepaymentdetails = $this->insertTripBeforeBookingDetails($response);
        $requestid = $this->getTripPaymentRequestId($beforepaymentdetails);
        $this->set_logs($purpose,'treks','bookingpayment',$purpose.'-'.$amount . ' - '. $response['id'] ,'BeforePayment');

        $status = array(
            'status' => ERR_OK,
            'message' => "Success please complete Bike trip Booking payment process",
            'requestid' => $requestid,
            'URL' => 'https://test.instamojo.com/@rakhi_m305/' . $requestid,
            'TotalAmount' => $total_amount
        );
        return $status;  
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Trek Booking  Not Added "
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
  public function insertTripBeforeBookingDetails($data)
  {
    try
    {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_tripbeforebookingdetails (tripbooking_id, purpose, request_id, amount,trip_fee, buyer_name, email, phone, payment_type, original_amount, created_date) VALUES( '$booking_id', '$purpose', '$id', '$amount','$trip_fee','$buyer_name', '$email', '$phone', '$payment_type', '$original_amount', '$created_date')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $id = $this->connection->lastInsertId();
      return $id;
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }
  public function getTripPaymentRequestId($id)
  {
      $sql = "SELECT request_id From sg_tripbeforebookingdetails where `bookingprocess_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $r = $stmt->fetch(PDO::FETCH_OBJ);
      $requestid = $r->request_id;
      return $requestid;
  }
  public function getTripBookingDetails($id)
  {
      $sql = "SELECT b.`trip_id`, b.`tripbooking_id`, b.`batch`, t.`trip_fee` as amount, t.`trip_title`, p.`name` as firstname , gettripparticipantscount(b.`tripbooking_id`) as personscount ,p.`email`,p.`mobile` as phone ,p.`tripparticipant_id` FROM sg_tripbookingdetails b inner join sg_biketrips t on b.`trip_id`=t.`biketrips_id` inner join sg_tripparticipantdetails p on p.`tripbooking_id`=b.`tripbooking_id` where b.`tripbooking_id`=$id order by p.`tripparticipant_id` ";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $bookingdetails;
  }
  public function getTripBookingDates($id)
  {
    try {
      $sql = "SELECT `tripstart_date`,`tripend_date` FROM sg_tripbatches where `tripbatch_id`= '$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdates = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function bookingSuccessTrip($data) {
    try {
      extract($data);
      //print_r($data);exit; //Array ( [payment_id] => MOJO0927G05A43697517 [payment_status] => Credit [payment_request_id] => 2210bb1b67d846efbe58bde9de10ae1c )
      
      $paymentid = $payment_id;      
      $paymentstatus = $payment_status;
      $payment_request_id = $payment_request_id;
      if(isset($payment_id) && $payment_id != ''){
        if(isset($payment_status) && $payment_status == 'Credit') {
          $logs_info = $this->getTripLogDetails($payment_request_id);
          $this->insertTripPaymentDetails($payment_id, $payment_request_id);
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripLogDetails($payment_request_id){
      $query = "SELECT buyer_name,amount,purpose FROM sg_tripbeforebookingdetails WHERE `request_id`=:request_id";      
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":request_id", $payment_request_id);
      $stmt->execute();
      $log_details = $stmt->fetch(PDO::FETCH_OBJ);
      return $log_details;
  }
  public function insertTripPaymentDetails($payment_id, $payment_request_id)
  {
    try
    {
      $sql = "SELECT `purpose`,`tripbooking_id`,`amount`,`buyer_name`,`email`,`phone`,`payment_type`,`original_amount`  FROM sg_tripbeforebookingdetails WHERE `request_id`= '$payment_request_id'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $created_date = date("Y-m-d H:i:s");
      $amount = $bookingdetail->amount;
      $email = $bookingdetail->email;
      $booking_id = $bookingdetail->tripbooking_id;
      $payment_type = $bookingdetail->payment_type;
      $original_amount = $bookingdetail->original_amount;
      $sql2 = "INSERT INTO sg_trippaymentdetails (txn_id,amount,email,tripbooking_id,payment_request_id,payment_type,original_amount,created_date) VALUES(:txn_id,:amount,:email,:booking_id,:payment_request_id, :payment_type,:original_amount,:created_date)";
      $stmt2 = $this->connection->prepare($sql2);
      $stmt2->bindParam(":txn_id", $payment_id);
      $stmt2->bindParam(":amount", $amount);
      $stmt2->bindParam(":email", $email);
      $stmt2->bindParam(":booking_id", $booking_id);
      $stmt2->bindParam(":payment_request_id", $payment_request_id);
      $stmt2->bindParam(":payment_type", $payment_type);
      $stmt2->bindParam(":original_amount", $original_amount);
      $stmt2->bindParam(":created_date", $created_date);
      $res = $stmt2->execute();
      $paymentinsert_id = $this->connection->lastInsertId();
      if ($paymentinsert_id != '0')
      {
        $adminemail = $this->getTripParticipantDetails($booking_id);
        $email2 = $adminemail[0]->email;
        $subject2 = "Invoice For Trek booking in Ridingsolo";
        $personscount = count($adminemail);
        $bookingamount = $adminemail[0]->trek_fee * $personscount;
        $gstamount = $bookingamount * 5 / 100;
        $totalamount = $bookingamount + $gstamount;
        $discount = $totalamount - $amount;
        $payment_type = $payment_type;
        $pending_amount = $totalamount - $amount;
        $message2 = '<!doctype html>
          <html lang="en">
            <head>
              <meta charset="utf-8">
              <title>Riding Solo : Lets Explore Together</title>
            </head>
            <body style="margin:0; background:#f3f5f8;">
              <div style="background:#f3f5f8; padding:20px;">
                <div style="font-family:Arial; font-size:13px; line-height:20px; color:#101010; max-width:520px; padding:30px; padding-top:20px; margin:0 auto; border:0px solid #DDDDDD; background:#FFFFFF;-moz-box-shadow: 0 0 8px 3px rgb(221,221,221); -o-box-shadow: 0 0 8px 3px rgb(221,221,221); -ms-box-shadow: 0 0 8px 3px rgb(221,221,221); -webkit-box-shadow: 0 0 8px 3px rgb(221,221,221); box-shadow: 0 0 8px 3px rgb(221,221,221);">
            <div class="header">
              <table cellspacing="0" cellpadding="0" rules="" style="border-color:#333; border-width:0; border-style:solid; width:100%; border-collapse:collapse;">
                <tr>
                <td><a href="'.SITEURL.'" target="_blank" style="border:0; text-decoration:none">
                <img src="'.SITEURL.'public/templates/images/index.png" alt="Riding Solo" style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;" /></a></td>
              </tr>
              <tr>
                <td style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;"><span style="color:#e8593f;">GSTIN</span> : 03AAICR9803R1ZR </td>
              </tr>
            </table>';
          $message2 .= '<div style="height:10px; border-bottom:1px solid #ddd; margin-bottom:10px;"></div>
          </div>
          <div class="content" style="min-height:400px; padding:8px 0;">
            <h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Payment</span> Details</h2>
            <table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
              <tbody style="text-align:left;">
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold; width:40%;">Transaction Id</td>
                  <td style="width:60%;">' . $payment_id . '</td>
                </tr>
                <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Name</td>
                  <td>' . $adminemail[0]->trek_title . '</td>
                </tr>
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Batch</td>
                  <td>' . date("M d", strtotime($adminemail[0]->trekstart_date)) . ' ' . "TO" . ' ' . date("M d,Y", strtotime($adminemail[0]->trekend_date)) . '</td>
          </tr>';

          $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Trek Fee (per person)</td>
              <td>&#8377; ' . number_format((float)$adminemail[0]->trek_fee, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">GST</td>
              <td>&#8377; ' . number_format((float)$gstamount, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Total Amount</td>
              <td>&#8377;' . number_format((float)$totalamount, 2, '.', ',') . '</td>
            </tr>';

          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Amount Paid</td>
              <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1 && $discount > 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Discount</td>
              <td>&#8377; ' . number_format((float)$discount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">No. of Participants</td>
              <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 2)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Amount Paid</td>
                    <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
                  </tr>
                  <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Pending amount</td>
                    <td><strong style="color:#009649;">&#8377;' . number_format($pending_amount, 2, '.', ',') . '</strong></td>
                  </tr>
                  <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">No. of Participants</td>
                    <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 3)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Paid Amount(Advance Payment)</td>
                <td>&#8377; ' . number_format($pending_amount, 2, '.', ',') . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Balance Amount To Be Paid</td>
                <td><strong>&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Amount Paid</td>
                <td><strong style="color:#009649;">&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">No. of Participants</td>
                <td>' . count($adminemail) . '</td>
              </tr>
            </tbody>
          </table>';
        }
        $message2 .= '<h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Customer</span> Details</h2>';
        foreach ($adminemail as $values)
        {
          //print_r($values);exit;
          $message2 .= '<table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
            <tbody style="text-align:left;">
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold; width:40%;">Particiapant name</td>
                <td style="width:60%;">' . $values->name . '</td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Email</td>
                <td>' . $values->email . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Phone Number</td>
                <td>' . $values->mobile . '</td>
              </tr>
            </tbody>
          </table>';
                    }
                    $message2 .= '</div>
        <div class="footer">
          <div style="height:1px; border-bottom:1px solid #ddd; margin-bottom:15px;"></div>
          <p style="font-size:12px; line-height:20px; margin:0; padding:0; text-align:center;">If you have any questions about this invoice, simply email to  '.ADMIN_EMAIL.' <br/>OR<br/> call '.ADMIN_PHONE.'</p>
        </div>
        </div>
        </div>
        </body>
        </html>';
        $smtpemail = new smtpHelper;
        $smtpemail->email = $email2;
        $smtpemail->subject = $subject2;
        $smtpemail->message = $message2;
        //$smtpemail->SendEmail();
      }
      $logs_info = $this->getTransLogDetails($payment_request_id);          
      if ($logs_info == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $logs_info,
            'paymentid' => $id
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
  public function getTripParticipantDetails($id)
  {
    $sql = "SELECT p.*,ib.`tripstart_date`,ib.`tripend_date`,t.`trip_title`,t.`trip_fee`,b.`address`,b.`created_date` as 'booking date' FROM sg_biketrips t, sg_tripbatches ib,sg_tripbookingdetails b, sg_tripparticipantdetails p  WHERE p.`tripbooking_id`=b.`tripbooking_id` and t.`biketrips_id`=b.`trip_id` and b.`batch`=ib.`tripbatch_id` and b.`tripbooking_id`=$id";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $participantdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $participantdetails;
  }
  public function sendSuccessRequestIdTrip($data) {
    try {
      extract($data);
      $request_id = $request_id;
      $sql = "SELECT `purpose`,`tripbooking_id`,`buyer_name`,`email`,`phone`,'' as paymentdetails  FROM sg_tripbeforebookingdetails WHERE `request_id`= '$request_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $pd = $this->getTripPayDetails($request_id);
      $bookingdetail->paymentdetails = $pd;
      $no = $stmt->rowCount();
      if ($no != 0)
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'details' => $bookingdetail
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
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
  public function getTripPayDetails($request_id)
  {
    $sql = "SELECT trippayment_id,txn_id as transactionid, amount, payment_request_id, original_amount, DATE_FORMAT(`created_date`,'%M %d,%Y %h:%i:%s')  as transactiondate   FROM sg_trippaymentdetails WHERE `payment_request_id`='$request_id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $translogdetails = $stmt->fetch(PDO::FETCH_OBJ);
    return $translogdetails;
  }
  public function payBalanceAmountTrip($data) {
    try {
      extract($data);
      $sql = "SELECT b.`tripbooking_id`, gettripname(b.`trip_id`) as trip_title, tb.`tripstart_date`, tb.`tripend_date`, pm.`amount`,pm.`original_amount`,pm.`trippayment_id`, bb.`email`,bb.`phone`,bb.`buyer_name` as name,b.`trip_fee` FROM sg_trippaymentdetails pm inner join sg_tripbookingdetails b on pm.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` inner join sg_tripbatches tb on tb.`tripbatch_id` = b.`batch` WHERE pm.`tripbooking_id`=:booking_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":booking_id", $booking_id);
      $res = $stmt->execute();
      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      $bookingdetails = $this->getTripBookingDetails($reg->tripbooking_id);
      $purpose = $bookingdetails[0]->trip_title;
      $trek_fee = $bookingdetails[0]->amount;
      $gst = ($reg->original_amount*5/100);
      $tot_amount = $reg->original_amount+$gst;
      $pending_amount = $tot_amount - $reg->amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $item_name = $booking_id;
      $pending_amount = round($pending_amount, 2);
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
      $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key,$private_auth_token,$api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $pending_amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => true,
          "send_sms" => true,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccesstrip",  
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailstrip"            
        ));
        $response['booking_id'] = $item_name;
        $response['payment_type'] = '3';
        $response['original_amount'] = $tot_amount;
        $response['trek_fee'] = $trek_fee;
        if ($response != '')
        {
          $beforepaymentdetails = $this->insertBeforeBookingDetails($response);
          $requestid = $this->getPaymentRequestId($beforepaymentdetails);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success please complete Trek Booking payment process",
              'requestid' => $requestid,
              'URL' => 'https://test.instamojo.com/@rakhi_m305/'. $requestid,
              'TotalAmount' => $pending_amount
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Trek Booking  Not Added "
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
  public function getSuccessBookingDetailsTrip($data) {
    try {
      extract($data);
      extract($_POST);
      if(isset($_POST['payment_id'])&&$_POST['payment_id']!=''){
        if(isset($_POST['status']) && $_POST['status'] == 'Credit'){
          $logs_info = $this->getTripLogDetails($_POST['payment_request_id']);
          $this->insertTripPaymentDetails($_POST['payment_id'], $_POST['payment_request_id']);
          $this->set_logs("ridingsolo",'trips',"getSuccessBookingDetailsTrip",implode('~',$_POST),'AfterPayment');
        }else {
          $this->set_logs("ridingsolo",'trips',"getSuccessBookingDetailsTrip",implode('~',$_POST),'AfterPayment');
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  /*
  Expeditions
  */
  public function getExpeditionTransactionDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
          $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
          $condition .= " or ";
      }
      if(isset($email) && $email!=''){
          $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(pm.`txn_id`),b.`expedition_id`,pm.`payment_id`,pm.`txn_id`,pm.`payment_id`, concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txn_date,getexpeditionname(b.`expedition_id`) as expeditionname FROM sg_expeditionpayments pm inner join sg_expeditionbookings b on pm.`booking_id` = b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id` = b.`booking_id` WHERE $condition  order by pm.`payment_id` desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status; 
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function viewExpeditionInvoice($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,getexpeditionparticipantscount (b.`booking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, getexpeditionname(b.`expedition_id`) as expedition_title,get_expeditionfee(b.`booking_id`) as expedition_fee,ib.`expeditionstart_date`,ib.`expeditionend_date`,pm.`txn_id`,pm.`created_date` as txn_date,p.`name`,p.`email`,p.`mobile`,'' as expeditionamount,'' as bookingamount,'' as gstamount,'' as totalamount,'' as pending_amount,'' as discount FROM sg_expeditionbookings b inner join sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id` inner join sg_expeditionbatches ib on b.`batch` = ib.`batch_id` inner join  sg_expeditionparticipants p on p.`booking_id`=b.`booking_id` WHERE pm.`payment_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      $expeditionamount = $transactiondetails['invoicedetails']->expedition_fee;
      $transactiondetails['invoicedetails']->expeditionamount = $expeditionamount;
      $transactiondetails['participantdetails'] = $this->pdExp($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $expeditionamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = $pending_amount;
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function getExpeditionBDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
        $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
        $condition .= " or ";
      }
      if(isset($email) && $email!=''){
        $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(b.`booking_id`), pm.`amount`,pm. `payment_id`, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, getexpeditionparticipantscount(b.`booking_id`) as personcnt,t.`expedition_id`,t.`expedition_title`,t.`expedition_fee`,b.`booking_id`, ib.`batch_id`, DATE_FORMAT(ib.`expeditionstart_date`,'%d %M,%Y') as `expeditionstart_date`,DATE_FORMAT(ib.`expeditionstart_date`,'%d %M,%Y') as `expeditionend_date`,pm.`payment_id`,pm.`amount`,getcurrentstatus(b.`booking_id`) as payment_type,if(pm.`payment_type`='2','Advance Payment','Full Payment') as payment_mode  FROM sg_expeditions t inner join sg_expeditionbookings b on b.`expedition_id` = t.`expedition_id` INNER JOIN sg_expeditionbatches ib on b.`batch` = ib.`batch_id`  INNER JOIN sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` where $condition   order by pm.`payment_id` DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($bookingdetails as $key => $value) {
        $payment_id = $value->payment_id;
        $bookingdetails[$key]->invoiceurl = SITEURL."invoice/viewinvoice/".$this->base64_url_encode($payment_id);   
      }
      if ((empty($bookingdetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;     
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'bookingdetails' => $bookingdetails
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
  public function viewExpeditionInvoiceBD($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,getexpeditionparticipantscount(b.`booking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount,COALESCE(pm.`payment_type`,0) as payment_type,getexpeditionname(b.`expedition_id`) as expedition_title,get_expeditionfee(b.`booking_id`) as expedition_fee,ib.`expeditionstart_date`,ib.`expeditionend_date`,pm.`txn_id`,pm.`created_date` as txn_date FROM sg_expeditionbookings b inner join sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id` inner join sg_expeditionbatches ib on b.`batch` = ib.`batch_id`  WHERE pm.`payment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      //print_r($transactiondetails['invoicedetails']);exit;
      $expeditionamount = $transactiondetails['invoicedetails']->expedition_fee;
      $transactiondetails['invoicedetails']->expeditionamount = $expeditionamount;
      $transactiondetails['participantdetails'] = $this->pdEx($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $expeditionamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = $pending_amount;
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure"
          );
          return $status;
      }
      else
      {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'bookingdetails' => $transactiondetails
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
  public function pdEx($id)
  {
      $sql = "SELECT p.`name`,p.`mobile`,p.`email` FROM sg_expeditionparticipants p, sg_expeditionbookings b, sg_expeditionpayments pm where p.`booking_id`=b.`booking_id` and b.`booking_id`=pm.`booking_id` and pm.`payment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pd = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $pd;
  }
  public function validateExpeditionPromoCode($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $voucher = $voucher;
      $expedition_id = $expedition_id;
      $noparticipants = $noparticipants;
      $sql = "SELECT * FROM sg_expeditioncoupons WHERE `coupon_code` ='$voucher'  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and (`expedition_id`=$expedition_id OR all_expeditions='1')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
      if (empty($coupondetails))
      {
        $status = array(
            'status' => '204',
            'message' => 'Invalid coupon'
        );
        return $status;
      }
      $discountamount = $noparticipants * $coupondetails->discount_amount;
      $gst = ($originalamount) * (5 / 100);
      $gstamount = (float)$gst;
      $totalamount = (Float)$originalamount + (float)$gstamount;
      $total_amount1 = (Float)(round($totalamount * 100) / 100);
      $total_amount = round($total_amount1, 2) - $discountamount;
      $status = array(
          'status' => '200',
          'discount' => $discountamount,
          'totalamount' => $total_amount
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
  public function proceedtoPayExpedition($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $total_amount = $total_amount;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      if ($booking_id == '' || $total_amount == '' || $payment_type == '' || $original_amount == '')
      {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Please check your data"
        );
        return $status;
      }
      $bookingdetails = $this->getExpeditionBookingDetails($bookingid);
      if (empty($bookingdetails))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
        );
        return $status;
      }
      $expeditiondates = $this->getExpeditionBookingDates($bookingdetails[0]->batch);
      $purpose = $bookingdetails[0]->expedition_title;
      $amount = $total_amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $expedition_fee = $bookingdetails[0]->amount;
      $item_name = $bookingid;
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
       $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key, $private_auth_token, $api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => false,
          "send_sms" => false,
          "email" => $email,
          'allow_repeated_payments' => false,
          "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccessexpedition",  //success page where gateway should redirect after payment,should always be an absolute url
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailsexpedition" 
          
      ));
      $response['booking_id'] = $item_name;
      $response['payment_type'] = $payment_type;
      $response['original_amount'] = $originalamount;
      $response['expedition_fee'] = $expedition_fee;
      if ($response != '')
      {
        $beforepaymentdetails = $this->insertExBeforeBookingDetails($response);
        $requestid = $this->getExPaymentRequestId($beforepaymentdetails);
        $this->set_logs($purpose,'expeditions','bookingpayment',$purpose .'-'.$amount . ' - '. $response['id'] ,'BeforePayment');

        $status = array(
            'status' => ERR_OK,
            'message' => "Success please complete Expedition Booking payment process",
            'requestid' => $requestid,
            'URL' => 'https://test.instamojo.com/@rakhi_m305/' . $requestid,
            'TotalAmount' => $total_amount
        );
        return $status;  
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Expedition Booking  Not Added "
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
  public function getExpeditionBookingDetails($id)
  {
      $sql = "SELECT b.`expedition_id`,b.`booking_id`,b.`batch`,t.`expedition_fee` as amount,t.`expedition_title`,p.`name` as firstname ,getparticipantscount(b.`booking_id`) as personscount ,p.`email`,p.`mobile` as phone ,p.`participant_id` FROM sg_expeditionbookings b inner join sg_expeditions t on b.`expedition_id`=t.`expedition_id` inner join sg_expeditionparticipants p on p.`booking_id`=b.`booking_id` where b.`booking_id`='$id' order by p.`participant_id` ";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $bookingdetails;
  }
  public function getExpeditionBookingDates($id)
  {
    try {
      $sql = "SELECT `expeditionstart_date`,`expeditionend_date` FROM sg_expeditionbatches where `batch_id`= '$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $expeditiondates = $stmt->fetch(PDO::FETCH_OBJ);
      return $expeditiondates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function insertExBeforeBookingDetails($data)
  {
    try
    {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_exbeforebookingdetails (booking_id, purpose, request_id, amount,expedition_fee, buyer_name, email, phone, payment_type, original_amount, created_date) VALUES( '$booking_id', '$purpose', '$id', '$amount','$expedition_fee','$buyer_name', '$email', '$phone', '$payment_type', '$original_amount', '$created_date')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $id = $this->connection->lastInsertId();
      return $id;
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }
  public function getExPaymentRequestId($id)
  {
      $sql = "SELECT request_id From sg_exbeforebookingdetails where `bookingprocess_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $r = $stmt->fetch(PDO::FETCH_OBJ);
      $requestid = $r->request_id;
      return $requestid;
  }
  public function bookingSuccessExpedition($data) {
    try {
      extract($data);
      //print_r($data);exit; //Array ( [payment_id] => MOJO0927G05A43697517 [payment_status] => Credit [payment_request_id] => 2210bb1b67d846efbe58bde9de10ae1c )
      
      $paymentid = $payment_id;      
      $paymentstatus = $payment_status;
      $payment_request_id = $payment_request_id;
      if(isset($payment_id) && $payment_id != ''){
        if(isset($payment_status) && $payment_status == 'Credit') {
          $logs_info = $this->getExLogDetails($payment_request_id);
          $this->insertExPaymentDetails($payment_id, $payment_request_id);
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExLogDetails($payment_request_id){
      $query = "SELECT buyer_name,amount,purpose FROM sg_exbeforebookingdetails WHERE `request_id`=:request_id";      
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":request_id", $payment_request_id);
      $stmt->execute();
      $log_details = $stmt->fetch(PDO::FETCH_OBJ);
      return $log_details;
  }
  public function insertExPaymentDetails($payment_id, $payment_request_id)
  {
    try
    {
      $sql = "SELECT `purpose`,`booking_id`,`amount`,`buyer_name`,`email`,`phone`,`payment_type`,`original_amount`  FROM sg_exbeforebookingdetails WHERE `request_id`= '$payment_request_id'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $created_date = date("Y-m-d H:i:s");
      $amount = $bookingdetail->amount;
      $email = $bookingdetail->email;
      $booking_id = $bookingdetail->booking_id;
      $payment_type = $bookingdetail->payment_type;
      $original_amount = $bookingdetail->original_amount;
      $sql2 = "INSERT INTO sg_expeditionpayments (txn_id,amount,email,booking_id,payment_request_id,payment_type,original_amount,created_date) VALUES(:txn_id,:amount,:email,:booking_id,:payment_request_id, :payment_type,:original_amount,:created_date)";
      $stmt2 = $this->connection->prepare($sql2);
      $stmt2->bindParam(":txn_id", $payment_id);
      $stmt2->bindParam(":amount", $amount);
      $stmt2->bindParam(":email", $email);
      $stmt2->bindParam(":booking_id", $booking_id);
      $stmt2->bindParam(":payment_request_id", $payment_request_id);
      $stmt2->bindParam(":payment_type", $payment_type);
      $stmt2->bindParam(":original_amount", $original_amount);
      $stmt2->bindParam(":created_date", $created_date);
      $res = $stmt2->execute();
      $paymentinsert_id = $this->connection->lastInsertId();
      if ($paymentinsert_id != '0')
      {
        $adminemail = $this->getExParticipantDetails($booking_id);
        $email2 = $adminemail[0]->email;
        $subject2 = "Invoice For Trek booking in Ridingsolo";
        $personscount = count($adminemail);
        $bookingamount = $adminemail[0]->trek_fee * $personscount;
        $gstamount = $bookingamount * 5 / 100;
        $totalamount = $bookingamount + $gstamount;
        $discount = $totalamount - $amount;
        $payment_type = $payment_type;
        $pending_amount = $totalamount - $amount;
        $message2 = '<!doctype html>
          <html lang="en">
            <head>
              <meta charset="utf-8">
              <title>Riding Solo : Lets Explore Together</title>
            </head>
            <body style="margin:0; background:#f3f5f8;">
              <div style="background:#f3f5f8; padding:20px;">
                <div style="font-family:Arial; font-size:13px; line-height:20px; color:#101010; max-width:520px; padding:30px; padding-top:20px; margin:0 auto; border:0px solid #DDDDDD; background:#FFFFFF;-moz-box-shadow: 0 0 8px 3px rgb(221,221,221); -o-box-shadow: 0 0 8px 3px rgb(221,221,221); -ms-box-shadow: 0 0 8px 3px rgb(221,221,221); -webkit-box-shadow: 0 0 8px 3px rgb(221,221,221); box-shadow: 0 0 8px 3px rgb(221,221,221);">
            <div class="header">
              <table cellspacing="0" cellpadding="0" rules="" style="border-color:#333; border-width:0; border-style:solid; width:100%; border-collapse:collapse;">
                <tr>
                <td><a href="'.SITEURL.'" target="_blank" style="border:0; text-decoration:none">
                <img src="'.SITEURL.'public/templates/images/index.png" alt="Riding Solo" style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;" /></a></td>
              </tr>
              <tr>
                <td style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;"><span style="color:#e8593f;">GSTIN</span> : 03AAICR9803R1ZR </td>
              </tr>
            </table>';
          $message2 .= '<div style="height:10px; border-bottom:1px solid #ddd; margin-bottom:10px;"></div>
          </div>
          <div class="content" style="min-height:400px; padding:8px 0;">
            <h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Payment</span> Details</h2>
            <table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
              <tbody style="text-align:left;">
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold; width:40%;">Transaction Id</td>
                  <td style="width:60%;">' . $payment_id . '</td>
                </tr>
                <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Name</td>
                  <td>' . $adminemail[0]->trek_title . '</td>
                </tr>
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Batch</td>
                  <td>' . date("M d", strtotime($adminemail[0]->trekstart_date)) . ' ' . "TO" . ' ' . date("M d,Y", strtotime($adminemail[0]->trekend_date)) . '</td>
          </tr>';

          $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Trek Fee (per person)</td>
              <td>&#8377; ' . number_format((float)$adminemail[0]->trek_fee, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">GST</td>
              <td>&#8377; ' . number_format((float)$gstamount, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Total Amount</td>
              <td>&#8377;' . number_format((float)$totalamount, 2, '.', ',') . '</td>
            </tr>';

          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Amount Paid</td>
              <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1 && $discount > 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Discount</td>
              <td>&#8377; ' . number_format((float)$discount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">No. of Participants</td>
              <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 2)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Amount Paid</td>
                    <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
                  </tr>
                  <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Pending amount</td>
                    <td><strong style="color:#009649;">&#8377;' . number_format($pending_amount, 2, '.', ',') . '</strong></td>
                  </tr>
                  <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">No. of Participants</td>
                    <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 3)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Paid Amount(Advance Payment)</td>
                <td>&#8377; ' . number_format($pending_amount, 2, '.', ',') . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Balance Amount To Be Paid</td>
                <td><strong>&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Amount Paid</td>
                <td><strong style="color:#009649;">&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">No. of Participants</td>
                <td>' . count($adminemail) . '</td>
              </tr>
            </tbody>
          </table>';
        }
        $message2 .= '<h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Customer</span> Details</h2>';
        foreach ($adminemail as $values)
        {
          //print_r($values);exit;
          $message2 .= '<table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
            <tbody style="text-align:left;">
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold; width:40%;">Particiapant name</td>
                <td style="width:60%;">' . $values->name . '</td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Email</td>
                <td>' . $values->email . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Phone Number</td>
                <td>' . $values->mobile . '</td>
              </tr>
            </tbody>
          </table>';
                    }
                    $message2 .= '</div>
        <div class="footer">
          <div style="height:1px; border-bottom:1px solid #ddd; margin-bottom:15px;"></div>
          <p style="font-size:12px; line-height:20px; margin:0; padding:0; text-align:center;">If you have any questions about this invoice, simply email to  '.ADMIN_EMAIL.' <br/>OR<br/> call '.ADMIN_PHONE.'</p>
        </div>
        </div>
        </div>
        </body>
        </html>';
        $smtpemail = new smtpHelper;
        $smtpemail->email = $email2;
        $smtpemail->subject = $subject2;
        $smtpemail->message = $message2;
        //$smtpemail->SendEmail();
      }
      $logs_info = $this->getTransLogDetails($payment_request_id);          
      if ($logs_info == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $logs_info,
            'paymentid' => $id
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
  public function getExParticipantDetails($id)
  {
    $sql = "SELECT p.*,ib.`expeditionstart_date`,ib.`expeditionend_date`,t.`expedition_title`,t.`expedition_fee`,b.`address`,b.`created_date` as 'booking date' FROM sg_expeditions t,sg_expeditionbatches ib, sg_expeditionbookings b, sg_expeditionparticipants p  WHERE p.`booking_id`=b.`booking_id` and t.`expedition_id`=b.`expedition_id` and b.`batch`=ib.`batch_id` and b.`booking_id`=$id";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $participantdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $participantdetails;
  }
  public function sendSuccessRequestIdExpedition($data) {
    try {
      extract($data);
      $request_id = $request_id;
      $sql = "SELECT `purpose`,`booking_id`,`buyer_name`,`email`,`phone`,'' as paymentdetails  FROM sg_exbeforebookingdetails WHERE `request_id`= '$request_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $pd = $this->getExPayDetails($request_id);
      $bookingdetail->paymentdetails = $pd;
      $no = $stmt->rowCount();
      if ($no != 0)
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'details' => $bookingdetail
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "No Data"
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
  public function getExPayDetails($request_id)
  {
    $sql = "SELECT payment_id,txn_id as transactionid, amount, payment_request_id, original_amount, DATE_FORMAT(`created_date`,'%M %d,%Y %h:%i:%s')  as transactiondate   FROM sg_expeditionpayments WHERE `payment_request_id`='$request_id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $translogdetails = $stmt->fetch(PDO::FETCH_OBJ);
    return $translogdetails;
  }
  public function payBalanceAmountExpedition($data) {
    try {
      extract($data);
      $sql = "SELECT b.`booking_id`,getexpeditionname(b.`expedition_id`) as expedition_title, tb.`expeditionstart_date`, tb.`expeditionend_date`, pm.`amount`, pm.`original_amount`, pm.`payment_id`, bb.`email`, bb.`phone`, bb.`buyer_name` as name, b.`expedition_fee`  FROM sg_expeditionpayments pm inner join sg_expeditionbookings b on pm.`booking_id`=b.`booking_id` inner join sg_exbeforebookingdetails bb on bb.`booking_id`=b.`booking_id` inner join sg_expeditionbatches tb on tb.`batch_id` = b.`batch` WHERE pm.`booking_id`=:booking_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":booking_id", $booking_id);
      $res = $stmt->execute();
      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      $bookingdetails = $this->getExpeditionBookingDetails($reg->booking_id);
      $purpose = $bookingdetails[0]->expedition_title;
      $expedition_fee = $bookingdetails[0]->amount;
      $gst = ($reg->original_amount*5/100);
      $tot_amount = $reg->original_amount+$gst;
      $pending_amount = $tot_amount - $reg->amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $item_name = $booking_id;
      $pending_amount = round($pending_amount, 2);
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
      $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key,$private_auth_token,$api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $pending_amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => true,
          "send_sms" => true,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccessexpedition",  
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailsexpedition"            
        ));
        $response['booking_id'] = $item_name;
        $response['payment_type'] = '3';
        $response['original_amount'] = $tot_amount;
        $response['expedition_fee'] = $expedition_fee;
        if ($response != '')
        {
          $beforepaymentdetails = $this->insertExBeforeBookingDetails($response);
          $requestid = $this->getExPaymentRequestId($beforepaymentdetails);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success please complete Trek Booking payment process",
              'requestid' => $requestid,
              'URL' => 'https://test.instamojo.com/@rakhi_m305/'. $requestid,
              'TotalAmount' => $pending_amount
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Trek Booking  Not Added "
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
  public function getSuccessBookingDetailsExpedition($data) {
    try {
      extract($data);
      extract($_POST);
      if(isset($_POST['payment_id'])&&$_POST['payment_id']!=''){
        if(isset($_POST['status']) && $_POST['status'] == 'Credit'){
          $logs_info = $this->getExLogDetails($_POST['payment_request_id']);
          $this->insertExPaymentDetails($_POST['payment_id'], $_POST['payment_request_id']);
          $this->set_logs("ridingsolo",'expeditions',"getSuccessBookingDetailsExpedition",implode('~',$_POST),'AfterPayment');
        }else {
          $this->set_logs("ridingsolo",'expeditions',"getSuccessBookingDetailsExpedition",implode('~',$_POST),'AfterPayment');
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getBookingHistory($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT DISTINCT(pm.`txn_id`), b.`trek_id` AS trekId, pm.`payment_id` AS paymentId, pm.`txn_id` AS txnId, concat('RS ',pm.`amount`) as amountPaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txnDate, gettrekname(b.`trek_id`) as trekName, ib.trekstart_date AS startDate, ib.trekend_date AS endDate, COALESCE(pm.`original_amount`,pm.`amount`,0) as originalAmount, (COALESCE(pm.`original_amount`,pm.`amount`,0) - pm.amount) AS pendingAmount, (COALESCE(pm.`original_amount`,pm.`amount`,0) - pm.amount) AS discount, get_trek_batch_status(ib.batch_id) AS status FROM sg_inserttrekbatches ib inner join sg_paymentdetails pm inner join sg_bookingdetails b on pm.`booking_id` = b.`booking_id` inner join sg_beforebookingdetails bb on bb.`booking_id` = b.`booking_id` WHERE (bb.`phone` like '%$mobile%' or bb.`email`='$email')  order by pm.`payment_id` desc LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'details' => $transactiondetails
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
  public function getCelebrityTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT `celebritytrip_id` AS tripId, `trip_title` As tripTitle, `trip_days` AS tripDays, `trip_nights` AS tripNights, `trip_fee` AS tripFee, `trip_overview` AS tripOverview, `celebrity_name` AS celebrityName, CONCAT('".SITEURL."uploads/celebritytrips/',`trip_image`) AS tripImage, CONCAT('".SITEURL."uploads/celebritytrips/',`trip_pagebanner`) AS pageBanner, `status`, `created_date` As createdDate, `modified_date` AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy FROM `sg_celebritytrip` WHERE status='0' LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $trips = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($trips))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No celebrity Trips Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'celebritytrips' => $trips
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
  public function getCelebrityTripDetails($data) {
    try {
      extract($data);
      $sql = "SELECT `celebritytrip_id` AS tripId, `trip_title` As tripTitle, `trip_days` AS tripDays, `trip_nights` AS tripNights, `trip_fee` AS tripFee, `trip_overview` AS tripOverview, `celebrity_name` AS celebrityName, CONCAT('".SITEURL."uploads/celebritytrips/',`trip_image`) AS tripImage, CONCAT('".SITEURL."uploads/celebritytrips/',`trip_pagebanner`) AS pageBanner, `status`, `created_date` As createdDate, `modified_date` AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy FROM `sg_celebritytrip` WHERE celebritytrip_id='$trip_id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $trips = $stmt->fetch(PDO::FETCH_OBJ);
        if (empty($trips))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No celebrity Trip Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'celebritytrip' => $trips
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
  public function addCelebrityTripEnquiry($data) {
    try {
      extract($data);
      $sql = "INSERT INTO `sg_celebritytripenquiry`(`name`, `email`, `mobile`, `city`, `state`, `no_persons`, `created_date`, `comments`, `trip_id`) VALUES (:name, :email, :mobile, :city, :state, :no_persons, :created_date, :comments, :trip_id)";
      $stmt = $this->connection->prepare($sql);
      $created_date=date("Y-m-d H:i:s");
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":mobile", $mobile);
      $stmt->bindParam(":city", $city);
      $stmt->bindParam(":state", $state);
      $stmt->bindParam(":no_persons", $noPersons);
      $stmt->bindParam(":comments", $comments);
      $stmt->bindParam(":trip_id", $tripId);
      $stmt->bindParam(":created_date", $created_date);
      $res = $stmt->execute();
      if ($res=='true'){
        $status = array('status'=>ERR_OK,
        'message'=>"Success");
      }
      else{
        $status = array('status'=>ERR_NOT_MODIFIED,
        'message'=> "Sorry, Please try once again!");
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
  public function getSearchAllLeisureTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      if(isset($search_keyword)&&$search_keyword!='')
      {
        $condition .= " and `pkg_name` LIKE '%".$search_keyword."%' ";
      }
      if (isset($budget)&&$budget!='' && $budget == '7')
      {
          $condition .= " and  `single_price` < 10000 ";
      }
      else if (isset($budget) && $budget!='' &&  $budget == '8')
      {
          $condition .= " and `single_price` >= 10000 and `single_price` <= 20000 ";
      }
      else if (isset($budget) && $budget != '' && $budget == '9')
      {
          $condition .= " and `single_price` > 20000 ";
      }
      if(isset($terrain) && $terrain != '')
      {
        $condition .= " and `terrain_id` ='".$terrain."' ";
      }
      $sql = "SELECT `leisure_id` AS leisureId, `pkg_name` AS pkgName, `pkg_days` AS pkgDays, `pkg_nights` AS pkgNights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, (SELECT tr.terrain_name FROM sg_lpterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain FROM `sg_leisurepackages` WHERE status='0' " .$condition. " LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($packages))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Leisure packages Found "
          );
          return $status;
        }
        else
        {
          //total
          $sql = "SELECT COUNT(`leisure_id`) AS ttl_cnt FROM `sg_leisurepackages` WHERE status='0' " .$condition;
          $stmt = $this->connection->prepare($sql);  
          $stmt->execute();
          $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'total_cnt' => $blogcnt->ttl_cnt,
              'leisurepackages' => $packages
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
  public function getFilterAllLeisureTrips($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      
      if(isset($difficulty)&&$difficulty!='')
      {
        //$condition .= " and t.`visit_time` ='".$difficulty."' ";
      }
      if(isset($season)&&$season!='')
      {
        //$condition .= " and FIND_IN_SET('".$season."', t.`season`) ";
      }
      if(isset($region)&&$region!='')
      {
        //$condition .= " and t.`region` ='".$region."' ";
      }
      if(isset($day_night) && $day_night!='')
      {
        $condition .= " and (pkg_nights ='".$day_night."' OR pkg_days ='".$day_night."') ";
      }
      if(isset($terrain) && $terrain != '')
      {
        $condition .= " and `terrain_id` ='".$terrain."' ";
      }
      $sql = "SELECT `leisure_id` AS leisureId, `pkg_name` AS pkgName, `pkg_days` AS pkgDays, `pkg_nights` AS pkgNights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, (SELECT tr.terrain_name FROM sg_lpterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain FROM `sg_leisurepackages` WHERE status='0' " .$condition. " LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($packages))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Leisure packages Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'leisurepackages' => $packages
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
  public function getLeisureTripDetails($data) {
    try {
      extract($data);      
      $sql = "SELECT `leisure_id` AS leisureId, `pkg_name` AS pkgName, `pkg_days` AS pkgDays, `pkg_nights` AS pkgNights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, '' AS detailItinerary, '' AS reviews, COALESCE(getlprating(`leisure_id`),0)+0.0 as rating, '' AS activities, '' AS batchdates, (SELECT tr.terrain_name FROM sg_lpterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain, CONCAT('".SITEURL."uploads/packages/',pdf_url) AS pdfUrl FROM `sg_leisurepackages` WHERE leisure_id='$trip_id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages['details'] = $stmt->fetch(PDO::FETCH_OBJ);
        if (empty($packages['details']))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Leisure package Found "
          );
          return $status;
        }
        $packages['details']->detailItinerary = $this->getLpIterinaryDetails($trip_id);
        $packages['details']->reviews = $this->getLpReviews($trip_id);
        $packages['details']->activities = $this->getLpActivities($trip_id);
        $packages['details']->faq = $this->getLpFaq($trip_id);
        $packages['details']->batchdates = $this->getLpBatchDetails($trip_id);
        if (empty($packages))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Leisure package Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'leisurepackage' => $packages
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
  public function getLpIterinaryDetails($id) {
    try {
      $sql = "SELECT title AS iterinaryTitle,description AS iterinaryDetails FROM sg_leisurepkgitinerary where leisurepkg_id =$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['getiterinarydetails'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['getiterinarydetails'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getLpBatchDetails($id) {
    try {
      $sql="SELECT getmonthname(month(`lpstart_date`)) AS monthName, lpbatch_id AS batchId, lpbatch_size-(getlpbatchcount(lpbatch_id)) AS seatsInfo, getlpbatchstatusname(lpbatch_size-(getlpbatchcount(lpbatch_id)),`lpbatch_status`) AS batchStatus, lpstart_date AS startDate, lpend_date AS endDate, lpbatch_status AS seatStatus, CONCAT(DATE_FORMAT(`lpstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(`lpend_date`,'%M %d')) AS display, '' AS bookings FROM sg_lpbatches WHERE `lp_id`=$id AND `lpstart_date` >= now() ORDER BY lpstart_date ASC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $dates = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      if(!empty($dates)) {
        foreach ($dates as $key => $value) {
          //bookings
          $sql = "SELECT p.name, p.age, p.gender, b.city FROM sg_participantdetails p, sg_lpbookingdetails b where p.booking_id = b.booking_id AND b.batch = '".$value->batchId."' ORDER BY p.booking_id DESC LIMIT 5";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $limit = 5 - count($bookings);
          $sql = "SELECT name, age, gender, city FROM sg_dummy_bookings ORDER BY RAND() LIMIT ".$limit;
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $bookings1 = $stmt->fetchAll(PDO::FETCH_OBJ);
          
          $value->bookings = array_merge($bookings, $bookings1);
          $d[$value->monthName][] = $value;
        }
      }
      $trekbyid['dates'] = $d;
      return $trekbyid['dates'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLpReviews($id) {
    try {
      $sql = "SELECT review, name, rating+0.0 as rating, mobile_no AS mobile, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate FROM sg_lpreviews WHERE `lpkg_id`= $id and `status`='1' order by review_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['reviews'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['reviews'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLpActivities($id) {
    try {
      $sql = "SELECT `lpactivity_id` AS id, `activity_name` AS activityName, `activity_desc` AS description, `activity_price` AS price, `status`, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, DATE_FORMAT(`modified_date`,'%M %d,%Y') AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy FROM sg_lpaddonactivities WHERE `lepkg_id`= $id and `status`='0' order by lpactivity_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['activities'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['activities'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function addLeisureTripReview($data) {
    try {
      extract($data);
      $sql = "INSERT INTO sg_lpreviews (name, mobile_no, rating, review, lpkg_id, status, created_date) VALUES(:name, :mobile_no, :rating, :review, :lpkg_id, :status, :created_date)";
      $stmt = $this->connection->prepare($sql);
      $status = '9';
      $created_date=date("Y-m-d H:i:s");
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":mobile_no", $mobileNo);
      $stmt->bindParam(":rating", $rating);
      $stmt->bindParam(":review", $review);
      $stmt->bindParam(":lpkg_id", $lpkgId);
      $stmt->bindParam(":status", $status);
      $stmt->bindParam(":created_date", $created_date);
      $res = $stmt->execute();
      if ($res=='true'){
        $status = array('status'=>"200",
        'message'=>"Success");
      }
      else{
        $status = array('status'=>ERR_NOT_MODIFIED,
        'message'=> "Sorry, Please try once again!");
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
  public function getLpFaq($id) {
    try {
      $query ="SELECT `faq_id`, `lp_id`, `cat_id`, `question`, `answer`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, (SELECT category_title FROM sg_faq_categories WHERE faq_cat_id = cat_id) AS category_title FROM `sg_lp_faq` WHERE status='0'  order by faq_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      foreach ($results as $key => $value) {
        $d[$value->category_title][] = $value;
      }
      return $d;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getSearchAllHostels($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $condition = '';
      if(isset($search_keyword)&&$search_keyword!='')
      {
        $condition .= " and `hostel_name` LIKE '%".$search_keyword."%' ";
      }
      if(isset($terrain) && $terrain != '')
      {
        $condition .= " and `terrain_id` ='".$terrain."' ";
      }
      $sql = "SELECT `hostel_id` AS id, `hostel_name` AS hostelName, `email`, `mobile`, `landline`, `address`, CONCAT('".SITEURL."uploads/hostels/', `logo`) AS logo, `location`, `city`, `state`, `status`, `spoc_name` AS spocName, `spoc_number` AS spocNumber, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, DATE_FORMAT(`modified_date`,'%M %d,%Y') AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy, hotel_code, hotel_apikey, (SELECT tr.terrain_name FROM sg_hostelterrains tr WHERE tr.terrain_id=terrain_id LIMIT 0,1) AS terrain, hotel_type AS facilities FROM `sg_hosteldetails` WHERE status='0' " .$condition. " LIMIT ".$offsetid.",".$record_count;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($packages))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Hostels Found "
          );
          return $status;
        }
        else
        {
          //total
          $sql = "SELECT COUNT(`hostel_id`) AS ttl_cnt FROM `sg_hosteldetails` WHERE status='0' " .$condition;
          $stmt = $this->connection->prepare($sql);  
          $stmt->execute();
          $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);

          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'total_cnt' => $blogcnt->ttl_cnt,
              'hostels' => $packages
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
  public function getHostelDetails($data) {
    try {
      extract($data);      
      $sql = "SELECT `hostel_id` AS id, `hostel_name` AS hostelName, `email`, `mobile`, `landline`, `address`, CONCAT('".SITEURL."uploads/hostels/', `logo`) AS logo, `location`, `city`, `state`, `status`, `spoc_name` AS spocName, `spoc_number` AS spocNumber, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, DATE_FORMAT(`modified_date`,'%M %d,%Y') AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy, hostel_description, hostel_map, house_rules, '' AS gallery, '' AS reviews, '' AS facilities, '' AS faq, '' AS rooms, hotel_code, hotel_apikey, CONCAT('".SITEURL."uploads/hostels/',pdf_url) AS pdfUrl, hotel_type AS facilities FROM `sg_hosteldetails` WHERE hostel_id='$hostel_id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages['details'] = $stmt->fetch(PDO::FETCH_OBJ);
        if (empty($packages['details']))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Hostel Found "
          );
          return $status;
        }
        $packages['details']->gallery = $this->getHostelGallery($hostel_id);
        $packages['details']->reviews = $this->getHostelReviews($hostel_id);
        $packages['details']->facilities = $this->getHostelFacilities($hostel_id);
        $packages['details']->faq = $this->getHostelFaq($hostel_id);
        $packages['details']->rooms = $this->getHostelRooms($hostel_id);
        if (empty($packages))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Hostel Found "
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success.",
              'hosteldetails' => $packages
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
  public function getHostelGallery($id) {
    try {
      $sql = "SELECT `hostelgallery_id` AS id, CONCAT('".SITEURL."uploads/hostels/', `image_name`) AS imageName, `hostel_id` AS hostelId, `status`, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, DATE_FORMAT(`modified_date`,'%M %d,%Y') AS modifiedDate, `created_by`, `modified_by` FROM `sg_hostelgallery` WHERE hostel_id='$id' ORDER BY hostelgallery_id DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekbyid['gallery'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $trekbyid['gallery'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getHostelReviews($hostel_id) {
    try {
      $sql = "SELECT review, name, rating+0.0 AS rating, mobile_no AS mobile, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, user_id AS userId FROM sg_hostel_reviews WHERE `hostel_id`= $hostel_id and `status`='1' order by review_id desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $tripbyid['reviews'] = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $tripbyid['reviews'];
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getHostelFaq($hostel_id) {
    try {
      $query ="SELECT `faq_id`, `hostel_id`, `cat_id`, `question`, `answer`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, (SELECT category_title FROM sg_faq_categories WHERE faq_cat_id = cat_id) AS category_title FROM `sg_hostel_faq` WHERE status='0'  order by faq_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      $d = array();
      foreach ($results as $key => $value) {
        $d[$value->category_title][] = $value;
      }
      return $d;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getHostelFacilities($hostel_id) {
    try {
      $query ="SELECT * FROM `sg_hostel_facilities` WHERE hostel_id = '$hostel_id' AND status='0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getHostelRooms($hostel_id) {
    try {
      $query ="SELECT *, (CASE when room_type='1' THEN 'Deluxe Double Bed Private'
                              when room_type='2' THEN 'Standard 4 Bed Female Ensuite'
                              ELSE 'Standard 4 Bed Mixed Dorm' END) AS room_type FROM `sg_hostel_rooms` WHERE hostel_id = '$hostel_id' AND status='0'";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function submitPartnerWithUs($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $status = '0';
      if($mobile == '' || $email == '') {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure Partner with Us Form Not Submitted "
        );
        return $status;  
      }
      $sql = "INSERT INTO `sg_partner_with_us`(`name`, `email`, `mobile`, `state`, `city`, `company_name`, `company_phone`, `company_address`, `address`, `comments`, `created_date`, `status`) VALUES('$name', '$email', '$mobile', '$state', '$city', '$company_name', '$company_phone', '$company_address', '$address', '$comments', '$created_date', '$status')";
      $stmt = $this->connection->prepare($sql);
      $res = $stmt->execute();
      if ($res == 1)
      {
        $email1 = ADMIN_EMAIL;
        $subject1 = "Enquiry From Partner with us Form";
        $message1 = '<p style="color:black;"><strong>User enquired with below details</strong></p>';
        $message1 .= "<html>
          <head>
              <title>'User enquired with below details'</title>
          </head>
          <body>
              <table>
                  <tr>
                        <td width='100'>Name</td>
                        <td width='10'> : </td>
                        <td width='350'>" . $name . "</td>
                  </tr>
                  <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>" . $email . "</td>
                  </tr>
                  <tr>
                        <td>Mobile</td>
                        <td> : </td>
                        <td>" . $mobile . "</td>
                    </tr>
                  <tr>
                        <td>State</td>
                        <td> : </td>
                        <td>" . $state . "</td>
                  </tr>
                  <tr>
                        <td>City</td>
                        <td> : </td>
                        <td>" . $city . "</td>
                  </tr>
                  <tr>
                        <td>Address</td>
                        <td> : </td>
                        <td>" . $address . "</td>
                  </tr>
                  <tr>
                        <td>Company Name</td>
                        <td> : </td>
                        <td>" . $company_name . "</td>
                  </tr>
                  <tr>
                        <td>Company Phone</td>
                        <td> : </td>
                        <td>" . $company_phone . "</td>
                  </tr>
                  <tr>
                        <td>Company address</td>
                        <td> : </td>
                        <td>" . $company_address . "</td>
                  </tr>
                  <tr>
                        <td>Comments</td>
                        <td> : </td>
                        <td>" . $comments . "</td>
                  </tr>
              </table>
          </body>
        </html>";
        $smtpemail = new smtpHelper;
        $smtpemail->email = $email1;
        $smtpemail->subject = $subject1;
        $smtpemail->message = $message1;
        //$smtp = $smtpemail->SendEmail();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Partner with Us Form Submitted Successfully."
        );
        return $status;    
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Partner with Us Form Not Submitted "
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
  public function set_logs($session_id, $controller, $function, $msg, $type) {    
    $msg_print = '['. $session_id .']' . '[' . date('Y/m/d H:i:s') .']' . '['. @$_SERVER[REMOTE_ADDR] . ']' . '[' . $controller . ']' . '[' . $function . ']' . '[' . $msg . ']'. PHP_EOL;
    $f_type = '_TRANSACTIONS';    
     $folder = "transactions";
    
    if (!is_dir(BASE.'riding/logs/'.$folder)){
      mkdir(BASE.'riding/logs/'.$folder, 777);
    }
    if (!is_dir(BASE.'riding/logs/'.$folder.'/'.date('M')."-".date('Y'))){
      mkdir(BASE.'riding/logs/'.$folder.'/'.date('M')."-".date('Y'), 777);
      chmod(BASE.'riding/logs/'.$folder.'/'.date('M')."-".date('Y'), 0777);
    }
    $file = BASE.'riding/logs/'.$folder.'/'.date('M')."-".date('Y').'/'.date('Ymd').$f_type.'.txt';
    $base_perm = BASE.'riding/logs/'.$folder;           
    if(file_exists($file) == 1){        
      $myfile = fopen($file, "a+") or die("Unable to open file!");
      $txt = $msg."\n";
      fwrite($myfile, $msg_print);
      fclose($myfile);
    }else{
      $myfile = fopen($file, "w") or die("Unable to open file!");       
      fwrite($myfile, $msg_print);       
      fclose($myfile);
    }        
  }
  public function getSelectedLeisureTripDetails($trip_id) {
    try {     
      $sql = "SELECT `leisure_id` AS id, `pkg_name` AS title, `pkg_days` AS days, `pkg_nights` AS nights, `suitable_for` AS suitableFor, `single_price` AS singlePrice, `couple_price` AS couplePrice, `family_price` AS familyPrice, `pkg_overview` AS pkgOverview, `pkg_activities` AS pkgActivities, `hotel_name` AS hotelName, CONCAT('".SITEURL."uploads/packages/hotel/', `hotel_image`) AS hotelImage, `hotel_location` AS hotelLocation, `inclusion_exclusion` AS inclusionExclusion, `where_report` AS whereReport, `terms_conditions` AS termsConditions, `faq`, `status`, `created_date` AS createdDate, `modified_date` AS modifiedDate, CONCAT('".SITEURL."uploads/packages/', `pkg_image`) AS pkgImage, `popular_pkg` AS popularPkg, `created_by` AS createdBy, `modified_by` AS modifiedBy, '' AS detailItinerary, '' AS reviews, '' AS activities FROM `sg_leisurepackages` WHERE leisure_id='$trip_id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $packages['details'] = $stmt->fetch(PDO::FETCH_OBJ);
        return $packages['details'];
        // $packages['details']->detailItinerary = $this->getLpIterinaryDetails($trip_id);
        // $packages['details']->reviews = $this->getLpReviews($trip_id);
        // $packages['details']->activities = $this->getLpActivities($trip_id);
        // if (empty($packages))
        // {
        //   $status = array(
        //       'status' => ERR_NO_DATA,
        //       'message' => "No Leisure package Found "
        //   );
        //   return $status;
        // }
        // else
        // {
        //   $status = array(
        //       'status' => ERR_OK,
        //       'message' => "Success.",
        //       'leisurepackage' => $packages
        //   );
        //   return $status;
        // }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function lpBookingProcess($data) {
    try {
      extract($data);
      $userid = $userId;
      $lp_id = $id;
      if($userId == '' || $lp_id == '') {
        $status = array(
              'status' => ERR_PARTIAL_CONT,
              'message' => "Please check your details!"
        );
        return $status;  
      }else {
        $data1 = array('trip_id' => $id);
        $userdetails['details'] = $this->getSelectedLeisureTripDetails($id);
        $userdetails['batchdates'] = $this->getLpBatchDates($id);
        $userdetails['termsdetails'] = $this->getTermDetails();
        $userdetails['userdetails'] = $this->getLoginUserDetails($userid);
        $userid = $userdetails['userdetails']->id;
        $userdetails['userparticipants'] = $this->getUserParticipants($userid);
        $userdetails['otherdetails'] = $this->getOtherDetails();
        $userdetails['rentalitems'] = $this->getLpRentalItems($id);
        $userdetails['addons'] = $this->getLpAddons($id);

        if ((empty($userdetails)))
        {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Data"
          );
          return $status;  
        }else {
          if ((empty($userdetails['details'])) || (empty($userdetails['userdetails']))) {
            $status = array(
              'status' => ERR_NO_DATA,
              'message' => "No Data"
            );
            return $status;  
          }else {
            $status = array(
                'status' => ERR_OK,
                'message' => "Success.",
                'details' => $userdetails
            );
            return $status;  
          }
        }
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
  public function getLpBatchDates($id)
  {
    try{
      $sql="SELECT `lpbatch_id` AS batchId, DATE_FORMAT(`lpstart_date`, '%M %d %Y') as startDate, DATE_FORMAT(`lpend_date`, '%M %d %Y') as endDate, lpbatch_size AS batchSize, lpbatch_status AS batchStatus, lp_id AS id FROM sg_lpbatches where `lp_id`= $id and `lpstart_date`>=CURDATE()";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $batchdates = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $batchdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getLpAddons($id) {
    try {
      $query ="SELECT * FROM `sg_lpaddonactivities` WHERE lepkg_id = '$id' AND status='0'  order by lpactivity_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLpRentalItems($id) {
    try {
      $query ="SELECT tr.rentalitem_id, tr.rentalitem, tr.item_cost, r.item_name, r.item_code, r.image_1, r.rental_category, r.non_returnable, r.item_description, '' AS sizes FROM `sg_lprentalitems` tr, sg_rental_items r WHERE tr.lp_id = '$id' AND r.item_id=tr.rentalitem AND tr.status='0'  order by rentalitem_id ASC ";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($results as $key => $value) {
        $sizes = array('1'=>'S','2'=>'M','3'=> 'L','4'=> 'XL','5'=> 'XXL');
        $results[$key]->sizes = $sizes;
      }
      return $results;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function addLpBookingDetails($data) {
    try {
      extract($data);
      $lpId = $id;
      if($id == '' || $participants == '' || $userId == '' || $batch == '') {
        $status = array(
          'status' => ERR_PARTIAL_CONT,
          'message' => "Failure! Please check details."
        );
        return $status;
      }
      $trekdetails = $this->getSelectedLeisureTripDetails($id);
      if(empty($trekdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! Trip ID is not valid."
        );
        return $status;
      }
      $userdetails = $this->getLoginUserDetails($userId);
      if(empty($userdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! User ID is not valid."
        );
        return $status;
      }
      $sql = "INSERT INTO sg_lpbookingdetails (lp_id, lp_fee, created_date, how_did_you_find_us, have_you_trekked_with_us, user_id, batch, accepted_terms, accepted_medical_terms, accepted_liability_terms, secured_my_trip) VALUES(:lp_id, :lp_fee, :created_date, :how_did_you_find_us, :have_you_trekked_with_us, :user_id, :batch, :accepted_terms, :accepted_medical_terms, :accepted_liability_terms, :secured_my_trip)";
      $stmt = $this->connection->prepare($sql);
      $created_date = date("Y-m-d H:i:s");
      $participant_id = $participants;
      $stmt->bindParam(":lp_id", $id);
      $stmt->bindParam(":lp_fee", $fee);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":how_did_you_find_us", $aboutUs);
      $stmt->bindParam(":have_you_trekked_with_us", $trekkedWithUs);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":batch", $batch);
      $stmt->bindParam(":accepted_terms", $acceptedTerms);
      $stmt->bindParam(":accepted_medical_terms", $acceptedMedicalTerms);
      $stmt->bindParam(":accepted_liability_terms", $acceptedLiabilityTerms);
      $stmt->bindParam(":secured_my_trip", $securedMyTrip);
      $res = $stmt->execute();
      $booking_id = $this->connection->lastInsertId();
      if(isset($booking_id) && $booking_id != '0'){
        $status = $this->insertlpParticipentsDetails($booking_id, $participant_id);   
        if(isset($rentalItems) && !empty($rentalItems)) {
          $res = $this->insertLpBookingRentals($booking_id, $rentalItems);
        }
        if(isset($addons) && !empty($addons)) {
          $res = $this->insertLpBookingAddons($booking_id, $addons);
        }       
      }else {
        $status = array(
          'status' => ERR_NOT_MODIFIED,
          'message' => "Failure! Booking is not added."
        );
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
  public function insertLpBookingRentals($booking_id, $rentalItems) {
    try {     
      extract($rentalItems);
      $created_date = date('Y-m-d H:i:s');
      foreach ($rentalItems as $key => $value)
      {
        $sql = "INSERT INTO `sg_lp_rental_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`, `size`) VALUES ('$booking_id', '".$value->itemId."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0', '".$value->size."')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success rental items added ",
          'booking_id' => $booking_id
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
  public function insertLpBookingAddons($booking_id, $addons) {
    try {     
      extract($addons);
      $created_date = date('Y-m-d H:i:s');
      foreach ($addons as $key => $value)
      {
        $sql = "INSERT INTO `sg_lp_addon_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`) VALUES ('$booking_id', '".$value->add_on_id."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success add-ons added ",
          'booking_id' => $booking_id
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
  public function insertlpParticipentsDetails($booking_id, $participants)
  {
    try {     
      $participentsid = $participants;
      $s = explode(',', $participentsid);
      $created_date = date("Y-m-d H:i:s");
      foreach ($s as $key => $value)
      {
        $sql = "INSERT INTO sg_lpparticipantdetails (name, email, mobile, age, gender, height, weight, booking_id, created_date, part_id)
        SELECT name, email, mobile, age, gender, height, weight, '$booking_id', '$created_date', participant_id
        FROM   sg_userparticipantdetails
        WHERE  participant_id =".$value;
        $stmt = $this->connection->prepare($sql);
        $res = $stmt->execute();
      }
      if ($res == 'true') {
        $query = "UPDATE sg_lpbookingdetails SET address = (select address from sg_userparticipantdetails where participant_id = '".$participants[0]->participant."') where booking_id = :booking_id"; 
        $stmt2 = $this->connection->prepare($query);
        $stmt2->bindParam(":booking_id", $booking_id);
        $stmt2->execute();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Booking & participents added ",
            'booking_id' => $booking_id
        );
      }else {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Participents are not added "
        );
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
  public function lPpaymentPage($data) {
    try {
      extract($data);
      $bookingid = $bookingId;
      $payment_type = $paymentType;
      $originalamount = $originalAmount;
      $voucher = $voucher;
      $lp_id = $id;
      $noparticipants = $noparticipants;
      if($bookingid == '' || $paymentType == '' || $originalAmount == '' || $lp_id == '' || $noparticipants == '') {
        $status = array(
            'status' => ERR_PARTIAL_CONT,
            'message' => "Failure, Please Check your data"
        );
        return $status;
      }
      if ($voucher !='')
      {
        $sql = "SELECT * FROM sg_trekcoupons WHERE UPPER(`coupon_code`) = UPPER(trim('$voucher'))  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and (all_treks='1')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($coupondetails)) {
          $discountamount = $noparticipants * $coupondetails->discount_amount;
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2) - $discountamount;
          $status = array(
              'status' => ERR_OK,
              'message' => "Promocodes applied",
              'Amount' => $originalamount,
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'DiscountAmount' => $discountamount,
              'TotalAmount' => $total_amount
            );
          return $status;
        }
        else if($payment_type == 1) {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $totalamount = (Float)$originalamount + (float)$gstamount;
          $total_amount1 = (Float)(round($totalamount * 100) / 100);
          $total_amount = round($total_amount1, 2);
          $status = array(
            'status' => ERR_NO_DATA,
            'message' => "invalid promocode",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
          );
          return $status;
        }
        else {
          $gst = ($originalamount) * (5 / 100);
          $gstamount = (float) round($gst,2);
          $trek_total = (Float)$originalamount + (Float)$gstamount;
           //check rentals
            $sql = "SELECT rental_id FROM sg_lp_rental_bookings WHERE booking_id='".$bookingid."'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $rentals = $stmt->fetch(PDO::FETCH_OBJ);
            if(empty($rentals)) {
              $advance_amount = (float)($trek_total * (10 / 100));
            }else {
              $advance_amount = (float)($trek_total * (20 / 100));
            }  
          $total_amount = number_format($advance_amount, 2, '.', '');
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "invalid promocode",
              'GST%' => '5%',
              'GSTAmount' => $gstamount,
              'TotalAmount' => $trek_total,
              'Amount' => $total_amount
          );
          return $status;
        }
      }
      else if ($payment_type == 1)
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $totalamount = (Float)$originalamount + (float)$gstamount;
        $total_amount1 = (Float)(round($totalamount * 100) / 100);
        $total_amount = round($total_amount1, 2);
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'Amount' => $originalamount,
            'GST%' => '5%',
            'GSTAmount' => $gstamount,
            'TotalAmount' => $total_amount
        );
        return $status;
      }
      else
      {
        $gst = ($originalamount) * (5 / 100);
        $gstamount = (float) round($gst,2);
        $trek_total = (Float)$originalamount + (Float)$gstamount;
         //check rentals
          $sql = "SELECT rental_id FROM sg_lp_rental_bookings WHERE booking_id='".$bookingid."'";
          $stmt = $this->connection->prepare($sql);
          $stmt->execute();
          $rentals = $stmt->fetch(PDO::FETCH_OBJ);
          if(empty($rentals)) {
            $advance_amount = (float)($trek_total * (10 / 100));
          }else {
            $advance_amount = (float)($trek_total * (20 / 100));
          }  
        $total_amount = number_format($advance_amount, 2, '.', '');
        $status = array(
                    'status' => ERR_OK,
                    'message' => "Success",
                    'GST%' => '5%',
                    'GSTAmount' => $gstamount,
                    'TotalAmount' => $trek_total,
                    'Amount' => $total_amount
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
  public function getLpTransactionDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
          $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
          $condition .= " or ";
      }
      if(isset($email) && $email!=''){
          $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(pm.`txn_id`),b.`lp_id`,pm.`lppayment_id`,pm.`txn_id`, concat('RS ',pm.`amount`) as amountpaid, DATE_FORMAT(pm.`created_date`,'%d %M,%Y') AS txn_date, getlpname(b.`lp_id`) as lpname FROM sg_lppaymentdetails pm inner join sg_lpbookingdetails b on pm.`lpbooking_id` = b.`booking_id` inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id` = b.`booking_id` WHERE $condition  order by pm.`lppayment_id` desc";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status; 
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function viewLpInvoice($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,getlpparticipantscount(b.`booking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, getlpname(b.`lp_id`) as title, get_lpfee(b.`booking_id`) as fee,ib.`lpstart_date`,ib.`lpend_date`, pm.`txn_id`,pm.`created_date` as txn_date,p.`name`,p.`email`,p.`mobile`,'' as trekamount,'' as bookingamount,'' as gstamount,'' as totalamount,'' as pending_amount,'' as discount FROM sg_lpbookingdetails b inner join sg_lppaymentdetails pm on pm.`lpbooking_id` = b.`lpbooking_id` inner join sg_lpbatches ib on b.`batch` = ib.`lpbatch_id` inner join sg_lpparticipantdetails p on p.`lpbooking_id`=b.`booking_id` WHERE pm.`payment_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      $trekamount = $transactiondetails['invoicedetails']->trek_fee;
      $transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pdLp($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = $pending_amount;
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'transactiondetails' => $transactiondetails
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
  public function getLpBDetails($data) {
    try {
      extract($data);
      $condition = '';
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10'){
        $condition .= "bb.`phone`  like '%$mobile%'";
      }
      if(isset($mobile) && $mobile!='' && strlen($mobile)>='10' && isset($email) && $email!=''){
        $condition .= " or ";
      }
      if(isset($email) && $email!=''){
        $condition .= "bb.`email`= '$email'";
      }
      $sql = "SELECT DISTINCT(b.`tripbooking_id`), pm.`amount`, pm. `trippayment_id`, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, gettripparticipantscount(b.`tripbooking_id`) as personcnt, t.`biketrips_id`, t.`trip_title`,t.`trip_fee`, b.`tripbooking_id`, ib.`tripbatch_id`, DATE_FORMAT(ib.`tripstart_date`,'%d %M,%Y') as `tripstart_date`, DATE_FORMAT(ib.`tripstart_date`,'%d %M,%Y') as `tripend_date`, pm.`trippayment_id`, pm.`amount`, getcurrentstatus(b.`tripbooking_id`) as payment_type, if(pm.`payment_type`='2','Advance Payment','Full Payment') as payment_mode  FROM sg_biketrips t inner join sg_tripbookingdetails b on b.`trip_id` = t.`biketrips_id` INNER JOIN sg_tripbatches ib on b.`batch` = ib.`tripbatch_id`  INNER JOIN sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbeforebookingdetails bb on bb.`tripbooking_id`=b.`tripbooking_id` where $condition   order by pm.`trippayment_id` DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach ($bookingdetails as $key => $value) {
        $trippayment_id = $value->trippayment_id;
        $bookingdetails[$key]->invoiceurl = SITEURL."invoice/viewinvoice/".$this->base64_url_encode($trippayment_id);   
      }
      if ((empty($bookingdetails)))
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;     
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'bookingdetails' => $bookingdetails
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
  public function ViewLpInvoiceBD($data) {
    try {
      extract($data);
      $id = $payment_id;
      $sql = "SELECT pm.`amount`,gettripparticipantscount(b.`tripbooking_id`) as personcnt, COALESCE(pm.`original_amount`,pm.`amount`,0) as original_amount, COALESCE(pm.`payment_type`,0) as payment_type, gettripname(b.`trip_id`) as trip_title, get_tripfee(b.`tripbooking_id`) as trip_fee, ib.`tripstart_date`, ib.`tripend_date`, pm.`txn_id`,pm.`created_date` as txn_date FROM sg_tripbookingdetails b inner join sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbatches ib on b.`batch` = ib.`tripbatch_id`  WHERE pm.`trippayment_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails['invoicedetails'] = $stmt->fetch(PDO::FETCH_OBJ);
      //print_r($transactiondetails['invoicedetails']);exit;
      $trekamount = $transactiondetails['invoicedetails']->trip_fee;
      $transactiondetails['invoicedetails']->tripamount = $trekamount;
      $transactiondetails['participantdetails'] = $this->pdLp($id);
      $personscount = $transactiondetails['invoicedetails']->personcnt;
      $bookingamount = $trekamount * $personscount;
      $gstamount = $bookingamount * 5 / 100;
      $totalamount = $bookingamount + $gstamount;
      $originalamount = $transactiondetails['invoicedetails']->original_amount;
      $paid_amount = $transactiondetails['invoicedetails']->amount;
      $pending_amount = (float)($totalamount - $paid_amount);
      $discount = $totalamount - $paid_amount;
      $transactiondetails['invoicedetails']->bookingamount = $bookingamount;
      $transactiondetails['invoicedetails']->gstamount = $gstamount;
      $transactiondetails['invoicedetails']->totalamount = $totalamount;
      $transactiondetails['invoicedetails']->pending_amount = $pending_amount;
      $transactiondetails['invoicedetails']->discount = $discount;
      if ((empty($transactiondetails)))
      {
          $status = array(
              'status' => ERR_NO_DATA,
              'message' => "Failure"
          );
          return $status;
      }
      else
      {
          $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'bookingdetails' => $transactiondetails
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
  public function validateLpPromoCode($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $voucher = $voucher;
      $lp_id = $lp_id;
      $noparticipants = $noparticipants;
      $sql = "SELECT * FROM sg_lpcoupons WHERE `coupon_code` ='$voucher'  and  CURDATE() >= `valid_from` and CURDATE() <= `valid_till` and `status`='0' and `lp_id`=$lp_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $coupondetails = $stmt->fetch(PDO::FETCH_OBJ);
      if (empty($coupondetails))
      {
        $status = array(
            'status' => '204',
            'message' => 'Invalid coupon'
        );
        return $status;
      }
      $discountamount = $noparticipants * $coupondetails->discount_amount;
      $gst = ($originalamount) * (5 / 100);
      $gstamount = (float)$gst;
      $totalamount = (Float)$originalamount + (float)$gstamount;
      $total_amount1 = (Float)(round($totalamount * 100) / 100);
      $total_amount = round($total_amount1, 2) - $discountamount;
      $status = array(
          'status' => '200',
          'discount' => round($discountamount,2),
          'totalamount' => round($total_amount,2)
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
  public function proceedtoPayLp($data) {
    try {
      extract($data);
      $bookingid = $booking_id;
      $total_amount = $total_amount;
      $payment_type = $payment_type;
      $originalamount = $original_amount;
      $bookingdetails = $this->getLpBookingDetails($bookingid);
      if ($bookingdetails == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      $trekdates = $this->getLpBookingDates($bookingdetails[0]->batch);
      $purpose = 'Booking '. $bookingdetails[0]->lp_title;
      $amount = $total_amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $lp_fee = $bookingdetails[0]->amount;
      $item_name = $bookingid;
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
       $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key, $private_auth_token, $api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => false,
          "send_sms" => false,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccesslp",  //success page where gateway should redirect after payment,should always be an absolute url
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailslp" 
          
      ));
      $response['booking_id'] = $item_name;
      $response['payment_type'] = $payment_type;
      $response['original_amount'] = $originalamount;
      $response['lp_fee'] = $lp_fee;
      if ($response != '')
      {
        $beforepaymentdetails = $this->insertLpBeforeBookingDetails($response);
        $requestid = $this->getLpPaymentRequestId($beforepaymentdetails);
        $this->set_logs($purpose,'lp','bookingpayment',$purpose. ' - '.$amount . ' - '. $response['id'] ,'BeforePayment');

        $status = array(
            'status' => ERR_OK,
            'message' => "Success please complete Leisure trip Booking payment process",
            'requestid' => $requestid,
            'URL' => 'https://test.instamojo.com/@rakhi_m305/' . $requestid,
            'TotalAmount' => $total_amount
        );
        return $status;  
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Trek Booking  Not Added "
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
  public function insertLpBeforeBookingDetails($data)
  {
    try
    {
      extract($data);
      $created_date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO sg_lpbeforebookingdetails (lpbooking_id, purpose, request_id, amount,lp_fee, buyer_name, email, phone, payment_type, original_amount, created_date) VALUES( '$booking_id', '$purpose', '$id', '$amount','$lp_fee','$buyer_name', '$email', '$phone', '$payment_type', '$original_amount', '$created_date')";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $id = $this->connection->lastInsertId();
      return $id;
    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }
  public function getLpPaymentRequestId($id)
  {
      $sql = "SELECT request_id From sg_lpbeforebookingdetails where `bookingprocess_id`=$id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $r = $stmt->fetch(PDO::FETCH_OBJ);
      $requestid = $r->request_id;
      return $requestid;
  }
  public function getLpBookingDetails($id)
  {
    $sql = "SELECT b.`lp_id`, b.`booking_id`, b.`batch`, t.`single_price` as amount, t.`pkg_name`, p.`name` as firstname , getlpparticipantscount(b.`booking_id`) as personscount ,p.`email`,p.`mobile` as phone ,p.`participant_id` FROM sg_lpbookingdetails b inner join sg_leisurepackages t on b.`lp_id`=t.`leisure_id` inner join sg_lpparticipantdetails p on p.`booking_id`=b.`booking_id` where b.`booking_id`=$id order by p.`participant_id`";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetails = $stmt->fetchALL(PDO::FETCH_OBJ);
      return $bookingdetails;
  }
  public function getLpBookingDates($id)
  {
    try {
      $sql = "SELECT `lpstart_date`,`lpend_date` FROM sg_lpbatches where `lpbatch_id`= '$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $trekdates = $stmt->fetch(PDO::FETCH_OBJ);
      return $trekdates;
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function bookingSuccessLp($data) {
    try {
      extract($data);
      //print_r($data);exit; //Array ( [payment_id] => MOJO0927G05A43697517 [payment_status] => Credit [payment_request_id] => 2210bb1b67d846efbe58bde9de10ae1c )
      
      $paymentid = $payment_id;      
      $paymentstatus = $payment_status;
      $payment_request_id = $payment_request_id;
      if(isset($payment_id) && $payment_id != ''){
        if(isset($payment_status) && $payment_status == 'Credit') {
          $logs_info = $this->getLpLogDetails($payment_request_id);
          $this->insertLpPaymentDetails($payment_id, $payment_request_id);
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLpLogDetails($payment_request_id){
      $query = "SELECT buyer_name,amount,purpose FROM sg_tripbeforebookingdetails WHERE `request_id`=:request_id";      
      $stmt = $this->connection->prepare($query);
      $stmt->bindParam(":request_id", $payment_request_id);
      $stmt->execute();
      $log_details = $stmt->fetch(PDO::FETCH_OBJ);
      return $log_details;
  }
  public function insertLpPaymentDetails($payment_id, $payment_request_id)
  {
    try
    {
      $sql = "SELECT `purpose`,`lpbooking_id`,`amount`,`buyer_name`,`email`,`phone`,`payment_type`,`original_amount`  FROM sg_lpbeforebookingdetails WHERE `request_id`= '$payment_request_id'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $created_date = date("Y-m-d H:i:s");
      $amount = $bookingdetail->amount;
      $email = $bookingdetail->email;
      $booking_id = $bookingdetail->lpbooking_id;
      $payment_type = $bookingdetail->payment_type;
      $original_amount = $bookingdetail->original_amount;

      $sql2 = "INSERT INTO sg_lppaymentdetails (txn_id,amount,email,lpbooking_id,payment_request_id,payment_type,original_amount,created_date) VALUES(:txn_id,:amount,:email,:booking_id,:payment_request_id, :payment_type,:original_amount,:created_date)";
      $stmt2 = $this->connection->prepare($sql2);
      $stmt2->bindParam(":txn_id", $payment_id);
      $stmt2->bindParam(":amount", $amount);
      $stmt2->bindParam(":email", $email);
      $stmt2->bindParam(":booking_id", $booking_id);
      $stmt2->bindParam(":payment_request_id", $payment_request_id);
      $stmt2->bindParam(":payment_type", $payment_type);
      $stmt2->bindParam(":original_amount", $original_amount);
      $stmt2->bindParam(":created_date", $created_date);
      $res = $stmt2->execute();

      $paymentinsert_id = $this->connection->lastInsertId();
      if ($paymentinsert_id != '0')
      {
        $adminemail = $this->getLpParticipantDetails($booking_id);
        $email2 = $adminemail[0]->email;
        $subject2 = "Invoice For booking in Ridingsolo";
        $personscount = count($adminemail);
        $bookingamount = $adminemail[0]->trek_fee * $personscount;
        $gstamount = $bookingamount * 5 / 100;
        $totalamount = $bookingamount + $gstamount;
        $discount = $totalamount - $amount;
        $payment_type = $payment_type;
        $pending_amount = $totalamount - $amount;
        $message2 = '<!doctype html>
          <html lang="en">
            <head>
              <meta charset="utf-8">
              <title>Riding Solo : Lets Explore Together</title>
            </head>
            <body style="margin:0; background:#f3f5f8;">
              <div style="background:#f3f5f8; padding:20px;">
                <div style="font-family:Arial; font-size:13px; line-height:20px; color:#101010; max-width:520px; padding:30px; padding-top:20px; margin:0 auto; border:0px solid #DDDDDD; background:#FFFFFF;-moz-box-shadow: 0 0 8px 3px rgb(221,221,221); -o-box-shadow: 0 0 8px 3px rgb(221,221,221); -ms-box-shadow: 0 0 8px 3px rgb(221,221,221); -webkit-box-shadow: 0 0 8px 3px rgb(221,221,221); box-shadow: 0 0 8px 3px rgb(221,221,221);">
            <div class="header">
              <table cellspacing="0" cellpadding="0" rules="" style="border-color:#333; border-width:0; border-style:solid; width:100%; border-collapse:collapse;">
                <tr>
                <td><a href="'.SITEURL.'" target="_blank" style="border:0; text-decoration:none">
                <img src="'.SITEURL.'public/templates/images/index.png" alt="Riding Solo" style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;" /></a></td>
              </tr>
              <tr>
                <td style="margin:0 auto 8px; border:0; max-width:180px; text-align:center; display:block;"><span style="color:#e8593f;">GSTIN</span> : 03AAICR9803R1ZR </td>
              </tr>
            </table>';
          $message2 .= '<div style="height:10px; border-bottom:1px solid #ddd; margin-bottom:10px;"></div>
          </div>
          <div class="content" style="min-height:400px; padding:8px 0;">
            <h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Payment</span> Details</h2>
            <table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
              <tbody style="text-align:left;">
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold; width:40%;">Transaction Id</td>
                  <td style="width:60%;">' . $payment_id . '</td>
                </tr>
                <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Name</td>
                  <td>' . $adminemail[0]->trek_title . '</td>
                </tr>
                <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                  <td style="font-weight:bold;">Trek Batch</td>
                  <td>' . date("M d", strtotime($adminemail[0]->trekstart_date)) . ' ' . "TO" . ' ' . date("M d,Y", strtotime($adminemail[0]->trekend_date)) . '</td>
          </tr>';

          $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Trek Fee (per person)</td>
              <td>&#8377; ' . number_format((float)$adminemail[0]->trek_fee, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">GST</td>
              <td>&#8377; ' . number_format((float)$gstamount, 2, '.', ',') . '</td>
            </tr>
            <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Total Amount</td>
              <td>&#8377;' . number_format((float)$totalamount, 2, '.', ',') . '</td>
            </tr>';

          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Amount Paid</td>
              <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1 && $discount > 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">Discount</td>
              <td>&#8377; ' . number_format((float)$discount, 2, '.', ',') . '</td>
            </tr>';
          }
          if ($payment_type == 1)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
              <td style="font-weight:bold;">No. of Participants</td>
              <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 2)
          {
            $message2 .= '<tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Amount Paid</td>
                    <td>&#8377;' . number_format((float)$amount, 2, '.', ',') . '</td>
                  </tr>
                  <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">Pending amount</td>
                    <td><strong style="color:#009649;">&#8377;' . number_format($pending_amount, 2, '.', ',') . '</strong></td>
                  </tr>
                  <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                    <td style="font-weight:bold;">No. of Participants</td>
                    <td>' . count($adminemail) . '</td>
                  </tr>
                </tbody>
              </table>';
          }
          else if ($payment_type == 3)
          {
            $message2 .= '<tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Paid Amount(Advance Payment)</td>
                <td>&#8377; ' . number_format($pending_amount, 2, '.', ',') . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Balance Amount To Be Paid</td>
                <td><strong>&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Amount Paid</td>
                <td><strong style="color:#009649;">&#8377;' . number_format($amount, 2, '.', ',') . '</strong></td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">No. of Participants</td>
                <td>' . count($adminemail) . '</td>
              </tr>
            </tbody>
          </table>';
        }
        $message2 .= '<h2 style="margin:0; margin-bottom:4px; padding:0; font-size:16px; line-height:20px; font-weight:bold;"><span style="color:#e8593f;">Customer</span> Details</h2>';
        foreach ($adminemail as $values)
        {
          //print_r($values);exit;
          $message2 .= '<table cellspacing="0" cellpadding="5" rules="" style="border-color:#ddd;border-width:1px;border-style:solid;font-size:13px;width:100%;border-collapse:collapse; text-align:center; margin-bottom:20px;">
            <tbody style="text-align:left;">
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold; width:40%;">Particiapant name</td>
                <td style="width:60%;">' . $values->name . '</td>
              </tr>
              <tr style="background-color:#FFF; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Email</td>
                <td>' . $values->email . '</td>
              </tr>
              <tr style="background-color:#f0f0f0; border-bottom:1px solid #ddd">
                <td style="font-weight:bold;">Phone Number</td>
                <td>' . $values->mobile . '</td>
              </tr>
            </tbody>
          </table>';
                    }
                    $message2 .= '</div>
        <div class="footer">
          <div style="height:1px; border-bottom:1px solid #ddd; margin-bottom:15px;"></div>
          <p style="font-size:12px; line-height:20px; margin:0; padding:0; text-align:center;">If you have any questions about this invoice, simply email to  '.ADMIN_EMAIL.' <br/>OR<br/> call '.ADMIN_PHONE.'</p>
        </div>
        </div>
        </div>
        </body>
        </html>';
        echo $message2;exit;
        $smtpemail = new smtpHelper;
        $smtpemail->email = $email2;
        $smtpemail->subject = $subject2;
        $smtpemail->message = $message2;
        //$smtpemail->SendEmail();
      }
      $logs_info = $this->getTransLogDetails($payment_request_id);          
      if ($logs_info == '')
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
        );
        return $status;
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $logs_info,
            'paymentid' => $id
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
  public function getLpParticipantDetails($id)
  {
    $sql = "SELECT p.*,ib.`lpstart_date`,ib.`lpend_date`,t.`lp_title`,t.`lp_fee`,b.`address`,b.`created_date` as 'booking date' FROM sg_leisurepackages t, sg_lpbatches ib, sg_lpbookingdetails b, sg_lpparticipantdetails p  WHERE p.`lpbooking_id`=b.`lpbooking_id` and t.`lp_id`=b.`leisure_id` and b.`batch`=ib.`lpbatch_id` and b.`lpbooking_id`=$id";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $participantdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $participantdetails;
  }
  public function sendSuccessRequestIdLp($data) {
    try {
      extract($data);
      $request_id = $request_id;
      $sql = "SELECT `purpose`,`lpbooking_id`,`buyer_name`,`email`,`phone`,'' as paymentdetails  FROM sg_lpbeforebookingdetails WHERE `request_id`= '$request_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $bookingdetail = $stmt->fetch(PDO::FETCH_OBJ);
      $pd = $this->getLpPayDetails($request_id);
      $bookingdetail->paymentdetails = $pd;
      $no = $stmt->rowCount();
      if ($no != 0)
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'details' => $bookingdetail
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_NO_DATA,
            'message' => "Failure"
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
  public function getLpPayDetails($request_id)
  {
    $sql = "SELECT lppayment_id, txn_id as transactionid, amount, payment_request_id, original_amount, DATE_FORMAT(`created_date`,'%M %d,%Y %h:%i:%s')  as transactiondate   FROM sg_lppaymentdetails WHERE `payment_request_id`='$request_id'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $translogdetails = $stmt->fetch(PDO::FETCH_OBJ);
    return $translogdetails;
  }
  public function payBalanceAmountLp($data) {
    try {
      extract($data);
      $sql = "SELECT b.`booking_id`, getlpname(b.`lp_id`) as title, tb.`lpstart_date`, 
      tb.`lpend_date`, pm.`amount`,pm.`original_amount`,pm.`lppayment_id`, 
      bb.`email`,bb.`phone`,bb.`buyer_name` as name,b.`lp_fee` FROM sg_lppaymentdetails pm 
      inner join sg_lpbookingdetails b on pm.`lpbooking_id`=b.`booking_id` 
      inner join sg_lpbeforebookingdetails bb on bb.`lpbooking_id`=b.`booking_id` 
      inner join sg_lpbatches tb on tb.`lpbatch_id` = b.`batch` WHERE pm.`lpbooking_id`=:booking_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":booking_id", $booking_id);
      $res = $stmt->execute();
      $reg = $stmt->fetch(PDO::FETCH_OBJ);
      $bookingdetails = $this->getLpBookingDetails($booking_id);
      $purpose = 'Booking-'.$bookingdetails[0]->title;
      $trek_fee = $bookingdetails[0]->amount;
      $gst = ($reg->original_amount*5/100);
      $tot_amount = $reg->original_amount+$gst;
      $pending_amount = $tot_amount - $reg->amount;
      $name = $bookingdetails[0]->firstname;
      $phone = $bookingdetails[0]->phone;
      $email = $bookingdetails[0]->email;
      $item_name = $booking_id;
      $pending_amount = round($pending_amount, 2);
      $private_key = 'test_a91e585e91e453f1695a3752f5d';
      $private_auth_token = 'test_192e1e00e27d767207330fcc85a';
      $api_url = 'https://test.instamojo.com/api/1.1/';
      $api = new Instamojo($private_key,$private_auth_token,$api_url);
      $response = $api->paymentRequestCreate(array(
          "purpose" => $purpose,
          "amount" => $pending_amount,
          "buyer_name" => $name,
          "phone" => $phone,
          "send_email" => true,
          "send_sms" => true,
          "email" => $email,
          'allow_repeated_payments' => false,
		  "redirect_url" => "http://localhost:4200/trek/booking/details/acu7CgX781erd",
          //"redirect_url" => SITEURL."ridingsolo/bookingsuccesslp",  
          "webhook" => SITEURL."ridingsolo/getsuccessbookingdetailslp"            
        ));
        $response['booking_id'] = $item_name;
        $response['payment_type'] = '3';
        $response['original_amount'] = $tot_amount;
        $response['trek_fee'] = $trek_fee;
        if ($response != '')
        {
          $beforepaymentdetails = $this->insertBeforeBookingDetails($response);
          $requestid = $this->getPaymentRequestId($beforepaymentdetails);
          $status = array(
              'status' => ERR_OK,
              'message' => "Success please complete Booking payment process",
              'requestid' => $requestid,
              'URL' => 'https://test.instamojo.com/@rakhi_m305/'. $requestid,
              'TotalAmount' => $pending_amount
          );
          return $status;
        }
        else
        {
          $status = array(
              'status' => ERR_NOT_MODIFIED,
              'message' => "Failure Booking  Not Added "
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
  public function getSuccessBookingDetailsLp($data) {
    try {
      extract($data);
      extract($_POST);
      if(isset($_POST['payment_id'])&&$_POST['payment_id']!=''){
        if(isset($_POST['status']) && $_POST['status'] == 'Credit'){
          $logs_info = $this->getLpLogDetails($_POST['payment_request_id']);
          $this->insertLpPaymentDetails($_POST['payment_id'], $_POST['payment_request_id']);
          $this->set_logs("ridingsolo",'lp', "getSuccessBookingDetailsLp",implode('~',$_POST),'AfterPayment');
        }else {
          $this->set_logs("ridingsolo",'lp', "getSuccessBookingDetailsLp",implode('~',$_POST),'AfterPayment');
        }
      }
    } catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    } 
  }
  public function getBlogPageArticles($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT *, get_user_name(post_author) AS userName, CONCAT('".SITEURL."uploads/blog/', `post_image`) AS post_image,get_post_category_name(post_parent) AS category_name FROM sg_posts WHERE post_status = 'publish' ORDER BY post_date DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);

      //total
      $sql = "SELECT COUNT(*) AS ttl_cnt FROM sg_posts  WHERE post_status = 'publish'";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blogcnt = $stmt->fetch(PDO::FETCH_OBJ);

      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'total_cnt' => $blogcnt->ttl_cnt,
         'blog' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function getBlogRecentPosts($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 6;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT *, get_user_name(post_author) AS userName, CONCAT('".SITEURL."uploads/blog/', `post_image`) AS post_image,get_post_category_name(post_parent) AS category_name FROM sg_posts WHERE post_status = 'publish' ORDER BY post_date DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'recentposts' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function getBlogUnkonwnPath($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 10;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT *, get_user_name(post_author) AS userName, CONCAT('".SITEURL."uploads/blog/', `post_image`) AS post_image,get_post_category_name(post_parent) AS category_name FROM sg_posts WHERE post_status = 'publish' ORDER BY RAND() DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'articles' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function getBlogPageCategories($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT * FROM sg_post_categories WHERE status = '0' ORDER BY category_id DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'categories' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function getBlogPageArticleDetails($data) {
    try {
      extract($data);
      
      $sql = "SELECT *, get_user_name(post_author) AS userName, CONCAT('".SITEURL."uploads/blog/', `post_image`) AS post_image, get_post_category_name(post_parent) AS category_name FROM sg_posts WHERE ID='$id'";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'blog' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function getCategoryBlogArticles($data) {
    try {
      extract($data);
      if(isset($offset) && $offset!=''){
        $offset  = $offset;
      }
      else {
        $offset = 0;
      }
      if(isset($record_count) && ($record_count!='')){
        $record_count = $record_count;
      }
      else {
        $record_count = 50;
      }
      $offsetid = $offset * $record_count;
      $limit = $offsetid + $record_count;
      $sql = "SELECT *, get_user_name(post_author) AS userName, CONCAT('".SITEURL."uploads/blog/', `post_image`) AS post_image, get_post_category_name(post_parent) AS category_name FROM sg_posts WHERE post_status = 'publish' AND post_parent='$category_id' ORDER BY post_date DESC LIMIT ".$offsetid.",".$record_count;
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $blog = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($blog)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'blog' => $blog);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function submitArticleComment($data) {
    try {
      extract($data);
      $created_date = date("Y-m-d H:i:s");      
      $sql = "INSERT INTO `sg_post_comments` (`user_id`,  `comment_text`,  `created_by`,  `created_date`,  `status`,  `post_id`) VALUES('$user_id', '$comment_text', '$created_by', '$created_date', '$status', '$post_id')";
      $stmt = $this->connection->prepare($sql);
      $res = $stmt->execute();
      if ($res == 1)
      {        
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Comment Submitted Successfully."
        );
        return $status;    
      }
      else
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Comment Not Submitted "
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
  public function addUserWishlist($data) {
    try {
      extract($data);
      $trip_id = $id;
      $user_id = $userId;
      $trip_type = $tripType;
      $sql = "SELECT COUNT(*) AS cnt FROM sg_user_wishlist WHERE user_id = '$user_id' AND trip_id = '$trip_id' AND trip_type = '$trip_type' AND status='0'";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $wishlist = $stmt->fetch(PDO::FETCH_OBJ);
      if($wishlist->cnt == 0){
        $created_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO sg_user_wishlist (user_id, trip_id, trip_type, status, created_by, created_date) VALUES('".$user_id."', '".$trip_id."', '".$trip_type."', '0', '".$user_id."', '".$created_date."')";
        $stmt = $this->connection->prepare($sql);  
        $stmt->execute();
        $status = array(
         'status' =>"200",
         'message' =>"Success");
        return $status;
      }else{
        $status = array('status'=>ERR_EXISTS,
         'message'=>"Already Added to wishlist");
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
  public function getUserWishlist($data) {
    try {
      extract($data);
      
      $sql = "SELECT trek_id AS id, trek_title AS title, `trek_fee` AS fee, `visit_time` AS visitTime, `time_visit` AS timeVisit, concat('".SITEURL."uploads/treks/', `trek_image`) as image, `trek_overview` AS overview, `trek_days` AS days, `trek_nights` AS nights, numberofdays, temperature, altitude FROM sg_trekingdetails WHERE trek_id IN(SELECT trip_id FROM sg_user_wishlist WHERE user_id='$userId' AND trip_type='Trek' AND status='0')";
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $wishlist = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($wishlist)){
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'wishlist' => $wishlist);
        return $status;
      }else{
        $status = array('status'=>"204",
         'message'=>"No Data Found");
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
  public function updateBatchDate($data) {
    try {
      extract($data);
      $booking_id = $booking_id;
      $user_id = $userId;
      $trip_type = $tripType;
      $batch_id = $batch_id;
      $created_date = date('Y-m-d H:i:s');
      if($trip_type == '1') {
        $sql = "UPDATE sg_bookingdetails SET batch = '".$batch_id."', modified_date='".$created_date."', modified_by='".$user_id."' WHERE booking_id = '".$booking_id."'";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
      }
      if($trip_type == '2') {
        $sql = "UPDATE sg_tripbookingdetails SET batch = '".$batch_id."', modified_date='".$created_date."', modified_by='".$user_id."' WHERE user_id = '".$user_id."' AND tripbooking_id = '".$booking_id."'";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
      }
      if($trip_type == '3') {
        $sql = "UPDATE sg_expeditionbookings SET batch = '".$batch_id."', modified_date='".$created_date."', modified_by='".$user_id."' WHERE user_id = '".$user_id."' AND booking_id = '".$booking_id."'";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
      }
      if($trip_type == '4') {
        $sql = "UPDATE sg_lpbookingdetails SET batch = '".$batch_id."', modified_date='".$created_date."', modified_by='".$user_id."' WHERE user_id = '".$user_id."' AND booking_id = '".$booking_id."'";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
      }
      if($res){
        $status = array(
         'status' =>"200",
         'message' =>"Success"
        );
        return $status;
      }else{
        $status = array('status'=>ERR_NOT_MODIFIED,
         'message'=>"Not Modified");
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
  public function getPaymentDetails($data) {
    try {
      extract($data);
      $id = $paymentId;
      $sql = "SELECT pm.`txn_id` AS transactionId, pm.`amount` AS amountPaid, 'Success' AS bookingStatus, gettrekname(b.`trek_id`) as name, CONCAT(DATE_FORMAT(ib.`trekstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(ib.`trekend_date`,'%M %d')) AS batch, getparticipantscount(b.`booking_id`) as noOfParticipants, b.booking_id, pm.`payment_id`, '' AS participants, '' AS rentalItems, '' AS addons FROM sg_bookingdetails b inner join sg_paymentdetails pm on pm.`booking_id` = b.`booking_id` inner join sg_inserttrekbatches ib on b.`batch` = ib.`batch_id` inner join sg_participantdetails p on p.`booking_id`=b.`booking_id` WHERE pm.`txn_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetch(PDO::FETCH_OBJ);
      $booking_id = $transactiondetails->booking_id;
      $payment_id = $transactiondetails->payment_id;
      //$transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails->participants = $this->pd($payment_id);
      $transactiondetails->rentalItems = $this->getrentalbookings($booking_id);
      $transactiondetails->addons = $this->getaddonsbookings($booking_id);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $transactiondetails
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
  public function getrentalbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.item_name FROM sg_rental_items r WHERE r.item_id=b.item_id) AS item, b.quantity AS qty, b.size, b.subtotal AS amount FROM sg_trek_rental_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getaddonsbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.add_on_name FROM sg_trek_add_ons r WHERE r.add_on_id=b.item_id) AS item, b.quantity AS qty, b.subtotal AS amount FROM sg_trek_addon_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getTripPaymentDetails($data) {
    try {
      extract($data);
      $id = $paymentId;
      $sql = "SELECT pm.`txn_id` AS transactionId, pm.`amount` AS amountPaid, 'Success' AS bookingStatus, gettripname(b.`trip_id`) as name, CONCAT(DATE_FORMAT(ib.`tripstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(ib.`tripend_date`,'%M %d')) AS batch, gettripparticipantscount(b.`tripbooking_id`) as noOfParticipants, b.tripbooking_id As booking_id, pm.`trippayment_id` AS payment_id, '' AS participants, '' AS rentalItems, '' AS addons FROM sg_tripbookingdetails b inner join sg_trippaymentdetails pm on pm.`tripbooking_id` = b.`tripbooking_id` inner join sg_tripbatches ib on b.`batch` = ib.`tripbatch_id` inner join sg_tripparticipantdetails p on p.`tripbooking_id`=b.`tripbooking_id` WHERE pm.`txn_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetch(PDO::FETCH_OBJ);
      $booking_id = $transactiondetails->booking_id;
      $payment_id = $transactiondetails->payment_id;
      //$transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails->participants = $this->pdTrip($payment_id);
      $transactiondetails->rentalItems = $this->gettriprentalbookings($booking_id);
      $transactiondetails->addons = $this->gettripaddonsbookings($booking_id);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $transactiondetails
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
  public function gettriprentalbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.item_name FROM sg_rental_items r WHERE r.item_id=b.item_id) AS item, b.quantity AS qty, b.size, b.subtotal AS amount FROM sg_trip_rental_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function gettripaddonsbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.add_on_name FROM sg_trip_add_ons r WHERE r.add_on_id=b.item_id) AS item, b.quantity AS qty, b.subtotal AS amount FROM sg_trip_addon_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getExpPaymentDetails($data) {
    try {
      extract($data);
      $id = $paymentId;
      $sql = "SELECT pm.`txn_id` AS transactionId, pm.`amount` AS amountPaid, 'Success' AS bookingStatus, getexpeditionname(b.`expedition_id`) as name, CONCAT(DATE_FORMAT(ib.`expeditionstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(ib.`expeditionend_date`,'%M %d')) AS batch, getexpeditionparticipantscount(b.`booking_id`) as noOfParticipants, b.booking_id, pm.`payment_id`, '' AS participants, '' AS rentalItems, '' AS addons FROM sg_expeditionbookings b inner join sg_expeditionpayments pm on pm.`booking_id` = b.`booking_id` inner join sg_expeditionbatches ib on b.`batch` = ib.`batch_id` inner join  sg_expeditionparticipants p on p.`booking_id`=b.`booking_id` WHERE pm.`txn_id`='$id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetch(PDO::FETCH_OBJ);
      $booking_id = $transactiondetails->booking_id;
      $payment_id = $transactiondetails->payment_id;
      //$transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails->participants = $this->pdExp($payment_id);
      $transactiondetails->rentalItems = $this->getexprentalbookings($booking_id);
      $transactiondetails->addons = $this->getexpaddonsbookings($booking_id);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $transactiondetails
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
  public function getexprentalbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.item_name FROM sg_rental_items r WHERE r.item_id=b.item_id) AS item, b.quantity AS qty, b.size, b.subtotal AS amount FROM sg_exp_rental_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getexpaddonsbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.add_on_name FROM sg_expedition_add_ons r WHERE r.add_on_id=b.item_id) AS item, b.quantity AS qty, b.subtotal AS amount FROM sg_exp_addon_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getLpPaymentDetails($data) {
    try {
      extract($data);
      $id = $paymentId;
      $sql = "SELECT pm.`txn_id` AS transactionId, pm.`amount` AS amountPaid, 'Success' AS bookingStatus, getlpname(b.`lp_id`) as name, CONCAT(DATE_FORMAT(ib.`lpstart_date`,'%M %d'),' ','To',' ',DATE_FORMAT(ib.`lpend_date`,'%M %d')) AS batch, getlpparticipantscount(b.`booking_id`) as noOfParticipants, b.booking_id, pm.`lppayment_id` AS payment_id, '' AS participants, '' AS rentalItems, '' AS addons FROM sg_lpbookingdetails b inner join sg_lppaymentdetails pm on pm.`lpbooking_id` = b.`booking_id` inner join sg_lpbatches ib on b.`batch` = ib.`lpbatch_id` inner join sg_lpparticipantdetails p on p.`booking_id`=b.`booking_id` WHERE pm.`txn_id`='$id' LIMIT 1";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $transactiondetails = $stmt->fetch(PDO::FETCH_OBJ);
      $booking_id = $transactiondetails->booking_id;
      $payment_id = $transactiondetails->payment_id;
      //$transactiondetails['invoicedetails']->trekamount = $trekamount;
      $transactiondetails->participants = $this->pdLp($payment_id);
      $transactiondetails->rentalItems = $this->getlprentalbookings($booking_id);
      $transactiondetails->addons = $this->getlpaddonsbookings($booking_id);
      if ((empty($transactiondetails)))
      {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure"
        );
        return $status;   
      }
      else
      {
        $status = array(
            'status' => ERR_OK,
            'message' => "Success",
            'paymentdetails' => $transactiondetails
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
  public function getlprentalbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.item_name FROM sg_rental_items r WHERE r.item_id=b.item_id) AS item, b.quantity AS qty, b.size, b.subtotal AS amount FROM sg_lp_rental_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getlpaddonsbookings($booking_id) {
    try {
      $sql = "SELECT (SELECT r.activity_name FROM sg_lpaddonactivities r WHERE r.lpactivity_id=b.item_id) AS item, b.quantity AS qty, b.subtotal AS amount FROM sg_lp_addon_bookings b WHERE b.booking_id='$booking_id'";
      $stmt = $this->connection->prepare($sql);  
      $res = $stmt->execute();
      $rentals = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $rentals;
    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function addingTrekBackend($data) {
    try {
      extract($data);
      $startdate = array('2022-10-01', '2022-10-20', '2022-11-01', '2022-11-20', '2022-12-01', '2022-12-20');
      $enddate = array('2022-10-05', '2022-10-25', '2022-11-05', '2022-11-25', '2022-12-05', '2022-12-25');
      for($i=0; $i<count($startdate); $i++) {
        //treks
        $sql = "INSERT INTO `sg_inserttrekbatches`( `trekstart_date`, `trekend_date`, `trekbatch_size`, `trekbatch_status`, `trek_id`, `created_date`, `created_by`, `recordstatus`) SELECT '".$startdate[$i]."', '".$enddate[$i]."', '30', '0', trek_id, '2022-09-28 11:38:00', '1', '0' FROM `sg_trekingdetails`";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
        //biketrips
        $sql = "INSERT INTO `sg_tripbatches`( `tripstart_date`, `tripend_date`, `tripbatch_size`, `tripbatch_status`, `trip_id`, `created_date`, `created_by`, `recordstatus`) SELECT '".$startdate[$i]."', '".$enddate[$i]."', '30', '0', biketrips_id, '2022-09-28 11:38:00', '1', '0' FROM `sg_biketrips`";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();

        //leisure trips
        $sql = "INSERT INTO `sg_lpbatches`( `lpstart_date`, `lpend_date`, `lpbatch_size`, `lpbatch_status`, `lp_id`, `created_date`, `created_by`, `recordstatus`) SELECT '".$startdate[$i]."', '".$enddate[$i]."', '30', '0', leisure_id, '2022-09-28 11:38:00', '1', '0' FROM `sg_leisurepackages`";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();

        //expeditions
        $sql = "INSERT INTO `sg_expeditionbatches`( `expeditionstart_date`, `expeditionend_date`, `expeditionbatch_size`, `expeditionbatch_status`, `expedition_id`, `created_date`, `created_by`, `recordstatus`) SELECT '".$startdate[$i]."', '".$enddate[$i]."', '30', '0', expedition_id, '2022-09-28 11:38:00', '1', '0' FROM `sg_expeditions`";
        $stmt = $this->connection->prepare($sql);  
        $res = $stmt->execute();
      }
      

    }catch(PDOException $e) {        
      $status = array(
                'status' => "500",
                'message' => $e->getMessage()
                );
      return $status;       
    }
  }
  public function getPromoCodes() {
    try {
      $query = "SELECT coupon_id AS couponId, coupon_code as couponCode, coupon_name as couponName, coupon_description AS description, valid_from as validFrom, valid_till as validTill, discount_amount AS discount, status, all_treks AS allTreks, coupon_type AS couponType, commision_status AS commisionStatus, commision_date AS commisionDate, commision_remarks AS commisionRemarks, coupon_limit AS couponLimit, coupon_value_limit AS couponValueLimit, coupon_value_decrease AS couponValueDecrease, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, CONCAT('".SITEURL."uploads/coupons/', coupon_image) AS image FROM sg_trekcoupons WHERE coupon_id IN (SELECT coupon_id FROM sg_trekcouponsmap WHERE status = '0') AND status = '0' ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results['treks'] = $stmt->fetchAll(PDO::FETCH_OBJ);

      $query = "SELECT coupon_id AS couponId, coupon_code as couponCode, coupon_name as couponName, coupon_description AS description, valid_from as validFrom, valid_till as validTill, discount_amount AS discount, status, all_trips AS allTreks, coupon_type AS couponType, commision_status AS commisionStatus, commision_date AS commisionDate, commision_remarks AS commisionRemarks, coupon_limit AS couponLimit, coupon_value_limit AS couponValueLimit, coupon_value_decrease AS couponValueDecrease, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, CONCAT('".SITEURL."uploads/coupons/', coupon_image) AS image FROM sg_tripcoupons WHERE coupon_id IN (SELECT coupon_id FROM sg_tripcouponsmap WHERE status = '0') AND status = '0' ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results['biketrips'] = $stmt->fetchAll(PDO::FETCH_OBJ);

      $query = "SELECT coupon_id AS couponId, coupon_code as couponCode, coupon_name as couponName, coupon_description AS description, valid_from as validFrom, valid_till as validTill, discount_amount AS discount, status, all_expeditions AS allTreks, coupon_type AS couponType, commision_status AS commisionStatus, commision_date AS commisionDate, commision_remarks AS commisionRemarks, coupon_limit AS couponLimit, coupon_value_limit AS couponValueLimit, coupon_value_decrease AS couponValueDecrease, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, CONCAT('".SITEURL."uploads/coupons/', coupon_image) AS image FROM sg_expeditioncoupons WHERE coupon_id IN (SELECT coupon_id FROM sg_expeditioncouponsmap WHERE status = '0') AND status = '0' ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results['expeditions'] = $stmt->fetchAll(PDO::FETCH_OBJ);

      $query = "SELECT coupon_id AS couponId, coupon_code as couponCode, coupon_name as couponName, coupon_description AS description, valid_from as validFrom, valid_till as validTill, discount_amount AS discount, status, all_lps AS allTreks, coupon_type AS couponType, commision_status AS commisionStatus, commision_date AS commisionDate, commision_remarks AS commisionRemarks, coupon_limit AS couponLimit, coupon_value_limit AS couponValueLimit, coupon_value_decrease AS couponValueDecrease, created_date AS createdDate, created_by AS createdBy, modified_date AS modifiedDate, modified_by AS modifiedBy, CONCAT('".SITEURL."uploads/coupons/', coupon_image) AS image FROM sg_lpcoupons WHERE status = '0' ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      $results['packages'] = $stmt->fetchAll(PDO::FETCH_OBJ);

      if($results!=''){
        $status = array(
        'status' => ERR_OK,
        'message' => "Success",
        'promocodes' => $results);
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
  public function addHostelBookingDetails($data) {
    try {
      extract($data);
      $trekId = $id;
      if($id == '' || $participantId == '' || $userId == '') {
        $status = array(
          'status' => ERR_PARTIAL_CONT,
          'message' => "Failure! Please check details."
        );
        return $status;
      }
      $trekdetails = $this->getHostelDetails(array("hostel_id"=>$id));
      if(empty($trekdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! Hostel ID is not valid."
        );
        return $status;
      }
      $userdetails = $this->getLoginUserDetails($userId);
      if(empty($userdetails)) {
        $status = array(
          'status' => ERR_NO_DATA,
          'message' => "Failure! User ID is not valid."
        );
        return $status;
      }
      $sql = "INSERT INTO sg_hostelbookings (hostel_id, hostel_fee, created_date, how_did_you_find_us, have_you_trekked_with_us, user_id, accepted_terms, accepted_medical_terms, accepted_liability_terms, secured_my_trip) VALUES(:hostel_id, :hostel_fee, :created_date, :how_did_you_find_us, :have_you_trekked_with_us, :user_id, :accepted_terms, :accepted_medical_terms, :accepted_liability_terms, :secured_my_trip)";
      $stmt = $this->connection->prepare($sql);
      $created_date = date("Y-m-d H:i:s");
      $participant_id = $participantId;
      $stmt->bindParam(":hostel_id", $id);
      $stmt->bindParam(":hostel_fee", $fee);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":how_did_you_find_us", $aboutUs);
      $stmt->bindParam(":have_you_trekked_with_us", $trekkedWithUs);
      $stmt->bindParam(":user_id", $userId);
      $stmt->bindParam(":accepted_terms", $acceptedTerms);
      $stmt->bindParam(":accepted_medical_terms", $acceptedMedicalTerms);
      $stmt->bindParam(":accepted_liability_terms", $acceptedLiabilityTerms);
      $stmt->bindParam(":secured_my_trip", $securedMyTrip);
      $res = $stmt->execute();
      $booking_id = $this->connection->lastInsertId();
      if(isset($booking_id) && $booking_id != '0'){
        $status = $this->insertHostelParticipentsDetails($booking_id, $participant_id);
              
        if(isset($rentalItems) && !empty($rentalItems)) {
          $res = $this->insertHostelBookingRentals($booking_id, $rentalItems);
        }
        if(isset($addons) && !empty($addons)) {
          $res = $this->insertHostelBookingAddons($booking_id, $addons);
        }
      }else {
        $status = array(
          'status' => ERR_NOT_MODIFIED,
          'message' => "Failure! Booking is not added."
        );
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
  public function insertHostelParticipentsDetails($booking_id, $participants)
  {
    try {     
      $participentsid = $participants;
      $s = explode(',', $participentsid);
      $created_date = date("Y-m-d H:i:s");
      foreach ($s as $key => $value)
      {
        $sql = "INSERT INTO sg_hostelparticipantdetails (name, email, mobile, age, gender, height, weight, booking_id, created_date, part_id)
        SELECT name, email, mobile, age, gender, height, weight, '$booking_id', '$created_date', participant_id
        FROM   sg_userparticipantdetails
        WHERE  participant_id =".$value;
        $stmt = $this->connection->prepare($sql);
        $res = $stmt->execute();
      }
      if ($res == 'true') {
        $query = "UPDATE sg_hostelbookings SET address = (select address from sg_userparticipantdetails where participant_id = '".$participants[0]->participant."') where booking_id = :booking_id"; 
        $stmt2 = $this->connection->prepare($query);
        $stmt2->bindParam(":booking_id", $booking_id);
        $stmt2->execute();
        $status = array(
            'status' => ERR_OK,
            'message' => "Success Booking & participents added ",
            'booking_id' => $booking_id
        );
      }else {
        $status = array(
            'status' => ERR_NOT_MODIFIED,
            'message' => "Failure Participents are not added "
        );
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
  public function insertHostelBookingRentals($booking_id, $rentalItems) {
    try {     
      extract($rentalItems);
      $created_date = date('Y-m-d H:i:s');
      foreach ($rentalItems as $key => $value)
      {
        $sql = "INSERT INTO `sg_hostel_rental_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`, `size`) VALUES ('$booking_id', '".$value->itemId."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0', '".$value->size."')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success rental items added ",
          'booking_id' => $booking_id
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
  public function insertHostelBookingAddons($booking_id, $addons) {
    try {     
      extract($addons);
      $created_date = date('Y-m-d H:i:s');
      foreach ($addons as $key => $value)
      {
        $sql = "INSERT INTO `sg_hostel_addon_bookings`(`booking_id`, `item_id`, `price`, `quantity`, `subtotal`, `created_date`, `status`) VALUES ('$booking_id', '".$value->add_on_id."', '".$value->price."', '".$value->qty."', '".$value->subtotal."', '".$created_date."', '0')";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
      }
      $status = array(
          'status' => ERR_OK,
          'message' => "Success Add ons added ",
          'booking_id' => $booking_id
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
  //ezee technosys
  public function getListHotels($data) {
    try {     
      extract($data);
      // $ezee = new Ezee;          
      // $res = $ezee->GetHotelsList($data);
      // $res = json_decode($res);
  

      $res = array(
        '0' => array(
        "Hotel_Code"=> "18727",
        "Hotel_Apikey" => "c6ba32eb25ba@9148790807c57666de-bb8c-11ea-a",
        "Hotel_Name"=>"Hotel eZee1",
        "City"=>"Surat",
        "State"=>"Gujarat",
        "Country"=>"India",
        "Property_Type"=>"Resort",
        "HotelImages"=>["https://saas.s3.amazonaws.com/uploads/26_20120530045039_00 58025001338353439_941_111.jpg",
                      "https://saas.s3.amazonaws.com/uploads/26_20120717100818_05 90583001342519698_826_1.jpg"
                      ]
                              
        ),
        '1' => array("Hotel_Code"=> "18727",
          "Hotel_Apikey" => "c6ba32eb25ba@9148790807c57666de-bb8c-11ea-a",
        "Hotel_Name"=>"Hotel eZee2",
        "City"=>"Surat",
        "State"=>"Gujarat",
        "Country"=>"India",
        "Property_Type"=>"Hotel",
        "HotelImages"=>["https://saas.s3.amazonaws.com/uploads/27_20110530091403_03 71058001306746843_120_Venetian_Hotel.jpg"
                      ])
      );
      $status = array(
          'status' => ERR_OK,
          'message' => "Success",
          'hotels' => $res
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
  public function getHotelDetails($data) {
    try {     
      extract($data);
      $ezee = new Ezee;      
      // $data = array("hotel_code" => "18727", 
      //           "hotel_apikey" => "0e5810c6cc41@9148790807c57666de-bb8c-11ea-a",
      //            "check_in_date" => "2022-08-16", 
      //            "check_out_date" => "", 
      //            "num_nights" => "2", 
      //            "number_adults" => "1",
      //             "number_children" => "0", 
      //             "num_rooms" => "1");    
      $sql = "SELECT `hostel_id` AS id, `hostel_name` AS hostelName, `email`, `mobile`, `landline`, `address`, CONCAT('".SITEURL."uploads/hostels/', `logo`) AS logo, `location`, `city`, `state`, `status`, `spoc_name` AS spocName, `spoc_number` AS spocNumber, DATE_FORMAT(`created_date`,'%M %d,%Y') AS createdDate, DATE_FORMAT(`modified_date`,'%M %d,%Y') AS modifiedDate, `created_by` AS createdBy, `modified_by` AS modifiedBy, hostel_description, hostel_map, house_rules, '' AS gallery, '' AS reviews, '' AS facilities, '' AS faq, '' AS rooms, hotel_code, hotel_apikey, hotel_type AS facilities FROM `sg_hosteldetails` WHERE hostel_id='$hotel_id'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $hotel = $stmt->fetch(PDO::FETCH_OBJ);  
      $data['hotel_code'] = $hotel->hotel_code;
      $data['hotel_apikey'] = $hotel->hotel_apikey;
      $res = $ezee->GetHotelDetails($data);
      $res = json_decode($res);
      $status = array(
          'status' => ERR_OK,
          'message' => "Success",
          'hotels' => $res
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
  public function addHotelBooking($data) {
    try {
      extract($data);
      //print_r($data);exit;
      $ezee = new Ezee;     
      $res = $ezee->AddHotelBooking($data);
      $res = json_decode($res);
      $status = array(
          'status' => ERR_OK,
          'message' => "Success Add ons added ",
          'hotels' => $res
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
  public function processHotelBooking($data) {
    try {
      extract($data);
      $ezee = new Ezee;     
      $res = $ezee->ProcessHotelBooking($data);
      $res = json_decode($res);
      $status = array(
          'status' => ERR_OK,
          'message' => "Success",
          'hotels' => $res
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
  public function getRegisterOtp($data) {
    try {
      extract($data);
      if (is_numeric($mobile))
      {
        $userexist = $this->checkUserDetails($mobile);
        if ($userexist == '0') {
          $otp = rand(111111,999999);
          $otpdetails = array();
          $otpdetails['mobile'] = $mobile;
          $otpdetails['otp'] = $otp;
          $otp_id = $this->insertOtpDetails($otpdetails);
          
          if ($otp_id)
          {
             $message  ='Use OTP '.$otp.' to verify login to your RS Account to uncover your adventure.
RidingSolo does not call to verify your OTP.';
            $smshelper = new smshelper;
            $smshelper->SendSms($message, $mobile);
            $optmobile = substr($mobile, -4);
            $mess = array(
              'message' => "Enter the otp sent to your mobile ******" . $optmobile
            );
            $status = array(
              'status' => ERR_OK,
              'message' => "Success",
              'otp_id' => $otp_id
            );
            return $status;
          }      
        }
        else {
          $status = array(
              'status' => ERR_EXISTS,
              'message' => "Sorry provided number already exist in system.Please login ."
          );
          return $status;
        }
      }
      else
      {
        $status = array(
            'status' => "500",
            'message' => "Please enter 10 digits moblie number"
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
  public function addQuoteDetails($data) {
    try {
      extract($data);
      $created_date = date('Y-m-d H:i:s');
      if($departure_date == '') $departure_date = NULL; else $departure_date = date("Y-m-d", strtotime($departure_date));
      if($departure_week == '') $departure_week = NULL; else $departure_week = date("Y-m-d", strtotime($departure_week));
      if($departure_anytime == '') $departure_anytime = NULL; else $departure_anytime = date("Y-m-d", strtotime($departure_anytime));
      
      $sql = "INSERT INTO `sg_get_quote`(`dest_to`, `dest_from`, `departure_date`, `departure_week`, `departure_anytime`, `fullname`, `phone_number`, `email_id`, `no_days`, `no_people`, `budget`, `status`, `created_by`, `created_date`) VALUES (:dest_to, :dest_from, :departure_date, :departure_week, :departure_anytime, :fullname, :phone_number, :email_id, :no_days, :no_people, :budget, '0', '1', :created_date)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":dest_to", $dest_to);
      $stmt->bindParam(":dest_from", $dest_from);
      $stmt->bindParam(":departure_date", $departure_date);
      $stmt->bindParam(":departure_week", $departure_week);
      $stmt->bindParam(":departure_anytime", $departure_anytime);
      $stmt->bindParam(":fullname", $fullname);
      $stmt->bindParam(":phone_number", $phone_number);
      $stmt->bindParam(":email_id", $email_id);
      $stmt->bindParam(":no_days", $no_days);

      $stmt->bindParam(":no_people", $no_people);
      $stmt->bindParam(":budget", $budget);
      $stmt->bindParam(":created_date", $created_date);
      
      $res = $stmt->execute();
      $status = array(
          'status' => ERR_OK,
          'message' => "Success quote added ",
          'booking_id' => $res
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
}